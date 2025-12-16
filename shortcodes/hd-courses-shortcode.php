<?php

function hdCourses()
{
    ob_start();
    $courses = [
        [
            "title" => "Introduction To Human Design For Coaches & Consultants",
            "video_url" => "https://player.vimeo.com/video/1023272244?badge=0&autopause=0&player_id=0&app_id=58479",
            "audio_url" => 'https://zentha.com/wp-content/uploads/2024/11/HD-Intro-Course-Introduction-to-Human-Design-Audio.mp3',
            "pdf_url" => 'https://zentha.com/wp-content/uploads/2024/12/Sharon-Human-Design-Chart.pdf'
        ],
        [
            "title" => "Deep Dive into Human Design Profiles",
            "video_url" => "https://player.vimeo.com/video/1034834477?badge=0&autopause=0&player_id=0&app_id=58479",
            "audio_url" => 'https://zentha.com/wp-content/uploads/2024/11/HD-Intro-Course-Deep-Diive-Into-Human-Design-Profiles.mp3',
            "pdf_url" => null
        ],
        [
            "title" => "Human Design Chart Walkthrough",
            "video_url" => "https://player.vimeo.com/video/1035024797?badge=0&autopause=0&player_id=0&app_id=58479",
            "audio_url" => 'https://zentha.com/wp-content/uploads/2024/12/HD-Intro-Course-Human-Design-Chart-Walkthrough-Audio.mp3',
            "pdf_url" => null
        ],
        [
            "title" => "Deep Dive into Human Design Profiles Part 1",
            "video_url" => "https://player.vimeo.com/video/1035016350?badge=0&autopause=0&player_id=0&app_id=58479",
            "audio_url" => 'https://zentha.com/wp-content/uploads/2024/12/HD-Intro-Course-Deep-Dive-Into-Human-Design-Profiles-Part-1-Audio.mp3',
            "pdf_url" => null
        ],
        [
            "title" => "Deep Dive into Human Design Profiles Part 2",
            "video_url" => "https://player.vimeo.com/video/1023271274?badge=0&autopause=0&player_id=0&app_id=58479",
            "audio_url" => 'https://zentha.com/wp-content/uploads/2024/10/HD-Intro-Course-Deep-Dive-Into-Human-Design-Profiles-Part-2-Audio.mp3',
            "pdf_url" => null
        ],
        [
            "title" => "Using Human Design With Clients",
            "video_url" => "https://player.vimeo.com/video/1023274549?badge=0&autopause=0&player_id=0&app_id=58479",
            "audio_url" => 'https://zentha.com/wp-content/uploads/2024/10/HD-Intro-Course-Using-Human-Design-With-Clients-Audio.mp3',
            "pdf_url" => null
        ],
        [
            "title" => "Next Steps",
            "video_url" => "https://player.vimeo.com/video/1035021859?badge=0&autopause=0&player_id=0&app_id=58479",
            "audio_url" => null,
            "pdf_url" => null
        ],
    ];
    ?>
    <style>

    </style>
    <div class="w-full grid md:grid-cols-2 grid-cols-1 gap-4">
        <?php foreach ($courses as $course): ?>
            <div class="w-full col-span-1 border border-md p-4 rounded-md shadow-sm">
                <figure
                    class="wp-block-embed is-type-video is-provider-vimeo wp-block-embed-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio"
                    style="margin-bottom:12px;">
                    <div class="wp-block-embed__wrapper">
                        <iframe src="<?= $course['video_url'] ?>" width="100%"   frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture" allowfullscreen  
                            style="border-radius:6px;width:100%;max-width:100%;min-height: 300px"></iframe>
                    </div>
                </figure>
                <h6 class="text-center"><?php echo $course['title']; ?></h6>
                <div class="w-full flex flex-row flex-no-wrap justify-center items-center gap-4">
                    <?php if ($course['audio_url'] !== null): ?>
                        <a href="<?= $course['audio_url'] ?>" download>Download Audio</a>
                    <?php endif; ?>
                    <?php if ($course['pdf_url'] !== null): ?>
                        <a href="<?= $course['pdf_url'] ?>" download target="_blank">Download PDF</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('hd_courses', 'hdCourses');