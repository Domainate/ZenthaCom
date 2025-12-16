<?php


class ZenthaAdminProfile
{
    public $owner_id;
    public function __construct($owner_id = null)
    {
        $this->owner_id = $owner_id ?? get_current_user_id();
    }

    public function getLatestCompletedReports(): array
    {
        $existing_reports = [];
        $since = gmdate('Y-m-d H:i:s', strtotime('-24 hours'));
        $completed_reports = get_posts([
            'post_type' => 'hd_report',
            'author' => $this->owner_id,
            'numberposts' => -1,
            'meta_key' => '_hd_report_status',
            'meta_value' => 'complete',
            'date_query' => [
                [
                    'after' => $since,
                    'column' => 'post_date', // checks the post_date
                ],
            ],
        ]);

        foreach ($completed_reports as $each) {
            $profile_id = get_post_meta($each->ID, '_hd_profile_id', true);
            $profile = get_post($profile_id);
            $existing_reports[] = array_merge($each->to_array(), [
                'report_type' => trim(explode(' ', $each->post_title)[0] ?? ''),
                'profile' => $profile,
            ]);
        }
        return $existing_reports ?? [];
    }

    public function getPendingReports(): array
    {
        $pending_reports = [];
        $reports = get_posts([
            'post_type' => 'hd_report',
            'author' => $this->owner_id,
            'post_status' => 'any', // Or array('draft','pending','publish')
            'meta_key' => '_hd_report_status',
            'meta_value' => 'pending',
            'numberposts' => -1,
        ]);

        foreach ($reports as $each) {
            $profile_id = get_post_meta($each->ID, '_hd_profile_id', true);
            $profile = get_post($profile_id);
            $pending_reports[] = array_merge($each->to_array(), [
                'report_type' => trim(explode(' ', $each->post_title)[0] ?? ''),
                'profile' => $profile,
            ]);
        }
        return $pending_reports ?? [];
    }


    public function getOtherCompletedReports($completed_reports = [], $pending_reports = [])
    {
        $others_reports = [];
        $since = gmdate('Y-m-d H:i:s', strtotime('-24 hours'));
        $other_completed_reports = get_posts([
            'post_type' => 'hd_report',
            'author' => $this->owner_id, // Changed post_author to author for proper user filtering
            'numberposts' => 50,       //add limit so that it wont load from db
            'meta_key' => '_hd_report_status',
            'meta_value' => 'complete',
            'orderby' => 'date',
            'order' => 'DESC', // DESC for newest to oldest, ASC for oldest to newest
            'date_query' => [
                [
                    'before' => $since,
                    'column' => 'post_date',
                ],
            ],
            'post__not_in' => array_merge(
                !empty($pending_reports) ? wp_list_pluck($pending_reports, 'ID') : [],
                !empty($completed_reports) ? wp_list_pluck($completed_reports, 'ID') : []
            ),
        ]);

        foreach ($other_completed_reports as $each) {
            $profile_id = get_post_meta($each->ID, '_hd_profile_id', true);
            $profile = get_post($profile_id);
            $others_reports[] = array_merge($each->to_array(), [
                'report_type' => trim(explode(' ', $each->post_title)[0] ?? ''),
                'profile' => $profile,
            ]);
        }
        return $others_reports ?? [];
    }

}