<?php

/**
 * --- Credit Management Functions ---
 */

/**
 * Get current user's credit balance.
 *
 * @return int
 */
function hd_get_user_credits()
{
    $user_id = get_current_user_id();
    $credits = get_user_meta($user_id, 'hd_user_credits', true);
    if ($credits === '') {
        $credits = 0;
    }
    return intval($credits);
}

/**
 * Decrement current user's credits by a given amount (default 1).
 *
 * @param int $amount
 * @return int New credit balance.
 */
function hd_decrement_user_credits($amount = 1)
{
    $user_id = get_current_user_id();
    $credits = hd_get_user_credits();
    $new_credits = max(0, $credits - $amount);
    update_user_meta($user_id, 'hd_user_credits', $new_credits);
    return $new_credits;
}

/**
 * Shortcode to display the user's current credit balance.
 *
 * Usage: [hd_user_credits]
 */
function hd_user_credits_shortcode($atts)
{
    if (!is_user_logged_in()) {
        return '';
    }

    $atts = shortcode_atts(
        array(
            'buymore' => 'false',
        ),
        $atts,
        'hd_user_credits'
    );

    $credits = hd_get_user_credits();
    $output = '<div class="hd-user-credits text-center"><span  style="margin-right:5px;">Your Credits: <b>' . esc_html($credits) . '</b></span>';

    if ($atts['buymore'] === 'true') {
        $output .= ' (<a href="/members/reportapp/add-credits/" target="_blank"><i class="fa fa-cart-plus"></i> Credits</a>)';
    }

    $output .= '</div>';

    return $output;
}

add_shortcode('hd_user_credits', 'hd_user_credits_shortcode');

function hd_user_credits_nav_shortcode()
{
    if (!is_user_logged_in()) {
        return '';
    }

    $credits = hd_get_user_credits();
    $output = '<span style="font-style:normal;font-weight:700;" class="wp-block-navigation-item whitespace-nowrap wp-block-navigation-link wp-container-content-9cfa9a5a"><a class="wp-block-navigation-item__content" href="/members/reportapp/add-credits/"><span class="wp-block-navigation-item__label"><b>' . esc_html($credits) . '</b> (<i class="fa fa-cart-plus"></i> Credits)</span></a></span>';
    return $output;
}

add_shortcode('hd_user_credits_nav', 'hd_user_credits_nav_shortcode');