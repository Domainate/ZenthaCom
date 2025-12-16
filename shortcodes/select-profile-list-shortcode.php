<?php

/**
 * Shortcode to display a table of stored profiles with a select button.
 */

function select_profile_list_shortcode()
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
    $selected_profile = isset($_GET['hd_profile_id']) ? intval($_GET['hd_profile_id']) : '';
    ob_start();
    ?>
    <style>
        .my-profiles-widget,
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
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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
            box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
        }
    </style>
    <?php

    echo '<div class="my-profiles-widget-wrapper">';
    if ($profiles_query->have_posts()) {
        ?>
        <div class="my-profiles-widget">
            <form class="my-profiles-form" action="<?php echo esc_url(home_url('/members/reportapp/view-profile/')); ?>"
                method="get">
                <label for="my-profiles-select" class="screen-reader-text">Select a Profile</label>
                <select id="my-profiles-select" name="hd_profile_id" class="my-profiles-select-styled">
                    <option value="">Select a Profile...</option>
                    <option value="create_new">--- <b>Create New Profile</b> ---</option>
                    <?php
                    while ($profiles_query->have_posts()) {
                        $profiles_query->the_post();
                        echo '<option value="' . esc_attr(get_the_ID()) . '"' . selected($selected_profile, get_the_ID(), false) . '>' . esc_html(get_the_title()) . '</option>';
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
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const select = document.getElementById('my-profiles-select');
            if (select) {
                select.addEventListener('change', function () {
                    if (this.value === 'create_new') {
                        window.location.href = '<?php echo esc_url(home_url('/members/reportapp/create-profile/')); ?>';
                    } else if (this.value) {
                        this.form.submit();
                    }
                });
            }
        });
    </script>

    <?php
    return ob_get_clean();
}

add_shortcode('select_profile_list', 'select_profile_list_shortcode');
