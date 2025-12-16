<?php

/**
 * Retrieve data from the BodyGraphChart API.
 */
function get_data_from_db()
{
    $name = sanitize_text_field($_POST['name'] ?? '');
    $location = sanitize_text_field($_POST['location'] ?? '');
    $dob = sanitize_text_field($_POST['dob'] ?? '');

    $api_key = '8130ba42-f2a8-42ec-80c2-5af0d738af62'; // Replace with your actual API key

    $api_url = add_query_arg([
        'api_key' => $api_key,
        'date' => $dob,
        'timezone' => $location,
    ], 'https://api.bodygraphchart.com/v221006/hd-data');

    $response = wp_remote_get($api_url);
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    $encoded = base64_encode(json_encode($data));
    return esc_js($encoded);
}

/**
 * Save form data and API response into the custom post type "hd_profile".
 * After a successful save, redirect to the View Profile page with the new profile pre‑selected.
 */
function save_custom_data_to_db()
{
    if (!is_user_logged_in()) {
        wp_redirect(wp_login_url());
        exit;
    }

    if (!isset($_POST['custom_form_nonce']) || !wp_verify_nonce($_POST['custom_form_nonce'], 'custom_form_submit_action')) {
        wp_die('Security check failed');
    }

    $name = sanitize_text_field($_POST['name'] ?? '');
    $location = sanitize_text_field($_POST['location'] ?? '');
    $timezone_post = sanitize_text_field($_POST['timezone'] ?? ''); // Get the timezone from its own field.
    $dob_input = sanitize_text_field($_POST['dob'] ?? '');

    if (empty($timezone_post)) {
        $error_message = 'Invalid place of birth location. Search and select a valid location.';
        if (defined('DOING_AJAX') && DOING_AJAX) {
            wp_send_json_error(['message' => $error_message]);
        } else {
            wp_die($error_message);
        }
    }
    // Convert input like "2011-10-01 11:25AM" to "2011-10-01 11:25" using DateTime.
    $date_obj = DateTime::createFromFormat('Y-m-d h:ia', $dob_input);
    if (!$date_obj) {
        // Try with a space before AM/PM, e.g., "2011-10-01 11:25 AM"
        $date_obj = DateTime::createFromFormat('Y-m-d h:i A', $dob_input);
    }
    if (!$date_obj) {
        $error_message = 'Invalid date format. Please use the format "YYYY-MM-DD hh:miAM" (e.g. "2011-10-01 11:25AM").';
        if (defined('DOING_AJAX') && DOING_AJAX) {
            wp_send_json_error(['message' => $error_message]);
        } else {
            wp_die($error_message);
        }
    }
    $dob_formatted = $date_obj->format('Y-m-d H:i'); // e.g. "2019-05-05 10:10"

    $api_key = '8130ba42-f2a8-42ec-80c2-5af0d738af62'; // Your API key

    // Build the API URL manually with urlencode() using the timezone field.
    $api_url = "https://api.bodygraphchart.com/v221006/hd-data?"
        . "api_key=" . urlencode($api_key)
        . "&date=" . urlencode($dob_formatted)
        . "&timezone=" . urlencode($timezone_post);

    error_log("API URL: " . $api_url);
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

add_action('wp_ajax_save_custom_data', 'save_custom_data_to_db');