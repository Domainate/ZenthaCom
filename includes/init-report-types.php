<?php


function zentha_register_report_type_post_type()
{
    $labels = array(
        'name' => _x('Report Types', 'Post Type General Name', 'zentha'),
        'singular_name' => _x('Report Type', 'Post Type Singular Name', 'zentha'),
        'menu_name' => __('Report Types', 'zentha'),
        'name_admin_bar' => __('Report Type', 'zentha'),
        'archives' => __('Report Type Archives', 'zentha'),
        'attributes' => __('Report Type Attributes', 'zentha'),
        'parent_item_colon' => __('Parent Report Type:', 'zentha'),
        'all_items' => __('All Report Types', 'zentha'),
        'add_new_item' => __('Add New Report Type', 'zentha'),
        'add_new' => __('Add New', 'zentha'),
        'new_item' => __('New Report Type', 'zentha'),
        'edit_item' => __('Edit Report Type', 'zentha'),
        'update_item' => __('Update Report Type', 'zentha'),
        'view_item' => __('View Report Type', 'zentha'),
        'view_items' => __('View Report Types', 'zentha'),
        'search_items' => __('Search Report Type', 'zentha'),
        'not_found' => __('Not found', 'zentha'),
        'not_found_in_trash' => __('Not found in Trash', 'zentha'),
        'featured_image' => __('Report Type Image', 'zentha'),
        'set_featured_image' => __('Set report type image', 'zentha'),
        'remove_featured_image' => __('Remove report type image', 'zentha'),
        'use_featured_image' => __('Use as report type image', 'zentha'),
        'insert_into_item' => __('Insert into report type', 'zentha'),
        'uploaded_to_this_item' => __('Uploaded to this report type', 'zentha'),
        'items_list' => __('Report Types list', 'zentha'),
        'items_list_navigation' => __('Report Types list navigation', 'zentha'),
        'filter_items_list' => __('Filter report types list', 'zentha'),
    );
    $args = array(
        'label' => __('Report Type', 'zentha'),
        'description' => __('Custom post type for managing different report types.', 'zentha'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-media-document',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'show_in_rest' => true, // Enable Gutenberg editor
    );
    register_post_type('report_type', $args);
}
add_action('init', 'zentha_register_report_type_post_type', 0);

function zentha_register_report_type_meta_fields()
{
    // Register 'type' field
    register_post_meta('report_type', '_report_type', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
        'description' => 'A unique identifier for the report type (e.g., comprehensive_overview).',
    ));

    // Register 'video_url' field
    register_post_meta('report_type', '_video_url', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'sanitize_callback' => 'esc_url_raw',
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
        'description' => 'URL to a video related to the report type.',
    ));

    // Register 'prompt' field
    register_post_meta('report_type', '_prompt', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
        'sanitize_callback' => 'wp_kses_post', // Sanitize for rich text content
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
        'description' => 'The prompt text associated with this report type.',
    ));
}
add_action('init', 'zentha_register_report_type_meta_fields');


/**
 * Add custom meta box for Report Type fields.
 */
function zentha_add_report_type_meta_box()
{
    add_meta_box(
        'zentha_report_type_fields',
        __('Report Type Details', 'zentha'),
        'zentha_report_type_meta_box_callback',
        'report_type',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'zentha_add_report_type_meta_box');

/**
 * Callback function to render the meta box fields.
 *
 * @param WP_Post $post The current post object.
 */
function zentha_report_type_meta_box_callback($post)
{
    // Add a nonce field so we can check for it later.
    wp_nonce_field('zentha_save_report_type_meta_box_data', 'zentha_report_type_meta_box_nonce');

    $report_type_id = get_post_meta($post->ID, '_report_type', true);
    $video_url = get_post_meta($post->ID, '_video_url', true);
    $prompt = get_post_meta($post->ID, '_prompt', true);
    ?>
    <p>
        <label
            for="zentha_report_type_id"><?php _e('Report Type ID (e.g., comprehensive_overview):', 'zentha'); ?></label>
        <input type="text" id="zentha_report_type_id" name="zentha_report_type_id"
            value="<?php echo esc_attr($report_type_id); ?>" class="large-text" />
    </p>
    <p>
        <label for="zentha_video_url"><?php _e('Video URL:', 'zentha'); ?></label>
        <input type="url" id="zentha_video_url" name="zentha_video_url" value="<?php echo esc_url($video_url); ?>"
            class="large-text" />
    </p>
    <p>
        <label for="zentha_prompt"><?php _e('Prompt:', 'zentha'); ?></label>
        <textarea id="zentha_prompt" name="zentha_prompt" rows="10"
            class="large-text"><?php echo esc_textarea($prompt); ?></textarea>
    </p>
    <?php
}

/**
 * Save meta box data when the post is saved.
 *
 * @param int $post_id The ID of the post being saved.
 */
function zentha_save_report_type_meta_box_data($post_id)
{
    // Check if our nonce is set.
    if (!isset($_POST['zentha_report_type_meta_box_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['zentha_report_type_meta_box_nonce'], 'zentha_save_report_type_meta_box_data')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Sanitize and save the data.
    if (isset($_POST['zentha_report_type_id'])) {
        update_post_meta($post_id, '_report_type', sanitize_text_field($_POST['zentha_report_type_id']));
    }
    if (isset($_POST['zentha_video_url'])) {
        update_post_meta($post_id, '_video_url', esc_url_raw($_POST['zentha_video_url']));
    }
    if (isset($_POST['zentha_prompt'])) {
        update_post_meta($post_id, '_prompt', wp_kses_post($_POST['zentha_prompt']));
    }
}
add_action('save_post', 'zentha_save_report_type_meta_box_data');

// Add custom columns to the Report Type admin list
function zentha_set_report_type_columns($columns)
{
    $columns['report_type_id'] = __('Type ID', 'zentha');
    $columns['video_url'] = __('Video URL', 'zentha');
    $columns['prompt_content'] = __('Prompt', 'zentha');
    return $columns;
}
add_filter('manage_report_type_posts_columns', 'zentha_set_report_type_columns');

// Populate custom columns for Report Type admin list
function zentha_custom_report_type_column($column, $post_id)
{
    switch ($column) {
        case 'report_type_id':
            echo esc_html(get_post_meta($post_id, '_report_type', true));
            break;
        case 'video_url':
            echo esc_url(get_post_meta($post_id, '_video_url', true));
            break;
        case 'prompt_content':
            echo esc_html(wp_trim_words(get_post_meta($post_id, '_prompt', true), 20)); // Display first 20 words
            break;
    }
}
add_action('manage_report_type_posts_custom_column', 'zentha_custom_report_type_column', 10, 2);

