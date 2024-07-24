<?php $page_id = get_queried_object_id();
$svg_back = get_stylesheet_directory_uri() . "/imgs/hero-bg.svg";

$attributes = get_field('attributes_group', $page_id);
if (is_array($attributes) && count($attributes) > 0): ?>
    <section class="mt2 attributes-section">
        <div class="title container">
            <h2><?= get_field('attributes_title', $page_id); ?></h2>
            <p><?= get_field('attributes_description', $page_id); ?></p>
        </div>
        <div class="about-attributes-row container">
            <?php
            $num = 0;
            foreach ($attributes as $key => $attribute): ?>
                <?php if ($attribute['attribute_img'] && $attribute['attribute_description']): ?>
                    <div class="about-attribute-box <?= ($num % 2 != 0) ? 'odd-attribute' : '' ?>">
                        <div class="attribute-img">
                            <?= wp_get_attachment_image($attribute['attribute_img'], 'full', false, []); ?>
                        </div>
                        <div class="attribute-content animate-letter bg-no-repeat bg-left bg-contain		"
                            style="background-image: url(<?= $svg_back; ?>);">

                            <h3 class="h2 title_with_bg animation"><?= $attribute['attribute_title'] ?>
                            </h3>
                            <div class="attribute-description">
                                <?= $attribute['attribute_description'] ?>
                            </div>
                        </div>
                    </div>
                    <?php $num++;
                endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>