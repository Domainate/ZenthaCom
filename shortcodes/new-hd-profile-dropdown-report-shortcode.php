<?php

/**

 * Shortcode to display a dropdown of stored profiles (without loading the chart)

 * and a Generate Report button.

 */

function new_hd_profile_dropdown_report_shortcode()
{

    if (!is_user_logged_in()) {

        return '<p>Please log in to view your profiles.</p>';

    }



    $profiles = get_posts([

        'post_type' => 'hd_profile',

        'author' => get_current_user_id(),

        'posts_per_page' => -1,

    ]);



    if (empty($profiles)) {

        return '<p>No profiles found.</p>';

    }



    // (Optional) Pre-select a profile via ?hd_profile_id= in the URL

    $selected_profile = isset($_GET['hd_profile_id']) ? intval($_GET['hd_profile_id']) : '';



    ob_start();

    ?>

    <form id="hd_report_form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post"
        style="margin-bottom:2em;">



        <!-- The WP action for generating new reports -->

        <input type="hidden" name="action" value="hd_generate_report">

        <?php wp_nonce_field('hd_report_form', 'hd_report_nonce'); ?>



        <!-- We'll set this hidden field when user picks a new report type -->

        <input type="hidden" name="hd_report_type" id="hd_report_type_input" value="">



        <label for="hd_profile_dropdown_report"><strong>Select or Create Profile Below</strong></label><br>

        <select id="hd_profile_dropdown_report" name="hd_profile_id" required>

            <option value="">-- Select a Profile to Generate or View Reports: --</option>

            <option value="create_new">(Create New Profile)</option>

            <?php foreach ($profiles as $profile): ?>

                <option value="<?php echo esc_attr($profile->ID); ?>" <?php selected($selected_profile, $profile->ID); ?>>

                    <?php echo esc_html($profile->post_title); ?>

                </option>

            <?php endforeach; ?>

        </select>

    </form>



    <!-- Existing reports container -->

    <div id="existing-reports-section" style="display:none; margin-top:1.5em;">

        <h3>View Existing Report:</h3>

        <div id="existing-reports-list" style="padding:0;display:flex; flex-direction: column;"></div>

    </div>



    <!-- New report creation container -->

    <div id="new-reports-section" style="display:none; margin-top:2em;">

        <h3>OR Choose New Report to Create Below:</h3>

        <div id="report-options">

            <!-- do_shortcode(!empty($selected_profile) ? '[new_report profile_id="' . $selected_profile . '"]' : '[new_report]');  -->

        </div>

    </div>



    <!-- Spinner/Overlay for existing report clicks -->

    <div id="report-spinner-overlay" style="

  display: none;

  position: fixed;

  z-index: 9999;

  top: 0;

  left: 0;

  width: 100%;

  height: 100%;

  background-color: rgba(0,0,0,0.6);

  text-align: center;

">

        <div style="position: relative; top: 40%; display: inline-block;">

            <div class="spinner"></div>

            <div style="color:#fff; margin-top:10px;">Loading Report...</div>

        </div>

    </div>



    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('hd_report_form');

            const profileSelect = document.getElementById('hd_profile_dropdown_report');

            const existingReportsSec = document.getElementById('existing-reports-section');

            const existingReportsList = document.getElementById('existing-reports-list');

            const newReportsSec = document.getElementById('new-reports-section');

            const reportOptions = document.getElementById('report-options');

            const reportTypeInput = document.getElementById('hd_report_type_input');

            const overlay = document.getElementById('report-spinner-overlay');



            // On profile change

            profileSelect.addEventListener('change', function () {

                const val = this.value;



                // Hide sections initially

                existingReportsSec.style.display = 'none';

                existingReportsList.innerHTML = '';

                newReportsSec.style.display = 'none';



                if (!val) {

                    // If blank, do nothing

                    return;

                }

                // If user chooses "create new" => redirect

                if (val === 'create_new') {

                    window.location.href = 'https://zentha.com/members/reportapp/create-profile/';

                    return;

                } else {

                    console.log('profileSelect', val);

                    window.location.href = 'https://zentha.com/members/reportapp/view-profile/?hd_profile_id=' + val;

                    return;

                }

            });



            // If a profile was pre-selected in the URL, load existing reports automatically

            <?php if ($selected_profile): ?>

                if ("<?php echo esc_js($selected_profile); ?>" !== '') {

                    profileSelect.value = "<?php echo esc_js($selected_profile); ?>";

                }

            <?php endif; ?>

        });

    </script>

    <?php

    return ob_get_clean();

}

add_shortcode('new_hd_profile_dropdown_report', 'new_hd_profile_dropdown_report_shortcode');

