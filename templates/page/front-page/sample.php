<section class="container ">
    <div class="flex justify-between">
        <div class="title gap-12 w-3/5">
            <h2><?= get_field('surgery_section_title'); ?></h2>
            <p><?= get_field('surgery_section_subtitle'); ?></p>
            <div>
                <h3 class="h3"><?= get_field('surgery_section_title2'); ?></h3>
                <p><?= get_field('surgery_section_text'); ?></p>
                <h4 class="h4"><?= get_field('surgery_section_title3'); ?></h4>
                <p><?= get_field('surgery_section_text2'); ?></p>
            </div>

            <div class=" w-full ">
                <a href="<?= get_field('surgery_video_link'); ?>" class="btn-b float-left">مطالعه کامل </a>
            </div>
        </div>
        <?= wp_get_attachment_image(get_field('surgery_img'), 'full w-2/5 max-w-[400px] aspect-square  object-contain', false, []); ?>
    </div>
</section>