document.addEventListener('DOMContentLoaded', function () {

    function deleteReport(e) {
        const button = e.target.closest('.btn-report-delete');
        if (!button) {
            return;
        }

        if (confirm('Are you sure you want to delete this report?')) {
            const reportId = button.getAttribute('data-report-id');
            const originalHtml = button.innerHTML;
            button.innerHTML = '<span>Processing...</span>';

            const formData = new FormData();
            formData.append('action', 'hd_delete_report');
            formData.append('report_id', reportId);
            formData.append('security', localizeHDReports.deleteReportNonce);

            fetch(localizeHDReports.ajaxUrl, {
                method: 'POST',
                body: formData,
            })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        console.error('Failed to delete report. Status:', response.status);
                        button.innerHTML = originalHtml;
                        alert('Failed to delete report. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('.btn-report-delete error:', error);
                    button.innerHTML = originalHtml;
                    alert('An error occurred while deleting the report.');
                });
        }
    }

    function createReport(e) {
        const button = e.target.closest('.btn-report-create');
        const reportType = button.getAttribute('data-report-type');
        const form = button.closest('form');

        if (!button || !form) {
            return;
        }
        Confirmation.fire({
            html: `Are you sure you want to create a "${reportType.replaceAll('_', ' ')}" report?`
        }).then((result) => {
            if (result.isConfirmed) { 
                button.innerHTML = '<span>Processing...</span>';
                form.submit();
            }
        })
    }

    document.addEventListener('click', function (e) {
        if (e.target.closest('.btn-report-delete')) {
            e.preventDefault();
            deleteReport(e);
        } else if (e.target.closest('.btn-report-create')) {
            e.preventDefault();
            createReport(e);
        }
    });
});