<?php
$video_link = get_field('about_video_link');
$video_file = get_field('about_video');
$cover_video = get_field('about_poster');
$backImg = get_field('background_image', $page_id); ?>
<!-- -->
 <section class="container">
    <div class="flex justify-between">
        <div class="title">
            <h2><?= get_field('about_title'); ?></h2>
            <p><?= get_field('about_subtitle'); ?></p>
        </div>
        <a href="<?= get_field('about_button_link'); ?>" class="btn-b pc">درباره پزشک</a>
    </div>
    <video controls class="about-video w-full max-h-[750px] object-cover rounded-2xl" src="<?= $video_file["url"] ?>"
        poster=" <?= wp_get_attachment_image_url($cover_video, 'full', false, []); ?>">
        <source src="<?= $video_file["url"] ?>" type="video/mp4" controls>
    </video>
            <a href="<?= get_field('about_button_link'); ?>" class="btn-b mobile mt-5">درباره پزشک</a>


</section>