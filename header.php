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

    </header>

    <!-- call icon for all pages -->
    <!-- <div class="call-icon">
        <a href="tel:<?= get_option('phone_number2') ?>">
            <img src="<?= get_stylesheet_directory_uri() ?>/imgs/call.png" alt="تماس">
        </a>
    </div> -->