<?php



add_shortcode('report_video_lightbox_button', function ($atts) {
    $atts = shortcode_atts([
        'src' => '',
        'text' => 'Learn More',
    ], $atts);

    $video_url = trim($atts['src']);
    // Auto-convert Vimeo short links to embed

    if (preg_match('#vimeo\.com/(\d+)#', $video_url, $matches)) {
        $video_url = 'https://player.vimeo.com/video/' . $matches[1];
    }

    // Append autoplay=1 properly
    $autoplay_url = strpos($video_url, '?') !== false
        ? $video_url . '&autoplay=1'
        : $video_url . '?autoplay=1';
    ob_start();
    ?>

    <a href="javascript:void(0)" class="button open-lightbox-video" data-video-url="<?php echo esc_url($autoplay_url); ?>">
        <?php echo esc_html($atts['text']); ?>
    </a>

    <?php
    return ob_get_clean();
});

add_shortcode('video_lightbox_modal', function () {
    ob_start();
    ?>

    <div id="custom-video-lightbox"
        style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999;">
        <div style="position:relative; max-width:90%; width:1366px;">
            <button onclick="closeVideoModal()" class="btn-zentha"
                style="position:absolute; top:-40px; right:0;  color:white; padding:5px 10px; border:none; cursor:pointer;">X</button>
            <div id="video-container" style="width:100%; aspect-ratio:16/9; position:relative;">

                <!-- Spinner -->
                <div id="video-loading"
                    style="position:absolute; top:0; left:0; width:100%; height:100%; display:flex; justify-content:center; align-items:center; background:rgba(0,0,0,0.4); z-index:10;">
                    <div class="spinner"
                        style="width:40px; height:40px; border:4px solid #fff; border-top-color:transparent; border-radius:50%; animation:spin 1s linear infinite;">
                    </div>
                </div>

                <!-- Iframe -->
                <iframe id="lightbox-video" src="" frameborder="0" allowfullscreen
                    style="width:100%; height:100%; position:relative; z-index:1;"></iframe>
            </div>
        </div>
    </div>

    <style>
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        function openVideoModal(videoUrl) {
            const modal = document.getElementById('custom-video-lightbox');
            const iframe = document.getElementById('lightbox-video');
            const loader = document.getElementById('video-loading');

            loader.style.display = 'flex';
            iframe.style.visibility = 'hidden';
            iframe.src = videoUrl;
            modal.style.display = 'flex';

            iframe.onload = function () {
                loader.style.display = 'none';
                iframe.style.visibility = 'visible';
            };
        }

        function closeVideoModal() {
            const modal = document.getElementById('custom-video-lightbox');
            const iframe = document.getElementById('lightbox-video');
            const loader = document.getElementById('video-loading');

            iframe.src = '';
            iframe.style.visibility = 'hidden';
            loader.style.display = 'none';
            modal.style.display = 'none';
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.open-lightbox-video').forEach(btn => {
                btn.addEventListener('click', function () {
                    const videoUrl = this.getAttribute('data-video-url');
                    if (videoUrl) openVideoModal(videoUrl);
                });
            });
        });
    </script>
    <?php
    return ob_get_clean();
});