<?php
$gallery_title = get_field('gallery_title', $args['post_id']);
$gallery_video = get_field('gallery_video', $args['post_id']);
$gallery_video_cover = get_field('gallery_video_cover', $args['post_id']);
?>

<div class="w-full md:basis-[calc(50%-8px)] lg:basis-[calc(33.333%-11px)] bg-[#ffffff] p-5 rounded-2xl shadow-lg flex flex-col gap-4">

    <div class="[&>.plyr]:w-full [&>.plyr]:h-[360px] [&>.plyr]:max-h-[360px]">

        <video id="player" class="rounded-2xl w-full fade-in-down aspect-square video-player [&~div]:h-auto" playsinline controls poster="<?= wp_get_attachment_image_url($gallery_video_cover, 'full', false); ?> ?>" data-poster="<?= wp_get_attachment_image_url($gallery_video_cover, 'full', false); ?> ?>">
            <source src="<?= $gallery_video['url'] ?>" type="video/mp4" />
        </video>

    </div>

    <div>
        <p class="font-medium text-base"><?php echo $gallery_title ?></p>
    </div>

</div>