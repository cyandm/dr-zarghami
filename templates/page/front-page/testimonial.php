<?php
$page_id = get_option('page_on_front');

//testimonials query
$args = array(
    'post_type' => 'service',
    'status' => 'approve',
    'type' => 'comment',
    'author__not_in' => [7],
    'number' => 999,
);
$testimonials = get_comments($args);
if (is_array($testimonials) && count($testimonials) > 0) : ?>
    <section class="testimonial-section">
        <div class="title-with-btn container">
            <div>
                <h2><?= get_field('testimonial_section_title', $page_id) ?></h2>
                <p><?= get_field('testimonial__section_description', $page_id) ?>
                </p>
            </div>
            <div class="" id=testimonial-form>
                <a class="btn-b" href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a>
            </div>
        </div>
        <div dir="rtl" class="swiper testimonial-row testimonial-slider">
            <div class="swiper-wrapper">
                <?php foreach ($testimonials as $testimonial) : ?>
                    <div class="swiper-slide">
                        <div class="testimonial">
                            <div class="comment-title">
                                <span class="comment-name caption"><?= $testimonial->comment_author ?></span>

                                <span class="service-comment"> <span class="icon-arrow-left"></span><a href="<?= get_the_permalink($testimonial->comment_post_ID) ?>"><?= get_the_title($testimonial->comment_post_ID) ?></a></span>
                            </div>

                            <h6 class="h3"></h6>
                            <p class="description"><?= $testimonial->comment_content ?></p>
                            <div class="star-rate">

                                <?php
                                $stars = get_comment_meta($testimonial->comment_ID, 'custom_field', true);

                                for ($i = 1; $i <= 5; $i++) :
                                ?>

                                    <?php
                                    if ($i <= $stars) :
                                    ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/imgs/star.svg" alt="rate" />

                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/imgs/star-disable.svg" alt="rate" />

                                <?php endif;
                                endfor;
                                ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="btn btn-mobile" id=testimonial-form><a href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>

    </section>
<?php endif; ?>