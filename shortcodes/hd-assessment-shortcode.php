<?php

function hd_certification_quiz_score()
{
     ob_start();
    ?>
    <div style="width: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;"
        id="hd-quiz" data-id="<?= $_GET['id'] ?? '' ?>">
        <h4>Score: <strong> <?= $_GET['score'] ?? 0 ?>/<?= $_GET['all_items'] ?? 0 ?></strong></h4>
        <h4>Percentage: <strong><?= $_GET['percentage'] ?? 0 ?>% </strong></h4>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('hd_certification_quiz_score', 'hd_certification_quiz_score');