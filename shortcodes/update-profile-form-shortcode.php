<?php
function update_profile_form_shortcode($atts)
{
    $atts = shortcode_atts([
        'submit_label' => 'Update Profile'
    ], $atts);

    if (!is_user_logged_in()) {
        return '<p>Please log in to update your profile.</p>';
    }

    $user_id = get_current_user_id();
    $profile_id = get_user_meta($user_id, 'hd_profile_id', true);

    if (!$profile_id) {
        return '<p>No profile found to update.</p>';
    }

    wp_enqueue_style('typeahead-style', get_stylesheet_directory_uri() . '/css/selectize.css');
    wp_enqueue_script('typeahead-script', get_current_theme_url() . '/js/typeahead.bundle.js', [], null, true);
    wp_enqueue_script('update-profile-form-script', get_current_theme_url() . '/js/update-profile.js', [], null, true);

    wp_localize_script('update-profile-form-script', 'localizeUpdateForm', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'profileId' => $profile_id,
    ]);

    $profile_data = get_post_meta($profile_id);
    $name = $profile_data['name'][0] ?? '';
    $location = $profile_data['location'][0] ?? '';
    $dob_date = isset($profile_data['dob_date'][0]) ? date('Y-m-d', strtotime($profile_data['dob_date'][0])) : '';
    $dob_time = $profile_data['dob_time'][0] ?? '';


    ob_start();
    ?>
    <section>
        <form class="birth-date" id="update-profile-form" method="post">
            <input type="hidden" name="action" value="update_hd_profile" />
            <input type="hidden" name="profile_id" value="<?php echo esc_attr($profile_id); ?>" />
            <?php wp_nonce_field('update_hd_profile', 'update_hd_profile_nonce'); ?>

            <fieldset>
                <label for="name">Name *:</label>
                <input type="text" id="name" name="name" value="<?php echo esc_attr($name); ?>" required />
            </fieldset>

            <fieldset>
                <label for="location">Place of Birth *:</label>
                <input type="text" id="location" name="location" value="<?php echo esc_attr($location); ?>" required />
            </fieldset>

            <fieldset>
                <input type="hidden" id="timezone" name="timezone" value="" />
                <label for="dob">Date of Birth *:</label>
                <div class="flex flex-row gap-2 justify-between items-center">
                    <input type="date" id="dob_date" name="dob_date" value="<?php echo esc_attr($dob_date); ?>" required />
                    <input type="time" id="dob_time" name="dob_time" value="<?php echo esc_attr($dob_time); ?>" required />
                </div>
            </fieldset>

            <fieldset>
                <small>* Required fields</small>
                <input type="submit" class="btn-zentha w-full" id="submit-custom-form" value="<?php echo esc_attr($atts['submit_label']); ?>" />
            </fieldset>
        </form>
        <div id="response-message" style="margin-top:10px;color:green;font-weight:bold;"></div>
    </section>
    <style>
        #update-profile-form fieldset {
            display: flex;
            flex-direction: column;
            border: none;
        }

        #update-profile-form fieldset input[type="text"],
        #update-profile-form fieldset input[type="date"],
        #update-profile-form fieldset input[type="time"] {
            padding: 5px !important;
            width: 100%;
            border-radius: 5px;
        }

        #update-profile-form .twitter-typeahead input {
            width: 100%;
            padding: 5px;
        }

        .tt-menu {
            background: #fff;
            width: 100%;
            border: 1px solid #dede;
        }

        .tt-menu .tt-dataset {
            display: flex;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }

        .tt-menu .tt-dataset .tt-selectable {
            padding: 5px;
        }

        .tt-menu .tt-dataset .tt-selectable:hover {
            background-color: #dedede;
        }
    </style>
    <?php
    return ob_get_clean();
}

add_shortcode('update_profile_form', 'update_profile_form_shortcode');
