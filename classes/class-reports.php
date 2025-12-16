<?php

class ZenthaReports
{
    public static function list($excepts = [])
    {
        // Query posts with post_type 'report_type'
        $args = [
            'post_type' => 'report_type',
            'posts_per_page' => -1,
            // 'post_status'    => 'publish',
            'meta_query' => [
                [
                    'key' => '_report_type',
                    'compare' => 'NOT IN',
                    'value' => $excepts,
                ],
            ],
        ];
        $query = new WP_Query($args);
        return $query->posts;
    }

    public static function reportByType($type = '')
    {
        // Query for a single post with post_type 'report_type' and meta _report_type = $type
        $args = [
            'post_type' => 'report_type',
            'posts_per_page' => 1,
            // 'post_status'    => 'publish',
            'meta_query' => [
                [
                    'key' => '_report_type',
                    'value' => $type,
                    'compare' => '=',
                ],
            ],
        ];
        $query = new WP_Query($args);
        if (!empty($query->posts)) {
            $post = $query->posts[0];
            $meta = get_post_meta($post->ID);
            foreach ($meta as $key => $value) {
                // If meta value is an array with one item, flatten it
                $post->$key = is_array($value) && count($value) === 1 ? $value[0] : $value;
            }
            return $post;
        }
        return null;
    }

    private static function createButtonForm($profile_id, $report_type): string
    {
        return '<form method="POST" action="' . esc_url(admin_url('admin-post.php')) . '">
            <input type="hidden" name="profile_id" value="' . esc_attr($profile_id) . '">
            <input type="hidden" name="report_type" value="' . esc_attr($report_type) . '">
            <input type="hidden" name="action" value="hd_create_report">
            <input type="hidden" name="security" value="' . wp_create_nonce("hd_create_report_nonce") . '">
            <button type="submit" data-profile-id="' . $profile_id . '" data-report-type="' . $report_type . '"  class="w-full btn-zentha btn-report-create">Create</button>
        </form>';
    }

    public static function buildViewReport($report, $isPending = false, $hasView = false, $hasDelete = false, $hasCreate = false, $profile_id = null, $report_id = null, $name = '', $hasVideo = false): string
    {
        // print_r($report);
        $hasActions = $hasView || $hasDelete || $hasCreate;
        $html = [];
        $tz = get_option('timezone_string') ?? 'America/New_York';
        $createdDate = date('m/d/Y g:ia', strtotime($report->post_date . ' ' . $tz));
        $modifiedDate = date('m/d/Y g:ia', strtotime($report->post_modified . ' ' . $tz));
        $videoView = $hasVideo && !is_null($report->_video_url) ? do_shortcode('[report_video_lightbox_button src="' . $report->_video_url . '"]') : '';

        $nameDisplay = !empty($name) ? ' (' . esc_attr($name) . ')' : '';
        $dateDisplay = $hasView ? '<small class="w-full text-left" style="font-size:0.8rem;font-style: italic; margin: 2px 0;">Created on: ' . esc_html($createdDate) . ' ET</small>'
            : ($isPending
                ? '<small class="w-full text-left" style="font-size:0.8rem;font-style: italic; margin: 2px 0;">Requested on: ' . esc_html($modifiedDate) . ' ET (<b>in Progress</b>)</small>'
                : '');

        $html[] = '<div class="each-report-wrapper p-2 flex w-full flex-row gap-2 justify-between items-start mb-4" style="margin-bottom: 0.5em; border:1px solid #ccc;">
    <div class="flex flex-col justify-start items-center" style="width: 80px;">
        <img src="/wp-content/uploads/2025/01/Layer-12.png" width="70" class="object-contain" />
    </div>
    <div class="flex flex-col justify-start items-center flex-1">
        <h5 class="w-full text-left">' . $report->post_title . ' ' . $nameDisplay . '</h5>'
            . $dateDisplay .
            '<p class="w-full text-left">' . $report->post_content . ' ' . $videoView . '</p> 
    </div>';

        if ($hasActions) {
            $html[] = '<div class="flex flex-col justify-start items-center gap-2 " style="width: 100px;">';
            if ($hasView) {
                $html[] = '<a href="/members/reportapp/report/?report_id=' . $report_id . '" data-report-id="' . $report_id . '" data-profile-id="' . $profile_id . '" data-report-type="' . $report->_report_type . '" class="w-full btn-zentha btn-report-view">View</a>';
            }
            if ($hasDelete) {
                $html[] = '<button data-report-id="' . $report_id . '" data-profile-id="' . $profile_id . '" data-report-type="' . $report->_report_type . '" class="w-full btn-zentha-danger btn-report-delete">Delete</button>';
            }
            if ($hasCreate) {
                $html[] = self::createButtonForm($profile_id, $report->_report_type);
            }
            $html[] = '</div>';
        }
        $html[] = '</div>';

        return implode('', $html);
    }

    public static function buildViewDeleteReports($reports = [], $profile_id = null, $hasName = false, $hasVideo = false): string
    {
        $contents = "";
        foreach ($reports as $each) {
            $report = self::reportByType($each['report_type']);
            $profile_id = !is_null($profile_id) ? $profile_id : $each['profile']->ID;
            $profile_name = $hasName ? $each['profile']->post_title : '';
            if ($report) {
                $contents .= self::buildViewReport($report, false, true, true, false, $profile_id, $each['ID'], $profile_name, $hasVideo);
            }
        }
        return $contents;
    }
    public static function buildPendingReports($reports = [], $profile_id = null, $hasName = false, $hasVideo = false): string
    {
        $contents = "";
        foreach ($reports as $each) {
            $report = self::reportByType($each['report_type']);
            $profile_id = !is_null($profile_id) ? $profile_id : $each['profile']->ID;
            $profile_name = $hasName ? $each['profile']->post_title : '';
            if ($report) {
                $contents .= self::buildViewReport($report, true, false, true, false, $profile_id, $each['ID'], $profile_name, $hasVideo);

            }
        }
        return $contents;
    }
    public static function buildCreateReports($reportTypes = [], $profile_id = null, $hasVideo = false): string
    {
        $contents = "";
        foreach ($reportTypes as $each) {
            $contents .= self::buildViewReport($each, false, false, false, true, $profile_id, null, $hasVideo);
        }
        return $contents;
    }
}
