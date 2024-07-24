<?php
$video_link = get_field('about_video_link');
$video_file = get_field('about_video');
$cover_video = get_field('about_poster');
$backImg = get_field('background_image', $page_id); ?>
<!-- -->
<section class="container">
    <div class="title">
        <h2><?= get_field('points_section_title'); ?></h2>
        <p><?= get_field('poins_section_subtitle'); ?></p>
    </div>
    <div class="grid grid-cols-4 gap-4">

        <?php for ($i = 1; $i < 5; $i++) {
            $points = get_field("points_$i"); ?>
            <div
                class="shadow-lg flex flex-col gap-4 p-8 justify-center [&_img]:w-full rounded-3xl [&_img]:aspect-square [&_img]:object-cover  pc">
                <?= wp_get_attachment_image($points['points_img'], 'full', false, []); ?>
                <h3 class="h3"><?= $points['points_title'] ?></h3>
                <p><?= $points['points_text'] ?></p>

            </div>
        <?php } ?>
    </div>
    <!--        -------------------------------small view -->
    <div class="container swiper front-blogs-slider mobile">
        <div class="swiper-wrapper blogs-row">
            <?php for ($i = 1; $i < 5; $i++) {
                $points = get_field("points_$i"); ?>
                <div
                    class=" swiper-slideshadow-lg flex flex-col gap-4 p-8 justify-center [&_img]:w-full rounded-3xl [&_img]:aspect-square [&_img]:object-cover ">
                    <?= wp_get_attachment_image($points['points_img'], 'full', false, []); ?>
                    <h3 class="h3"><?= $points['points_title'] ?></h3>
                    <p><?= $points['points_text'] ?></p>

                </div>
            <?php } ?>

        </div>
</div>

</section>