<?php

/**
 * Register Custom Post Type for Human Design Profiles.
 * Only the profile creator can manage it.
 */
function hd_register_profile_post_type()
{
    register_post_type('hd_profile', [
        'labels' => [
            'name' => 'Human Design Profiles',
            'singular_name' => 'Human Design Profile',
        ],

        'public' => false, // Set to true if you want these profiles publicly queryable.
        'show_ui' => true,
        'show_in_menu' => true,               // Make it appear as its own admin menu item.
        'menu_icon' => 'dashicons-id-alt', // Dashicon icon; change as desired.
        'supports' => ['title'],
        'capability_type' => 'hd_profile',
        'map_meta_cap' => true,
    ]);

}

add_action('init', 'hd_register_profile_post_type');

// If you also allow non-logged-in users (unlikely in this case), add_action('wp_ajax_nopriv_hd_get_reports_for_profile', 'hd_get_reports_for_profile');
function hd_add_profile_menu_page()
{
    add_menu_page(
        __('Human Design Profiles', 'zentha'),
        __('Human Design Profiles', 'zentha'),
        'edit_hd_profile',
        'edit.php?post_type=hd_profile',
        '',
        'dashicons-id-alt',
        5
    );
}

add_action('admin_menu', 'hd_add_profile_menu_page');

/**
 * Add custom columns to the Human Design Profiles list table.
 */
function hd_set_custom_edit_hd_profile_columns($columns)
{
    // Remove the default date column temporarily.
    unset($columns['date']);
    // Build new column array.
    $new_columns = [
        'cb' => $columns['cb'],
        'title' => __('Title', 'zentha'),
        'hd_dob' => __('Birth Date', 'zentha'),
        'hd_location' => __('Location', 'zentha'),
        'date' => __('Date', 'zentha'),
    ];
    return $new_columns;
}

add_filter('manage_hd_profile_posts_columns', 'hd_set_custom_edit_hd_profile_columns');

function hd_custom_hd_profile_column($column, $post_id)
{
    switch ($column) {
        case 'hd_dob':
            $dob = get_post_meta($post_id, '_hd_dob', true);
            echo $dob ? esc_html($dob) : __('N/A', 'zentha');
            break;
        case 'hd_location':
            $location = get_post_meta($post_id, '_hd_location', true);
            echo $location ? esc_html($location) : __('N/A', 'zentha');
            break;
    }
}

add_action('manage_hd_profile_posts_custom_column', 'hd_custom_hd_profile_column', 10, 2);