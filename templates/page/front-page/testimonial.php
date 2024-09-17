<?php
$page_id = get_option('page_on_front');
$testimonials_group = get_field('testimonial_files', $page_id);
$term_query = new WP_Query(
    array(
        'post_type' => 'podcast',
        'posts_per_page' => 4,

    )
);



$testimonials = get_comments($args);
?>
     <section class="testimonial-section container">
        <div class="title-with-btn">
            <div>
                <h2><?= get_field('testimonial_section_title', $page_id) ?></h2>
                <p><?= get_field('testimonial__section_description', $page_id) ?>
                </p>
            </div>
            <div class="" id=testimonial-form>
                <a class="btn-b" href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a>
            </div>
        </div>






        <div class="grid grid-cols-4 gap-4 pc">
          <?php
    while ($term_query->have_posts()):
        $term_query->the_post();
        $post_id = get_the_ID(); ?>
        <div>

            <?php get_template_part('templates/components/podcast-cart', null, ['post_id' => $post_id]); ?>

        </div>
    <?php endwhile; ?>
</div>




    <?php if (is_array($testimonials) && count($testimonials) > 0): ?>
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
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="comment-title">
                                    <span class="comment-name caption"><?= $testimonial->comment_author ?></span>
    
                                    <span class="service-comment"> <span class="icon-arrow-left"></span><a
                                            href="<?= get_the_permalink($testimonial->comment_post_ID) ?>"><?= get_the_title($testimonial->comment_post_ID) ?></a></span>
                                </div>
    
                                <h6 class="h3"></h6>
                                <p class="description"><?= $testimonial->comment_content ?></p>
                                <div class="star-rate">
    
                                    <?php
                                    $stars = get_comment_meta($testimonial->comment_ID, 'custom_field', true);

                                    for ($i = 1; $i <= 5; $i++):
                                        ?>
    
                                        <?php
                                        if ($i <= $stars):
                                            ?>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/star.svg" alt="rate" />
    
                                        <?php else: ?>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/star-disable.svg" alt="rate" />
    
                                        <?php endif;
                                    endfor;
                                    ?>
    
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
    
            <div class="btn btn-mobile" id=testimonial-form><a
                    href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a></div>
    
        </section>
    <?php endif; ?>













    




        
        <div dir="rtl" class="swiper testimonial-row testimonial-slider pb-8">
            <div class="swiper-wrapper">
                <?php foreach ($testimonials_group as $testimonial) : ?>

                    <?php $testimonial_video = get_field('testimonial_video', $testimonial);
                    if ($testimonial_video):
                    ?>

                        <div class="swiper-slide">
                            <div class="testimonial">

                                <video id="player" class="rounded-2xl w-full fade-in-down aspect-square video-player" playsinline controls poster="<?= get_the_post_thumbnail_url($testimonial) ?>" data-poster="<?= get_the_post_thumbnail_url($testimonial) ?>">
                                    <source src="<?= $testimonial_video['url'] ?>" type="video/mp4" />
                                </video>

                            </div>
                        </div>

                <?php
                    endif;
                endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="container  btn-mobile" id=testimonial-form>
            <a href="/comment" class="btn w-full"><?= get_field('testimonial_button_title', $page_id) ?>
            </a>
        </div>

    </section>
 