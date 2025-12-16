<?php

function mm_training_sidebar_shortcode()
{

    ob_start();

    // Get the current post ID to identify the active page and its term.
    $current_post_id = get_the_ID();
    $current_post_terms = get_the_terms($current_post_id, 'page-category');
    $current_post_term_slugs = array();
    if ($current_post_terms && !is_wp_error($current_post_terms)) {
        $current_post_term_slugs = wp_list_pluck($current_post_terms, 'slug');
    }
    ?>
    <style>
        .ac-header br {
            height: 0;
            width: 0;
        }
    </style>
    <div class="training-sidebar flex flex-col gap-2">
        <a href="/members/mmcertification/overview/" class="text-left px-4 font-semibold">Overview</a>
        <a href="/members/mmcertification/training/" class="text-left px-4 font-semibold">Introduction</a>

        <?php
        $terms = get_terms(array(
            'taxonomy' => 'page-category',
            'hide_empty' => true,
            'orderby' => 'term_id',
            'order' => 'ASC',
        ));
        echo '<div class="accordion-container">';
        $open_panel_index = null;
        foreach ($terms as $index => $term):
            $term_slug = $term->slug;
            $is_current_term = in_array($term_slug, $current_post_term_slugs);
            if ($is_current_term) {
                $open_panel_index = $index;
            }

            $_posts = new WP_Query(array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'page-category',
                        'field' => 'slug',
                        'terms' => $term_slug,
                    ),
                ),
                'orderby' => array('menu_order' => 'ASC')
            ));
            ?>
            <div class="ac">
                <div class="ac-header"><button type="button" class="ac-trigger"><?= esc_html($term->name) ?></button>
                </div>
                <div class="ac-panel">
                    <div class="ac-text w-full flex-col">
                        <ul>
                            <?php while ($_posts->have_posts()):
                                $_posts->the_post();
                                $li_class = (get_the_ID() === $current_post_id) ? ' class="current-page-item"' : '';
                                ?>
                                <li<?php echo $li_class; ?>><a title="<?php the_title(); ?>"
                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endforeach; ?>
    </div>
    <script>
        new Accordion(".accordion-container", {
            <?php if ($open_panel_index !== null): ?>
            openOnInit: [<?= $open_panel_index ?>]
            <?php endif; ?>
        });
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('mm_training_sidebar', 'mm_training_sidebar_shortcode');