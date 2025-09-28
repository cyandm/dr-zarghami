<?php
$page_id = get_option('page_on_front');
$turn_img = get_field('turn_img', $page_id);
?>

<div class="h-auto bg-no-repeat	bg-contain rounded-xl visit justify-center">

    <?php if (!empty(get_option('hospital_title_hospital_one'))): ?>
        <div class="hospital-one p-6 max-lg:p-4 flex flex-col justify-between gap-3 bg-[#2B5E94] max-lg:w-full rounded-3xl text-white-2">
            <div>
                <h3 class="text-h3 font-medium pb-2 max-lg:text-h4"><?= get_option('hospital_title_hospital_one'); ?></h3>

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

                <div class="flex flex-col">

                    <p class="opacity-90"><?= get_option('address_hospital_one'); ?></p>

                    <?php if (!empty(get_option('balad_hospital_one')) || !empty(get_option('neshan_hospital_one')) || !empty(get_option('maps_hospital_one'))) : ?>
                        <div class="flex gap-2 mt-2">

                            <?php if (!empty(get_option('balad_hospital_one'))) : ?>
                                <a href="<?= get_option('balad_hospital_one'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/balad.svg" alt="visit"></a>
                            <?php endif; ?>

                            <?php if (!empty(get_option('neshan_hospital_one'))) : ?>
                                <a href="<?= get_option('neshan_hospital_one'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/neshan.svg" alt="visit"></a>
                            <?php endif; ?>

                            <?php if (!empty(get_option('maps_hospital_one'))) : ?>
                                <a href="<?= get_option('maps_hospital_one'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/maps.svg" alt="visit"></a>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <div>
                <p class="text-h3 font-medium py-2 max-lg:text-h4">ایمیل</p>
                <a href="mailto:<?= get_option('email_hospital_one'); ?>" class="opacity-90"><?= get_option('email_hospital_one'); ?></a>
            </div>

            <div class="text-left">
                <a href="<?= get_option('online_hospital_one'); ?>" target="_blank" class="p-2 w-[170px] text-blue-3 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">نوبت آنلاین<img src="<?= get_stylesheet_directory_uri() ?>/imgs/nobat.svg" alt="visit"></a>
            </div>

        </div>
    <?php endif ?>


    <?php if (!empty(get_option('hospital_title_hospital_two'))): ?>
        <div class="hospital-two p-6 max-lg:p-4 flex flex-col justify-between gap-3 bg-[#248ECB] max-lg:w-full rounded-3xl text-white-2">
            <div>
                <h3 class="text-h3 font-medium pb-2 max-lg:text-h4"><?= get_option('hospital_title_hospital_two'); ?></h3>

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

                <div class="flex flex-col">

                    <p class="opacity-90"><?= get_option('address_hospital_two'); ?></p>

                    <?php if (!empty(get_option('balad_hospital_two')) || !empty(get_option('neshan_hospital_two')) || !empty(get_option('maps_hospital_two'))) : ?>
                        <div class="flex gap-2 mt-2">

                            <?php if (!empty(get_option('balad_hospital_two'))) : ?>
                                <a href="<?= get_option('balad_hospital_two'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/balad.svg" alt="visit"></a>
                            <?php endif; ?>

                            <?php if (!empty(get_option('neshan_hospital_two'))) : ?>
                                <a href="<?= get_option('neshan_hospital_two'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/neshan.svg" alt="visit"></a>
                            <?php endif; ?>

                            <?php if (!empty(get_option('maps_hospital_two'))) : ?>
                                <a href="<?= get_option('maps_hospital_two'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/maps.svg" alt="visit"></a>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>

            </div>
            <div>
                <p class="text-h3 font-medium py-2 max-lg:text-h4">ایمیل</p>
                <a href="mailto:<?= get_option('email_hospital_two'); ?>" class="opacity-90"><?= get_option('email_hospital_two'); ?></a>
            </div>

            <div class="text-left">
                <a href="<?= get_option('online_hospital_two'); ?>" target="_blank" class="p-2 w-[170px] text-blue-3 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">نوبت آنلاین<img src="<?= get_stylesheet_directory_uri() ?>/imgs/nobat.svg" alt="visit"></a>
            </div>

        </div>
    <?php endif ?>


    <?php if (!empty(get_option('hospital_title_hospital_three'))): ?>
        <div class="hospital-three p-6 max-lg:p-4 flex flex-col justify-between gap-3 bg-[#0694AA] max-lg:w-full rounded-3xl text-white-2">
            <div>
                <h3 class="text-h3 font-medium pb-2 max-lg:text-h4"><?= get_option('hospital_title_hospital_three'); ?></h3>

                <div class="flex flex-row gap-2">

                    <?php if (get_option('phone_number_hospital_three_link')) : ?>

                        <a href="tel:<?= get_option('phone_number_hospital_three_link'); ?>" class="flex items-center gap-1 opacity-90">
                            <?= get_option('phone_number_hospital_three_link'); ?>
                            <i class="icon-call1"></i>
                        </a>

                    <?php endif; ?>

                    <?php if (get_option('phone_number_hospital_three_link_two')) : ?>

                        <a href="tel:<?= get_option('phone_number_hospital_three_link_two'); ?>" class="flex items-center gap-1 opacity-90">
                            <?= get_option('phone_number_hospital_three_link_two'); ?>
                            <i class="icon-call1"></i>
                        </a>

                    <?php endif; ?>

                </div>

            </div>

            <div class="flex flex-col">

                <div class="flex flex-col gap-2 py-2">
                    <p class="text-h3 font-medium max-lg:text-h4"><?= get_option('address_title_hospital_three'); ?></p>
                    <p class="text-lg max-lg:text-base"><?= get_option('open_time_hospital_three'); ?></p>
                </div>

                <div class="flex flex-col">

                    <p class="opacity-90"><?= get_option('address_hospital_three'); ?></p>

                    <?php if (!empty(get_option('balad_hospital_three')) || !empty(get_option('neshan_hospital_three')) || !empty(get_option('maps_hospital_three'))) : ?>
                        <div class="flex gap-2 mt-2">

                            <?php if (!empty(get_option('balad_hospital_three'))) : ?>
                                <a href="<?= get_option('balad_hospital_three'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/balad.svg" alt="visit"></a>
                            <?php endif; ?>

                            <?php if (!empty(get_option('neshan_hospital_three'))) : ?>
                                <a href="<?= get_option('neshan_hospital_three'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/neshan.svg" alt="visit"></a>
                            <?php endif; ?>

                            <?php if (!empty(get_option('maps_hospital_three'))) : ?>
                                <a href="<?= get_option('maps_hospital_three'); ?>" target="_blank" class="overflow-hidden size-8 flex justify-center items-center rounded-full"><img src="<?= get_stylesheet_directory_uri() ?>/imgs/maps.svg" alt="visit"></a>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                </div>

            </div>

            <?php if (!empty(get_option('email_hospital_three'))): ?>

                <div>
                    <p class="text-h3 font-medium py-2 max-lg:text-h4">ایمیل</p>
                    <a href="mailto:<?= get_option('email_hospital_three'); ?>" class="opacity-90"><?= get_option('email_hospital_three'); ?></a>
                </div>

            <?php endif ?>

            <div class="text-left">
                <a href="<?= get_option('online_hospital_three'); ?>" target="_blank" class="p-2 w-[170px] text-blue-3 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">نوبت آنلاین<img src="<?= get_stylesheet_directory_uri() ?>/imgs/nobat.svg" alt="visit"></a>
            </div>

        </div>
    <?php endif ?>

    <?php if (!empty(get_option('consultation_title'))): ?>
        <div class="bg-[#E25B30] rounded-3xl p-6 flex text-white-2 grid-rows-4 max-lg:p-4 flex-col justify-between gap-3 max-lg:w-full">

            <h3 class="text-h3 font-medium pb-2 max-lg:text-h4"><?= get_option('consultation_title') ? get_option('consultation_title') : "دریافت مشاوره"; ?></h3>
            <p class="text-caption"> <?= get_option('consultation_text') ? get_option('consultation_text') : "برای اخذ نوبت آنلاین به لینک زیر مراجعه نمایید" ?></p>

            <div class="text-left">
                <a href="<?= get_option('online_consultation'); ?>" target="_blank" class="p-2 w-[170px] text-red-1 bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">ویزیت آنلاین <img src="<?= get_stylesheet_directory_uri() ?>/imgs/visit.svg" alt="visit"></a>

            </div>

        </div>
    <?php endif ?>


    <?php if (!empty(get_option('consultation_title_two'))): ?>
        <div class="bg-[#25af5a] rounded-3xl p-6 flex text-white-2 grid-rows-4 max-lg:p-4 flex-col justify-between gap-3 max-lg:w-full">

            <h3 class="text-h3 font-medium pb-2 max-lg:text-h4"><?= get_option('consultation_title_two') ? get_option('consultation_title_two') : "دریافت مشاوره"; ?></h3>
            <p class="text-caption"> <?= get_option('consultation_text_two') ? get_option('consultation_text_two') : "برای اخذ نوبت آنلاین به لینک زیر مراجعه نمایید" ?></p>

            <div class="text-left">
                <a href="<?= get_option('online_consultation_two'); ?>" target="_blank" class="p-2 w-[170px] text-[#0d54a5] bg-white-2 flex justify-around text-caption rounded-lg float-left whitespace-nowrap">ارتباط در واتس‌اَپ <img src="<?= get_stylesheet_directory_uri() ?>/imgs/whatsapp.svg" alt="visit" class="size-5 "></a>
            </div>

        </div>
    <?php endif ?>


</div>