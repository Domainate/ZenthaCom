<?php

function hd_fundamental_list()
{
    $fundamental_list = fundamentalList();
    $grouped = [];
    // Group by week number
    foreach ($fundamental_list as $key => $fundamental) {
        $week = $fundamental['week_number'];
        if (!isset($grouped[$week])) {
            $grouped[$week] = [];
        }
        $grouped[$week][] = $fundamental;
    }

    ob_start();
    foreach ($grouped as $week => $fundamentals) {
        ?>
        <div class="fundamental-week-group" id="fundamental-week-<?= $week ?>">
            <div class="wp-block-uagb-advanced-heading uagb-block-9c1c610a mb-4">
                <h4 class="uagb-heading-text">Week #<?= $week ?></h4>
            </div>
            <style>
                @media (max-width: 600px) {
                    .week-wrapper {
                        grid-template-columns: 1fr !important;
                    }
                }

                @media (min-width: 601px) and (max-width: 900px) {
                    .week-wrapper {
                        grid-template-columns: repeat(2, 1fr) !important;
                    }
                }

                @media (min-width: 901px) {
                    .week-wrapper {
                        grid-template-columns: repeat(3, 1fr) !important;
                    }
                }
            </style>
            <div class="week-wrapper" style="display:grid;gap:24px;margin-bottom:32px;grid-template-columns:repeat(3,1fr);">
                <?php foreach ($fundamentals as $key => $fundamental) { ?>
                    <div id="fundamental-<?= $week ?>-<?= $key ?>" class="fundamental-card"
                        style="background:#fff;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.08);padding:20px;display:flex;flex-direction:column;align-items:center;">
                        <div class="uagb-container-inner-blocks-wrap flex flex-col" style="width:100%">
                            <!-- Heading -->
                            <div class="wp-block-uagb-advanced-heading uagb-block-9c1c610a" style="margin-bottom:10px;">
                                <h5 class="uagb-heading-text" style="text-align:center;"><?= $fundamental['title'] ?></h5>
                            </div>
                            <!-- Video + Buttons Container -->
                            <div class="wp-block-uagb-container flex flex-col uagb-block-d89581eb"
                                style="width:100%;padding-top:5px;gap:2px;margin:0 auto;">
                                <!-- Video Embed -->
                                <figure
                                    class="wp-block-embed is-type-video is-provider-vimeo wp-block-embed-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio"
                                    style="margin-bottom:12px;">
                                    <div class="wp-block-embed__wrapper">
                                        <iframe src="<?= $fundamental['video_url'] ?>" width="100%" height="180" frameborder="0"
                                            allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                                            style="border-radius:6px;width:100%;max-width:100%;"></iframe>
                                    </div>
                                </figure>
                                <!-- Buttons -->
                                <div class="wp-block-buttons flex flex-row justify-center gap-4 items-center"
                                    style="margin-top:10px;display:flex;gap:5px;flex-wrap:wrap;justify-content:center;">
                                    <!-- Audio Button -->
                                    <div class="wp-block-button">
                                        <a href="<?= $fundamental['audio_url'] ?>" download
                                            class="wp-block-button__link has-palomino-gold-color has-base-background-color has-text-color has-background has-link-color wp-element-button"
                                            style="background-color:#000; color:#d4af37; padding:8px 16px; border-radius:5px; text-decoration:none;">
                                            Download Audio
                                        </a>
                                    </div>
                                    <!-- Transcript Button -->
                                    <div class="wp-block-button">
                                        <a href="<?= $fundamental['transcript_url'] ?>" download
                                            class="wp-block-button__link has-palomino-gold-color has-base-background-color has-text-color has-background has-link-color wp-element-button"
                                            style="background-color:#000; color:#d4af37; padding:8px 16px; border-radius:5px; text-decoration:none;">
                                            Download Transcript
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php $i++; ?>
    <?php
    }
    return ob_get_clean();
}

add_shortcode('hd_fundamental_list', 'hd_fundamental_list');