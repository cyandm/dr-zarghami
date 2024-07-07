<?php
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


/* Template Name: Services Page */

get_header();
?>
    <main class=" main services" id="service-overview">
        <section class="services-section-page container">
            <div class="service-hero">
                <div class="custom-column image-column">
                    <img class="img-1" src="<?= get_stylesheet_directory_uri() ?>/imgs/doctor-1.png" alt="شهران">
                    <img class="img-2" src="<?= get_stylesheet_directory_uri() ?>/imgs/virous.png" alt="شهران">
                </div>
                <div class="custom-column content-column">
                    <h1 class="h1"><?= get_field('service_title', $page_id) ?></h1>
                    <?php $content = get_the_content(); ?>
                    <div class="excerpt-content"><?= $content; ?></div>
                </div>
                <div class="service-hero-search">
                </div>
            </div>
            <div class="service-hero-images container">
                <img class="under-search-img1" src="<?= get_stylesheet_directory_uri() ?>/imgs/right-img.svg" alt="">
                <img class="under-search-img2" src="<?= get_stylesheet_directory_uri() ?>/imgs/under-search.svg" alt="">
                <img class="under-search-img3" src="<?= get_stylesheet_directory_uri() ?>/imgs/service-img.png" alt="">
            </div>
            <div id="background-wrap">
                <div class="bubble x1"></div>
                <div class="bubble x11"></div>
                <div class="bubble x22"></div>
                <div class="bubble x2"></div>
                <div class="bubble x3"></div>
                <div class="bubble x33"></div>
                <div class="bubble x4"></div>
                <div class="bubble x44"></div>
                <div class="bubble x55"></div>
                <div class="bubble x6"></div>
                <div class="bubble x66"></div>
                <div class="bubble x77"></div>
                <div class="bubble x8"></div>
                <div class="bubble x88"></div>
                <div class="bubble x9"></div>
                <div class="bubble x99"></div>
                <div class="bubble x10"></div>
                <div class="bubble x1010"></div>
            </div>
        </section>
        <?php if ($allServices->have_posts()) :
            $counter = 0;
            while ($allServices->have_posts()) : $allServices->the_post();
                $serviceId = get_the_ID();
                if (get_field('service_description_front', $serviceId) && get_field('service_image', $serviceId)) : ?>
                    <?php $subServices = get_field('sub_service_repeater', $serviceId); ?>
                    <section class="about-service-section <?= ($counter % 2 == 0) ? 'even-section' : 'odd-section' ?>">
                        <div class="service-content container">
                            <div class="image">
                                <?php $thumbnail_id = get_field('service_image', $serviceId); ?>
                                <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
                            </div>
                            <?php
                            if (is_array($subServices) && count($subServices) > 0) : ?>
                                <div class="sub-services-slide ticker-conteiner">
                                    <ul class="sub-services ticker-custom">
                                        <?php foreach ($subServices as $subService) :
                                            if ($subService['sub_service_title']) : ?>
                                                <li><?= $subService['sub_service_title'] ?></li>
                                            <?php
                                            endif;
                                        endforeach; ?>
                                        <?php foreach ($subServices as $subService) :
                                            if ($subService['sub_service_title']) : ?>
                                                <li><?= $subService['sub_service_title'] ?></li>
                                            <?php
                                            endif;
                                        endforeach; ?>
                                    </ul>
                                </div>
                            <?php
                            endif; ?>
                            <div class="content">
                                <h2 class="h2"><?= get_the_title(); ?></h2>
                                <div class="excerpt-service"> <?= get_field('service_description_front', $serviceId) ?></div>
                                <a href="<?= get_permalink($serviceId); ?>" class="btn-b">اطلاعات بیشتر</a>
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