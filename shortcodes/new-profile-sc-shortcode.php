<?php

    /**
     * Shortcode to display a dropdown of stored profiles (with dynamic chart loading)
     * and a Generate Report button.
     */
    function new_hd_profile_report_shortcode()
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
            return '<h2 style="text-align:center; margin:0.5em 0;font-size:1.6em;">No Profiles Found
        <a href="https://zentha.com/members/reportapp/create-profile/">Create Your First Profile</a></h2>';
        }

        ob_start();
    ?>
    <div class="table-view-screen" style="display: flex; flex-direction: column;width: 100%; ">
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php foreach ($profiles as $profile): ?>
            <tr>
                <td>
                    <?php echo esc_html($profile->post_title); ?>
                </td>
                <td><?php echo esc_html(get_post_meta($profile->ID, '_hd_dob', true)); ?></td>
                <td><?php echo esc_html(get_post_meta($profile->ID, '_hd_location', true)); ?></td>
                <td >
                    <div style="display: flex; flex-direction: row; gap: 0.5em; justify-content: center; align-items: center;">
                        <a class="view-profile-btnn" href="<?php echo esc_url('https://zentha.com/members/reportapp/view-profile/?hd_profile_id=' . $profile->ID . '#' . base64_encode(json_encode(['Properties' => ['BirthDateLocal' => $profile->birth_date, 'GeneratedAt' => time()]]))); ?>">
                            <button>
                                View
                            </button>
                        </a>
                        <button class="delete-profile-btnn"  data-profile="<?php echo $profile->ID; ?>">Delete </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="grid-view-screen" style="border:1px solid gray; flex-direction: column;width: 100%; ">
    <?php foreach ($profiles as $profile): ?>
        <div style="display: flex; flex-direction: row; width: 100%; gap: 1rem; border-bottom: 1px solid #d3d3d3; align-items: flex-start; justify-content: space-between;">
            <div style="display: flex; flex-direction: column; flex: 1;padding: 0.4em;">
                <h3 style="font-size: 0.975rem; font-weight: 600;"><?php echo esc_html($profile->post_title); ?></h3>
                <h3 style="font-size: 0.775rem; font-weight: 500;"><?php echo esc_html(get_post_meta($profile->ID, '_hd_dob', true)); ?></h3>
                <p style="font-size: 0.775rem; font-weight: 400;"><?php echo esc_html(get_post_meta($profile->ID, '_hd_location', true)); ?></p>
            </div>
            <div style="width: fit-content; display: flex; flex-direction: column; gap: 0.5em;justify-content: center; align-items: center; padding: 0.4em;">
                <a style="width: 100%;" class="view-profile-btnn" href="<?php echo esc_url('https://zentha.com/members/reportapp/view-profile/?hd_profile_id=' . $profile->ID . '#' . base64_encode(json_encode(['Properties' => ['BirthDateLocal' => $profile->birth_date, 'GeneratedAt' => time()]]))); ?>">
                    <button style="width: 100%;">
                        View
                    </button>
                </a>
                <button style="width: 100%;" class="delete-profile-btnn"  data-profile="<?php echo $profile->ID; ?>">Delete </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

     <style>
        .table-view-screen {
            display: flex;
        }
        .grid-view-screen {
            display: none;
        }

        @media (max-width: 500px) {
            .table-view-screen {
                display: none !important;
            }
            .grid-view-screen {
                display: flex !important;
            }
        }
    </style>
    <!-- Lightbox Popup (Hidden by Default) -->
    <div id="profile-lightbox" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); z-index: 9999;">
        <div style="background: #fff; max-width: 800px; height: 90%; margin: 3% auto; padding: 20px; border-radius: 8px; text-align: center; overflow-y: auto;">
            <span id="close-lightbox" style="cursor: pointer; float: right; font-size: 1.5em;">&times;</span>
            <div id="hd-chart-content">
                <p>Chart will load here...</p>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $('.delete-profile-btnn').on('click', function() {
                let profileId = $(this).data('profile');
                $.confirm({
                    title: 'Confirmation Required',
                    content: 'Are you sure you want to delete this profile and all of its reports?',
                    buttons: {
                        proceed: {
                            text: 'Proceed',
                            action : function () {
                                $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                                    action: 'delete_hd_profile',
                                    profile_id: profileId,
                                    security: '<?php echo wp_create_nonce('delete_profile_nonce'); ?>'
                                }, function(response) {
                                    // window.location.reload();
                                    console.log(response)
                                });
                            }
                        },
                        cancel: function () { }
                    }
                });
            });
            $('.view-profile-btn').on('click', function() {
                let profileId = $(this).data('profile');
                $('#hd-chart-content').html('<p>Loading chart...</p>');

                $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                    action: 'load_zenta_chart',
                    profile_id: profileId
                }, function(response) {
                    $('#hd-chart-content').html(response);
                });

                $('#profile-lightbox').fadeIn();
            });

            $('#close-lightbox').on('click', function() {
                $('#profile-lightbox').fadeOut();
            });

            $('#profile-lightbox').on('click', function(e) {
                if ($(e.target).is('#profile-lightbox')) {
                    $('#profile-lightbox').fadeOut();
                }
            });
        });
    </script>

<?php
    return ob_get_clean();
    }
    add_shortcode('hd_profile_report', 'new_hd_profile_report_shortcode');

    // Handle chart loading via AJAX
    add_action('wp_ajax_load_zenta_chart', 'load_zenta_chart');
    add_action('wp_ajax_nopriv_load_zenta_chart', 'load_zenta_chart');

    function load_zenta_chart()
    {
        $profile_id = intval($_POST['profile_id']);
        if ($profile_id) {
            $shortcode_output = do_shortcode('[zenta_result id="' . $profile_id . '"]');
            echo ! empty(trim($shortcode_output)) ? $shortcode_output : '<p>No chart data available.</p>';
        } else {
            echo '<p>Invalid profile ID.</p>';
        }
        wp_die();
}
?>