<?php

function create_profile_form_shortcode($atts)
{
    $atts = shortcode_atts([
        'submit_label' => 'Submit'
    ], $atts);
    if (!is_user_logged_in()) {
        return '<p>Please log in to create a profile.</p>';
    }
    wp_enqueue_style('typeahead-style', get_stylesheet_directory_uri() . '/css/selectize.css');
    wp_enqueue_script('typeahead-script', get_current_theme_url() . '/js/typeahead.bundle.js', [], null, true);
    wp_enqueue_script('create-profile-form-script', get_current_theme_url() . '/js/create-profile.js', [], null, true);

    wp_localize_script('create-profile-form-script', 'localizeCreateForm', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ]);

    ob_start();
    ?>

    <section>
        <form class="birth-date" id="create-profile-form" method="post">

            <!-- The hidden action tells WP to run create_hd_profile -->
            <input type="hidden" name="action" value="create_hd_profile" />
            <!-- Nonce for security -->
            <?php wp_nonce_field('create_hd_profile', 'create_hd_profile_nonce'); ?>

            <fieldset>
                <label for="name">Name *:</label>
                <input type="text" id="name" name="name" required placeholder="Required" />
            </fieldset>

            <fieldset>
                <label for="location">Place of Birth *:</label>
                <input type="text" id="location" name="location" required placeholder="Required" />
            </fieldset>

            <!-- Hidden timezone field, auto-filled by typeahead in create-profile.js -->
            <fieldset>
                <input type="hidden" id="timezone" name="timezone" value="" />
                <label for="dob">Date of Birth *:</label>
                <div class="flex flex-row gap-2 justify-between items-center">
                    <input type="date" id="dob_date" name="dob_date" required placeholder="1990-01-20" />
                    <input type="time" id="dob_time" name="dob_time" required placeholder="10:00 PM" />
                </div>
            </fieldset>

            <fieldset>
                <small>* Required fields</small>
                <input type="submit" class="btn-zentha w-full" id="submit-custom-form"
                    value="<?php echo esc_attr($atts['submit_label']); ?>" />
            </fieldset>
        </form>
        <div id="response-message" style="margin-top:10px;color:green;font-weight:bold;"></div>
    </section>
    <style>
        #create-profile-form fieldset {
            display: flex;
            flex-direction: column;
            border: none;
        }

        #create-profile-form fieldset input[type="text"],
        #create-profile-form fieldset input[type="date"],
        #create-profile-form fieldset input[type="time"] {
            padding: 10px !important;
            width: 100%;
            border-radius: 5px;
        }

        #create-profile-form .twitter-typeahead input {
            width: 100%;
            padding: 10px;
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

add_shortcode('create_profile_form', 'create_profile_form_shortcode');