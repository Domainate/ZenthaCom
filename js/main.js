jQuery(function ($) {
    /******************************************************
     * 1. AJAX Submission for #custom-data-form (unchanged)
     ******************************************************/
    $('#custom-data-form').on('submit', function (e) {
        e.preventDefault(); // Prevent normal form post

        var formData = {
            action: 'save_custom_data',
            custom_form_nonce: $('input[name="custom_form_nonce"]').val(),
            name: $('#name').val(),
            location: $('#location').val(),
            timezone: $('#timezone').val(),
            dob: $('#dob').val()
        };
        if (!formData?.timezone) {
            $.toast({
                heading: 'Error',
                text: 'Invalid place of birth location. Search and select a valid location.',
                icon: 'error',
                loader: false,        // Change it to false to disable loader
                loaderBg: '#b99831',  // To change the background
                position: 'mid-center',
            })
            return;
        }
        if (!formData?.dob) {
            $.toast({
                heading: 'Error',
                text: 'Date of birth is required.',
                icon: 'error',
                loader: false,        // Change it to false to disable loader
                loaderBg: '#b99831',  // To change the background
                position: 'mid-center',
            })
            return;
        }
        if (!formData?.name) {
            $.toast({
                heading: 'Error',
                text: 'Name is required.',
                icon: 'error',
                loader: false,        // Change it to false to disable loader
                loaderBg: '#b99831',  // To change the background
                position: 'mid-center',
            })
            return;
        }

        $.post(ajax_object.ajaxurl, formData, function (response) {
            if (response.success) {
                $('#response-message')
                    .text(response.data.message)
                    .css('color', 'green');
                if (response.data.redirect_url) {
                    window.location.href = response.data.redirect_url;
                }
            } else {
                if (response.data && response.data.message) {
                    $('#response-message')
                        .text(response.data.message)
                        .css('color', 'red');
                } else {
                    $('#response-message')
                        .text('An unknown error occurred.')
                        .css('color', 'red');
                }
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            $('#response-message')
                .text('Request failed: ' + textStatus + ' / ' + errorThrown)
                .css('color', 'red');
        });
    });

    /******************************************************
     * 2. Initialize location + timezone typeahead (unchanged)
     ******************************************************/
    if ($('#custom-data-form').length) {
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

    /******************************************************
     * 3. AJAX call to load profile chart data
     ******************************************************/
    function loadProfile(profileId) {

        if (profileId === '' || typeof profileId === 'undefined') {
            $('#hd_profile_data').html('');
            return;
        }
        $.ajax({
            url: ajax_object.ajaxurl,
            type: 'POST',
            data: {
                action: 'hd_get_profile_data',
                profile_id: profileId,
                security: ajax_object.hd_profile_nonce
            },
            beforeSend: function () {
                $('#hd_profile_data').html('<p>Loading...</p>');
            },
            success: function (response) {
                console.log('load profile success', response)
                // Insert the returned markup into our container
                $('#hd_profile_data').html(response);

                // Read our encoded chart data from the hidden element
                var chartData = $('#hd-chart-data').data('chart');
                if (chartData) {
                    window.location.hash = chartData;
                }

                // Now call the chart initializer (make sure your initBodyChart function is available)
                if (typeof initBodyChart === 'function') {
                    initBodyChart();
                }
            },
            error: function (xhr, status, error) {
                $('#hd_profile_data').html('<p>An error occurred: ' + error + '</p>');
            }
        });
    }

    $('#hd_profile_dropdown').on('change', function () {
        if ($(this).val() !== '' && typeof $(this).val() !== 'undefined')
            loadProfile($(this).val());
    });

    // if ($('#hd_profile_dropdown').val() !== '' && typeof $(this).val() !== 'undefined') {
    //     loadProfile($('#hd_profile_dropdown').val());
    // }


    /******************************************************
     * 4. (Optional) Additional logic...
     ******************************************************/
});

jQuery(document).ready(function ($) {
    // When the Print button is clicked, call window.print()
    $('#print-report').on('click', function (e) {
        e.preventDefault();
        window.print();
    });

    $('img.no-lazy-load').each(function () {
        var $img = $(this);
        var dataSrc = $img.attr('data-src');
        if (dataSrc) {
            $img.attr('src', dataSrc).removeAttr('data-src').removeClass('lazy');
        }
    });

    // When the Download button is clicked, generate a PDF of the report content.
    $('#download-report').on('click', function (e) {
        e.preventDefault();
        // Add loading overlay
        if (!$('#app-loading-overlay').length) {
            $('body').append('<div id="app-loading-overlay" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;display:flex;justify-content:center;align-items:center;"><div style="color:#fff;">Generating PDF...</div></div>');
        }

        // Show hidden elements
        $('.toggle-show-screen-print').removeClass('hide-on-screen');
        // Ensure changes take effect before generating the PDF
        requestAnimationFrame(() => {
            setTimeout(function () {
                var element = document.getElementById('report-content');
                var opt = {
                    margin: 0.5,
                    filename: 'human-design-report.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                };

                // Generate PDF after DOM update
                html2pdf().set(opt).from(element).save().then(function () {
                    // Remove loading overlay
                    $('#app-loading-overlay').remove();
                    // Hide elements again after saving
                    $('.toggle-show-screen-print').addClass('hide-on-screen');
                });

            }, 200); // Short delay to ensure display update
        });
    });


    // When the Download button is clicked, generate a PDF of the chart content.
    $('#download-chart').on('click', function (e) {
        e.preventDefault();
        // Make sure the html2pdf library is loaded.
        var element = document.getElementById('bgchart-human-design-bodychart');
        var opt = {
            margin: 0.5,
            filename: 'bodygraphchart.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        // Add loading overlay
        $('body').append('<div id="app-loading-overlay" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;display:flex;justify-content:center;align-items:center;"><div style="color:#fff;">Generating PDF...</div></div>');

        html2pdf().set(opt).from(element).save().then(function () {
            // Remove loading overlay when complete
            $('#app-loading-overlay').remove();
        });
    });

});

