jQuery(document).ready(function ($) {
    const reportWrapper = document.getElementById('hd_my_report_wrapper');

    reportWrapper && reportWrapper.querySelectorAll('.delete-report-btn').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this report?')) {
                $.ajax({
                    url: ajax_object.ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'hd_delete_report',
                        report_id: e.target.getAttribute('data-id'),
                        security: ajax_object.deleteReportNonce
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
});