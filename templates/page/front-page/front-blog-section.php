<?php
$page_id = get_option('page_on_front');
//blogs queries
$blogs = get_field('choose_blogs', $page_id);

if (is_array($blogs) && count($blogs) > 0) {
    $blogs = get_field('choose_blogs', $page_id);
} else {
    $blogs = wp_get_recent_posts(array('post_type' => 'post'));
}
if (count($blogs) > 0) : ?>
    <section class=" blog-section">
        <div class="title-with-btn container">

            <div>
                <h2><?= get_field('blog_section_title', $page_id); ?></h2>
                <p><?= get_field('blog_section_description', $page_id); ?></p>
            </div>
            <a href="<?= get_field('blog_button_link', $page_id); ?>"
               class="btn"><?= get_field('blog_button_title', $page_id); ?></a>
        </div>
        <?php
        if (is_array($blogs) && count($blogs) > 0) :?>
            <!--        -------------------------------small view -->
            <div class="container swiper front-blogs-slider">
                <div class="swiper-wrapper blogs-row">
                    <?php foreach ($blogs as $key => $blog) :
                        if ($key < 3) :?>
                            <div class="swiper-slide">
                                <?php
                                set_query_var('id', $blog->ID);
                                get_template_part(
                                    'templates/components/blog-cart',
                                    null,
                                ); ?>

                            </div>
                        <?php
                        endif;
                    endforeach;
                    ?>
                </div>

                <div class="swiper-pagination"></div>
            </div>

            <!--        ------------------------------- large view -->
            <div class=" container front-blogs-row">

                <?php foreach ($blogs as $key => $blog) :
                    if ($key < 3) :

                        set_query_var('id', $blog->ID);
                        get_template_part(
                            'templates/components/blog-cart',
                            null,
                        );

                    endif;
                endforeach; ?>

            </div>
        <?php endif ?>
    </section>
<?php endif; ?><?php
