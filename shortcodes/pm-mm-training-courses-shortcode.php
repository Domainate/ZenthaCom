<?php

function mm_training_by_day()
{
    ob_start();

    ?>
    <section class="flex flex-col gap-4">
        <div class="container py-4 flex flex-col">
            <div class="flex flex-col justify-center items-center p-4">
                <?php if (get_field('heading_title')): ?>
                    <h3 class="heading-title" style="text-align: center;"><?php the_title(); ?></h3>
                <?php endif; ?>
            </div>

            <div class="flex flex-col gap-2 p-4">
                <h4 class="lesson-title text-center w-full font-bold uppercase"><?php the_field('heading_title'); ?></h4>
                <?php if (get_field('dashboard_video_source')): ?>
                    <div class="w-full flex flex-col justify-center items-center text-center">
                        <div style="width: 100%; aspect-ratio: 16 / 9;max-width:845px;margin:0auto;">
                            <iframe src="<?php the_field('dashboard_video_source'); ?>" title="Dashboard Video" allowfullscreen
                                style="width: 100%; height: 100%; border:none;"></iframe>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (get_field('audio_first') || get_field('transcripts_first') || get_field('slides_first')): ?>
                    <p class="w-full text-center">
                        Right-click and click “Save As” to download the files below:
                    </p>
                <?php endif; ?>

                <div class="flex flex-col gap-2 justify-start items-start flex-wrap w-full mx-auto"
                    style="max-width: 875px;">
                    <!-- slides section start here -->
                    <?php if (get_field('audio_first')): ?>
                        <?php $audio_f = get_field('audio_first'); ?>
                        <a href="<?php echo $audio_f; ?>" class="flex flex-row  justify-center items-center gap-2" download>
                            <img src="https://zentha.com/wp-content/uploads/2024/10/mp3.png" style="height: 40px;"
                                alt="audio" />
                            <span>Audio <?php the_field('heading_title'); ?>         <?php the_title(); ?>
                            </span>
                        </a>
                    <?php endif; ?>

                    <!-- transcripts section start here -->
                    <?php if (get_field('transcripts_first')): ?>
                        <?php $transcripts_f = get_field('transcripts_first'); ?>
                        <a href="<?php echo $transcripts_f; ?>" class="flex flex-row  justify-center items-center gap-2"
                            download>
                            <img src="https://zentha.com/wp-content/uploads/2024/10/mp3.png" style="height: 40px;"
                                alt="transcript" />
                            <span>Transcript <?php the_field('heading_title'); ?>         <?php the_title(); ?></span>
                        </a>
                    <?php endif; ?>

                    <!-- slides section start here -->
                    <?php if (get_field('slides_first')): ?>
                        <?php $slides_f = get_field('slides_first'); ?>
                        <a href="<?php echo $slides_f; ?>" class="flex flex-row  justify-center items-center gap-2" download>
                            <img src="https://zentha.com/wp-content/uploads/2024/10/pdf.png" alt="slides"
                                style="height: 40px;" />
                            <span>Curriculum <?php the_field('heading_title'); ?>         <?php the_title(); ?></span>
                        </a>
                    <?php endif; ?>

                    <!-- slides section start here -->
                    <?php if (get_field('document_file_f')): ?>
                        <?php $document_file_f = get_field('document_file_f'); ?>
                        <a href="<?php echo $document_file_f; ?>" class="flex flex-row  justify-center items-center gap-2"
                            download>
                            <img src="https://zentha.com/wp-content/uploads/2024/10/doc.png" alt="slides"
                                style="height: 40px;" />
                            <span>Worksheet <?php the_field('heading_title'); ?>         <?php the_title(); ?></span>
                        </a>
                    <?php else: ?>
                        <div class="w-full flex flex-row justify-start items-center gap-2">
                            <img src="https://zentha.com/wp-content/uploads/2024/10/doc.png" alt="slides"
                                style="height: 40px;" />
                            <p class="">Note: There is no worksheet for today's training</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <?php if (get_field('heading_title_two')): ?>
                <div class="flex flex-col w-full gap-2 justify-start items-start p-4 mt-4">
                    <h4 class="text-center w-full font-bold uppercase"><?php the_field('heading_title_two'); ?></h4>

                    <?php if (get_field('dashboard_video-source_two')): ?>
                        <div class="flex w-full justify-center items-center">
                            <div style="width: 100%; aspect-ratio: 16 / 9;max-width:845px;margin:0auto;">
                                <iframe src="<?php the_field('dashboard_video-source_two'); ?>" title="Dashboard Video"
                                    allowfullscreen style="width: 100%; height: 100%; border:none;"></iframe>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('audio') || get_field('transcripts') || get_field('slides')): ?>
                        <p class="w-full text-center">
                            Right-click and click “Save As” to download the files below:
                        </p>
                    <?php endif; ?>

                    <div class="flex flex-col gap-2 justify-start items-start flex-wrap w-full mx-auto"
                        style="max-width: 875px;">
                        <!-- slides section start here -->
                        <?php if (get_field('audio')): ?>
                            <?php $audio = get_field('audio'); ?>
                            <a href="<?php echo $audio; ?>" class="flex flex-row  justify-center items-center gap-2" download>
                                <img src="https://zentha.com/wp-content/uploads/2024/10/mp3.png" style="height: 40px;"
                                    alt="audio" />
                                <span>Audio <?php the_field('heading_title_two'); ?>             <?php the_title(); ?></span>
                            </a>
                        <?php endif; ?>

                        <!-- transcripts section start here -->
                        <?php if (get_field('transcripts')): ?>
                            <?php $transcripts = get_field('transcripts'); ?>
                            <a href="<?php echo $transcripts; ?>" class="flex flex-row  justify-center items-center gap-2" download>
                                <img src="https://zentha.com/wp-content/uploads/2024/10/pdf.png" style="height: 40px;"
                                    alt="transcript" />
                                <span>Transcript <?php the_field('heading_title_two'); ?>             <?php the_title(); ?></span>
                            </a>
                        <?php endif; ?>

                        <!-- slides section start here -->
                        <?php if (get_field('slides')): ?>
                            <?php $slides = get_field('slides'); ?>
                            <a href="<?php echo $slides; ?>" class="flex flex-row  justify-center items-center gap-2" download>
                                <img src="https://zentha.com/wp-content/uploads/2024/10/pdf.png" style="height: 40px;"
                                    alt="slides" />
                                <span>Curriculum <?php the_field('heading_title_two'); ?>             <?php the_title(); ?></span>
                            </a>
                        <?php endif; ?>

                        <!-- slides section start here -->
                        <?php if (get_field('document_file')): ?>
                            <?php $document_file = get_field('document_file'); ?>
                            <a href="<?php echo $document_file; ?>" class="flex flex-row  justify-center items-center gap-2"
                                download>
                                <img src="https://zentha.com/wp-content/uploads/2024/10/doc.png" style="height: 40px;"
                                    alt="slides" />
                                <span>Worksheet <?php the_field('heading_title'); ?>             <?php the_title(); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode("mm_training_by_day", "mm_training_by_day");