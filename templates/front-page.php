<?php
$page_id = get_option('page_on_front');

$facilitiesGroup = get_field('facilities_group', $page_id);
$allServices = get_field('choose_services', $page_id);
$insurances = get_field('insurances_group', $page_id);
$faqs = get_field('fags', $page_id);



//testimonials query
$args = array(
    'post_type' => 'service',
    'status' => 'approve',
    'type' => 'comment',
    'author__not_in' => [7],
    'number' => 999,
);
$testimonials = get_comments($args);

/**
 * Template Name: Front Page
 */
?>
<?php get_header(); ?>

<?php
get_template_part(
    'templates/components/front-hero-section',
    null,
);
?>

<!--/****************************************************** services section    -->
<section class="container services-section">
    <div class="title">
        <h2><?= get_field('services_section_title', $page_id); ?></h2>
        <p><?= get_field('services_section_title_description', $page_id); ?></p>
    </div>
    <?php
    if (is_array($allServices) && count($allServices) > 0) : ?>
        <div class="service-tabs">
            <div class="tab-row">
                <select class="tab-mobile" id="dropdown-menu">
                    <?php foreach ($allServices as $key => $service) : ?>
                        <option class="tablinks" <?= ($key == 0) ? 'active' : '' ?> " value=" tab-<?= $key ?>"><?= $service->post_title ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="empty-div"></div>
                <div class="tab">
                    <?php foreach ($allServices as $key => $service) : ?>
                        <button class="tablinks landing-tablinks <?= ($key == 0) ? 'active' : '' ?>" id="tab-<?= $key ?>"><?= $service->post_title ?></button>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="service-tabcontent">
                <?php foreach ($allServices as $key => $service) : ?>
                    <div id="tab-<?= $key ?>" class="tabcontent  <?= ($key == 0) ? 'active' : '' ?> ">

                        <div class="service-img">
                            <?php $thumbnail_id = get_field('service_image', $service->ID); ?>
                            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
                        </div>
                        <div class="service-content animate-text animate-letter">
                            <h2 class="service-title title_with_bg h2 animation"><?= get_field('service_title_front', $service->ID) ?>
                                <span class="focuse"></span>
                            </h2>
                            <div class="service-description">
                                <?= get_field('service_description_front', $service->ID) ?>
                            </div>
                            <div class="service-btn">
                                <a href="<?= get_permalink($service->ID) ?>" class="btn-b">اطلاعات بیشتر</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    <?php endif; ?>

    </div>


    </div>

</section>

<!--/****************************************************** insurances section    -->
<section class=" insurances-section">
    <div class=" insurances-row">
        <div class="title container">
            <h2><?= get_field('insurances_section_title', $page_id); ?></h2>
            <p><?= get_field('insurances_section_description', $page_id); ?></p>
        </div>
        <?php if (is_array($insurances) && count($insurances) > 0) : ?>
            <div class="insurances-content container">
                <div class="swiper insurance-slider">
                    <div class="swiper-wrapper">

                        <?php foreach ($insurances as $insurance) :
                            if ($insurance['insurances_item_image'] && $insurance['insurances_item_text']) :
                        ?>
                                <div class="swiper-slide">
                                    <div class="insurance-item">
                                        <div class="img-content">
                                            <?= wp_get_attachment_image($insurance['insurances_item_image'], 'thumbnail', false, []); ?>
                                        </div>
                                        <span class="h4"><?= $insurance['insurances_item_text'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <!------------------------------------------------ repeat loop -->
                        <?php foreach ($insurances as $insurance) :
                            if ($insurance['insurances_item_image'] && $insurance['insurances_item_text']) :
                        ?>
                                <div class="swiper-slide">
                                    <div class="insurance-item">
                                        <div class="img-content">
                                            <?= wp_get_attachment_image($insurance['insurances_item_image'], 'thumbnail', false, []); ?>
                                        </div>
                                        <span class="h4"><?= $insurance['insurances_item_text'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <!------------------------------------------------ repeat loop -->
                        <?php foreach ($insurances as $insurance) :
                            if ($insurance['insurances_item_image'] && $insurance['insurances_item_text']) :
                        ?>
                                <div class="swiper-slide">
                                    <div class="insurance-item">
                                        <div class="img-content">
                                            <?= wp_get_attachment_image($insurance['insurances_item_image'], 'thumbnail', false, []); ?>
                                        </div>
                                        <span class="h4"><?= $insurance['insurances_item_text'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!--/****************************************************** Faq section    -->
<section class=" faq-section" id="faq-section">
    <div class="title-with-btn container">
        <div>
            <h2><?= get_field('faq_section_title', $page_id) ?></h2>
            <p><?= get_field('faq_section_description', $page_id) ?></p>
        </div>
        <!-- <a href="<?= get_field('faq_section_button_link', $page_id) ?>"
               class="btn"><?= get_field('faq_section_button_title', $page_id) ?></a> -->
    </div>
    <div class="faq-row container">
        <div class="faq-img">
            <?= wp_get_attachment_image(get_field('image_faq_section', $page_id), 'full', false, []); ?>
        </div>
        <div class="faq-content">
            <?php if (is_array($faqs) && count($faqs) > 0) : ?>
                <?php foreach ($faqs as $key => $faq) :
                    if ($faq['question'] && $faq['answer']) : ?>
                        <div class="accordion-item">
                            <div class="accordion-item-header <?= ($key == 'faq_1') ? 'active' : '' ?>">
                                <div class="h4"><?= $faq['question'] ?></div>
                                <i class="icon-arrow-down-1"></i>
                            </div>
                            <div class="accordion-item-body  <?= ($key == 'faq_1') ? 'active' : '' ?>">
                                <div class="accordion-item-body-content">
                                    <?= $faq['answer'] ?>
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>

            <?php endif; ?>
        </div>

    </div>

</section>

<!--/****************************************************** blog section    -->

<?php
get_template_part(
    'templates/components/front-blog-section',
    null,
);
?>
<!--/****************************************************** testimonial section    -->
<?php if (is_array($testimonials) && count($testimonials) > 0) : ?>
    <section class="testimonial-section">
        <div class="title-with-btn container">
            <div>
                <h2><?= get_field('testimonial_section_title', $page_id) ?></h2>
                <p><?= get_field('testimonial__section_description', $page_id) ?>
                </p>
            </div>
            <div class="btn" id=testimonial-form><a href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>
        </div>
        <div dir="rtl" class="swiper testimonial-row testimonial-slider">
            <div class="swiper-wrapper">
                <?php foreach ($testimonials as $testimonial) : ?>
                    <div class="swiper-slide">
                        <div class="testimonial">
                            <div class="comment-title">
                                <span class="comment-name caption"><?= $testimonial->comment_author ?></span>

                                <span class="service-comment"> <span class="icon-arrow-left"></span><a href="<?= get_the_permalink($testimonial->comment_post_ID) ?>"><?= get_the_title($testimonial->comment_post_ID) ?></a></span>
                            </div>

                            <h6 class="h3"></h6>
                            <p class="description"><?= $testimonial->comment_content ?></p>
                            <div class="star-rate">

                                <?php
                                $stars = get_comment_meta($testimonial->comment_ID, 'custom_field', true);

                                for ($i = 1; $i <= 5; $i++) :
                                ?>

                                    <?php
                                    if ($i <= $stars) :
                                    ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/imgs/star.svg" alt="rate" />

                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/imgs/star-disable.svg" alt="rate" />

                                <?php endif;
                                endfor;
                                ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="btn btn-mobile" id=testimonial-form><a href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>

    </section>
<?php endif; ?>

<?php get_footer() ?>