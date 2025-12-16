<?php
/**
 * Seeder to delete all entries for the 'Report Type' custom post type.
 *
 * To run this seeder, navigate to this file in your browser:
 * http://your-wordpress-site.com/wp-content/themes/hello-blocks-child/seeders/delete-report-types.php
 *
 * IMPORTANT: This script will PERMANENTLY DELETE all posts of the 'report_type' post type.
 * Use with caution.
 */

// Ensure WordPress environment is loaded
if ( ! defined( 'ABSPATH' ) ) {
    require_once( dirname( __FILE__ ) . '/../../../../wp-load.php' );
}

echo "<h1>Deleting Report Types...</h1>";

$args = array(
    'post_type'      => 'report_type',
    'posts_per_page' => -1, // Get all posts
    'post_status'    => 'any', // Include all statuses (publish, draft, trash, etc.)
    'fields'         => 'ids', // Only get post IDs for efficiency
);

$report_type_posts = get_posts( $args );

if ( $report_type_posts ) {
    foreach ( $report_type_posts as $post_id ) {
        // Force delete to bypass trash and permanently remove the post
        $deleted = wp_delete_post( $post_id, true );

        if ( $deleted ) {
            echo "<p>Successfully deleted Report Type post with ID: {$post_id}</p>";
        } else {
            echo "<p style='color: red;'>Error deleting Report Type post with ID: {$post_id}</p>";
        }
    }
    echo "<h2>All Report Type posts deleted.</h2>";
} else {
    echo "<h2>No Report Type posts found to delete.</h2>";
}

echo "<h1>Deletion complete.</h1>";
?>