
jQuery(function ($) {
    /******************************************************
     * 1. AJAX Submission for #create-profile-form (unchanged)
     ******************************************************/
    $('#create-profile-form').on('submit', function (e) {
        e.preventDefault(); // Prevent normal form post

        // Get form data from the form fields
        var formData = {
            timezone: $('#timezone').val(),
            dob_date: $('#dob_date').val(),
            dob_time: $('#dob_time').val(),
            name: $('#name').val(),
            location: $('#location').val(),
            action: 'create_hd_profile',
            create_hd_profile_nonce: $('#create_hd_profile_nonce').val()
        };
        console.log(formData)
        // Validate required fields
        var timezoneRegex = /^[A-Za-z]+\/[A-Za-z_\-]+$/;
        if (!formData.timezone || !timezoneRegex.test(formData.timezone)) {
            Toast.fire({
                title: 'Error',
                text: 'Invalid place of birth location. Search and select a valid location.',
                icon: 'error'
            });
            return;
        }
        if (!formData.dob_date) {
            Toast.fire({
                title: 'Error',
                text: 'Date of birth is required.',
                icon: 'error',
            });
            return;
        }
        if (!formData.dob_time) {
            Toast.fire({
                title: 'Error',
                text: 'Time of birth is required.',
                icon: 'error',
            });
            return;
        }
        if (!formData.name) {
            Toast.fire({
                title: 'Error',
                text: 'Name is required.',
                icon: 'error',
            });
            return;
        }

        // If all validations pass, submit via AJAX
        $.post(localizeCreateForm.ajaxUrl, formData, function (response) {
            if (response.success) {
                // Show success message, then redirect after short delay 
                Toast.fire({
                    title: 'Success',
                    text: response.data.message,
                    icon: 'success',
                })
                if (response.data.redirect_url) {
                    setTimeout(function () {
                        window.location.href = response.data.redirect_url;
                    }, 1500); // 1.5s delay for user to see message
                }
            } else {
                // Show error message from server, or fallback
                var errorMsg = (response.data && response.data.message) ? response.data.message : 'An unknown error occurred.';
                $('#response-message')
                    .text(errorMsg)
                    .css('color', 'red');
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            // Show AJAX/network error
            var errorMsg = 'Request failed: ' + textStatus + ' / ' + errorThrown;
            $('#response-message')
                .text(errorMsg)
                .css('color', 'red');
        });
    });

    /******************************************************
     * 2. Initialize location + timezone typeahead (unchanged)
     ******************************************************/
    if ($('#create-profile-form').length) {
        var api_key = '8130ba42-f2a8-42ec-80c2-5af0d738af62';
        $('#api_key').on('input paste', function () {
            api_key = $(this).val();
        });

        // (Dropdown generation code here …)
        // Initialize typeahead for #location
        var locations = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: 'https://api.bodygraphchart.com/v210502/locations?query=%QUERY&api_key=' + api_key,
                wildcard: '%QUERY'
            },
            limit: 10
        });
        locations.initialize();

        $('#location').typeahead({
            hint: true,
            highlight: true,
            minLength: 2
        }, {
            name: 'city',
            displayKey: 'value',
            source: locations.ttAdapter(),
            limit: 20,
            templates: {
                empty: function (ctx) {
                    var encodedStr = ctx.query.replace(/[\u00A0-\u9999<>\&]/gim, function (i) {
                        return '&#' + i.charCodeAt(0) + ';';
                    });
                    return '<div class="tt-suggestion">Sorry, no location names match <b>' + encodedStr + '</b>.</div>';
                },
                suggestion: function (ctx) {
                    var country = ctx.country || '';
                    var s = '<p><strong>' + ctx.asciiname + '</strong>';
                    if (country && typeof ctx.admin1 === 'string' && ctx.admin1.length > 0 && ctx.admin1.indexOf(ctx.asciiname) != 0) {
                        country = ctx.admin1 + ', ' + country;
                    }
                    if (country) {
                        country = ' - <small>' + country + '</small>';
                    }
                    return s + country + '</p>';
                }
            }
        });

        $('#location').on('typeahead:selected', function (evt, item) {
            $('#timezone').val(item.timezone);
        });
    }
});
