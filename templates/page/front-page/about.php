<?php
$page_id = get_option('page_on_front');
$video_link = get_field('about_video_link', $page_id);
$video_file = get_field('about_video', $page_id);
$cover_video = get_field('about_poster', $page_id);
$backImg = get_field('background_image', $page_id); ?>
<!-- -->
<section class="container">
    <div class="flex justify-between">
        <div class="title">
            <h2><?php echo get_field('about_title', $page_id); ?></h2>
            <p><?php echo get_field('about_subtitle', $page_id); ?></p>
        </div>
        <a href="<?= get_field('about_button_link'); ?>" class="btn-b pc">درباره پزشک</a>
    </div>
    <video controls class="about-video w-full max-h-[750px] object-cover rounded-2xl" src="<?= $video_file["url"] ?>" poster=" <?= wp_get_attachment_image_url($cover_video, 'full', false, []); ?>">
        <source src="<?= $video_file["url"] ?>" type="video/mp4" controls>
    </video>
    <a href="<?= get_field('about_button_link', $page_id); ?>" class="btn mobile mt-5 w-full text-center">درباره پزشک</a>


</section>