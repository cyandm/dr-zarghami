<?php
$page_id = get_option('page_on_front');
$testimonials_group = get_field('testimonial_files', $page_id);


if (is_array($testimonials_group) && count($testimonials_group) > 0) : ?>
    <section class="testimonial-section container">
        <div class="title-with-btn">
            <div>
                <h2><?= get_field('testimonial_section_title', $page_id) ?></h2>
                <p><?= get_field('testimonial__section_description', $page_id) ?></p>
            </div>
            <div class="" id=testimonial-form>
                <a class="btn-b" href="/comment"><?= get_field('testimonial_button_title', $page_id) ?></a>
            </div>
        </div>

        <div dir="rtl" class="swiper testimonial-row testimonial-slider pb-8">
            <div class="swiper-wrapper slider-height">
                <?php foreach ($testimonials_group as $testimonial) : ?>

                    <div class="swiper-slide max-h-[420px] flex">
                        <div class="testimonial w-full [&>.plyr]:w-full [&>.plyr]:max-h-[265px] justify-between">

                            <div class="comment-title font-medium text-sm">
                                <span class="comment-name">
                                    <?= get_the_title($testimonial) ?>
                                </span>

                                <span class="service-comment">

                                    <?php
                                    $service_cat = get_the_terms($testimonial, 'category');
                                    if ($service_cat): ?>

                                        <span class="icon-arrow-left"></span>

                                        <?php foreach ($service_cat as $cat): ?>

                                            <span><?php echo $cat->name; ?></span>

                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </span>
                            </div>

                            <?php $testimonial_video = get_field('testimonial_video', $testimonial);
                            if ($testimonial_video):
                            ?>

                                <video id="player" class="rounded-2xl w-full fade-in-down aspect-square video-player" playsinline controls poster="<?= get_the_post_thumbnail_url($testimonial) ?>" data-poster="<?= get_the_post_thumbnail_url($testimonial) ?>">
                                    <source src="<?= $testimonial_video['url'] ?>" type="video/mp4" />
                                </video>

                            <?php endif; ?>

                            <?php setup_postdata($testimonial) ?>

                            <?php if (get_the_content($testimonial)): ?>

                                <p class="description"><?= get_the_content($testimonial); ?></p>

                            <?php endif ?>

                            <div class="star-rate flex flex-row gap-1 pt-2">
                                <?php
                                $stars = get_field('testimonial_star', $testimonial);
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
                <?php
                endforeach; ?>
            </div>

            <div class="w-full flex justify-center items-center">
                <div class="swiper-pagination md:!w-[285px] !w-full max-md:!left-[unset]"></div>
            </div>

            <div class="swiper-btn-row flex">

                <div class="swiper-btn flex flex-row justify-between">
                    <div class="swiper-button-prev w-11 h-11 border rounded-2xl bg-[#ffffff] after:text-xl after:text-[#000000]"></div>
                    <div class="swiper-button-next w-11 h-11 border rounded-2xl bg-[#ffffff] after:text-xl after:text-[#000000]"></div>
                </div>
            </div>

        </div>

        <div class="container  btn-mobile" id=testimonial-form>
            <a href="/comment" class="btn w-full"><?= get_field('testimonial_button_title', $page_id) ?>
            </a>
        </div>

    </section>
<?php endif; ?>