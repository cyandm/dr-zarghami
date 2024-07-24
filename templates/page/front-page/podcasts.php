<?php
$page_id = get_option('page_on_front');
$allPodcasts = get_field('choose_podcasts', $page_id);

$term_query = new WP_Query(
    array(
        'post_type' => 'podcast',
        'posts_per_page' => 4,

    )
);
?>
<section class="container">
    <div class="flex justify-between">
        <div class="title">
            <h2><?= get_field('podcasts_section_title'); ?></h2>
            <p><?= get_field('podcasts_section_subtitle'); ?></p>
        </div>
        <a href="<?= get_field('about_button_link'); ?>" class="btn-b">مشاهده همه</a>
    </div>



    <div class="grid grid-cols-4 gap-4 pc">
        <?php
        while ($term_query->have_posts()) :
            $term_query->the_post();
            $post_id = get_the_ID(); ?>
            <div>

                <?php get_template_part('templates/components/podcast-cart', null, ['post_id' => $post_id]); ?>

            </div>
        <?php endwhile; ?>
    </div>

    <!--        -------------------------------small view -->
    <div class="container swiper front-blogs-slider  mobile">
        <div class="swiper-wrapper blogs-row">
            <?php
            while ($term_query->have_posts()) :
                $term_query->the_post();
                $post_id = get_the_ID(); ?>
                <div class=" swiper-slide">

                    <div>

                        <?php get_template_part('templates/components/podcast-cart', null, ['post_id' => $post_id]); ?>

                    </div>

                    <?php wp_reset_postdata() ?>

                </div>
            <?php endwhile; ?>



        </div>
        <div class="swiper-pagination"></div>

    </div>


</section>