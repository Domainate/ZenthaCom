// Add this to js/birth-chart-form.js

jQuery(document).ready(function($) {
    // Set referrer from URL parameter if it exists
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    // Set initial referrer value
    $('#referrer').val(getUrlParameter('affiliate') || '');

    // Format date to UTC
    function formatToUTC(month, day, year, hour, minute, ampm) {
        let hours = parseInt(hour);
        if (ampm === 'PM' && hours !== 12) {
            hours += 12;
        } else if (ampm === 'AM' && hours === 12) {
            hours = 0;
        }
        
        // Create date in local time
        const localDate = new Date(
            parseInt(year),
            parseInt(month) - 1,
            parseInt(day),
            hours,
            parseInt(minute)
        );
        
        // Convert to UTC string
        const utcYear = localDate.getUTCFullYear();
        const utcMonth = String(localDate.getUTCMonth() + 1).padStart(2, '0');
        const utcDay = String(localDate.getUTCDate()).padStart(2, '0');
        const utcHours = String(localDate.getUTCHours()).padStart(2, '0');
        const utcMinutes = String(localDate.getUTCMinutes()).padStart(2, '0');
        
        return `${utcYear}-${utcMonth}-${utcDay} ${utcHours}:${utcMinutes}`;
    }

    // Handle form submission
    $('#hd-form').on('submit', function(e) {
        const month = $('input[name="birth_month"]').val();
        const day = $('input[name="birth_day"]').val();
        const year = $('input[name="birth_year"]').val();
        const hour = $('input[name="birth_hour"]').val();
        const minute = $('input[name="birth_minute"]').val();
        const ampm = $('select[name="birth_ampm"]').val();

        // Set UTC datetime
        const utcDateTime = formatToUTC(month, day, year, hour, minute, ampm);
        $('#utc_datetime').val(utcDateTime);
    });

    // Input validation
    $('input[name="birth_month"], input[name="birth_day"]').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length === 2) {
            $(this).next('input').focus();
        }
    });

    $('input[name="birth_year"]').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('input[name="birth_hour"], input[name="birth_minute"]').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length === 2) {
            $(this).next().focus();
        }
    });
});