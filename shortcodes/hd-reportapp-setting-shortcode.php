<?php
function get_business_info($user_id)
{
    $business_name = get_user_meta($user_id, 'business_name', true);
    $business_logo_id = get_user_meta($user_id, 'business_logo', true);
    $business_logo_url = $business_logo_id ? wp_get_attachment_url($business_logo_id) : '';

    return [
        'business_name' => $business_name,
        'business_logo' => $business_logo_url,
    ];
}
function business_info_shortcode()
{
    if (!is_user_logged_in()) {
        return '<p>You must be logged in to use this feature.</p>';
    }

    $user_id = get_current_user_id();
    $currentUser = wp_get_current_user();
    $display_name = trim($currentUser->display_name);
    $business_name = get_user_meta($user_id, 'business_name', true);
    $business_logo = get_user_meta($user_id, 'business_logo', true);
    $logo_url = $business_logo ? wp_get_attachment_url($business_logo) : '';

    ob_start();
    ?>
    <form id="business-info-form" method="post" enctype="multipart/form-data">
        <div
            style="display: flex;flex-direction: column;gap: 1rem; justify-content: flex-start;align-items: flex-start; width: 100%;">
            <fieldset>
                <label>Your Name:</label>
                <input type="text" name="display_name" value="<?php echo esc_attr($display_name); ?>" required>
            </fieldset>
            <fieldset>

                <label>Business Name:</label>
                <input type="text" name="business_name" value="<?php echo esc_attr($business_name); ?>" required>
            </fieldset>

            <div class="flex flex-row justify-start items-start gap-4 md:flex-nowrap">
                <fieldset>
                    <label>Business Logo (JPEG, PNG only):</label>
                    <input type="file" name="business_logo" accept="image/jpeg, image/png">
                </fieldset>
                <?php if ($logo_url): ?>
                    <img src="<?php echo esc_url($logo_url); ?>" style="max-width: 200px;">
                <?php endif; ?>
            </div>
            <fieldset>
                <?php wp_nonce_field('save_business_info', 'business_info_nonce'); ?>
                <input class="btn-zentha" type="submit" name="submit_business_info" value="Save Changes">
            </fieldset>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var fileInput = document.querySelector('input[name="business_logo"]');
            var imgPreview = document.querySelector('#business-info-form img');
            if (fileInput) {
                fileInput.addEventListener('change', function (e) {
                    var file = e.target.files[0];
                    if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
                        var reader = new FileReader();
                        reader.onload = function (ev) {
                            if (imgPreview) {
                                imgPreview.src = ev.target.result;
                            } else {
                                // If no preview exists, create one
                                var newImg = document.createElement('img');
                                newImg.style.maxWidth = '200px';
                                newImg.src = ev.target.result;
                                fileInput.parentNode.insertBefore(newImg, fileInput);
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
    <style>
        #business-info-form fieldset {
            border: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            width: 100%;
        }

        #business-info-form input[type="text"],
        #business-info-form input[type="file"] {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            line-height: 1.3;
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('hd_reportapp_setting', 'business_info_shortcode');

function handle_business_info_submission()
{
    if (!isset($_POST['business_info_nonce']) || !wp_verify_nonce($_POST['business_info_nonce'], 'save_business_info')) {
        return;
    }

    if (!is_user_logged_in() || !isset($_POST['submit_business_info'])) {
        return;
    }

    $user_id = get_current_user_id();
    $reload_page = false;

    // Save Display Name
    if (!empty($_POST['display_name'])) {
        wp_update_user([
            'ID' => $user_id,
            'display_name' => sanitize_text_field($_POST['display_name']),
        ]);
        $reload_page = true;
    }

    // Save Business Name
    if (!empty($_POST['business_name'])) {
        update_user_meta($user_id, 'business_name', sanitize_text_field($_POST['business_name']));
    }

    // Validate and Handle Business Logo Upload
    if (!empty($_FILES['business_logo']['name'])) {
        $file_type = wp_check_filetype($_FILES['business_logo']['name']);
        $allowed_types = ['jpeg', 'jpg', 'png'];

        if (!in_array($file_type['ext'], $allowed_types)) {
            wp_die('Invalid file type. Only JPEG and PNG are allowed.');
        }

        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $attachment_id = media_handle_upload('business_logo', 0);
        if (!is_wp_error($attachment_id)) {
            update_user_meta($user_id, 'business_logo', $attachment_id);
        }
    }

    if ($reload_page) {
        wp_redirect($_SERVER['REQUEST_URI']);
        exit;
    }
}

add_action('init', 'handle_business_info_submission');
