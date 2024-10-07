<?php
$page_id = get_option('page_on_front');

//testimonials query
$testimonials = new WP_Query(
    array(
        'post_type' => 'testimonial',

    )
);
?>

<section class="testimonial-section">
    <div class="title-with-btn container">
        <div>
            <h2><?= get_field('testimonial_section_title', $page_id) ?></h2>
            <p><?= get_field('testimonial__section_description', $page_id) ?>
            </p>
        </div>
        <div class="btn" id=testimonial-form><a
                href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>
    </div>
    <div dir="rtl" class="swiper testimonial-row testimonial-slider">
        <div class="swiper-wrapper">


            <div class="grid grid-cols-4 gap-4 pc">
                <?php
                while ($testimonials->have_posts()):
                    $testimonials->the_post();
                    $post_id = get_the_ID();
                ?>
                    <div>

                        <?php get_template_part('templates/components/testimonial-cart', null, ['post_id' => $post_id]); ?>

                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </div>

    <div class="btn btn-mobile" id=testimonial-form><a
            href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>

</section>