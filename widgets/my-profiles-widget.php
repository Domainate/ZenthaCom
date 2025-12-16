<?php
/**
 * A Gutenberg block that displays a dropdown of the user's profiles.
 */

if (!function_exists('render_my_profiles_dropdown_block')) {
    function render_my_profiles_dropdown_block($attributes, $content)
    {
        if (!is_user_logged_in()) {
            return '<p>Please log in to view your profiles.</p>';
        }

        $query_args = [
            'post_type' => 'hd_profile',
            'author' => get_current_user_id(),
            'posts_per_page' => -1, // Get all profiles
            'orderby' => 'title',
            'order' => 'ASC',
        ];

        $profiles_query = new WP_Query($query_args);

        ob_start();

        ?>
        <style>
            .my-profiles-select-styled {
                display: block;
                width: 100%;
                margin: 1em auto;
                max-width: 720px;
                padding: .5rem .75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
                background-repeat: no-repeat;
                background-position: right .75rem center;
                background-size: 16px 12px;
            }
            .my-profiles-select-styled:focus {
                border-color: #86b7fe;
                outline: 0;
                box-shadow: 0 0 0 .25rem rgba(13,110,253,.25);
            }
        </style>
        <?php

        $width = isset($attributes['width']) ? $attributes['width'] : '100%';
        $sanitized_width = esc_attr($width);

        echo '<div class="my-profiles-widget-wrapper" style="width: ' . $sanitized_width . ';">';

        if ($profiles_query->have_posts()) {
            ?>
            <div class="my-profiles-widget">
                <form class="my-profiles-form" action="<?php echo esc_url(home_url('/members/reportapp/view-profile/')); ?>" method="get">
                    <label for="my-profiles-select" class="screen-reader-text">Select a Profile</label>
                    <select id="my-profiles-select" name="hd_profile_id" class="my-profiles-select-styled" onchange="if(this.value) this.form.submit()">
                        <option value="">Select a Profile...</option>
                        <?php
                        while ($profiles_query->have_posts()) {
                            $profiles_query->the_post();
                            echo '<option value="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</option>';
                        }
                        ?>
                    </select>
                    <noscript><input type="submit" value="Select"></noscript>
                </form>
            </div>
            <?php
        } else {
            ?>
            <div class="my-profiles-widget">
                <p>No profiles found. <a href="/members/reportapp/create-profile/">Create one now</a>.</p>
            </div>
            <?php
        }

        echo '</div>';

        wp_reset_postdata();

        return ob_get_clean();
    }
}

if (!function_exists('register_my_profiles_dropdown_block')) {
    function register_my_profiles_dropdown_block()
    {
        // Register the script for the editor.
        wp_register_script(
            'my-profiles-widget-editor-script-v2', // Changed script name
            get_stylesheet_directory_uri() . '/widgets/my-profiles-widget.js',
            array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-block-editor', 'wp-components'),
            filemtime(get_stylesheet_directory() . '/widgets/my-profiles-widget.js')
        );

        register_block_type('hello-blocks-child/my-profiles-dropdown', array(
            'api_version' => 2,
            'editor_script' => 'my-profiles-widget-editor-script-v2',
            'render_callback' => 'render_my_profiles_dropdown_block',
            'attributes' => array(
                'width' => array(
                    'type' => 'string',
                    'default' => '100%',
                ),
            )
        ));
    }
}

add_action('init', 'register_my_profiles_dropdown_block');