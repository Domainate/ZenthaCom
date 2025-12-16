<?php

function hd_profitmancer_mm_grid()
{
    ob_start();

    $data = [
        [
            'href' => '/members/mmcertification/overview/',
            'title' => 'Overview',
            'image' => 'https://zentha.com/wp-content/uploads/2024/10/Layer-24-1.png',
        ],
        [
            'href' => '/members/mmcertification/training/', 
            'title' => 'Daily Training',
            'image' => 'https://zentha.com/wp-content/uploads/2024/12/onboarding.jpg',
        ],
        [
            'href' => '/members/mmcertification/support/', 
            'title' => 'Support',
            'image' => 'https://zentha.com/wp-content/uploads/2024/10/Layer-22-1.png',
        ],
    ];

    ?>
    <style>
        .responsive-grid {
            display: grid;
            width: 100%;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1rem;
            align-items: stretch;
        }

        /* Responsive breakpoints */
        @media (min-width: 640px) {
            .responsive-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 768px) {
            .responsive-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .grid-item {
            grid-column: span 1 / span 1;
            display: flex;
            flex-direction: column;
            min-height: 150px;
            width: 100%;
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .grid-item-content {
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: rgba(75, 85, 99, 0.5);
            padding: 0.5rem;
            min-height: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .grid-item-content h5 {
            text-align: center;
            font-weight: 600;
            color: #fff;
            line-height: 1;
        }

        .grid-item:hover h5 {
            color: #dab200;
        }
    </style>
    <div class="responsive-grid">
        <?php foreach ($data as $key => $value): ?>
            <a href="<?= $value['href'] ?>" class="grid-item" style="background-image:url('<?= $value['image'] ?>')">
                <div class="grid-item-content">
                    <h5><?= $value['title'] ?></h5>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <?php

    return ob_get_clean();
}

add_shortcode('hd_profitmancer_mm_grid', 'hd_profitmancer_mm_grid');