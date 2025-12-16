<?php
/**
 * Hello Blocks Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hello Blocks Child
 */
function get_current_theme_url()
{
    return is_child_theme() ? get_stylesheet_directory_uri() : get_template_directory_uri();
}

function hello_blocks_child_enqueue_styles()
{
    // Parent theme stylesheet
    $parent_style_path = get_template_directory() . '/style.css';
    $parent_style_uri = get_template_directory_uri() . '/style.css';
    $parent_version = file_exists($parent_style_path) ? filemtime($parent_style_path) : false;
    wp_enqueue_style('hello-blocks-style', $parent_style_uri, array(), $parent_version);

    // Child theme stylesheet
    $child_style_path = get_stylesheet_directory() . '/style.css';
    $child_style_uri = get_stylesheet_directory_uri() . '/style.css';
    $child_version = file_exists($child_style_path) ? filemtime($child_style_path) : false;
    wp_enqueue_style('hello-blocks-child-style', $child_style_uri, array('hello-blocks-style'), $child_version);

    // Global stylesheet
    $global_style_path = get_stylesheet_directory() . '/css/global.min.css';
    $global_style_uri = get_stylesheet_directory_uri() . '/css/global.min.css';
    $global_version = file_exists($global_style_path) ? filemtime($global_style_path) : false;
    wp_enqueue_style('hello-blocks-global-style', $global_style_uri, array(), $global_version);

    // SweetAlert2 from CDN
    wp_enqueue_style('sweetalert2-style', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.22.4/dist/sweetalert2.min.css');
    wp_enqueue_script('sweetalert2-script', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.22.4/dist/sweetalert2.all.min.js');

    // accordion-js from CDN
    wp_enqueue_style('accordion-style', 'https://unpkg.com/accordion-js@3.4.1/dist/accordion.min.css');
    wp_enqueue_script('accordion-script', 'https://unpkg.com/accordion-js@3.4.1/dist/accordion.min.js');

    // html2pdf.js from CDN
    wp_enqueue_script('hd-report-output-script', 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js');


    // Child theme script
    $child_script_path = get_stylesheet_directory() . '/script.js';
    $child_script_uri = get_stylesheet_directory_uri() . '/script.js';
    $child_script_version = file_exists($child_script_path) ? filemtime($child_script_path) : false;
    wp_enqueue_script('hello-blocks-child-script', $child_script_uri, array(), $child_script_version);
}
add_action('wp_enqueue_scripts', 'hello_blocks_child_enqueue_styles');

function hello_blocks_child_enqueue_scripts()
{
}

add_action('enqueue_block_assets', 'hello_blocks_child_enqueue_scripts');

//Load Vital Files
require_once __DIR__ . '/includes/report-lists.php';
require_once __DIR__ . '/includes/bodygraph-chart.php';
require_once __DIR__ . '/includes/init-hd-profile.php';
require_once __DIR__ . '/includes/init-hd-report.php';
require_once __DIR__ . '/includes/init-fundamentals.php';
require_once __DIR__ . '/includes/init-report-types.php';
require_once __DIR__ . '/includes/profile-management.php';
require_once __DIR__ . '/includes/report-management.php';

// Load Classes
require_once __DIR__ . '/classes/class-admin-reports.php';
require_once __DIR__ . '/classes/class-reports.php';
require_once __DIR__ . '/classes/class-profile.php';
require_once __DIR__ . '/classes/class-profile-admin.php';

// Load migrated shortcodes 
require_once __DIR__ . '/shortcodes/index.php';

// Load migrated widgets
require_once __DIR__ . '/widgets/my-profiles-widget.php';


function enqueue_route_stylesheet()
{
    $current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $theme_url = get_current_theme_url();
    if (strpos($current_url, '/login') !== false) {
        wp_enqueue_style(
            'login-styles',
            $theme_url . '/css/style-login.css'
        );
    } elseif (strpos($current_url, '/members') !== false) {
        wp_enqueue_style(
            'members-styles',
            $theme_url . '/css/style-members.css'
        );
    } elseif (strpos($current_url, '/hdcertification') !== false) {
        wp_enqueue_style(
            'hdcertification-styles',
            $theme_url . '/css/style-hdcertification.css'
        );
    } elseif (strpos($current_url, '/members/reportapp') !== false || strpos($current_url, '/members/reportapp/view-profile') !== false) {
        wp_enqueue_style(
            'hdreportapp-styles',
            $theme_url . '/css/style-hd-report-app.css'
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_route_stylesheet');

// Disable lazy loading for images with 'no-lazy-load' class
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    // Check if 'class' attribute exists and contains 'no-lazy-load'
    if (isset($attr['class']) && strpos($attr['class'], 'no-lazy-load') !== false) {
        unset($attr['loading']); // Remove lazy loading
    }
    return $attr;
}, 10, 2);