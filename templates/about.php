<?php $page_id = get_queried_object_id();

$aboutSliders = get_field('about_slider_group', $page_id);
$facilities = get_field('all_about_facilities', $page_id);
$attributes = get_field('attributes_group', $page_id);
$videos = get_field('video_group', $page_id);

//testimonials query
$args = array(
    'post_type' => 'service',
    'status' => 'approve',
    'type' => 'comment',
    'author__not_in' => [7],
    'number' => 999,
);
$testimonials = get_comments($args);

$certificates = get_field('certificate_section_images', $page_id);
?>

<?php
/**
 * Template Name: About Page
 */
?>
<?php get_header(); ?>
<section class="mt2 about-section-slider">
    <div class="swiper about-slider container">
        <div class="swiper-wrapper">
            <?php if (is_array($aboutSliders) && count($aboutSliders) > 0):
                foreach ($aboutSliders as $key => $slide):
                    if ($slide['slider_image'] && $slide['slider_description']): ?>
                        <div class="swiper-slide">
                            <div class="slide-img">
                                <?= wp_get_attachment_image($slide['slider_image'], 'full', false, []); ?>
                            </div>
                            <div class="slide-info animate-letter">
                                <h1 class="t2"><?= $slide['slider_title'] ?></h1>
                                <h2 class="h1 title_with_bg animation"><?= $slide['slider_sub_title'] ?><span class="focuse">
                                    </span> </h2>
                                <div class="slide-description"><?= $slide['slider_description'] ?></div>
                            </div>

                        </div>
                    <?php endif;
                endforeach;
            endif; ?>
        </div>
        <div class="swiper-btn-row">

            <div class="swiper-btn">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="empty-row"></div>
        </div>
    </div>
</section>

<main class="container">
    <!-- ************************************ show attributes in this section-->
    <?php if (is_array($attributes) && count($attributes) > 0): ?>
        <section class="mt2 attributes-section">
            <div class="title container">
                <h2><?= get_field('attributes_title', $page_id); ?></h2>
                <p><?= get_field('attributes_description', $page_id); ?></p>
            </div>
            <div class="about-attributes-row container">
                <?php
                $num = 0;
                foreach ($attributes as $key => $attribute): ?>
                    <?php if ($attribute['attribute_img'] && $attribute['attribute_description']): ?>
                        <div class="about-attribute-box <?= ($num % 2 != 0) ? 'odd-attribute' : '' ?>">
                            <div class="attribute-img">
                                <?= wp_get_attachment_image($attribute['attribute_img'], 'full', false, []); ?>
                            </div>
                            <div class="attribute-content animate-letter">
                                <h3 class="h2 title_with_bg animation"><?= $attribute['attribute_title'] ?>
                                </h3>
                                <div class="attribute-description">
                                    <?= $attribute['attribute_description'] ?>
                                </div>
                            </div>
                        </div>
                        <?php $num++;
                    endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
    <!--    *******************************************  video section-->
    <?php
    $videos = get_field('video_group', $page_id);
    if ($videos['video_1']['video_file'] || $videos['video_2']['video_file']): ?>

        <section class="video-section">
            <div class="title-2 container">
                <h2 class="h1"><?= get_field('video_title_sec', $page_id); ?></h2>
                <p><?= get_field('video_sub_title', $page_id); ?></p>
            </div>
            <?php
            if ($videos['video_1']['video_file']): ?>
                <div class="video-list container">
                    <div class="main-video">
                        <?php
                        // var_dump(wp_get_attachment_image_url($videos['video_1']['video_img'])); ?>

                        <video id="mainVideo" controls
                            poster="<?= wp_get_attachment_image_url($videos['video_1']['video_img']['id'], 'full'); ?>"
                            src="<?= $videos['video_1']['video_file']; ?>" type="video/mp4">

                        </video>
                    </div>
                    <div class="video-thumbnails">
                        <?php
                        $num = 1;
                        foreach ($videos as $key => $video): ?>
                            <div class="video-thumbnail video-<?= $num ?>" data-video-src="<?= $video['video_file'] ?>"
                                data-poster-src="<?= wp_get_attachment_image_url($video['video_img']['id'], 'full') ?>">
                                <i class="icon-play"></i>
                                <?= wp_get_attachment_image($video['video_img']['id'], 'full', false, []); ?>
                            </div>
                            <?php $num++;
                        endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <!-- ************************************ clinic_history section-->
    <?php if (is_array($attributes) && count($attributes) > 0): ?>
        <section class="mt2 clinic-history-section">
            <div class="title container">
                <h2><?= get_field('clinic_history_title', $page_id); ?></h2>
                <p><?= get_field('clinic_history_sub_title', $page_id); ?></p>
            </div>
            <div class="clinic-history-row container">
                <div class="clinic-history-img">
                    <?= wp_get_attachment_image(get_field('clinic_history_img', $page_id), 'full', false, []); ?>
                </div>
                <div class="clinic-history-content">
                    <?= get_field('clinic_history_description', $page_id); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!--/****************************************************** testimonial section    -->
    <?php if (is_array($testimonials) && count($testimonials) > 0): ?>
        <section class="testimonial-section">
            <div class="title-with-btn container">
                <div>
                    <h2><?= get_field('testimonial_section_title', $page_id) ?></h2>
                    <p><?= get_field('testimonial__section_description', $page_id) ?>
                    </p>
                </div>
                <div class="btn" id=testimonial-form><a
                        href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>
            </div>
            <div dir="rtl" class="swiper testimonial-row testimonial-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="comment-title">
                                    <span class="comment-name caption"><?= $testimonial->comment_author ?></span>

                                    <span class="service-comment"> <span class="icon-arrow-left"></span><a
                                            href="<?= get_the_permalink($testimonial->comment_post_ID) ?>"><?= get_the_title($testimonial->comment_post_ID) ?></a></span>
                                </div>

                                <h6 class="h3"></h6>
                                <p class="description"><?= $testimonial->comment_content ?></p>
                                <div class="star-rate">

                                    <?php
                                    $stars = get_comment_meta($testimonial->comment_ID, 'custom_field', true);

                                    for ($i = 1; $i <= 5; $i++):
                                        ?>

                                        <?php
                                        if ($i <= $stars):
                                            ?>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/star.svg" alt="rate" />

                                        <?php else: ?>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/star-disable.svg" alt="rate" />

                                        <?php endif;
                                    endfor;
                                    ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="btn btn-mobile" id=testimonial-form><a
                    href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>

        </section>
    <?php endif; ?>

    <!-- ************************************ certificates section-->
    <?php if (is_array($certificates) && count($certificates) > 0): ?>
        <section class="mt2 certificates-section swiper container">

            <div class="title container">
                <h2><?= get_field('certificate_section_title', $page_id); ?></h2>
                <p><?= get_field('certificate_section_description', $page_id); ?></p>
            </div>

            <div class="certificate-gallery swiper-wrapper">
                <?php foreach ($certificates as $certificate): ?>

                    <?php if (!empty($certificate)): ?>
                        <div class="certificate-img swiper-slide" id="static-thumbnails">
                            <a href="<?= wp_get_attachment_image_url($certificate, "full") ?>">
                                <?= wp_get_attachment_image($certificate, "full") ?>

                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach ?>
            </div>

            <div class="swiper-btn-row">

                <div class="swiper-btn">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="swiper-pagination"></div>

            </div>

        </section>
    <?php endif ?>


    <div class="title last-comment-title container">
        <h2><?= get_field('last_comment_title', $page_id); ?></h2>
        <p><?= get_field('last_comment_sun_title', $page_id); ?></p>
    </div>

</main>
<?php get_footer() ?>