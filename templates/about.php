<?php $page_id = get_queried_object_id();

$aboutSliders = get_field('about_slider_group', $page_id);
 $facilities = get_field('all_about_facilities', $page_id);
 $attributes = get_field('attributes_group', $page_id);
 $attributes = get_field('attributes_group', $page_id); ?>

<?php
/**
 * Template Name: About Page
 */
?>
<?php get_header(); ?>
<section class="mt2 about-section-slider">
    <div class="swiper about-slider container">
        <div class="swiper-wrapper">
            <?php if (is_array($aboutSliders) && count($aboutSliders) > 0) :
                foreach ($aboutSliders as $key => $slide) :
                    if ($slide['slider_image'] && $slide['slider_description']) :?>
                        <div class="swiper-slide">
                            <div class="slide-img">
                                <?= wp_get_attachment_image($slide['slider_image'], 'full', false, []); ?>
                            </div>
                            <div class="slide-info animate-letter">
                                <h1 class="t2"><?= $slide['slider_title'] ?></h1>
                                <h2 class="h1 title_with_bg animation"><?= $slide['slider_sub_title'] ?><span class="focuse"> </span> </h2>
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

<!-- ************************************ about-facilities section -->
<section class="mt2 about-facilities">
    <div class="title container">
        <h2><?= get_field('about_facilities_title', $page_id); ?></h2>
        <p><?= get_field('about_facilities_description', $page_id); ?></p>
    </div>
    <div class="about-facilities-row container">
        <?php if (is_array($facilities) && count($facilities) > 0) :
            foreach ($facilities as $key => $facility) :
                if ($facility['facilitie_description']) : ?>
                    <div class="about-facility-box">
                        <div class="facility-title">
                            <?= wp_get_attachment_image($facility['facilitie_img'], 'thumbnail', false, []); ?>
                            <h3 class="h3"><?= $facility['facilitie_title'] ?></h3>
                        </div>
                        <div class="facility-content"><?= $facility['facilitie_description'] ?></div>
                    </div>
        <?php endif;
            endforeach;
        endif; ?>
    </div>
</section>

<!-- ************************************ show attributes in this section-->
<?php if (is_array($attributes) && count($attributes) > 0) : ?>
    <section class="mt2 attributes-section">
        <div class="title container">
            <h2><?= get_field('attributes_title', $page_id); ?></h2>
            <p><?= get_field('attributes_description', $page_id); ?></p>
        </div>
        <div class="about-attributes-row container">
            <?php
            $num = 0;
            foreach ($attributes as $key => $attribute) : ?>
                <?php if ($attribute['attribute_img'] && $attribute['attribute_description']) : ?>
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

<!-- ************************************ clinic_history section-->
<?php if (is_array($attributes) && count($attributes) > 0) : ?>
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
<div class="title last-comment-title container">
    <h2><?= get_field('last_comment_title', $page_id); ?></h2>
    <p><?= get_field('last_comment_sun_title', $page_id); ?></p>
</div>


<?php get_footer() ?>