<?php

add_action('admin_menu', 'hd_reports_add_custom_submenu');
add_action('admin_enqueue_scripts', function () {
    $screen = get_current_screen();
    if ($screen && $screen->id === 'hd_report_page_hd-reports-profiles') {
        wp_enqueue_style('list-tables');
    }
});

function hd_reports_add_custom_submenu()
{
    add_submenu_page(
        'edit.php?post_type=hd_report',  // Parent slug (CPT menu)
        'HD Reports Profiles',            // Page title
        'All Profiles',                       // Menu title (what appears in sidebar)
        'manage_options',                 // Capability
        'hd-reports-profiles',            // Menu slug (unique ID)
        'hd_admin_reports_profiles_callback'    // Function to render the page
    );
}

function hd_admin_reports_profiles_callback()
{
    echo '<div class="wrap">';
    echo '<h1>HD Reports Profiles</h1>';

    // User filter dropdown
    echo '<form method="get">';
    echo '<input type="hidden" name="page" value="hd-reports-profiles" />';
    echo '<input type="hidden" name="post_type" value="hd_report" />';
    echo '<label for="profile_user">Filter by User: </label>';
    echo '<select name="profile_user" id="profile_user" onchange="this.form.submit()">';
    echo '<option value="">All Users</option>';
    $users = get_users(['fields' => ['ID', 'display_name']]);
    foreach ($users as $user) {
        $selected = (isset($_GET['profile_user']) && $_GET['profile_user'] == $user->ID) ? 'selected' : '';
        echo '<option value="' . esc_attr($user->ID) . '" ' . $selected . '>' . esc_html($user->display_name) . '</option>';
    }
    echo '</select>';
    echo '</form>';


    // Render the table
    $table = new HD_Profiles_List_Table();
    $table->prepare_items();
    $table->display();

    echo '</div>';
}

add_action('admin_footer', function () {
    ?>
    <!-- Edit Modal -->
    <div id="editProfileModal"
        style="display:none;position:fixed;top:10%;left:50%;transform:translateX(-50%);background:#fff;padding:20px;z-index:9999;border:1px solid #ccc;">
        <h2>Edit Profile</h2>
        <form id="editProfileForm">
            <input type="hidden" name="profile_id" id="edit_profile_id">
            <label>Profile Name: <input type="text" name="title" id="edit_title"></label>
            <label>Date Of Birth: <input placeholder="e.g 2025-12-31 13:00" type="text" name="dob" id="edit_dob"></label>
            <label>Place Of Birth: <input type="text" name="location" id="edit_location"></label>
            <label>Timezone: <input placeholder="e.g Asia/Manila" type="text" name="timezone" id="edit_timezone"></label>
            <button type="submit" class="button button-primary">Save</button>
            <button type="button" id="closeEditModal" class="button">Cancel</button>
        </form>
    </div>
    <style>
        #editProfileModal {
            border-radius: 8px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
            min-width: 340px;
            max-width: 95vw;
        }

        #editProfileModal h2 {
            margin-top: 0;
            font-size: 1.4em;
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
            margin-bottom: 18px;
        }

        #editProfileForm label {
            display: block;
            margin-bottom: 14px;
            color: #222;
            font-weight: 500;
        }

        #editProfileForm input[type="text"] {
            width: 100%;
            padding: 7px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 4px;
            font-size: 1em;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }

        #editProfileForm input[type="text"]:focus {
            border-color: #2271b1;
            outline: none;
        }

        #editProfileForm .button {
            margin-right: 8px;
            min-width: 80px;
        }

        #editProfileForm .button-primary {
            background: #2271b1;
            border-color: #2271b1;
            color: #fff;
            font-weight: 600;
        }

        #editProfileForm .button-primary:hover {
            background: #135e96;
            border-color: #135e96;
        }
    </style>

    <script>
        jQuery(document).ready(function ($) {
            // Edit
            $('.edit-profile-btn').on('click', function () {
                $('#edit_profile_id').val($(this).data('id'));
                $('#edit_title').val($(this).data('title'));
                $('#edit_dob').val($(this).data('dob'));
                $('#edit_timezone').val($(this).data('timezone'));
                $('#edit_location').val($(this).data('location'));
                $('#editProfileModal').show();
            });
            $('#closeEditModal').on('click', function () { $('#editProfileModal').hide(); });
            $('#editProfileForm').on('submit', function (e) {
                e.preventDefault();
                var $form = $(this);
                var $submitBtn = $form.find('button[type="submit"]');
                $submitBtn.prop('disabled', true).text('Saving...');

                $.post(ajaxurl, {
                    action: 'hd_edit_profile',
                    profile_id: $('#edit_profile_id').val(),
                    title: $('#edit_title').val(),
                    dob: $('#edit_dob').val(),
                    timezone: $('#edit_timezone').val(),
                    location: $('#edit_location').val(),
                    _wpnonce: '<?php echo wp_create_nonce('hd_edit_profile_nonce'); ?>'
                }, function (resp) {
                    if (resp.success) {
                        location.reload();
                    } else {
                        alert(resp.data || 'Error updating profile');
                        $submitBtn.prop('disabled', false).text('Save');
                    }
                }).fail(function () {
                    alert('Error updating profile');
                    $submitBtn.prop('disabled', false).text('Save');
                });
            });

            // Regenerate
            $('.regenerate-profile-btn').on('click', function () {
                var $btn = $(this);
                if (confirm('Are you sure you want to regenerate? This will delete all reports for this profile.')) {
                    var profile_id = $btn.data('id');
                    $btn.prop('disabled', true).text('Regenerating...');
                    $.post(ajaxurl, {
                        action: 'hd_regenerate_profile',
                        profile_id: profile_id,
                        _wpnonce: '<?php echo wp_create_nonce('hd_regenerate_profile_nonce'); ?>'
                    }, function (resp) {
                        if (resp.success) {
                            location.reload();
                        } else {
                            alert((resp.data && resp.data.message) ? resp.data.message : (resp.data || 'Error regenerating profile'));
                            $btn.prop('disabled', false).text('Regenerate');
                        }
                    }).fail(function () {
                        alert('Error regenerating profile');
                        $btn.prop('disabled', false).text('Regenerate');
                    });
                }
            });

        });
    </script>
    <?php
});

// Edit handler
add_action('wp_ajax_hd_edit_profile', function () {
    check_ajax_referer('hd_edit_profile_nonce');
    $profile_id = intval($_POST['profile_id']);
    $title = sanitize_text_field($_POST['title']);
    $dob = sanitize_text_field($_POST['dob']);
    $timezone = sanitize_text_field($_POST['timezone']);
    $location = sanitize_text_field($_POST['location']);

    // Validation: All fields must not be empty
    if (!$profile_id || !$title || !$dob || !$timezone || !$location) {
        wp_send_json_error('All fields (Name, Date Of Birth, Timezone, Place Of Birth) are required.');
    }
    wp_update_post(['ID' => $profile_id, 'post_title' => $title]);
    update_post_meta($profile_id, '_hd_dob', $dob);
    update_post_meta($profile_id, '_hd_timezone', $timezone);
    update_post_meta($profile_id, '_hd_location', $location);
    wp_send_json_success();
});

// Regenerate handler
add_action('wp_ajax_hd_regenerate_profile', function () {
    check_ajax_referer('hd_regenerate_profile_nonce');
    $profile_id = intval($_POST['profile_id']);
    if (!$profile_id)
        wp_send_json_error('Invalid profile');

    // Get all reports for this profile and back them up
    $reports = get_posts([
        'post_type' => 'hd_report',
        'meta_key' => '_hd_profile_id',
        'meta_value' => $profile_id,
        'numberposts' => -1
    ]);
    $backup_reports = [];
    foreach ($reports as $r) {
        $backup_reports[] = [
            'post' => (array) $r,
            'meta' => get_post_meta($r->ID)
        ];
    }

    // Delete all hd_report for this profile
    foreach ($reports as $r)
        wp_delete_post($r->ID, true);

    $profile = get_post($profile_id);
    $dob = get_post_meta($profile_id, '_hd_dob', true);
    $location = get_post_meta($profile_id, '_hd_location', true);
    $timezone = get_post_meta($profile_id, '_hd_timezone', true);
    $old_chart_data = get_post_meta($profile_id, '_hd_chart_data', true);

    try {
        // Query the BodyGraphChart API
        $api_key = '8130ba42-f2a8-42ec-80c2-5af0d738af62';
        $api_url = "https://api.bodygraphchart.com/v221006/hd-data?"
            . "api_key=" . urlencode($api_key)
            . "&date=" . urlencode($dob)
            . "&timezone=" . urlencode($timezone);

        $response = wp_remote_get($api_url);
        if (is_wp_error($response)) {
            throw new Exception('API request failed: ' . $response->get_error_message());
        }
        $body = wp_remote_retrieve_body($response);
        $chart_data = json_decode($body, true);

        if (empty($chart_data)) {
            throw new Exception('Invalid chart data received from the API. Response: ' . $body);
        }

        // If the data is the same, update_post_meta returns false (not an error)
        if ($old_chart_data == $chart_data) {
            // Data is already up to date, treat as success
            wp_send_json_success();
        }

        // Save the chart data to the profile
        if (!update_post_meta($profile_id, '_hd_chart_data', $chart_data)) {
            throw new Exception('Failed to save chart data to the profile.');
        }

        wp_send_json_success();

    } catch (Exception $e) {
        // Rollback: re-insert deleted reports
        foreach ($backup_reports as $report) {
            // Remove fields that shouldn't be set directly
            unset($report['post']['ID']);
            $new_id = wp_insert_post($report['post']);
            if ($new_id && !is_wp_error($new_id)) {
                foreach ($report['meta'] as $meta_key => $meta_values) {
                    foreach ($meta_values as $meta_value) {
                        add_post_meta($new_id, $meta_key, maybe_unserialize($meta_value));
                    }
                }
            }
        }
        wp_send_json_error(['message' => $e->getMessage()]);
    }
});
