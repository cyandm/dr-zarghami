<?php
$page_id = get_option('page_on_front');
$turn_img = get_field('turn_img', $page_id);
?>
<div class="h-auto bg-no-repeat	bg-contain  rounded-xl   visit  ">
    <div class=" p-12 max-lg:p-4  flex flex-col justify-between   gap-4 bg-blue-4	max-lg:w-full rounded-3xl	text-white-2">
        <div>
            <h3 class="text-h3 py-4 nax-lg:text-h4">ویزیت حضوری</h3>
            <p class="opacity-70"><?= get_option('address'); ?></p>

        </div>

        <div>
            <p class="text-h3 py-4 nax-lg:text-h4"><?= get_option('phone_number2_title'); ?></p>
            <a href="tel:<?= get_option('phone_number2'); ?>"
                class="opacity-70"><?= get_option('phone_number2'); ?></a>
            <a href="tel:<?= get_option('phone_number3'); ?>"
                class="opacity-70"><?= get_option('phone_number3'); ?></a>
        </div>
        <div>
            <p class="text-h3 py-4 nax-lg:text-h4">ایمیل</p>
            <a href="mailto:<?= get_option('email'); ?>" class="opacity-70"><?= get_option('email'); ?></a>
        </div>
    </div>
    <div class="  p-4 max-lg:p-4    bg-blue-3 items-center	max-lg:w-full rounded-3xl text-white-2	grid gap-4">
        <p class="text-h2 nax-lg:text-h3"><?= get_option('visit_title') ? get_option('visit_title')  :"دریافت نوبت"; ?></p>
                 <p class="text-caption"> <?= get_option('visit_text') ? get_option('visit_text') : "برای اخذ نوبت آنلاین به لینک زیر مراجعه نمایید" ?>
                </p>
<div class="text-left">

        <a href="<?= get_option('online'); ?>" class="p-2 w-[170px] text-blue-3 bg-white-2 flex justify-around text-caption rounded-lg float-left	whitespace-nowrap	">نوبت آنلاین<img src="<?= get_stylesheet_directory_uri() ?>/imgs/nobat.svg" alt="visit"></a>
    </div>
    </div>
    <div class="bg-red-1  rounded-3xl	p-4 grid   items-center text-white-2">

        <p class="text-h3 nax-lg:text-h3"><?= get_option('consultation_title') ? get_option('consultation_title') : "دریافت مشاوره"; ?></p>
                 <p class="text-caption"> <?= get_option('consultation_text') ? get_option('consultation_text') : "برای اخذ نوبت آنلاین به لینک زیر مراجعه نمایید" ?> </p>
<div class="text-left">
             <a href="<?= get_option('online_consultation'); ?>" class="p-2 w-[170px] text-red-1 bg-white-2 flex justify-around text-caption rounded-lg float-left	whitespace-nowrap	">ویزیت آنلاین <img src="<?= get_stylesheet_directory_uri() ?>/imgs/visit.svg" alt="visit"></a>

</div>


    </div>








</div>