<?php


function delete_hd_profile_and_reports()
{
    // Verify ajax request
    if (!wp_doing_ajax()) {
        return;
    }

    // Verify nonce
    check_ajax_referer('delete_profile_nonce', 'security');

    // Check if user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error('User not logged in');
    }

    // Get profile ID
    $profile_id = isset($_POST['profile_id']) ? intval($_POST['profile_id']) : 0;
    if (!$profile_id) {
        wp_send_json_error('Invalid profile ID');
    }

    // Verify post exists and user owns it
    $profile = get_post($profile_id);
    if (!$profile || $profile->post_type !== 'hd_profile' || $profile->post_author != get_current_user_id()) {
        wp_send_json_error('Profile not found or unauthorized');
    }

    $profile = new ZenthaProfile($profile_id);
    $deleteAction = $profile->deleteProfile();

    if ($deleteAction['is_error'])
        wp_send_json_error($deleteAction['message']);
    else
        wp_send_json_success($deleteAction['message']);

}
add_action('wp_ajax_delete_hd_profile', 'delete_hd_profile_and_reports');


/**
 * Save form data and API response into the custom post type "hd_profile".
 * After a successful save, redirect to the View Profile page with the new profile pre‑selected.
 */
function create_hd_profile()
{
    if (!is_user_logged_in()) {
        wp_redirect(wp_login_url());
        exit;
    }

    // Nonce check matches form field name and action
    if (!isset($_POST['create_hd_profile_nonce']) || !wp_verify_nonce($_POST['create_hd_profile_nonce'], 'create_hd_profile')) {
        wp_die('Security check failed');
    }

    $name = sanitize_text_field($_POST['name'] ?? '');
    $location = sanitize_text_field($_POST['location'] ?? '');
    $timezone_post = sanitize_text_field($_POST['timezone'] ?? '');
    $dob_date = sanitize_text_field($_POST['dob_date'] ?? '');
    $dob_time = sanitize_text_field($_POST['dob_time'] ?? '');

    if (empty($timezone_post)) {
        $error_message = 'Invalid place of birth location. Search and select a valid location.';
        if (defined('DOING_AJAX') && DOING_AJAX) {
            wp_send_json_error(['message' => $error_message]);
        } else {
            wp_die($error_message);
        }
    }

    // Combine date and time for API and storage
    $dob_input = $dob_date . ' ' . $dob_time;
    // Accepts "YYYY-MM-DD HH:MM" or "YYYY-MM-DD HH:MM:SS"
    $date_obj = DateTime::createFromFormat('Y-m-d H:i', $dob_input);
    if (!$date_obj) {
        $date_obj = DateTime::createFromFormat('Y-m-d H:i:s', $dob_input);
    }
    if (!$date_obj) {
        $error_message = 'Invalid date or time format. Please use the format "YYYY-MM-DD HH:MM".';
        if (defined('DOING_AJAX') && DOING_AJAX) {
            wp_send_json_error(['message' => $error_message]);
        } else {
            wp_die($error_message);
        }
    }
    $dob_formatted = $date_obj->format('Y-m-d H:i');

    $api_key = '8130ba42-f2a8-42ec-80c2-5af0d738af62';
    $api_url = "https://api.bodygraphchart.com/v221006/hd-data?"
        . "api_key=" . urlencode($api_key)
        . "&date=" . urlencode($dob_formatted)
        . "&timezone=" . urlencode($timezone_post);

    // error_log("API URL: " . $api_url);
    $response = wp_remote_get($api_url);
    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'API request failed: ' . $response->get_error_message()]);
    }

    $body = wp_remote_retrieve_body($response);
    $chart_data = json_decode($body, true);

    if (empty($chart_data)) {
        $error_message = 'Invalid chart data received from the API. Response: ' . $body;
        wp_send_json_error(['message' => $error_message]);
    }

    $profile_id = wp_insert_post([
        'post_title' => $name,
        'post_status' => 'publish',
        'post_type' => 'hd_profile',
        'post_author' => get_current_user_id(),
    ]);

    if (!$profile_id || is_wp_error($profile_id)) {
        wp_send_json_error(['message' => 'Failed to save profile.']);
    }

    update_post_meta($profile_id, '_hd_timezone', $timezone_post ?? 'UTC');
    update_post_meta($profile_id, '_hd_location', $location);
    update_post_meta($profile_id, '_hd_dob', $dob_formatted);
    update_post_meta($profile_id, '_hd_chart_data', $chart_data);

    $redirect_url = add_query_arg('hd_profile_id', $profile_id, home_url('/members/reportapp/view-profile/'));

    wp_send_json_success([
        'message' => 'Profile created successfully.',
        'redirect_url' => $redirect_url,
    ]);
}

add_action('wp_ajax_create_hd_profile', 'create_hd_profile');