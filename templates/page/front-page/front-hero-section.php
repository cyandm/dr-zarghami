<?php
$page_id = get_option('page_on_front');

$heroText11 = get_field('hero_text_1', $page_id);
$heroText12 = get_field('hero_text_2', $page_id);
$btnLink = get_field('hero_button_link', $page_id);
$imgSmall = get_field('image_helth_small', $page_id);
?>


<section class="hero-section ">
    <!--    ---------------------------- mobile and tablet view-->
    <div class="hero hero-small-view">
        <div class="small-view container">
            <div class="hero-image-efect">
                <img class="hero-fade-bg" src="<?= get_stylesheet_directory_uri() ?>/imgs/hero-bg.svg" alt="">
                <div class="hero-bg-img">
                    <?php $backImg = get_field('background_image', $page_id); ?>
                    <?= wp_get_attachment_image($backImg, 'full', false, []); ?>
                </div>
            </div>
        </div>

        <?php $heroServices = get_field('hero_choose_services', $page_id);
        if ($heroServices) :
            if (is_array($heroServices) || count($heroServices) > 0) : ?>
                <div class="swiper home-service-slider">
                    <div class="swiper-wrapper">
                        <?php
                        $classNum = 1;
                        foreach ($heroServices as $key => $item) : ?>
                            <?php if ($key < 7) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= get_the_permalink($item); ?>">
                                        <div class="hero-service-box box-<?= $classNum ?>">
                                            <div class="service-box-title">
                                                <h4 class="h4"><?= $item->post_title ?></h4>
                                                <p class="caption"><?= get_field('sub_title', $item->ID) ?></p>
                                            </div>
                                            <div class="service-box-img">
                                                <?php $thumbnail_id = get_post_thumbnail_id($item->ID); ?>
                                                <?= wp_get_attachment_image($thumbnail_id, 'thumbnail', false, []); ?>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php
                            $classNum++;
                        endforeach; ?>
                        <!-- ---------------------------------repeat loop -->
                        <?php
                        $classNum2 = 1;
                        foreach ($heroServices as $key => $item) : ?>
                            <?php if ($key < 7) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= get_the_permalink($item); ?>">
                                        <div class="hero-service-box box-<?= $classNum ?>">
                                            <div class="service-box-title">
                                                <h4 class="h4"><?= $item->post_title ?></h4>
                                                <p class="caption"><?= get_field('sub_title', $item->ID) ?></p>
                                            </div>
                                            <div class="service-box-img">
                                                <?php $thumbnail_id = get_post_thumbnail_id($item->ID); ?>
                                                <?= wp_get_attachment_image($thumbnail_id, 'thumbnail', false, []); ?>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php
                            $classNum2++;
                        endforeach; ?>
                        <!-- ---------------------------------repeat loop -->
                        <?php
                        $classNum3 = 1;
                        foreach ($heroServices as $key => $item) : ?>
                            <?php if ($key < 7) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= get_the_permalink($item); ?>">
                                        <div class="hero-service-box box-<?= $classNum ?>">
                                            <div class="service-box-title">
                                                <h4 class="h4"><?= $item->post_title ?></h4>
                                                <p class="caption"><?= get_field('sub_title', $item->ID) ?></p>
                                            </div>
                                            <div class="service-box-img">
                                                <?php $thumbnail_id = get_post_thumbnail_id($item->ID); ?>
                                                <?= wp_get_attachment_image($thumbnail_id, 'thumbnail', false, []); ?>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php
                            $classNum3++;
                        endforeach; ?>
                    </div>
                </div>
        <?php endif;
        endif; ?>

        <div class="hero-text container">
            <?php if ($heroText11) : ?>
                <h1 class="hero-title t2"><?= $heroText11 ?></h1>
            <?php endif; ?>
            <div class="animate-text animate-letter">
                <?php if ($heroText12) : ?>
                    <h2 class="body title_with_bg animation"><?= $heroText12 ?><span class="focuse"></span>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="button-div">
                <?php if ($btnLink) : ?>
                    <a href="<?= $btnLink ?>" class="btn-b"><?= get_field('hero_button_title', $page_id); ?></a>
                <?php endif; ?>
                <?php if ($imgSmall) : ?>
                    <?= wp_get_attachment_image($imgSmall, 'thumbnail', false, []); ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!--    ---------------------------- landing view-->
    <div class="hero hero-landing container">
        <div class="hero-text">
            <?php if ($heroText11) : ?>
                <h1 class="hero-title t2"><?= $heroText11 ?></h1>
            <?php endif; ?>
            <div class="animate-text animate-letter">
                <?php if ($heroText12) : ?>
                    <h2 class="h3 title_with_bg animation"><span class="focuse"><?= $heroText12 ?></span>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="button-div">
                <?php if ($btnLink) : ?>
                    <a href="<?= $btnLink ?>" class="btn-b"><?= get_field('hero_button_title', $page_id); ?></a>
                <?php endif; ?>
                <?php if ($imgSmall) : ?>
                    <?= wp_get_attachment_image($imgSmall, 'thumbnail', false, []); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="hero-image-efect">
            <img class="hero-fade-bg" src="<?= get_stylesheet_directory_uri() ?>/imgs/hero-bg.svg" alt="">
            <div class="hero-bg-img">
                <?php $backImg = get_field('background_image', $page_id); ?>
                <?= wp_get_attachment_image($backImg, 'full', false, []); ?>
            </div>
            <?php $heroServices = get_field('hero_choose_services', $page_id);
            if ($heroServices) :
                if (is_array($heroServices) || count($heroServices) > 0) :
                    $classNum = 1;
                    foreach ($heroServices as $key => $item) :
                        if ($key < 4) : ?>
                            <a href="<?= get_the_permalink($item); ?>">
                                <div class="hero-service-box box-<?= $classNum ?>">
                                    <div class="service-box-title">
                                        <h4 class="h4"><?= $item->post_title ?></h4>
                                        <p class="caption"><?= get_field('sub_title', $item->ID) ?></p>
                                    </div>
                                    <div class="service-box-img">
                                        <?php $thumbnail_id = get_post_thumbnail_id($item->ID); ?>
                                        <?= wp_get_attachment_image($thumbnail_id, 'thumbnail', false, []); ?>

                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php
                        $classNum++;
                    endforeach; ?>
            <?php
                endif;
            endif; ?>
        </div>

    </div>

    <!--    -------------------------------------------------- bubble effects-->
<!-- 
    <div id="background-wrap">
        <div class="bubble x1"></div>
        <div class="bubble x11"></div>
        <div class="bubble x22"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x33"></div>
        <div class="bubble x4"></div>
        <div class="bubble x44"></div>
        <div class="bubble x55"></div>
        <div class="bubble x6"></div>
        <div class="bubble x66"></div>
        <div class="bubble x77"></div>
        <div class="bubble x8"></div>
        <div class="bubble x88"></div>
        <div class="bubble x9"></div>
        <div class="bubble x99"></div>
        <div class="bubble x10"></div>
        <div class="bubble x1010"></div>
    </div> -->

</section>