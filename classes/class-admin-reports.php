<?php

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class HD_Profiles_List_Table extends WP_List_Table
{
    public function __construct()
    {
        parent::__construct([
            'singular' => 'profile',
            'plural' => 'profiles',
            'ajax' => false,
        ]);

        $this->_column_headers = [$this->get_columns(), [], [], 'title'];
    }

    public function get_sortable_columns()
    {
        return []; // Add sortable columns here if needed
    }
    public function get_columns()
    {
        return [
            'title' => 'Profile Name',
            'user' => 'User',
            'dob' => 'Birth Date',
            'location' => 'Location',
            'timezone' => 'Timezone',
            'actions' => 'Actions',
        ];
    }


    public function column_title($item)
    {
        return esc_html($item->post_title);
    }
    public function column_timezone($item)
    {
        return esc_html(get_post_meta($item->ID, '_hd_timezone', true));
    }

    public function column_user($item)
    {
        $user = get_userdata($item->post_author);
        return $user ? esc_html($user->display_name) : 'Unknown';
    }

    public function column_dob($item)
    {
        return esc_html(get_post_meta($item->ID, '_hd_dob', true));
    }

    public function column_location($item)
    {
        return esc_html(get_post_meta($item->ID, '_hd_location', true));
    }

    public function column_actions($item)
    {
        $profile_id = $item->ID;
        ob_start();
        ?>
        <button class="button edit-profile-btn" data-id="<?php echo esc_attr($profile_id); ?>"
            data-title="<?php echo esc_attr($item->post_title); ?>"
            data-dob="<?php echo esc_attr(get_post_meta($profile_id, '_hd_dob', true)); ?>"
            data-location="<?php echo esc_attr(get_post_meta($profile_id, '_hd_location', true)); ?>"
            data-timezone="<?php echo esc_attr(get_post_meta($profile_id, '_hd_timezone', true)); ?>">
            Edit
        </button>
        <button class="button regenerate-profile-btn" data-id="<?php echo esc_attr($profile_id); ?>">
            Regenerate
        </button>
        <a target="_blank" href="<?php echo site_url('/wp-admin-hd-profile-chart/?hd_profile_id=' . $profile_id); ?>"
            class="button" data-id="<?php echo esc_attr($profile_id); ?>">
            View
        </a>
        <?php
        return ob_get_clean();
    }

    public function column_default($item, $column_name)
    {
        return isset($item->$column_name) ? esc_html($item->$column_name) : '';
    }

    public function no_items()
    {
        _e('No profiles found.');
    }


    public function prepare_items()
    {
        $per_page = 20;
        $paged = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;

        // Filtering by user
        $author = isset($_GET['profile_user']) ? intval($_GET['profile_user']) : 0;
        $args = [
            'post_type' => 'hd_profile',
            'posts_per_page' => $per_page,
            'paged' => $paged,
            'post_status' => 'any',
        ];
        if ($author) {
            $args['author'] = $author;
        }

        $query = new WP_Query($args);
        $this->items = $query->posts;

        $this->set_pagination_args([
            'total_items' => $query->found_posts,
            'per_page' => $per_page,
            'total_pages' => $query->max_num_pages,
        ]);
    }
}