<?php
    function new_hd_profile_list_shortcode()
    {
        if (! is_user_logged_in()) {
            return '<p>Please log in to view your profiles.</p>';
        }

        $profiles = get_posts([
            'post_type'      => 'hd_profile',
            'author'         => get_current_user_id(),
            'posts_per_page' => -1,
        ]);

        if (empty($profiles)) {
            return '<p>No profiles found.</p>';
        }

        ob_start();
    ?>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php foreach ($profiles as $profile):
                    $chart_data         = get_post_meta($profile->ID, '_hd_chart_data', true);
                $encoded_chart_data = $chart_data ? base64_encode(json_encode($chart_data)) : ''; ?>
									            <tr>
									                <td>
									                    <a href="<?php echo esc_url(add_query_arg('hd_profile_id', $profile->ID, get_permalink())); ?>">
									                        <?php echo esc_html($profile->post_title); ?>
									                    </a>
									                </td>
									                <td><?php echo esc_html(get_post_meta($profile->ID, '_hd_dob', true)); ?></td>
									                <td><?php echo esc_html(get_post_meta($profile->ID, '_hd_location', true)); ?></td>
									                <td>
									                    <button class="view-profile-btn" data-profile="<?php echo esc_attr($profile->ID); ?>" data-chart="<?php echo esc_attr($encoded_chart_data); ?>">
									                        View Chart
									                    </button>
									                </td>
									            </tr>
									        <?php endforeach; ?>
    </table>

    <!-- Lightbox Popup -->
    <div id="profile-lightbox" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); z-index: 9999;">
        <div style="background: #fff; max-width: 800px; height: 90%; margin: 3% auto; padding: 20px; border-radius: 8px; text-align: center; overflow-y: auto;">
            <span id="close-lightbox" style="cursor: pointer; float: right; font-size: 1.5em;">&times;</span>
            <?php echo do_shortcode('[zentha_result]'); ?>
            <div id="hd-chart-data" style="margin-top: 20px;">
                <!-- <canvas id="chartCanvas"></canvas> -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.view-profile-btn');
            const lightbox = document.getElementById('profile-lightbox');
            const closeBtn = document.getElementById('close-lightbox');
            let chartInstance = null; // Store the active chart instance

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    let chartData = this.getAttribute('data-chart');

                    // Reset previous chart
                    if (chartInstance) {
                        chartInstance.destroy();
                    }
                    // document.getElementById('hd-chart-data').innerHTML = '<canvas id="chartCanvas"></canvas>';

                    // if (chartData) {
                    //     try {
                    //         let decodedData = JSON.parse(atob(chartData)); // Decode base64 JSON
                    //         chartInstance = renderChart(decodedData);
                    //     } catch (error) {
                    //         console.error('Error decoding chart data:', error);
                    //     }
                    // }

                    lightbox.style.display = 'block';
                });
            });

            closeBtn.addEventListener('click', function () {
                lightbox.style.display = 'none';
                if (chartInstance) {
                    chartInstance.destroy(); // Destroy chart on close
                    chartInstance = null;
                }
            });
        });

        function renderChart(chartData) {
            let ctx = document.getElementById('chartCanvas').getContext('2d');
            return new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Profile Chart'
                    }
                }
            });
        }
    </script>

    <ul>
        <?php foreach ($profiles as $profile): ?>
            <li>
                <a href="<?php echo esc_url(add_query_arg('hd_profile_id', $profile->ID, get_permalink())); ?>">
                    <?php echo esc_html($profile->post_title); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php
        return ob_get_clean();
        }
        add_shortcode('new_user_profiles', 'new_hd_profile_list_shortcode');

        function delete_hd_profile_and_reports()
        {
            // Verify ajax request
            if (! wp_doing_ajax()) {
                return;
            }

            // Verify nonce
            check_ajax_referer('delete_profile_nonce', 'security');

            // Check if user is logged in
            if (! is_user_logged_in()) {
                wp_send_json_error('User not logged in');
            }

            // Get profile ID
            $profile_id = isset($_POST['profile_id']) ? intval($_POST['profile_id']) : 0;
            if (! $profile_id) {
                wp_send_json_error('Invalid profile ID');
            }

            // Verify post exists and user owns it
            $profile = get_post($profile_id);
            if (! $profile || $profile->post_type !== 'hd_profile' || $profile->post_author != get_current_user_id()) {
                wp_send_json_error('Profile not found or unauthorized');
            }

            try {
                // Start transaction
                global $wpdb;
                $wpdb->query('START TRANSACTION');

                // Delete the profile
                $deleted = wp_delete_post($profile_id, true);
                if (! $deleted) {
                    throw new Exception('Failed to delete profile');
                }

                // Delete post meta
                delete_post_meta($profile_id, '_hd_chart_data');
                delete_post_meta($profile_id, '_hd_dob');
                delete_post_meta($profile_id, '_hd_location');
                delete_post_meta($profile_id, '_hd_timezone');

                // Get and delete associated reports
                $reports = get_posts([
                    'post_type'      => 'hd_report',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'meta_key'       => '_hd_profile_id',
                    'meta_value'     => $profile_id,
                ]);

                foreach ($reports as $report) {
                    $report_deleted = wp_delete_post($report->ID, true);
                    if (! $report_deleted) {
                        throw new Exception('Failed to delete associated report');
                    }
                }

                // If we got here, commit the transaction
                $wpdb->query('COMMIT');
                wp_send_json_success('Profile and associated reports deleted successfully');

            } catch (Exception $e) {
                // Something went wrong, rollback the transaction
                $wpdb->query('ROLLBACK');
                wp_send_json_error($e->getMessage());
            }
        }
    add_action('wp_ajax_delete_hd_profile', 'delete_hd_profile_and_reports');
