<?php
$page_id = get_option('page_on_front');
$turn_img = get_field('turn_img', $page_id);
?>

<div class="h-auto bg-no-repeat	bg-contain rounded-xl visit">

    <div class="hospital-one p-6 max-lg:p-4 flex flex-col justify-between gap-3 bg-blue-4 max-lg:w-full rounded-3xl text-white-2">
        <div>
            <h3 class="text-h3 font-medium pb-2 nax-lg:text-h4"><?= get_option('hospital_title_hospital_one'); ?></h3>

            <div class="flex flex-row gap-2">

                <?php if (get_option('phone_number_hospital_one_link')) : ?>

                    <a href="tel:<?= get_option('phone_number_hospital_one_link'); ?>" class="flex items-center gap-1 opacity-90">
                        <?= get_option('phone_number_hospital_one_link'); ?>
                        <i class="icon-call1"></i>
                    </a>

                <?php endif; ?>

                <?php if (get_option('phone_number_hospital_one_link_two')) : ?>

                    <a href="tel:<?= get_option('phone_number_hospital_one_link_two'); ?>" class="flex items-center gap-1 opacity-90">
                        <?= get_option('phone_number_hospital_one_link_two'); ?>
                        <i class="icon-call1"></i>
                    </a>

                <?php endif; ?>

            </div>

        </div>

        <div class="flex flex-col">

            <div class="flex flex-col gap-2 py-2">
                <p class="text-h3 font-medium max-lg:text-h4"><?= get_option('address_title_hospital_one'); ?></p>
                <p class="text-lg max-lg:text-base"><?= get_option('open_time_hospital_one'); ?></p>
            </div>

            <div class="flex flex-row">

                <p class="opacity-90"><?= get_option('address_hospital_one'); ?></p>

            </div>
        </div>
        <div>
            <p class="text-h3 font-medium py-2 nax-lg:text-h4">ایمیل</p>
            <a href="mailto:<?= get_option('email_hospital_one'); ?>" class="opacity-90"><?= get_option('email_hospital_one'); ?></a>
        </div>

        <div class="text-left">
            <a href="<?= get_option('online_hospital_one'); ?>" target="_blank" class="p-2 w-[170px] text-blue-3 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">نوبت آنلاین<img src="<?= get_stylesheet_directory_uri() ?>/imgs/nobat.svg" alt="visit"></a>
        </div>

    </div>


    <div class="hospital-two p-6 max-lg:p-4 flex flex-col justify-between gap-3 bg-blue-3 max-lg:w-full rounded-3xl text-white-2">
        <div>
            <h3 class="text-h3 font-medium pb-2 nax-lg:text-h4"><?= get_option('hospital_title_hospital_two'); ?></h3>

            <div class="flex flex-row gap-2">

                <?php if (get_option('phone_number_hospital_two_link')) : ?>

                    <a href="tel:<?= get_option('phone_number_hospital_two_link'); ?>" class="flex items-center gap-1 opacity-90">
                        <?= get_option('phone_number_hospital_two_link'); ?>
                        <i class="icon-call1"></i>
                    </a>

                <?php endif; ?>

                <?php if (get_option('phone_number_hospital_two_link_two')) : ?>

                    <a href="tel:<?= get_option('phone_number_hospital_two_link_two'); ?>" class="flex items-center gap-1 opacity-90">
                        <?= get_option('phone_number_hospital_two_link_two'); ?>
                        <i class="icon-call1"></i>
                    </a>

                <?php endif; ?>

            </div>

        </div>

        <div class="flex flex-col">

            <div class="flex flex-col gap-2 py-2">
                <p class="text-h3 font-medium max-lg:text-h4"><?= get_option('address_title_hospital_two'); ?></p>
                <p class="text-lg max-lg:text-base"><?= get_option('open_time_hospital_two'); ?></p>
            </div>

            <div class="flex flex-row">

                <p class="opacity-90"><?= get_option('address_hospital_two'); ?></p>

            </div>
        </div>
        <div>
            <p class="text-h3 font-medium py-2 nax-lg:text-h4">ایمیل</p>
            <a href="mailto:<?= get_option('email_hospital_two'); ?>" class="opacity-90"><?= get_option('email_hospital_two'); ?></a>
        </div>

        <div class="text-left">
            <a href="<?= get_option('online_hospital_two'); ?>" target="_blank" class="p-2 w-[170px] text-blue-3 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">نوبت آنلاین<img src="<?= get_stylesheet_directory_uri() ?>/imgs/nobat.svg" alt="visit"></a>
        </div>

    </div>


    <!-- <div class="p-4 max-lg:p-4 bg-blue-3 items-center max-lg:w-full rounded-3xl text-white-2 grid gap-4">
        <p class="text-h2 nax-lg:text-h3"><? //= get_option('visit_title') ? get_option('visit_title')  : "دریافت نوبت"; 
                                            ?></p>
        <p class="text-caption"> <? //= get_option('visit_text') ? get_option('visit_text') : "برای اخذ نوبت آنلاین به لینک زیر مراجعه نمایید" 
                                    ?>
        </p>
        <div class="text-left">

            <a href="<? //= get_option('online'); 
                        ?>" class="p-2 w-[170px] text-blue-3 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">نوبت آنلاین<img src="<? //= get_stylesheet_directory_uri() 
                                                                                                                                                                        ?>/imgs/nobat.svg" alt="visit"></a>
        </div>
    </div> -->

    <div class="bg-red-1 rounded-3xl p-4 grid items-center text-white-2">

        <p class="text-h3 nax-lg:text-h3"><?= get_option('consultation_title') ? get_option('consultation_title') : "دریافت مشاوره"; ?></p>
        <p class="text-caption"> <?= get_option('consultation_text') ? get_option('consultation_text') : "برای اخذ نوبت آنلاین به لینک زیر مراجعه نمایید" ?></p>

        <div class="text-left">
            <a href="<?= get_option('online_consultation'); ?>" target="_blank" class="p-2 w-[170px] text-red-1 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">ویزیت آنلاین <img src="<?= get_stylesheet_directory_uri() ?>/imgs/visit.svg" alt="visit"></a>

        </div>

    </div>

</div>