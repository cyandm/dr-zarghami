<?php
$video_link = get_field('about_video_link');
$video_file = get_field('about_video');
$cover_video = get_field('about_poster');
$backImg = get_field('background_image', $page_id); ?>
<!-- -->
<section class="important-points container">
    <div class="title">
        <h2><?= get_field('points_section_title'); ?></h2>
        <p><?= get_field('poins_section_subtitle'); ?></p>
    </div>
    <div class="important-points-desktop grid grid-cols-4 gap-4">

        <?php for ($i = 1; $i < 5; $i++) {
            $points = get_field("points_$i"); ?>
            <div class="flip-card rounded-2xl">
                <div class="flip-card-inner rounded-2xl">
                    <div class="flip-card-front rounded-2xl">
                        <div class="important-points-cart flex flex-col gap-3 p-4 [&_img]:w-full rounded-2xl [&_img]:aspect-square [&_img]:object-cover [&_img]:rounded-2xl pc">
                            <?= wp_get_attachment_image($points['points_img'], 'full', false, []); ?>
                            <h3 class="h3"><?= $points['points_title'] ?></h3>
                            <p class="point-text"><?= $points['points_text'] ?></p>
                            <div class="point-btn flex justify-center items-center">
                                <span class="point-btn btn w-full">ادامه</span>
                            </div>
                        </div>
                    </div>
                    <div class="flip-card-back rounded-2xl">
                        <p class="point-text"><?= $points['points_text'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--        -------------------------------small view -->
    <div class="container swiper front-blogs-slider mobile">
        <div class="swiper-wrapper blogs-row">
            <?php for ($i = 1; $i < 5; $i++) {
                $points = get_field("points_$i"); ?>
                <div class="swiper-slide shadow-lg flex flex-col gap-3 p-4 mb-8 justify-center rounded-2xl [&_img]:w-full [&_img]:aspect-square [&_img]:object-cover [&_img]:rounded-2xl ">
                    <?= wp_get_attachment_image($points['points_img'], 'full', false, []); ?>
                    <h3 class="h3"><?= $points['points_title'] ?></h3>
                    <p><?= $points['points_text'] ?></p>

                </div>
            <?php } ?>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>