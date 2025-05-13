<?php
$front_id = get_option('page_on_front');
$page_id = get_queried_object_id();

// $headerCallNumber = get_field('call_number_header', $page_id);
// $headerCallNumberTitle = get_field('call_number_btn_title', $page_id);

$defaultBtnTitle = get_field('default_header_btn_title', $front_id);
$defaultCallNumber = get_field('call_number', $front_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= the_title() ?></title>

    <?php wp_head() ?>

</head>


<body>

    <?php wp_body_open(); ?>

    <?php get_template_part('templates/components/preloader'); ?>


    <header class="w-full z-[999]">
        <div class="container mobile-header">

            <div class="flex justify-center items-center gap-2">

                <div class="hamburger-menu">
                    <i class="icon-menu"></i>
                </div>
                <div class="mobile-menu">
                    <div class="mobile-menu-detail">
                        <div class="logo-close-btn">
                            <div class="icon-close-div">
                                <i class="icon-close-circle" id="close-menu"></i>
                            </div>
                            <div class="mobile-logo-contain">
                                <?php the_custom_logo() ?>
                            </div>
                        </div>
                        <div class="menu-contain">
                            <?php wp_nav_menu(['menu' => 'header-menu']); ?>

                        </div>


                    </div>
                </div>

                <div class="relative group">
                    <div class="shadow-xl rounded-full bg-[#ffffff] p-2 w-10 h-10 flex justify-center items-center cursor-pointer border border-blue-4 transition-all duration-200 group-hover:[&>svg]:fill-blue-4 [&>svg]:w-8 [&>svg]:h-8">
                        <!-- <img src="<?= get_stylesheet_directory_uri() ?>/imgs/earth.svg" alt="visit" class="group-hover:opacity-0">
                        <img src="<?= get_stylesheet_directory_uri() ?>/imgs/earth-white.svg" alt="visit" class="group-hover:opacity-1"> -->

                        <?php echo get_template_part('imgs/earth'); ?>

                    </div>

                    <div class="absolute -left-[50%] top-[120%] bg-[#ffffff] rounded-xl shadow-lg p-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 group-hover:top-[105%] transition-all duration-200">
                        <div class="flex flex-col gap-2 justify-center items-center">
                            <!-- <a href="#" class="text-gray-700 hover:text-blue-4 transition-all duration-200 py-2 px-4 rounded-lg hover:bg-gray-50 w-fit">English</a> -->
                            <a href="/ar" class="text-gray-700 hover:text-blue-4 transition-all duration-200 py-2 px-3 rounded-lg hover:bg-gray-50 w-fit">العربية</a>
                            <!-- <a href="#" class="text-gray-700 hover:text-blue-4 transition-all duration-200 py-2 px-4 rounded-lg hover:bg-gray-50 w-fit">فارسی</a> -->
                        </div>
                    </div>
                </div>

            </div>


            <div class="btn-contain">
                <a href="<?= get_option('visit_but_url'); ?>" class="btn open-call-popup">
                    <?= get_option('visit_but_text') ? get_option('visit_but_text') : "دریافت نوبت" ?>
                </a>
            </div>
        </div>

        <div class="container header-row">
            <div class="logo-contain">
                <?php the_custom_logo() ?>
            </div>
            <div class="menu-contain">
                <?php wp_nav_menu(['menu' => 'header-menu']); ?>
            </div>

            <div class="btn-contain flex justify-between items-center gap-4">

                <div class="relative group">
                    <div class="shadow-xl rounded-full bg-[#ffffff] p-2 w-12 h-12 flex justify-center items-center cursor-pointer border border-blue-4 transition-all duration-200 group-hover:[&>svg]:fill-blue-4 [&>svg]:w-8 [&>svg]:h-8">
                        <!-- <img src="<?= get_stylesheet_directory_uri() ?>/imgs/earth.svg" alt="visit" class="group-hover:opacity-0">
                        <img src="<?= get_stylesheet_directory_uri() ?>/imgs/earth-white.svg" alt="visit" class="group-hover:opacity-1"> -->

                        <?php echo get_template_part('imgs/earth'); ?>

                    </div>

                    <div class="absolute -left-[40%] top-[120%] bg-[#ffffff] rounded-xl shadow-lg p-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 group-hover:top-[105%] transition-all duration-200">
                        <div class="flex flex-col gap-2 justify-center items-center">
                            <!-- <a href="#" class="text-gray-700 hover:text-blue-4 transition-all duration-200 py-2 px-4 rounded-lg hover:bg-gray-50 w-fit">English</a> -->
                            <a href="/ar" class="text-gray-700 hover:text-blue-4 transition-all duration-200 py-2 px-4 rounded-lg hover:bg-gray-50 w-fit">العربية</a>
                            <!-- <a href="#" class="text-gray-700 hover:text-blue-4 transition-all duration-200 py-2 px-4 rounded-lg hover:bg-gray-50 w-fit">فارسی</a> -->
                        </div>
                    </div>
                </div>

                <a href="<?= get_option('visit_but_url'); ?>" class="btn open-call-popup">
                    <?= get_option('visit_but_text') ? get_option('visit_but_text') : "دریافت نوبت" ?>
                </a>
            </div>
        </div>

    </header>

    <!-- call icon for all pages -->
    <!-- <div class="call-icon">
        <a href="tel:<?= get_option('phone_number2') ?>">
            <img src="<?= get_stylesheet_directory_uri() ?>/imgs/call.png" alt="تماس">
        </a>
    </div> -->