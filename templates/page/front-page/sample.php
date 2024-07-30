<section class="container ">
    <div class="flex justify-between gap-6 mt-10 max-md:flex-col-reverse">
        <div class="title w-full justify-center	mb-0">
            <h2><?= get_field('surgery_section_title'); ?></h2>
            <p><?= get_field('surgery_section_subtitle'); ?></p>
            <div class="my-4">
                <h3 class="h3"><?= get_field('surgery_section_title2'); ?></h3>
                <p><?= get_field('surgery_section_text'); ?></p>
                <h4 class="h4"><?= get_field('surgery_section_title3'); ?></h4>
                <p><?= get_field('surgery_section_text2'); ?></p>
            </div>

            <div class="w-full">
                <a href="<?= get_field('surgery_video_link'); ?>" class="btn-b float-left">مطالعه کامل </a>
                <a href="<?= get_field('surgery_video_link'); ?>" class="btn-mobile btn w-full float-left">مطالعه کامل </a>
            </div>
        </div>
        <?= wp_get_attachment_image(get_field('surgery_img'), 'full w-2/5 max-w-[400px] max-md:w-full max-md:max-w-[unset] max-md:h-80 aspect-square rounded-2xl object-cover', false, []); ?>
    </div>
</section>