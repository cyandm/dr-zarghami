<?php

/** Template Name: Partners Page*/
get_header();

$partners = get_field("choose_partners");
?>

<section class="mt2 attributes-section">
    <div class="title container">
        <h2><?= get_field('partners_section_title', $page_id); ?></h2>
        <p><?= get_field('parners_section_subtitle', $page_id); ?></p>
    </div>
    <div class="about-attributes-row container flex flex-col !gap-8">

        <?php if (is_array($partners) && count($partners) > 0) : ?>
            <?php
            $num = 0;
            foreach ($partners as $key => $partner) : ?>

                <div class="about-attribute-box <?= ($num % 2 != 0) ? 'odd-attribute' : '' ?>">
                    <div class="attribute-img">
                        <?php $img_partner =  get_field('doctor_image', $partner) ?>
                        <?= wp_get_attachment_image($img_partner, 'full', false, []); ?>
                    </div>


                    <div class="attribute-content animate-letter bg-no-repeat bg-left bg-contain" style="background-image: url(<?= $svg_back; ?>);">

                        <h3 class="h2 title_with_bg animation"> <?= get_field('doctor_title', $partner) ?></h3>

                        <div class="partner-subtitles flex flex-col gap-1 mb-4">
                            <p class="h3 partner-name"><?= get_the_title($partner) ?></p>
                            <p class="h4 partner-skill"><?= get_field('doctor_little_description', $partner) ?></p>
                        </div>


                        <div class="attribute-description">
                            <?= get_field('doctor_description', $partner) ?>
                        </div>

                        <div class="attribute-description flex flex-col mt-2 gap-2">
                            <a href="<?= get_field('doctor_address_link', $partner) ?>" style="color: #00337C">آدرس: <?= get_field('doctor_address', $partner) ?></a>
                            <a href="<?= get_field('doctor_tel', $partner) ?>" style="color: #00337C">تلفن: <?= get_field('doctor_tel', $partner) ?></a>
                        </div>
                    </div>
                </div>

                <?php $num++; ?>
            <?php endforeach; ?>
        <?php endif ?>
    </div>
</section>

<?php get_footer() ?>