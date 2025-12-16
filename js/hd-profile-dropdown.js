jQuery(document).ready(function ($) {

    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    let currentId = getUrlParameter('hd_profile_id');
    console.log('loaded with : ' + currentId);

    // Load profile data via AJAX
    function loadProfile(profileId) {
        if (profileId === '' || typeof profileId === 'undefined') {
            $('#hd_profile_data').html('');
            return;
        }
        $.ajax({
            url: hdProfileDropdown.ajaxUrl,
            type: 'POST',
            data: {
                action: 'hd_get_profile_data',
                profile_id: profileId,
                security: hdProfileDropdown.profileDataNonce
            },
            beforeSend: function () {
                $('#hd_profile_data').html('<p>Loading...</p>');
            },
            success: function (response) {
                $('#hd_profile_data').html(response);
            },
            error: function (xhr, status, error) {
                $('#hd_profile_data').html('<p>An error occurred: ' + error + '</p>');
            }
        });
    }

    // Initialize elements
    const profileSelect = document.getElementById('hd_profile_dropdown_report');
    const profileName = document.getElementById('profile-name');
    const profileDob = document.getElementById('profile-dob');
    const profileLocation = document.getElementById('profile-location');
    const reportOptions = document.getElementById('report-options');
    const form = document.getElementById('hd_report_form');
    const existingReportsSec = document.getElementById('existing-reports-section');
    const existingReportsList = document.getElementById('existing-reports-list');
    const newReportsSec = document.getElementById('new-reports-section');
    const reportTypeInput = document.getElementById('hd_report_type_input');
    const overlay = document.getElementById('report-spinner-overlay');
    const viewChartBtn = document.getElementById('view-profile-btn');


    function fetchReportsExcepts(profileId) {
        let data = new FormData();
        data.append('action', 'get_hd_profile_reportables');
        data.append('profile_id', profileId);
        data.append('security', hdProfileDropdown.profileReportableNonce);

        fetch(hdProfileDropdown.ajaxUrl, {
            method: 'POST',
            body: data
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(result => {
                if (!result.success) {
                    reportOptions.innerHTML = '<p class="error-message">Error fetching new reports: ' +
                        (result.data || 'Unknown Error') + '</p>';
                    return;
                }
                const escapeHTML = str => {
                    const div = document.createElement('div');
                    div.textContent = str;
                    return div.innerHTML;
                };
                const createReportOption = (r) => {
                    return `<div id="rt-${escapeHTML(r.report_type || '')}" style="width: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center; gap: 1rem; padding: 1rem; border-bottom: 1px solid #ccc;">
                                <img src="${r.image}" width="70" style="object-fit: contain; aspect-ratio: auto;" />
                                <div style="display: flex; flex-direction: column; gap: 0.5rem; justify-content: flex-start; align-items: flex-start; padding: 0.25rem; flex: 1 1 0%; ">
                                    <strong style="font-weight:bold;">${escapeHTML(r.title || '')}</strong>
                                    <span style="font-size:0.9em;">${escapeHTML(r.description || '')}</span>
                                </div>
                                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <button class="create-report-option" data-report-type="${escapeHTML(r.report_type || '')}">Create</button>
                                </div>
                            </div>`;
                }
                const list = result.data;
                if (!list || !Object.values(list).length) {
                    reportOptions.innerHTML = '<p class="no-reports"><em>No more new reports for this profile.</em></p>';
                } else {
                    reportOptions.innerHTML = Object.values(list).map(createReportOption).join('');
                }
            })
            .catch(error => {
                console.error('Error fetching reportables:', error);
                reportOptions.innerHTML = '<p class="error-message">Failed to load reports. Please try again.</p>';
            })
            .finally(() => {
                /* Clicking on a "create-report-option" button => sets hidden field & submits form */
                document.querySelectorAll('.create-report-option').forEach(function (link) {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();
                        // Make sure a profile is actually selected
                        if (!profileSelect.value || profileSelect.value === 'create_new') {
                            alert('Please select a profile first.');
                            return;
                        }
                        // Set the hidden input with the chosen report type
                        const chosenReport = link.getAttribute('data-report-type');
                        reportTypeInput.value = chosenReport;
                        // Optionally show a spinner if you want here as well
                        // e.g. overlay.style.display = 'block';
                        // Submit the form
                        form.submit();
                    });
                });
            });
    }

    // AJAX to get existing hd_report posts for that profile
    function fetchExistingReports(profileId) {
        // Basic "Loading..." message
        existingReportsList.innerHTML = '<p>Loading...</p>';
        existingReportsSec.style.display = 'block';

        let data = new FormData();
        data.append('action', 'hd_get_reports_for_profile');
        data.append('profile_id', profileId);
        data.append('security', hdProfileDropdown.profileDataNonce);

        fetch(hdProfileDropdown.ajaxUrl, {
            method: 'POST',
            body: data
        })
            .then(response => response.json())
            .then(result => {
                if (!result.success) {
                    // If server returned an error
                    existingReportsList.innerHTML = '<p>Error fetching reports: ' + (result.data || 'Unknown Error') + '</p>';
                    newReportsSec.style.display = 'block';
                    return;
                }

                const escapeHTML = str => {
                    const div = document.createElement('div');
                    div.textContent = str;
                    return div.innerHTML;
                };
                const createReportOption = (r) => {
                    return `<div class="report-option" data-report-type="${escapeHTML(r.report_type || '')}" style="width: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center; gap: 1rem; padding: 1rem; border-bottom: 1px solid #ccc;">
                                <img src="${r.image}" width="70" style="object-fit: contain; aspect-ratio: auto;" />
                                <div style="display: flex; flex-direction: column; gap: 0.5rem; justify-content: flex-start; align-items: flex-start; padding: 0.25rem; flex: 1 1 0%; ">
                                    <strong style="font-weight:bold;">${escapeHTML(r.title || '')}</strong>
                                    <span style="font-size:0.9em;">${escapeHTML(r.description || '')}</span>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 0.5rem; justify-content: center; align-items: center;">
                                            <a href="${r.url}" data-url="${r.url}" style="width: 100%;" class="existing-report-link">
                                                <button class="view-report-btn" style="width: 100%;">View</button>
                                            </a>
                                            <button data-id="${r.id}" class="delete-report-btn" style="width: 100%;">Delete</button>
                                        </div>
                            </div>`;
                }

                const reports = result.data; // array of {id, title, url}
                if (!reports || !reports.length) {
                    existingReportsList.innerHTML = '<p><em>No existing reports for this profile.</em></p>';
                } else {
                    existingReportsList.innerHTML = reports.map(createReportOption).join('');
                }

                // Show "existing reports" section
                existingReportsSec.style.display = 'block';
                // Show new report creation
                newReportsSec.style.display = 'block';

                // Attach click event for each existing report link
                document.querySelectorAll('.existing-report-link').forEach(function (link) {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();
                        // Show the overlay spinner
                        overlay.style.display = 'block';
                        // Go to the report link after a short delay (or immediately)
                        const targetUrl = link.getAttribute('data-url');
                        setTimeout(function () {
                            window.location.href = targetUrl;
                        }, 600);
                    });
                });
                document.querySelectorAll('.delete-report-btn').forEach(function (link) {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();
                        if (confirm('Are you sure you want to delete this report?')) {
                            $.ajax({
                                url: hdProfileDropdown.ajaxUrl,
                                type: 'POST',
                                data: {
                                    action: 'hd_delete_report',
                                    report_id: e.target.getAttribute('data-id'),
                                    security: hdProfileDropdown.deleteReportNonce
                                },
                                beforeSend: function () {
                                    $(e.target).html('<span>Processing...</span>');
                                },
                                success: function (response) {
                                    window.location.reload();
                                },
                                error: function (xhr, status, error) {
                                    console.log('.delete-report-btn error:', error)
                                }
                            });
                        }
                    });
                });
            })
            .catch(err => {
                existingReportsList.innerHTML = '<p>Error: ' + err + '</p>';
                newReportsSec.style.display = 'block';
            });
    }

    function fetchProfileDetails(profileId) {
        if (!profileId || profileId === 'create_new') return;

        let data = new FormData();
        data.append('action', 'hd_fetch_profile_details');
        data.append('profile_id', profileId);
        data.append('security', hdProfileDropdown.profileDataNonce);

        fetch(hdProfileDropdown.ajaxUrl, {
            method: 'POST',
            body: data
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    profileName.innerText = 'Profile: ' + result.data.name;
                    profileDob.innerText = 'Date of Birth: ' + result.data.dob;
                    profileLocation.innerText = 'Location: ' + result.data.location;

                    // Show the profile details
                    profileName.style.display = 'block';
                    profileDob.style.display = 'block';
                    profileLocation.style.display = 'block';

                    // Update dropdown selection
                    if (profileSelect) {
                        profileSelect.value = profileId;
                    }
                } else {
                    console.error(result.data);
                }
            })
            .catch(error => console.error('Error fetching profile details:', error));
    }

    // Event listeners
    $('#hd_profile_dropdown_report').on('change', function () {
        const profileValue = $(this).val();

        if (profileValue !== '' && typeof profileValue !== 'undefined' && profileValue !== 'create_new') {
            loadProfile(profileValue);
        }
    });

    profileSelect && profileSelect.addEventListener('change', function () {
        const val = this.value;
        // Hide sections initially
        existingReportsSec.style.display = 'none';
        existingReportsList.innerHTML = '';
        newReportsSec.style.display = 'none';

        // If user chooses "create new" => redirect
        if (val === 'create_new') {
            window.location.href = hdProfileDropdown.createProfileUrl;
            return;
        }
        if (!val) {
            // If blank, do nothing
            return;
        }
        // We have a valid profile ID => fetch existing reports
        fetchProfileDetails(val);
        fetchReportsExcepts(val);
        fetchExistingReports(val);
    });

    function onHdProfileIdChange() {
        // Check for ?hd_profile_id= in the URL and fetch profile details if present
        const urlProfileId = getUrlParameter('hd_profile_id');
        if (urlProfileId) {
            console.log('onHdProfileIdChange triggered')
            loadProfile(urlProfileId);
            fetchProfileDetails(urlProfileId);
            fetchReportsExcepts(urlProfileId);
            fetchExistingReports(urlProfileId);
        }
    }

    // Optional: Check on initial page load
    onHdProfileIdChange();

    // If a profile was pre-selected, load existing reports automatically
    if (hdProfileDropdown.selectedProfile && hdProfileDropdown.selectedProfile !== '') {
        profileSelect.value = hdProfileDropdown.selectedProfile;
        fetchProfileDetails(hdProfileDropdown.selectedProfile);
        fetchExistingReports(hdProfileDropdown.selectedProfile);
        fetchReportsExcepts(hdProfileDropdown.selectedProfile);
    }

    $(document).on('click', '#close-lightbox', function () {
        $('#profile-lightbox').fadeOut();
    });

    $(document).on('click', '#profile-lightbox', function (e) {
        if ($(e.target).is('#profile-lightbox')) {
            $('#profile-lightbox').fadeOut();
        }
    });

});
