<?php

function hd_certification_grid()
{
    ob_start();

    $data = [
        [
            'href' => '/members/hdcertification/starthere/',
            'title' => 'Start Here',
            'image' => 'https://zentha.com/wp-content/uploads/2024/10/Layer-24-1.png',
        ],
        [
            'href' => '/members/hdcertification/onboarding/',
            'title' => 'Onboarding Call',
            'image' => 'https://zentha.com/wp-content/uploads/2024/12/onboarding.jpg',
        ],
        [
            'href' => '/members/hdintrocourse/course/',
            'title' => 'HD Intro Course',
            'image' => 'https://zentha.com/wp-content/uploads/2024/12/hdintro3.jpg',
        ],
        [
            'href' => '/members/hdcertification/fundamentals/',
            'title' => 'Human Design Fundamentals',
            'image' => 'https://zentha.com/wp-content/uploads/2024/10/Layer-26-1.png',
        ],
        [
            'href' => '/members/hdcertification/charts/',
            'title' => 'Human Design Charts',
            'image' => 'https://zentha.com/wp-content/uploads/2024/11/hdchart2.jpg',
        ],
        [
            'href' => '/members/hdcertification/officehours/',
            'title' => 'Office Hours',
            'image' => 'https://zentha.com/wp-content/uploads/2024/10/Layer-27.png',
        ],
        [
            'href' => '/members/hdcertification/books/',
            'title' => 'Books',
            'image' => 'https://zentha.com/wp-content/uploads/2024/10/Layer-29.png',
        ],
        [
            'href' => '/members/hdcertification/workshops/',
            'title' => 'Workshops',
            'image' => 'https://zentha.com/wp-content/uploads/2024/12/workshop.jpg',
        ],
        [
            'href' => '/members/hdcertification/support/',
            'title' => 'Support',
            'image' => 'https://zentha.com/wp-content/uploads/2024/10/Layer-22-1.png',
        ],
        [
            'href' => '/members/hdcertification/assessment/',
            'title' => 'Certification Assessment',
            'image' => 'https://zentha.com/wp-content/uploads/2025/04/assessment.jpg',
        ]
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

add_shortcode('hd_certification_grid', 'hd_certification_grid');