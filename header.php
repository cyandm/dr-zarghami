<?php
$front_id = get_option('page_on_front');
$page_id = get_queried_object_id();

// $headerCallNumber = get_field('call_number_header', $page_id);
// $headerCallNumberTitle = get_field('call_number_btn_title', $page_id);

$defaultBtnTitle = get_field('default_header_btn_title', $front_id);
$defaultCallNumber = get_field('call_number', $front_id); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W3H8TTK9');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= the_title() ?></title>

    <?php wp_head() ?>

</head>

<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3H8TTK9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>

    <header>
        <div class="container mobile-header">
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


            <div class="btn-contain">
             <a href="<?= get_option('visit_but_link'); ?>" class="btn open-call-popup">
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
            <div class="btn-contain">
                <a href="<?= get_option('visit_but_url'); ?>" class="btn open-call-popup">
                    <?= get_option('visit_but_text') ? get_option('visit_but_text') : "دریافت نوبت" ?>
                </a>
            </div>
        </div>

        <!-- <div class="call-popup w-full absolute min-h-screen top-0 bg-[#38383869] z-[9999] backdrop-blur flex justify-center content-center items-center hide-popup" id="call-popup">

            <div class="call-popup-wrapper bg-[#ffffff] z-[99999] rounded-2xl pt-4 pb-8 px-4 w-[35%] max-xl:w-[50%] max-md:w-[90%]" id="call-popup-banner">

                <div class="call-popup-icon w-full flex content-end justify-end">
                    <i class="icon-close-circle cursor-pointer text-xl" id="call-popup-closer"></i>
                </div>

                <div class="call-popup-items flex flex-col items-center gap-6 justify-center">

                    <div class="call-popup-text">
                        <p class="h2"><?= get_option("social_link_text"); ?></p>
                    </div>

                    <div class="grayscale flex items-center gap-3 justify-center">

                        <?php
                        for ($i = 1; $i < 6; $i++) {
                        ?>
                            <a href="<?= get_option("social_link_$i"); ?>" class="w-8 h-auto flex items-center aspect-square">
                                <img src="<?= get_option("social_logo_$i") ?>" />

                            </a>

                        <?php } ?>

                    </div>

                </div>

            </div>
        </div> -->

    </header>

    <!-- call icon for all pages -->
    <!-- <div class="call-icon">
        <a href="tel:<?= get_option('phone_number2')?>">
            <img src="<?= get_stylesheet_directory_uri() ?>/imgs/call.png" alt="تماس">
        </a>
    </div> -->