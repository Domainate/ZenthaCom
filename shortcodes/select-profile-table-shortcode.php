<?php

/**
 * Shortcode to display a table of stored profiles with a select button.
 */

function select_profile_table_shortcode()
{
    if (!is_user_logged_in()) {
        return '<p>Please log in to view your profiles.</p>';
    }

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = [
        'post_type' => 'hd_profile',
        'author' => get_current_user_id(),
        'posts_per_page' => 50,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    $profiles_query = new WP_Query($args);

    ob_start();
    ?>
    <style>
        .profile-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0.2em;
        }

        .profile-table th,
        .profile-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .profile-table th {
            background-color: #f2f2f2;
        }

        .profile-table .action-cell {
            text-align: center;
        }

        .create-button,
        .profile-table .select-button {
            background-color: #b99731;
            color: white !important;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }


        .create-button:hover,
        .profile-table .select-button:hover {

            background-color: #756023;
        }

        .pagination-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination-links .page-numbers {
            padding: 5px 10px;
            border: 1px solid #ddd;
            text-decoration: none;
            margin: 0 2px;
        }

        .pagination-links .page-numbers.current {
            background-color: #0073aa;
            color: white;
        }
    </style>

    <div class="flex flex-row justify-end items-center gap-4" style="margin-bottom: 1rem;">
        <div>
            <a class="create-button" href="/members/reportapp/create-profile/">Create New Profile</a>
        </div>
    </div>
    <?php if (!$profiles_query->have_posts()): ?>
        <p>No profiles found. <a href="/members/reportapp/create-profile/">Create one now</a>.</p>
    <?php else: ?>
        <table class="profile-table">
            <thead>
                <tr>
                    <th>Profile Name</th>
                    <th class="action-cell">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($profiles_query->have_posts()):
                    $profiles_query->the_post(); ?>
                    <tr>
                        <td><?php echo esc_html(get_the_title()); ?></td>
                        <td class="action-cell">
                            <a href="<?php echo esc_url(home_url('/members/reportapp/view-profile/?hd_profile_id=' . get_the_ID())); ?>"
                                class="select-button">Select</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <?php
        $total_pages = $profiles_query->max_num_pages;

        if ($total_pages > 1) {
            $big = 999999999; // need an unlikely integer
            echo '<div class="pagination-links">';
            echo paginate_links([
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, $paged),
                'total' => $total_pages,
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
            ]);
            echo '</div>';
        }

        wp_reset_postdata(); // Restore original Post Data
        ?>
    <?php endif; ?>
    <?php
    return ob_get_clean();
}

add_shortcode('select_profile_table', 'select_profile_table_shortcode');