<?php

function hd_report_output_shortcode()
{
    wp_enqueue_style('hd-report-output-style', get_stylesheet_directory_uri() . '/css/style-report-output.css');

    if (isset($_GET['report_id'])) {
        $report_id = intval($_GET['report_id']);
        if (!$report_id) {
            return '<p>No valid report ID provided.</p>';
        }

        $report_post = get_post($report_id);
        if (!$report_post || $report_post->post_type !== 'hd_report') {
            return '<p>Report not found.</p>';
        }

        if ((int) $report_post->post_author !== get_current_user_id()) {
            return '<p>You do not have permission to view this report.</p>';
        }
        $currentUser = wp_get_current_user();
        $fullUsername = trim($currentUser->first_name . ' ' . $currentUser->last_name);
        if (empty($fullUsername)) {
            $fullUsername = $currentUser->display_name;
        }
        $business = get_business_info(get_current_user_id());
        $status = get_post_meta($report_id, '_hd_report_status', true);
        $reportType = ucwords(str_replace('_', ' ', get_post_meta($report_id, '_hd_report_type', true)));
        $profileId = get_post_meta($report_id, '_hd_profile_id', true);
        $profile = get_post($profileId);

        if ($status === 'pending') {
            return '<p>Your report is still generating. Please check back soon.</p>';
        }
        if ($status === 'error') {
            $error_msg = get_post_meta($report_id, '_hd_report_error', true);
            return '<p>There was an error generating your report: ' . esc_html($error_msg) . '</p>';
        }

        // Convert Markdown-style headers to HTML
        $content = $report_post->post_content;
        $formatted_content = preg_replace([
            '/^# (.+)$/m',     // Convert "# Title" to <h1>Title</h1>
            '/^## (.+)$/m',    // Convert "## Subtitle" to <h2>Subtitle</h2>
            '/^### (.+)$/m',   // Convert "### Subtitle" to <h3>Subtitle</h3>
            '/\*\*(.+?)\*\*/', // Convert "**Bold Text**" to <span class="span-title">Bold Text</span>
        ], [
            '<h1 class="report-title">$1</h1>',
            '<h2 class="report-heading-two">$1</h2>',
            '<h3 class="report-heading-three">$1</h3>',
            '<span class="span-title">$1</span>',
        ], $content);

        // Convert bullet points into a single <ul> list
        $formatted_content = preg_replace_callback('/(?:\n|^)- (.+)(?:\n- .+)*+/m', function ($matches) {
            // Extract all list items
            $items = explode("\n", trim($matches[0]));
            $items = array_map(fn($item) => '<li>' . trim(substr($item, 2)) . '</li>', $items);
            return '<ul class="bulleted-items">' . implode('', $items) . '</ul>';
        }, $formatted_content);

        // Convert numbered lists into a single <ol> block
        $formatted_content = preg_replace_callback('/(?:^|\n)(\d+\..+)(?:\n\d+\..+)*/m', function ($matches) {
            $items = explode("\n", trim($matches[0]));
            $items = array_map(fn($item) => '<li>' . preg_replace('/^\d+\.\s/', '', trim($item)) . '</li>', $items);
            return '<ul class="bulleted-items">' . implode('', $items) . '</ul>';
        }, $formatted_content);

        $output = wp_kses_post(wpautop($formatted_content));
        $cover = '<div class="toggle-show-screen-print hide-on-screen w-full" style="display:flex; align-items: center; height: 100vh; flex-direction: column; justify-content: center; gap: 1rem; position: relative;">';
        $cover .= '<img loading="eager" class="no-lazy-load" decoding="async" src="' . esc_url($business['business_logo']) . '" style="position: absolute; top: 0; right: 2rem; object-fit: contain; height: 80px; -webkit-print-color-adjust: exact; print-color-adjust: exact;" />';
        $cover .= '<div style="display: flex; flex-direction: column; gap: 2rem; align-items: center; justify-content: center; margin-top: 2em;">';
        $cover .= '<h1 style="font-size: 2.25rem; font-weight: 600;text-align:center;">Human Design Report: ' . $reportType . '</h1>';
        $cover .= '<h3 style="font-size: 1.8rem; font-weight: 600;text-align:center;">For ' . $profile->post_title . '</h3>';
        $cover .= '<h4 style="font-size: 1.2rem; font-weight: 400;text-align:center;">Prepared by ' . $fullUsername . '</h4>';
        $cover .= '<h4 style="font-size: 1.2rem; font-weight: 400;text-align:center;">' . $business['business_name'] . '</h4>';
        $cover .= '</div>';
        $cover .= '</div> ';
        $finalOutput = $cover;
        // $finalOutput .= '<div class="hd-chart-output" style="display:none; flex-direction: column; gap: 1rem;">'.do_shortcode('[chart_only_bodygraphchart profile_id="'.$profileId.'"]').'</div>';
        $finalOutput .= '<div class="hd-report-output">' . $output . '</div>';

        return $finalOutput;
    } elseif (isset($_GET['hd_report'])) {
        $raw_report_param = $_GET['hd_report'];
        $decoded_report = base64_decode($raw_report_param);
        // Handle base64 logic...
    }

    return '<p class="text-center font-semibold" style="font-size: 1.5rem;">No report selected. <a href="/members/reportapp/my-reports/">Go to My Reports</a></p>';
}

add_shortcode('hd_report_output', 'hd_report_output_shortcode');

