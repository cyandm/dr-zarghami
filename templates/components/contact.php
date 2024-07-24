<?php
$page_id = get_option('page_on_front');
$turn_img = get_field('turn_img', $page_id);
?>
<div class="h-auto bg-no-repeat	bg-contain bg-[#92D5C0] rounded-xl max-lg:bg-bottom max-lg:pb-[260px]"
    style="background-image: url(<?= wp_get_attachment_image_url($turn_img, 'full w-full', false, []); ?>);">
    <div class="w-2/4 min-h-[500px] p-12 max-lg:p-4  body grid gap-4	max-lg:w-full">
        <div class="p-8 rounded-lg bg-white-1 ">
            <h3 class="h3">ویزیت حضوری</h3>
            <p><?= get_option('address'); ?></p>
            <div class="grid grid-cols-3 gap-2 ">
                <span><?= get_option('phone_number_title'); ?></span>
                <span><?= get_option('phone_number2_title'); ?></span>
                <span><?= get_option('phone_number3_title'); ?></span>
                <span class="text-blue-3"><?= get_option('phone_number'); ?></span>
                <span class="text-blue-3"><?= get_option('phone_number2'); ?></span>
                <span class="text-blue-3"><?= get_option('phone_number3'); ?>
                </span>
            </div>
            <p>ایمیل</p>
            <p class="text-blue-3"><?= get_option('email'); ?></p>
            <p class="h3">ویزیت آنلاین</p>
            <a href="<?= get_option('online'); ?>" class="text-blue-3">برای دریافت مشاوره غیرحضوری کلیک نمایید</a>
            <p class="h3">ارتباط با پزشک</p>
        <div class="grayscale flex items-center gap-3 ">
            <?php
            for ($i = 1; $i < 5; $i++) {
                ?>
                <a href="<?= get_option("social_link_$i"); ?>" class="w-6 aspect-square">
                    <img src="<?= get_option("social_logo_$i") ?>" />
        
                </a>
        
            <?php } ?>
        </div>
        </div>

    </div>
</div>