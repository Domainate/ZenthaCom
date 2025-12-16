<?php

function hd_create_report()
{
    if (!is_user_logged_in()) {
        $redirect_url = wp_get_referer() ?: home_url();
        wp_redirect(add_query_arg('error', urlencode('You must be logged in to create a report.'), $redirect_url));
        exit;
    }

    if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'hd_create_report_nonce')) {
        $redirect_url = wp_get_referer() ?: home_url();
        wp_redirect(add_query_arg('error', urlencode('Security check failed.'), $redirect_url));
        exit;
    }

    // Check credits immediately
    $credits = hd_get_user_credits();
    if ($credits < 1) {
        $redirect_url = home_url('/members/reportapp/add-credits/');
        wp_redirect(add_query_arg('error', urlencode('You do not have enough credits.'), $redirect_url));
        exit;
    }

    if (empty($_POST['profile_id']) || empty($_POST['report_type'])) {
        $redirect_url = wp_get_referer() ?: home_url();
        wp_redirect(add_query_arg('error', urlencode('Invalid request. Missing required fields.'), $redirect_url));
        exit;
    }

    $profile_id = intval($_POST['profile_id']);
    $report_type = sanitize_text_field($_POST['report_type']);

    // Check if report already exists for this profile and type
    $existing_reports = get_posts(array(
        'post_type' => 'hd_report',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_hd_profile_id',
                'value' => $profile_id
            ),
            array(
                'key' => '_hd_report_type',
                'value' => $report_type
            )
        )
    ));

    if (!empty($existing_reports)) {
        $label = ucwords(str_replace('_', ' ', $report_type));
        $redirect_url = wp_get_referer() ?: home_url();
        wp_redirect(add_query_arg('error', urlencode("A {$label} report already exists for this profile. Please delete the existing report before creating a new one."), $redirect_url));
        exit;
    }

    // Retrieve the stored chart data for that profile
    $chart_data = get_post_meta($profile_id, '_hd_chart_data', true);
    if (empty($chart_data)) {
        $redirect_url = wp_get_referer() ?: home_url();
        wp_redirect(add_query_arg('error', urlencode('No chart data found for this profile.'), $redirect_url));
        exit;
    }

    // Build the prompt as you normally would:
    $report = ZenthaReports::reportByType($report_type);
    $report_prompt = $report->_prompt ?? '';

    $profile_title = get_the_title($profile_id);
    $first_name = current(explode(' ', $profile_title));
    $location_value = get_post_meta($profile_id, '_hd_location', true);
    $birth_datetime = get_post_meta($profile_id, '_hd_dob', true);
    if (!$location_value) {
        $location_value = 'Not Specified';
    }

    $prompt = <<<EOD
Human Design {$report_type} Report for {$profile_title}
Full Name: {$profile_title}  
Person first name : {$first_name}
Date and Time of Birth: {$birth_datetime}  
Location of Birth: {$location_value}
EOD;

    hd_decrement_user_credits(1);

    $profile_title = get_the_title($profile_id);
    $friendly_title = !empty($profile_title)
        ? "{$report_type} for {$profile_title}"
        : $report_type;

    $report_post_id = wp_insert_post(array(
        'post_type' => 'hd_report',
        'post_status' => 'draft',
        'post_author' => get_current_user_id(),
        'post_title' => $friendly_title,
        'post_content' => '',
    ));

    if (!$report_post_id || is_wp_error($report_post_id)) {
        $redirect_url = wp_get_referer() ?: home_url();
        wp_redirect(add_query_arg('error', urlencode('Error: could not create the hd_report post.'), $redirect_url));
        exit;
    }

    update_post_meta($report_post_id, '_hd_profile_id', $profile_id);
    update_post_meta($report_post_id, '_hd_report_type', $report_type);
    update_post_meta($report_post_id, '_hd_chart_data', $chart_data);
    update_post_meta($report_post_id, '_hd_prompt', $prompt);
    update_post_meta($report_post_id, '_hd_report_prompt', $report_prompt);
    update_post_meta($report_post_id, '_hd_report_status', 'pending');

    wp_schedule_single_event(
        current_time('timestamp') + 10,
        'hd_generate_report_event',
        array($report_post_id)
    );

    $redirect_url = home_url('/members/reportapp/my-reports/');
    wp_redirect(add_query_arg('success', urlencode('Report generation has been successfully queued.'), $redirect_url));
    exit;
}

add_action('admin_post_hd_create_report', 'hd_create_report');
