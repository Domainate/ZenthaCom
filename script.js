const Confirmation = Swal.mixin({
    showConfirmButton: true,
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "Cancel",
    confirmButtonColor: "#b99731",
    cancelButtonColor: "#dedede",
    confirmButtonAriaLabel: "Ok",
    cancelButtonAriaLabel: "Cancel",
    theme: 'auto',
    reverseButtons: false,
    focusConfirm: false,
    focusCancel: true,
    customClass: {
        confirmButton: 'btn-zentha mr-4',
        cancelButton: 'btn-zentha-outline'
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    icon: "info",
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

const openGlobalLoader = function (message = 'Loading...') {

    // Add loading overlay
    if (!document.getElementById('app-loading-overlay')) {
        var overlay = document.createElement('div');
        overlay.id = 'app-loading-overlay';
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.background = 'rgba(0,0,0,0.5)';
        overlay.style.zIndex = '9999';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        var loadingText = document.createElement('div');
        loadingText.style.color = '#fff';
        loadingText.textContent = message;
        overlay.appendChild(loadingText);
        document.body.appendChild(overlay);
    }
}

const closeGlobalLoader = function () {
    // Remove loading overlay
    var overlay = document.getElementById('app-loading-overlay');
    if (overlay) overlay.remove();
}


document.addEventListener('DOMContentLoaded', function () {
    // When the Print button is clicked, call window.print()
    const printReportButton = document.querySelector('.btn-print-report');
    if (printReportButton)
        printReportButton.addEventListener('click', function () {
            window.print();
        });

    // When the Download button is clicked, generate a PDF of the report content.
    const downloadBtn = document.querySelector('.btn-download-report');
    if (downloadBtn)
        downloadBtn.addEventListener('click', function (e) {
            e.preventDefault();
            // Add loading overlay
            openGlobalLoader('Generating PDF...');

            // Show hidden elements
            document.querySelectorAll('.toggle-show-screen-print').forEach(function (el) {
                el.classList.remove('hide-on-screen');
            });
            // Ensure changes take effect before generating the PDF
            requestAnimationFrame(() => {
                setTimeout(function () {
                    var element = document.querySelector('.report-content');
                    if (!element) {
                        closeGlobalLoader();
                        Toast.fire({ icon: 'error', title: 'Report content not found.' });
                        return;
                    }
                    if (typeof html2pdf === 'undefined') {
                        closeGlobalLoader();
                        Toast.fire({ icon: 'error', title: 'PDF library (html2pdf) not loaded.' });
                        return;
                    }
                    var opt = {
                        margin: 0.5,
                        filename: 'human-design-report.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 1 },
                        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                    };

                    // Generate PDF after DOM update
                    html2pdf().set(opt).from(element).save().then(function () {
                        // Remove loading overlay 
                        closeGlobalLoader();

                        // Hide elements again after saving
                        document.querySelectorAll('.toggle-show-screen-print').forEach(function (el) {
                            el.classList.add('hide-on-screen');
                        });
                    }).catch(function (err) {
                        closeGlobalLoader();
                        Toast.fire({ icon: 'error', title: 'PDF generation failed.' });
                        console.error('PDF generation error:', err);
                    });

                }, 200); // Short delay to ensure display update
            });
        });


});