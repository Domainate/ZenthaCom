<?php
add_action('init', function () {
    if (!wp_next_scheduled('hd_check_stuck_pending_reports')) {
        wp_schedule_event(time(), 'five_minutes', 'hd_check_stuck_pending_reports');
    }
});

// Fallback cron: process stuck pending reports
add_action('hd_check_stuck_pending_reports', function () {
    $args = [
        'post_type' => 'hd_report',
        'post_status' => 'any',
        'meta_key' => '_hd_report_status',
        'meta_value' => 'pending',
        'date_query' => [
            [
                'column' => 'post_modified_gmt',
                'before' => gmdate('Y-m-d H:i:s', strtotime('-15 minutes')),
            ],
        ],
        'numberposts' => -1,
    ];

    $stuck_reports = get_posts($args);

    foreach ($stuck_reports as $report) {
        $report_id = $report->ID;
        $retry_count = (int) get_post_meta($report_id, '_hd_retry_count', true);

        if ($retry_count < 1) {
            // Retry once if not already retried
            error_log("Fallback cron: Retrying stuck report $report_id");
            update_post_meta($report_id, '_hd_retry_count', $retry_count + 1);
            update_post_meta($report_id, '_hd_report_status', 'pending'); // ensure it's still pending
            do_async_report_generation($report_id);
        } else {
            // Mark as error if already retried
            error_log("Fallback cron: Marking report $report_id as error after retry");
            update_post_meta($report_id, '_hd_report_status', 'error');
            update_post_meta($report_id, '_hd_report_error', 'Stuck in pending for over 15 minutes');
        }
    }
});

function hd_register_report_post_type()
{
    register_post_type('hd_report', [
        'labels' => [
            'name' => 'HD Reports',
            'singular_name' => 'HD Report',
        ],
        'public' => false, // Not publicly queryable; adjust as needed
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-media-text',
        'supports' => ['title', 'editor', 'author'],
        'capability_type' => 'post',
        'map_meta_cap' => true,
    ]);

}

add_action('init', 'hd_register_report_post_type');

add_action('init', function () {
    if (!wp_next_scheduled('hd_check_stuck_pending_reports')) {
        wp_schedule_event(time(), 'five_minutes', 'hd_check_stuck_pending_reports');
    }
});

// Register a custom interval for 5 minutes if not already present
add_filter('cron_schedules', function ($schedules) {
    if (!isset($schedules['five_minutes'])) {
        $schedules['five_minutes'] = [
            'interval' => 300, // 5 minutes
            'display' => __('Every 5 Minutes')
        ];
    }

    return $schedules;
});

// Fallback cron: process stuck pending reports
add_action('hd_check_stuck_pending_reports', function () {
    $args = [
        'post_type' => 'hd_report',
        'post_status' => 'any',
        'meta_key' => '_hd_report_status',
        'meta_value' => 'pending',
        'date_query' => [
            [
                'column' => 'post_modified_gmt',
                'before' => gmdate('Y-m-d H:i:s', strtotime('-15 minutes')),
            ],
        ],
        'numberposts' => -1,
    ];

    $stuck_reports = get_posts($args);

    foreach ($stuck_reports as $report) {
        $report_id = $report->ID;
        $retry_count = (int) get_post_meta($report_id, '_hd_retry_count', true);

        if ($retry_count < 1) {
            // Retry once if not already retried
            error_log("Fallback cron: Retrying stuck report $report_id");
            update_post_meta($report_id, '_hd_retry_count', $retry_count + 1);
            update_post_meta($report_id, '_hd_report_status', 'pending'); // ensure it's still pending
            do_async_report_generation($report_id);
        } else {
            // Mark as error if already retried
            error_log("Fallback cron: Marking report $report_id as error after retry");
            update_post_meta($report_id, '_hd_report_status', 'error');
            update_post_meta($report_id, '_hd_report_error', 'Stuck in pending for over 15 minutes');
        }
    }
});


/**Display report options (a placeholder link).*/
function do_async_report_generation($report_id)
{

    error_log("do_async_report_generation fired for $report_id");

    $retry_count = (int) get_post_meta($report_id, '_hd_retry_count', true);
    if ($retry_count >= 1) {
        error_log("Report $report_id already retried once. Aborting.");
        update_post_meta($report_id, '_hd_report_status', 'error');
        update_post_meta($report_id, '_hd_report_error', 'Retry limit reached');
        return;
    }

    $report_post = get_post($report_id);
    if (!$report_post || $report_post->post_type !== 'hd_report') {
        error_log("Report $report_id is invalid or not an hd_report post");
        return;
    }


    $status = get_post_meta($report_id, '_hd_report_status', true);
    if ($status !== 'pending') {
        error_log("Report $report_id is not pending. Current status: $status");
        return;
    }

    $prompt = get_post_meta($report_id, '_hd_prompt', true);
    $report_prompt = get_post_meta($report_id, '_hd_report_prompt', true);
    $chart_data = get_post_meta($report_id, '_hd_chart_data', true);

    if (empty($prompt)) {
        error_log("No prompt found for report $report_id");
        update_post_meta($report_id, '_hd_report_status', 'error');
        update_post_meta($report_id, '_hd_report_error', 'Missing prompt');
        return;
    }

    error_log("Calling Anthropic API for report $report_id");
    $agent = new HDReportAgent($prompt, $report_prompt, $chart_data);
    $report_content = $agent->sendRequest();//hd_call_anthropic_api($prompt, $report_prompt, $chart_data);
    if (is_wp_error($report_content)) {
        update_post_meta($report_id, '_hd_retry_count', $retry_count + 1);
        $error_message = $report_content->get_error_message();
        error_log("Error generating report $report_id: $error_message");
        update_post_meta($report_id, '_hd_report_status', 'error');
        update_post_meta($report_id, '_hd_report_error', $error_message);

        // Retry in 5 minutes
        wp_schedule_single_event(
            current_time('timestamp') + 300,
            'hd_generate_report_event',
            [$report_id]
        );

        return;
    }

    error_log("API returned content for report $report_id (length: " . strlen($report_content) . " chars)");

    // Attempt to update the post
    $update_result = wp_update_post([
        'ID' => $report_id,
        'post_status' => 'publish',
        'post_content' => $report_content,
    ]);

    if (is_wp_error($update_result)) {
        error_log("Failed to update report $report_id: " . $update_result->get_error_message());
        update_post_meta($report_id, '_hd_report_status', 'error');
        update_post_meta($report_id, '_hd_report_error', 'Update failed: ' . $update_result->get_error_message());
        return;
    }

    update_post_meta($report_id, '_hd_report_status', 'complete');
    error_log("Report $report_id completed successfully");
}

add_action('hd_generate_report_event', 'do_async_report_generation', 10, 1);
