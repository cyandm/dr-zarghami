<?php $page_id = get_queried_object_id();

$aboutSliders = get_field('about_slider_group', $page_id); ?>
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
                            nfdsnstnsen
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