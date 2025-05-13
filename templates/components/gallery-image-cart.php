<?php
$gallery_title = get_field('gallery_title', $args['post_id']);
$gallery_image = get_field('gallery_img', $args['post_id']);
$image_meta = wp_get_attachment_metadata($gallery_image);
?>

<div class="gallery w-full md:basis-[calc(50%-8px)] lg:basis-[calc(33.333%-11px)] bg-[#ffffff] p-5 rounded-2xl shadow-lg flex flex-col gap-4">
    <div id="gallery-zoom">
        <a href="<?php echo wp_get_attachment_image_url($gallery_image, 'full'); ?>" 
           data-pswp-width="<?php echo $image_meta['width']; ?>" 
           data-pswp-height="<?php echo $image_meta['height']; ?>">
            <?php echo wp_get_attachment_image($gallery_image, 'full', false, [
                'class' => 'rounded-2xl w-full object-cover h-[360px] min-h-[360px] cursor-pointer'
            ]); ?>
        </a>
    </div>

    <div>
        <p class="font-medium text-base"><?php echo $gallery_title ?></p>
    </div>

</div>