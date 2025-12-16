<?php

// handle deleting of reports
function hd_delete_report()
{
    // Verify nonce and user logged in
    if (!check_ajax_referer('hd_delete_report_nonce', 'security', false) || !is_user_logged_in()) {
        $response = array(
            'success' => false,
            'message' => 'Security check failed or not logged in'
        );
        wp_send_json($response);
    }

    // Get the report post
    $report_id = (int) $_POST['report_id'] ?? 0;
    $report = get_post($report_id);

    // Verify report exists and is type hd_report
    if (!$report || $report->post_type !== 'hd_report') {
        $response = array(
            'success' => false,
            'message' => 'Invalid report ID'
        );
        wp_send_json($response);
    }

    // Verify current user owns the report
    if ($report->post_author != get_current_user_id()) {
        $response = array(
            'success' => false,
            'message' => 'You do not have permission to delete this report'
        );
        wp_send_json($response);
    }

    // Delete the report post and metadata
    $deleted = wp_delete_post($report_id, true);

    if (!$deleted) {
        $response = array(
            'success' => false,
            'message' => 'Error deleting report'
        );
        wp_send_json($response);
    }

    $response = array(
        'success' => true,
        'message' => 'Report deleted successfully'
    );
    wp_send_json($response);
}

add_action('wp_ajax_hd_delete_report', 'hd_delete_report');


/**
 * Shortcode to display a table of stored profiles with a select button.
 */
function single_profile_shortcode()
{
    wp_enqueue_script('hd-reports', get_current_theme_url() . '/js/hd-reports.js', [], null, true);
    wp_enqueue_style('popup-chart-style', get_stylesheet_directory_uri() . '/css/theme.css');
    wp_enqueue_script('popup-chart-script', get_current_theme_url() . '/js/popup-hd-chart.js');
    wp_localize_script('hd-reports', 'localizeHDReports', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'profileDataNonce' => wp_create_nonce("hd_profile_data_nonce"),
        'profileReportableNonce' => wp_create_nonce("hd_profile_reportable_nonce"),
        'createProfileUrl' => esc_url(home_url('/members/reportapp/create-profile/')),
        'deleteReportNonce' => wp_create_nonce("hd_delete_report_nonce"), 
    ]);


    if (!is_user_logged_in()) {
        return '<p>Please log in to view your profiles.</p>';
    }

    // Get the current user's profile from the URL parameter
    $profile_id = isset($_GET['hd_profile_id']) ? intval($_GET['hd_profile_id']) : false;
    if (!$profile_id) {
        return '<div class="flex w-full flex-col font-semibold justify-center items-center">Please select a profile to view.</div>';
    }
    $selectedProfile = new ZenthaProfile($profile_id);

    if (!$selectedProfile->isExists()) {
        return '<div class="flex w-full flex-col font-semibold justify-center items-center">Profile not found.</div>';
    }

    $profile = $selectedProfile->getProfile();
    $chartData = $selectedProfile->getChartData();
    $completedReports = $selectedProfile->getCreatedReports();
    $pendingReports = $selectedProfile->getPendingReports();
    $creatableReports = $selectedProfile->getCreatableReports(wp_list_pluck($completedReports, 'report_type'));

    // print_r($creatableReports);
    wp_localize_script(
        'popup-chart-script',
        'chartData',
        array(
            'profileId' => $profile_id,
            'charts' => $chartData
        )
    );

    ob_start();

    ?>
    <div class="flex w-full justify-between items-start  flex-row" style="max-width: 700px; gap: 1.2em;">
        <div class="flex flex-col flex-1 justify-start items-start">
            <h3> <strong><?= esc_html($profile->name) ?></strong></h3>
            <h5 style="margin-top: 0.6em;">Date of Birth: <?= esc_html($profile->dob) ?></h5>
            <h5>Location: <?= esc_html($profile->location) ?></h5>
        </div>
        <div class="flex flex-row" style="gap: 0.5em;">
            <button class="btn-zentha-view-chart cursor-pointer">
                <img src="/wp-content/uploads/2024/12/humandesignchartapp.jpg" height="100" />
                <small class="font-semibold">
                    View Chart
                </small>
            </button> 
        </div>
    </div>

    <!-- Error and Success Messages -->
    <div id="hd-report-messages" class="w-full flex flex-col gap-2">
        <?php
        if (isset($_GET['error']) && !empty($_GET['error'])) {
            echo '<div class="bg-red-100 text-red-700 p-2 rounded relative hd-closable-message">'
                . esc_html(urldecode($_GET['error']))
                . '<button type="button" class="absolute top-1 right-2 text-red-700 hover:text-red-900 hd-close-message" style="background:none;border:none;font-size:1.2em;cursor:pointer;">&times;</button>'
                . '</div>';
        }
        if (isset($_GET['success']) && !empty($_GET['success'])) {
            echo '<div class="bg-green-100 text-green-700 p-2 rounded relative hd-closable-message">'
                . esc_html(urldecode($_GET['success']))
                . '<button type="button" class="absolute top-1 right-2 text-green-700 hover:text-green-900 hd-close-message" style="background:none;border:none;font-size:1.2em;cursor:pointer;">&times;</button>'
                . '</div>';
        }
        ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.hd-close-message').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var parent = btn.closest('.hd-closable-message');
                    if (parent) parent.remove();
                });
            });
        });
    </script>

    
    <?php if (count($pendingReports) > 0): ?>
        <div style="margin-top: 1em;" class="flex w-full flex-col gap-3">
            <h5>Pending Reports For <?= esc_html($profile->name) ?></h5>
            <div class="flex flex-col gap-1 w-full">
                <?= ZenthaReports::buildPendingReports($pendingReports, $profile_id) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (count($completedReports) > 0): ?>
        <div style="margin-top: 1em;" class="flex w-full flex-col gap-3">
            <h5>Current Reports For <?= esc_html($profile->name) ?></h5>
            <div class="flex flex-col gap-1 w-full">
                <?= ZenthaReports::buildViewDeleteReports($completedReports, $profile_id) ?>
            </div>
        </div>
    <?php endif; ?>

    <div style="margin-top: 1em;" class="flex w-full flex-col gap-3">
        <h5>Generate New Report For <?= esc_html($profile->name) ?>:</h5>
        <div class="flex flex-col gap-1 w-full">
            <?= ZenthaReports::buildCreateReports($creatableReports, $profile_id) ?>
        </div>
    </div>

    <?php

    echo do_shortcode('[popup-zentha-bodygraphchart]');

    return ob_get_clean();
}

add_shortcode('single_profile_shortcode', 'single_profile_shortcode');
