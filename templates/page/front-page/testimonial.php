<?php
$page_id = get_option('page_on_front');
$testimonials_group = get_field('testimonial_files', $page_id);


if (is_array($testimonials_group) && count($testimonials_group) > 0) : ?>
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
<?php endif; ?>