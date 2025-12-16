<?php

/**
 * Add a "Credits" column to the Users admin list.
 */
function hd_add_user_credits_column($columns)
{
    $columns['hd_user_credits'] = __('Credits', 'zentha');
    return $columns;
}
/**
 * Display the credit balance in the custom column.
 */
function hd_show_user_credits_column_content($value, $column_name, $user_id)
{
    if ('hd_user_credits' === $column_name) {
        $credits = get_user_meta($user_id, 'hd_user_credits', true);
        return $credits !== '' ? intval($credits) : 0;
    }
    return $value;
}
add_filter('manage_users_custom_column', 'hd_show_user_credits_column_content', 10, 3);

/**
 * Display an extra field for credits on the user profile page.
 */
function hd_show_extra_profile_fields($user)
{
    ?>
    <h3><?php _e('Human Design Credits', 'zentha'); ?></h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="hd_user_credits"><?php _e('Credits', 'zentha'); ?></label>
            </th>
            <td>
                <input type="number" name="hd_user_credits" id="hd_user_credits"
                    value="<?php echo esc_attr(get_user_meta($user->ID, 'hd_user_credits', true)); ?>"
                    class="regular-text" /><br />
                <span class="description"><?php _e('Set the number of credits for this user.', 'zentha'); ?></span>
            </td>
        </tr>
    </table>
    <?php

}

add_action('show_user_profile', 'hd_show_extra_profile_fields');
add_action('edit_user_profile', 'hd_show_extra_profile_fields');

/**
 * Save the credit field when the user profile is updated.
 */
function hd_save_extra_profile_fields($user_id)
{
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    if (isset($_POST['hd_user_credits'])) {
        update_user_meta($user_id, 'hd_user_credits', intval($_POST['hd_user_credits']));
    }
}

add_action('personal_options_update', 'hd_save_extra_profile_fields');
add_action('edit_user_profile_update', 'hd_save_extra_profile_fields');