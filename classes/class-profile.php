<?php


class ZenthaProfile
{
    public $profile;
    public $dob;
    public $location;
    public $id;
    public $owner_id;

    public function __construct($id)
    {
        $this->id = intval($id);
        $this->profile = get_post($id);
        $this->dob = get_post_meta($id, '_hd_dob', true);
        $this->location = get_post_meta($id, '_hd_location', true);
        $this->owner_id = $this->profile->post_author ?? 0;
    }

    public function isExists(): bool
    {
        return $this->profile ? true : false;
    }
    public function getCreatedReports(): array
    {
        $existing_reports = [];

        $reports = get_posts([
            'post_type' => 'hd_report',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'meta_query' => [
                [
                    'key' => '_hd_profile_id',
                    'value' => $this->id,
                ],
            ],
        ]);

        foreach ($reports as $each) {
            $existing_reports[] = array_merge($each->to_array(), [
                'report_type' => trim(explode(' ', $each->post_title)[0] ?? ''),
            ]);
        }
        return $existing_reports ?? [];
    }

    public function getPendingReports(): array
    {
        $pending_reports = [];
        $reports = get_posts([
            'post_type' => 'hd_report',
            'posts_per_page' => -1,
            'post_status' => 'any',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => '_hd_profile_id',
                    'value' => $this->id,
                ],
                [
                    'key' => '_hd_report_status',
                    'value' => 'pending',
                ],
            ],
        ]);

        foreach ($reports as $each) {
            $pending_reports[] = array_merge($each->to_array(), [
                'report_type' => trim(explode(' ', $each->post_title)[0] ?? ''),
            ]);
        }
        return $pending_reports ?? [];
    }


    public function getCreatableReports($current_reports = null)
    {
        if (is_null($current_reports)) {
            $current_reports = self::getCreatedReports();
        }
        $reports = ZenthaReports::list($current_reports);

        return $reports ?? [];
    }

    public function getOtherReports($since, $pending_reports = [], $completed_reports = []): array
    {
        $reports = get_posts([
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
        return $reports ?? [];
    }

    public function getProfile(): object
    {
        return (object) [
            'id' => $this->profile->ID ?? null,
            'dob' => esc_html($this->dob),
            'dob_formatted' => $this->dob ? date('F j, Y', strtotime($this->dob)) : null,
            'location' => esc_html($this->location),
            'name' => esc_html($this->profile->post_title ?? ''),
            'owner_id' => $this->owner_id
        ];
    }

    public function getChartData()
    {
        return get_post_meta($this->id, '_hd_chart_data', true);
    }

    public function deleteProfile(): array
    {
        try {
            // Start transaction
            global $wpdb;
            $wpdb->query('START TRANSACTION');

            // Delete the profile
            $deleted = wp_delete_post($this->id, true);
            if (!$deleted) {
                throw new Exception('Failed to delete profile');
            }

            // Delete post meta
            delete_post_meta($this->id, '_hd_chart_data');
            delete_post_meta($this->id, '_hd_dob');
            delete_post_meta($this->id, '_hd_location');
            delete_post_meta($this->id, '_hd_timezone');

            // Get and delete associated reports
            $reports = get_posts([
                'post_type' => 'hd_report',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'meta_key' => '_hd_profile_id',
                'meta_value' => $this->id,
            ]);

            foreach ($reports as $report) {
                $report_deleted = wp_delete_post($report->ID, true);
                if (!$report_deleted) {
                    throw new Exception('Failed to delete associated report');
                }
            }

            // If we got here, commit the transaction
            $wpdb->query('COMMIT');
            return [
                'is_error' => false,
                'message' => 'Profile and associated reports deleted successfully'
            ];

        } catch (Exception $e) {
            // Something went wrong, rollback the transaction
            $wpdb->query('ROLLBACK');
            return [
                'is_error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}