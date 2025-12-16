<?php

function mm_training_overview_shortcode()
{
    $list = [
        ['title' => 'Video #1: Introduction', 'video_url' => 'https://player.vimeo.com/video/909885219?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-1.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #2: An Introduction to Sharon Hayes', 'video_url' => 'https://player.vimeo.com/video/909885266?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-2.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #3: The GROWTHS Framework', 'video_url' => 'https://player.vimeo.com/video/909885470?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-3.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #4: Daily Content', 'video_url' => 'https://player.vimeo.com/video/909885553?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-4.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #5: Getting Support - Office Hours', 'video_url' => 'https://player.vimeo.com/video/909885629?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-5.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #6: The Books - Closing Two Gaps For Coaches & Consultants', 'video_url' => 'https://player.vimeo.com/video/909893030?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-6.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #7: Introduction', 'video_url' => 'https://player.vimeo.com/video/909893292?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-7.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #8: Certified Coach/Consultant', 'video_url' => 'https://player.vimeo.com/video/909893340?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-8.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
        ['title' => 'Video #9: What’s Next?', 'video_url' => 'https://player.vimeo.com/video/909893384?badge=0&autopause=0&player_id=0&app_id=58479', 'audio_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Money-Mastery-Certification-Overview-Video-9.mp3', 'transcript_url' => 'https://zentha.com/downloads/mm/ProfitMancer-Overview-Videos-Transcript.pdf'],
    ];
    ob_start();
    ?>
    <style>
        .stripe-even {
            background-color: #dedede66;
        }

        .stripe-odd {
            background-color: #ffffff;
        }
    </style>
    <div class="w-full flex flex-col gap-4">
        <?php foreach ($list as $key => $item): ?>
            <div class="stripe-<?= $key % 2 === 0 ? 'even' : 'odd' ?> flex flex-col py-6 justify-center items-center w-full">
                <div class="w-full flex flex-col gap-2 p-4" style="max-width: 1000px;margin:0 auto;">
                    <h4><?= $item['title'] ?></h4>
                    <div style="padding: 56.25% 0 0 0; position: relative;">
                        <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                            title="<?= $item['title'] ?>" src="<?= $item['video_url'] ?>" allowfullscreen
                            frameborder="0"></iframe>
                    </div>
                    <p class="w-full my-4 text-center">
                        Right-click and click “Save As” to download the files below:
                    </p>
                    <div class="w-full flex flex-row justify-center items-start gap-4 md:flex-nowrap flex-wrap">
                        <a class="flex flex-row justify-start items-center" href="<?= $item['transcript_url'] ?>" download>
                            <img style="margin-right: 10px;height:40px; width: auto;"
                                src="https://zentha.com/wp-content/uploads/2024/02/pdf.png" alt="transcript" />Transcript</a>

                        <a class="flex flex-row justify-start items-center" href="<?= $item['transcript_url'] ?>" download>
                            <img style="margin-right: 10px;height:40px; width: auto;"
                                src="https://zentha.com/wp-content/uploads/2024/02/mp3.png" alt="audio" /><span>Audio</span></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <?php

    return ob_get_clean();
}
add_shortcode('mm_training_overview', 'mm_training_overview_shortcode');
