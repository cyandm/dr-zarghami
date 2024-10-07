<?php $post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$product_cat = get_the_terms($post_id, 'category'); ?>

<div class="swiper-slide">
    <div class="testimonial">
        <div class="comment-title">
            <span class="comment-name caption"><?= get_the_title() ?></span>

            <span class="service-comment"> <span class="icon-arrow-left"></span><?php foreach ($product_cat as $cat) {
                                                                                    echo $cat->name;
                                                                                } ?></span>
        </div>

        <h6 class="h3"></h6>
        <p class="description"><?= get_the_content(); ?></p>
        <div class="star-rate">

            <?php
            // $stars = get_comment_meta($testimonial->comment_ID, 'custom_field', true);
            $stars = get_field('testimonial_star', $post_id);
            for ($i = 1; $i <= 5; $i++):
            ?>

                <?php
                if ($i <= $stars):
                ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/star.svg" alt="rate" />
                <?php else: ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/star-disable.svg" alt="rate" />


            <?php endif;
            endfor; ?>

        </div>
    </div>
</div>