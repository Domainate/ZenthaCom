<?php

function hd_list_my_reports_with_videos_shortcode()
{

    wp_enqueue_script('hd-reports', get_current_theme_url() . '/js/hd-reports.js', [], null, true);
    wp_localize_script('hd-reports', 'localizeHDReports', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'profileDataNonce' => wp_create_nonce("hd_profile_data_nonce"),
        'profileReportableNonce' => wp_create_nonce("hd_profile_reportable_nonce"),
        'createProfileUrl' => esc_url(home_url('/members/reportapp/create-profile/')),
        'deleteReportNonce' => wp_create_nonce("hd_delete_report_nonce"),
    ]);

    if (!is_user_logged_in()) {
        return '<p>Please log in to see your reports.</p>';
    }

    $user_id = get_current_user_id();

    $adminProfile = new ZenthaAdminProfile($user_id);

    $pending_reports = $adminProfile->getPendingReports();
    $completed_reports = $adminProfile->getLatestCompletedReports();
    $other_completed_reports = $adminProfile->getOtherCompletedReports($completed_reports, $pending_reports);
    // print_r($other_completed_reports);
    ob_start();
    ?>

    <div style="margin-top: 1em;" class="flex w-full flex-col gap-3">
        <h5>Pending Reports</h5>
        <div class="flex flex-col gap-1 w-full">
            <?php if (count($pending_reports) > 0) {
                echo ZenthaReports::buildPendingReports($pending_reports, null, true, true);
            } else {
                echo '<p>No pending reports.</p>';
            }
            ?>
        </div>
    </div>

    <div style="margin-top: 1em;" class="flex w-full flex-col gap-3">
        <h5>Completed in Last 24 Hours</h5>
        <div class="flex flex-col gap-1 w-full">
            <?php if (count($completed_reports) > 0)
                echo ZenthaReports::buildViewDeleteReports($completed_reports, null, true, true);
            else
                echo '<p>No completed reports in the last 24 hours.</p>';
            ?>
        </div>
    </div>

    <div style="margin-top: 1em;" class="flex w-full flex-col gap-3">
        <h5>Other Completed Reports</h5>
        <div class="flex flex-col gap-1 w-full">
            <?php if (count($other_completed_reports) > 0)
                echo ZenthaReports::buildViewDeleteReports($other_completed_reports, null, true, true);
            else
                echo '<p>No other completed reports.</p>';
            ?>
        </div>
    </div>

    <?php

    return ob_get_clean();
}

add_shortcode('hd_my_reports_with_videos', 'hd_list_my_reports_with_videos_shortcode');

