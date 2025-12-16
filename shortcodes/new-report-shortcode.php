<?php
// Add this code to your theme's functions.php or a custom plugin file

function new_report_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'profile_id' => '', // Default value is empty
        ),
        $atts,
        'new_report'
    );

    $profile_id = $atts['profile_id'];
    $existing_reports = [];
    if (!empty($profile_id)) {
        $profile_id = intval($profile_id);
        $reports = get_posts([
            'post_type' => 'hd_report',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'meta_key' => '_hd_profile_id',
            'meta_value' => $profile_id
        ]);
        foreach ($reports as $r) {
            $existing_reports[] = trim(explode(' ', $r->post_title)[0] ?? '');
        }
    }

    ob_start(); // Start output buffering

    $reports = hd_reports_list($existing_reports);

    foreach ($reports as $report) {
        echo '<div id="rt-' . $report['report_type'] . '" style="width: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center; gap: 1rem; padding: 1rem; border-bottom: 1px solid #ccc;">';
        echo '<img src="' . esc_url($report['image']) . '" width="70" style="object-fit: contain; aspect-ratio: auto;" />';
        echo '<div style="display: flex; flex-direction: column; gap: 0.5rem; justify-content: flex-start; align-items: flex-start; padding: 0.25rem; flex: 1 1 0%; ">';
        echo '<strong style="font-weight:bold;">' . esc_html($report['title']) . '</strong>';
        echo '<span style="font-size:0.9em;">' . esc_html($report['description']) . '</span>';
        echo '</div>';
        echo '<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;"><a href="#" class="report-option" data-report-type="' . esc_attr($report['report_type']) . '"><button class="view-profile-btnn">Create</button> </a></div>';
        echo '</div>';
    }
    return ob_get_clean(); // Return the output buffer content
}

add_shortcode('new_report', 'new_report_shortcode');


/************************************/
/***                              ***/
/***  HD GENERATE REPORT FUNCT    ***/
/***                              ***/
/************************************/



/**Generate a Human Design report using the OpenAI API.
This function now checks that the user has at least one credit,
deducts one credit upon generating a report, and then redirects
the user to the Report page.
 */



function hd_generate_report()
{
    if (!is_user_logged_in()) {
        wp_die('You must be logged in.');
    }
    if (!isset($_POST['hd_report_nonce']) || !wp_verify_nonce($_POST['hd_report_nonce'], 'hd_report_form')) {
        wp_die('Security check failed');
    }

    // Check credits immediately
    $credits = hd_get_user_credits();
    if ($credits < 1) {
        wp_redirect(home_url('/members/reportapp/add-credits/'));
        exit;
    }

    $profile_id = intval($_POST['hd_profile_id']);
    $report_type = sanitize_text_field($_POST['hd_report_type']);

    // Check if report already exists for this profile and type
    $existing_reports = get_posts(array(
        'post_type' => 'hd_report',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_hd_profile_id',
                'value' => $profile_id
            ),
            array(
                'key' => '_hd_report_type',
                'value' => $report_type
            )
        )
    ));

    if (!empty($existing_reports)) {
        $label = ucwords(str_replace('_', ' ', $report_type));
        wp_die("A {$label} report already exists for this profile. Please delete the existing report before creating a new one.");
    }

    // Retrieve the stored chart data for that profile
    $chart_data = get_post_meta($profile_id, '_hd_chart_data', true);
    if (empty($chart_data)) {
        wp_die('No chart data found for this profile.');
    }

    // Build the prompt as you normally would:
    $report = hd_get_report_by_type($report_type);
    if (!$report || !isset($report['prompt'])) {
        $report_prompt = "You are an expert in Human Design and Gene Keys. Based on an individual's Human Design chart, create a detailed and comprehensive report analyzing their gates, with a focus on how each gate is influenced by its specific planetary placement (e.g., Gate 43 in Mercury, Gate 10 in Venus). For each gate in their chart, provide a structured breakdown that includes the following sections: 1. Gate and Planet Overview: State the gate number and the planet activating it (e.g., Gate 43 in Mercury). Provide a concise description of the gate's core theme in Human Design (e.g., Gate 43 is the Gate of Insight, tied to breakthroughs and inner knowing). Explain the role of the activating planet and how its energy shapes the gate's expression (e.g., Mercury in Gate 43 enhances mental clarity and communication of insights, but may also create pressure to over-explain). 2. Gene Keys Integration: Identify the corresponding Gene Key for the gate (e.g., Gene Key 43). Describe the shadow, gift, and siddhi of the Gene Key (e.g., Shadow: Deafness, Gift: Insight, Siddhi: Epiphany). Analyze how the planetary placement might amplify or modulate these aspects (e.g., Mercury could intensify the shadow of mental isolation but also elevate the gift of precise, innovative thinking). 3. Personality and Behavioral Insights: Explore how the gate and its planetary placement influence the individual's personality, tendencies, or life themes (e.g., Gate 43 in Mercury may manifest as a brilliant, unconventional thinker who struggles to be understood). Include relatable, real-world examples (e.g., they might excel at problem-solving in a crisis but feel frustrated when others don't grasp their ideas). 4. Challenges and Growth Opportunities: Highlight potential challenges or shadow patterns tied to the gate and planet (e.g., Mercury in Gate 43 might lead to overthinking or impatience with those who don't get it). Offer practical suggestions for overcoming these challenges, leveraging their Human Design strategy, authority, and the Gene Key's higher frequencies (e.g., trusting their inner authority to know when to share insights and practicing patience to embody the gift of Insight). 5. Synthesis with Other Chart Elements: Briefly connect the gate and planetary placement to other aspects of their chart, such as their type, authority, or defined/undefined centers (e.g., for a Manifestor with Gate 43 in Mercury, this could fuel a drive to initiate others into new perspectives, guided by their Informing strategy). Instructions for Execution: Analyze all gates in the chart, prioritizing prominent placements (e.g., gates in the Conscious Sun, Unconscious Sun, Conscious Earth, Unconscious Earth) while providing a framework adaptable to any gate. Use the individual's specific chart data (gates and planetary placements) to tailor each section. Write in clear, engaging, and relatable language, avoiding jargon unless explained, and include practical examples to make insights actionable. Organize the report by gate number or planetary category (e.g., all Mars gates together), ensuring a logical flow and easy navigation.";
    } else {
        $report_prompt = $report['prompt'];
    }

    // Example short placeholder:

    $profile_title = get_the_title($profile_id);
    $first_name = current(explode(' ', $profile_title)); // simplest first-name grab
    $location_value = get_post_meta($profile_id, '_hd_location', true);
    $birth_datetime = get_post_meta($profile_id, '_hd_dob', true);
    if (!$location_value) {
        $location_value = 'Not Specified'; // fallback if blank
    }
 
    // $prompt = "You are an expert in Human Design and Gene Keys. Write this report for a person named $profile_title. State their full name, date and time of birth and Location of Birth being $location_value at the beginning of the report, then throughout the report, refer to them by their first name: $first_name. The report should be at least 3,000 words and should be directed at the person whose profile it is run on. Please format your response in valid HTML with <h2>, <h3>, <p>, <ul>, <ol>. <li>, <strong> and <em> tags, rather than Markdown. Note at the beginning that this is a Human Design {$report_type} Report for $profile_title...\n\n{$report_prompt}\n\nHere is the raw chart_data from BodyGraphChart, but note it may list location as 'Unknown'. Please override that with the real location: $location_value.:\n" . print_r($chart_data, true);
    $prompt = <<<EOD
Human Design {$report_type} Report for {$profile_title}

Full Name: {$profile_title}  
Person first name : {$first_name}
Date and Time of Birth: {$birth_datetime}  
Location of Birth: {$location_value}

EOD;
    // Decrement one credit up front, since we're queueing a new report
    hd_decrement_user_credits(1);

    // Create a new hd_report in "draft" (or 'pending') status
    $profile_title = get_the_title($profile_id);
    $friendly_title = !empty($profile_title)
        ? "{$report_type} for {$profile_title}"
        : $report_type;

    $report_post_id = wp_insert_post(array(
        'post_type' => 'hd_report',
        'post_status' => 'draft',  // "placeholder" post
        'post_author' => get_current_user_id(),
        'post_title' => $friendly_title,
        'post_content' => '',        // empty for now
    ));

    if (!$report_post_id || is_wp_error($report_post_id)) {
        wp_die('Error: could not create the hd_report post.');
    }

    // Store all the data we need for the background job
    update_post_meta($report_post_id, '_hd_profile_id', $profile_id);
    update_post_meta($report_post_id, '_hd_report_type', $report_type);
    update_post_meta($report_post_id, '_hd_chart_data', $chart_data);
    update_post_meta($report_post_id, '_hd_prompt', $prompt); 
    update_post_meta($report_post_id, '_hd_report_prompt', $report_prompt); 
    update_post_meta($report_post_id, '_hd_report_status', 'pending'); // so we know it's in progress

    // Schedule the background job to run in ~10 seconds
    wp_schedule_single_event(
        current_time('timestamp') + 10,
        'hd_generate_report_event',
        array($report_post_id)
    );

    // Redirect user instantly to "My Reports" page
    wp_redirect(home_url('/members/reportapp/my-reports/'));
    exit;
}

add_action('admin_post_hd_generate_report', 'hd_generate_report');

function hd_delete_report()
{
    ;
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
