<?php

/* Template Name: Services Page */

get_header();


$page_id = get_queried_object_id();

$query_arg = array(
    'posts_per_page' => -1,
    'post_type' => 'service',
    'orderby' => array(
        'date' => 'DE',
        'menu_order' => 'ASC',
    ),
    'post_status' => 'publish',
);
$allServices = new WP_Query($query_arg);

$hero_img = get_field('hero_img');
$hero_title = get_field('hero_title');
$hero_text = get_field('hero_text');

?>
<main class=" main services" id="service-overview">
    <section class="services-section-page">
        <div class="service-hero">
            <div class="custom-column image-column" style="background: url(<?= $hero_img ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
                <div class="custom-column content-column container">
                    <h1 class="h1"><?= $hero_title ?></h1>
                    <div class="excerpt-content"><?= $hero_text ?></div>
                </div>
            </div>

        </div>

    </section>
    <?php if ($allServices->have_posts()) :
        $counter = 0;
        while ($allServices->have_posts()) : $allServices->the_post();
            $serviceId = get_the_ID();
            if (get_field('service_description_front', $serviceId) && get_field('service_image', $serviceId)) : ?>
                <?php $subServices = get_field('sub_service_repeater', $serviceId); ?>
                <section class="about-service-section <?= ($counter % 4 == 0) ? 'even-section' : 'odd-section' ?>">
                    <div class="service-content container">
                        <div class="image">
                            <?php $thumbnail_id = get_field('service_image', $serviceId); ?>
                            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
                        </div>

                        <div class="content">
                            <h2 class="h2"><?= get_the_title(); ?></h2>
                            <div class="excerpt-service"> <?= get_field('service_description_front', $serviceId) ?></div>
                            <div class="btn-content">
                                <a href="<?= get_permalink($serviceId); ?>" class="btn-b">اطلاعات بیشتر</a>
                            </div>
                        </div>
                    </div>
                </section>
    <?php $counter++;
            endif;
        endwhile;
    endif;
    wp_reset_query(); ?>
</main>


<?php get_footer(); ?>