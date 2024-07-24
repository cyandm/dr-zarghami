<?php
$page_id = get_option('page_on_front');

?>
<section class="certificate-section container">
    <div class="title-with-btn ">
        <div>
            <h2><?= get_field('certificate_section_title') ?></h2>
            <p><?= get_field('certificate_section_subtitle') ?>
            </p>
        </div>

    </div>
    <div dir="rtl" class="swiper  front-blogs-slider">
        <div class="swiper-wrapper">
            <?php for ($i = 1; $i < 5; $i++):
                $points = get_field("certificate_img_$i"); ?>
                <div class="swiper-slide">
                    <div class="certificates border-[#E6EAED] border-solid border rounded-3xl py-16">


                        <?= wp_get_attachment_image($points, 'full w-full', false, []); ?>
                    </div>

                </div>
            <?php endfor; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>


</section>