<?php

/** 
 * Shortcode to display a dropdown of stored profiles (with dynamic chart loading)
 * and a Generate Report button.
 */
function hd_all_profiles_shortcode()
{
    if (!is_user_logged_in()) {
        return '<p>Please log in to view your profiles.</p>';
    }

    // Pagination setup
    $paged = isset($_GET['profile_page']) ? max(1, intval($_GET['profile_page'])) : 1;
    $profiles_per_page = 20; // Change as needed
    $query_args = [
        'post_type' => 'hd_profile',
        'author' => get_current_user_id(),
        'posts_per_page' => $profiles_per_page,
        'paged' => $paged,
    ];
    $profile_query = new WP_Query($query_args);
    $profiles = $profile_query->posts;

    if (empty($profiles)) {
        return '<h2 style="text-align:center; margin:0.5em 0;font-size:1.6em;">No Profiles Found
        <a href="/members/reportapp/create-profile/">Create Your First Profile</a></h2>';
    }

    ob_start();
    ?>
    <div class="flex page-title flex-row justify-end items-center gap-4">
        <a href="/members/reportapp/create-profile/" class="btn-zentha"><i class="fa fa-plus mr-4"></i>Create New
            Profile</a>
    </div>

    <div class="table-view-screen flex flex-col gap-4 w-full" style="margin:0 auto;">
        <table border="1" style="border-collapse: collapse; width: 100%;">
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
            <?php foreach ($profiles as $profile): ?>
                <tr>
                    <td>
                        <?php echo esc_html($profile->post_title); ?>
                    </td>
                    <td><?php echo esc_html(get_post_meta($profile->ID, '_hd_dob', true)); ?></td>
                    <td><?php echo esc_html(get_post_meta($profile->ID, '_hd_location', true)); ?></td>
                    <td>
                        <div class="flex flex-row gap-2 justify-center items-center">
                            <a class="btn-zentha"
                                href="<?php echo esc_url('/members/reportapp/view-profile/?hd_profile_id=' . $profile->ID . '#' . base64_encode(json_encode(['Properties' => ['BirthDateLocal' => $profile->birth_date, 'GeneratedAt' => time()]]))); ?>">
                                View
                            </a>
                            <button class="btn-zentha btn-delete-profile" data-profile-id="<?php echo $profile->ID; ?>">Delete
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="grid-view-screen" style="border:1px solid gray; flex-direction: column;width: 100%; ">
        <?php foreach ($profiles as $profile): ?>
            <div
                style="display: flex; flex-direction: row; width: 100%; gap: 1rem; border-bottom: 1px solid #d3d3d3; align-items: flex-start; justify-content: space-between;">
                <div style="display: flex; flex-direction: column; flex: 1;padding: 0.4em;">
                    <h3 class="text=left w-full" style="font-size: 1.2rem; font-weight: 600;">
                        <?php echo esc_html($profile->post_title); ?>
                    </h3>
                    <h3 class="text=left w-full" style="font-size: 1rem; font-weight: 500;">
                        <?php echo esc_html(get_post_meta($profile->ID, '_hd_dob', true)); ?>
                    </h3>
                    <p class="text=left w-full" style="font-size: 1rem; font-weight: 500;">
                        <?php echo esc_html(get_post_meta($profile->ID, '_hd_location', true)); ?>
                    </p>
                </div>
                <div
                    style="width: fit-content; display: flex; flex-direction: column; gap: 0.2em;justify-content: center; align-items: center; padding: 0.4em;">
                    <a class="w-full btn-zentha"
                        href="<?php echo esc_url('/members/reportapp/view-profile/?hd_profile_id=' . $profile->ID . '#' . base64_encode(json_encode(['Properties' => ['BirthDateLocal' => $profile->birth_date, 'GeneratedAt' => time()]]))); ?>">
                        View
                    </a>
                    <button class="w-full btn-zentha btn-delete-profile" data-profile-id="<?php echo $profile->ID; ?>">Delete
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    // Pagination controls for table view
    $total_pages = $profile_query->max_num_pages;
    if ($total_pages > 1) {
        echo '<div class="profile-pagination" style="margin:1em 0;text-align:center;">';
        if ($paged > 1) {
            $prev_page = add_query_arg('profile_page', $paged - 1);
            echo '<a href="' . esc_url($prev_page) . '" style="margin-right:1em;">&laquo; Previous</a>';
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            $page_url = add_query_arg('profile_page', $i);
            echo '<a href="' . esc_url($page_url) . '" style="margin:0 0.3em;' . ($i == $paged ? 'font-weight:bold;text-decoration:underline;' : '') . '">' . $i . '</a>';
        }
        if ($paged < $total_pages) {
            $next_page = add_query_arg('profile_page', $paged + 1);
            echo '<a href="' . esc_url($next_page) . '" style="margin-left:1em;">Next &raquo;</a>';
        }
        echo '</div>';
    }
    ?>

    <style>
        .table-view-screen {
            display: flex;
        }

        .table-view-screen td,
        .table-view-screen th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table-view-screen th {
            background-color: #f2f2f2;
        }

        .table-view-screen tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .grid-view-screen {
            display: none;
        }

        @media screen and (max-width: 580px) {
            .page-title {
                justify-content: center !important;
                align-items: center !important;
                text-align: center !important;
            }

            .table-view-screen {
                display: none !important;
            }

            .grid-view-screen {
                display: flex !important;
            }
        }
    </style>

    <script>     document.addEventListener('DOMContentLoaded', function () {         const deleteProfileButtons = document.querySelectorAll('.btn-delete-profile');         deleteProfileButtons.forEach(button => {             button.addEventListener('click', function () {                 // Correct dataset usage                 let profileId = this.dataset.profileId;                 const originalHtml = button.innerHTML;                 button.disabled = true;                 button.innerHTML = '<span>Processing...</span>';
                     Confirmation.fire({                     title: 'Confirmation Required',                     text: 'Are you sure you want to delete this profile and all of its reports? This action cannot be undone.',                 }).then((result) => {                     if (result.isConfirmed) {                         const formData = new FormData();                         formData.append('action', 'delete_hd_profile');                         formData.append('profile_id', profileId);                         formData.append('security', '<?php echo wp_create_nonce('delete_profile_nonce'); ?>');
                             fetch('<?php echo admin_url('admin-ajax.php'); ?>', {                             method: 'POST',                             body: formData,                         })                             .then(response => {                                 if (response.ok) {                                     window.location.reload();                                 } else {                                     console.error('Failed to delete profile. Status:', response.status);                                     button.innerHTML = originalHtml;                                     button.disabled = false;                                     alert('Failed to delete profile. Please try again.');                                 }                             })                             .catch(error => {                                 console.error('.btn-delete-profile error:', error);                                 button.innerHTML = originalHtml;                                 button.disabled = false;                                 alert('An error occurred while deleting the profile.');                             });                     } else {                         button.innerHTML = originalHtml;                         button.disabled = false;                     }                 });             });         });     });
    </script>

    <?php
    return ob_get_clean();
}
add_shortcode('hd_all_profiles', 'hd_all_profiles_shortcode');