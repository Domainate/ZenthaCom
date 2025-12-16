<?php
/************************************/
/***                              ***/
/*** VIEW PROFILE DATA WITH POPUP ***/
/***                              ***/
/************************************/

/**
 * AJAX handler to return chart data for a given profile.
 * Only returns data if the profile belongs to the current user.
 */
function old_hd_get_profile_data() {
    check_ajax_referer('hd_profile_data_nonce', 'security');

    if ( ! is_user_logged_in() ) {
        wp_send_json_error('User not logged in.');
    }
    
    // Fix: Check if profile_id exists in $_POST before accessing it
    $profile_id = isset($_POST['profile_id']) ? intval($_POST['profile_id']) : 0; // Line 817
    if ( ! $profile_id ) {
        wp_send_json_error('Invalid profile ID.');
    }
    
    $profile = get_post($profile_id);
    if ( ! $profile || $profile->post_type !== 'hd_profile' || $profile->post_author != get_current_user_id() ) {
        wp_send_json_error('You do not have permission to access this profile.');
    }
    
    $chart_data = get_post_meta($profile_id, '_hd_chart_data', true);
    if ( empty($chart_data) ) {
        wp_send_json_error('No chart data found.');
    }
    
    $encoded_chart_data = base64_encode(json_encode($chart_data));
    
    ob_start();
    ?>
    <!-- Chart Header -->
        <h2 style="text-align:center; margin:0.5em 0;font-size:1.6em;">
            Profile: <?php echo esc_html($profile->post_title); ?>
        </h2>
        <h3 style="text-align:center; margin:0.5em 0;font-size:1.2em;">
            Date of Birth: <?php echo esc_html(get_post_meta($profile->ID, '_hd_dob', true)); ?>
        </h3>
        <h3 style="text-align:center; margin:0.5em 0;font-size:1.2em;">
            Location: <?php echo esc_html(get_post_meta($profile->ID, '_hd_location', true)); ?>
        </h3>

        <!-- View Profile Button -->
        <div style="text-align:center; margin-top: 1em;">
            <button id="view-profile-btn" style="padding: 0.5em 1em; font-size: 1.2em; cursor: pointer;">View Chart</button>
        </div>

        <!-- Lightbox Popup (Hidden by Default) -->
        <div id="profile-lightbox" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); z-index: 9999;">
            <div style="background: #fff; max-width: 800px; height: 90%; margin: 3% auto; padding: 20px; border-radius: 8px; text-align: center; overflow-y: auto;">
                <span id="close-lightbox" style="cursor: pointer; float: right; font-size: 1.5em;">&times;</span>
                <?php echo do_shortcode('[zentha_result]'); ?>
                <!-- Hidden element carrying the chart data -->
                <div id="hd-chart-data" data-chart="<?php echo esc_js($encoded_chart_data); ?>"></div>
            </div>
        </div>


        <h2 style="text-align:center; margin:0.5em 0;font-size:1.6em;">GENERATED REPORTS</h2>
        <center>
            <em>No existing reports for this profile.</em>
        </center>

        <!-- New report creation container -->
        <div id="new-reports-section"  style="text-align: center;margin-top:2em;width: 50%;text-align: center;margin: 0 auto;">
            <h3 style="text-align:center; margin:0.5em 0;font-size:1.2em;">OR Choose New Report to Create Below:</h3>

            


            <div id="report-options" >
                <!-- Each option is a link with data-report-type -->

            <!-- Comprehensive Gate Analysis -->
            <a href="#" class="report-option" data-report-type="comprehensive_overview" Style="display:block; padding:10px; border-bottom:1px solid #ccc;">
                <img src="https://zentha.com/wp-content/uploads/2025/01/Layer-12.png" width="70" style="float:left; margin-right:20px;" />
                <strong>Comprehensive Overview</strong>

                     <span style="font-size:0.9em;">Produce a holistic, empowering report that reveals how the individual's gates, influenced by their planetary placements, shape their personality, challenges, and potential for growth, blending Human Design's structural insights with the transformative wisdom of the Gene Keys.</span>
                <div style="clear:both;"></div>
            </a>  

            <!-- Self-Sabotaging Patterns -->
            <a href="#" class="report-option" data-report-type="self_sabotaging_patterns" style="display:block; padding:10px; border-bottom:1px solid #ccc;">
                <img src="https://zentha.com/wp-content/uploads/2025/01/Layer-12.png" width="70" style="float:left; margin-right:20px;" />
                <strong>Self-Sabotaging Patterns</strong>

                        <span style="font-size:0.9em;">Helps users recognize and overcome self-limiting behaviors by understanding the shadow aspects of their gates and Gene Keys, including planetary influences, and how to transform them into wisdom.</span>
                      <div style="clear:both;"></div>
            </a>  


            </div>
        </div>

    <script>
        document.getElementById('view-profile-btn').addEventListener('click', function() {
            document.getElementById('profile-lightbox').style.display = 'block';
        });

        document.getElementById('close-lightbox').addEventListener('click', function() {
            document.getElementById('profile-lightbox').style.display = 'none';
        });
    </script>

    <?php
    $output = ob_get_clean();
    echo $output;
    wp_die();

}
add_action('old_wp_ajax_hd_get_profile_data', 'old_hd_get_profile_data');


/************************************/
/***                              ***/
/***   HD PROFILE DROPDOWN SC     ***/
/***                              ***/
/************************************/


/**Shortcode to display a dropdown of stored profiles for the logged in user.
If a profile ID is passed via the URL (?hd_profile_id=), that profile is pre‑selected
and its chart info loaded via AJAX.
 */
function old_hd_profile_dropdown_shortcode() {
 if ( ! is_user_logged_in() ) {
 return '<p>Please log in to view your profiles.</p>';
 } $profiles = get_posts( array(
 'post_type'      => 'hd_profile',
 'author'         => get_current_user_id(),
 'posts_per_page' => -1,
 )); if ( empty($profiles) ) {
 return '<h2 style="text-align:center; margin:0.5em 0;font-size:1.6em;">No Profiles Found
<a href="https://zentha.com/members/reportapp/create-profile/">Create Your First Profile</a></h2>';
 } $selected_profile = isset($_GET['hd_profile_id']) ? intval($_GET['hd_profile_id']) : ''; ob_start();
 ?>
 <label for="hd_profile_dropdown">Select a Profile:</label> <select id="hd_profile_dropdown">
     <option value="">-- Select a Profile --</option>
     <?php foreach ($profiles as $profile) : ?>
         <option value="<?php echo esc_attr($profile->ID); ?>" <?php selected($selected_profile, $profile->ID); ?>>
             <?php echo esc_html($profile->post_title); ?>
         </option>
     <?php endforeach; ?>
 </select>
 
 <div id="hd_profile_data">
     <!-- Chart info will be loaded here -->
    
 </div>
 
 <script>
 jQuery(document).ready(function($){
     function loadProfile(profileId) {
         if (profileId === '') {
             $('#hd_profile_data').html('');
             return;
         }
         $.ajax({
             url: '<?php echo admin_url('admin-ajax.php'); ?>',
             type: 'POST',
             data: {
                 action: 'hd_get_profile_data',
                 profile_id: profileId,
                 security: '<?php echo wp_create_nonce("hd_profile_data_nonce"); ?>'
             },
             beforeSend: function(){
                 $('#hd_profile_data').html('<p>Loading...</p>');
             },
             success: function(response) {
                 $('#hd_profile_data').html(response);
             },
             error: function(xhr, status, error) {
                 $('#hd_profile_data').html('<p>An error occurred: ' + error + '</p>');
             }
         });
     }
     
     $('#hd_profile_dropdown').on('change', function(){
         loadProfile($(this).val());
     });
     
     <?php if ($selected_profile) : ?>
         loadProfile('<?php echo esc_js($selected_profile); ?>');
     <?php endif; ?>
 });
 </script>
 <?php
 return ob_get_clean();

}
add_shortcode('old_hd_profile_dropdown', 'old_hd_profile_dropdown_shortcode');
/**Shortcode to display the report output on the Report page.
It decodes the report content passed via the "hd_report" query parameter.
 */