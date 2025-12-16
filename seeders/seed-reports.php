<?php
/**
 * Seeder for Report Type custom post type.
 *
 * To run this seeder, navigate to this file in your browser:
 * http://your-wordpress-site.com/wp-content/themes/hello-blocks-child/seeders/seed-reports.php
 *
 * IMPORTANT: This script should only be run once or when you intend to re-seed the data.
 * It checks for existing posts with the same 'report_type' to prevent duplicates.
 */

// Ensure WordPress environment is loaded
if (!defined('ABSPATH')) {
    require_once(dirname(__FILE__) . '/../../../../wp-load.php');
}

// Include the class that contains the reports data
require_once(dirname(__FILE__) . '/../includes/report-lists.php');

$reports_data = reportLists();

echo "<h1>Seeding Report Types...</h1>";

foreach ($reports_data as $report) {
    $report_type_slug = sanitize_title($report['report_type']);

    // Check if a post with this report_type already exists
    $existing_posts = get_posts(array(
        'post_type' => 'report_type',
        'meta_key' => 'report_type',
        'meta_value' => $report_type_slug,
        'fields' => 'ids', // Only get post IDs for efficiency
        'numberposts' => 1,
    ));

    if (!empty($existing_posts)) {
        echo "<p>Skipping '{$report['title']}' (report_type: {$report_type_slug}) - already exists.</p>";
        continue;
    }

    $new_post_args = array(
        'post_title' => $report['title'],
        'post_content' => $report['description'],
        'post_status' => 'publish',
        'post_type' => 'report_type',
        'post_author' => 1, // Assign to admin user (ID 1)
    );

    $post_id = wp_insert_post($new_post_args);

    if (is_wp_error($post_id)) {
        echo "<p style='color: red;'>Error inserting '{$report['title']}': " . $post_id->get_error_message() . "</p>";
    } else {
        // Add custom fields (meta data)
        update_post_meta($post_id, '_prompt', $report['prompt']);
        update_post_meta($post_id, '_description', $report['description']);
        update_post_meta($post_id, '_image', $report['image']);
        update_post_meta($post_id, '_video_url', $report['video']);
        update_post_meta($post_id, '_report_type', $report_type_slug); // Store the sanitized slug

        echo "<p>Successfully seeded '{$report['title']}' (ID: {$post_id}, report_type: {$report_type_slug}).</p>";
    }
}

echo "<h1>Seeding complete.</h1>";
?>