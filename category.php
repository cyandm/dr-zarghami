<?php
$queried_object = get_queried_object();

$stickies = get_posts(['post__in' => get_option('sticky_posts'), 'nopaging' => true]);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 99999,
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'category',
            'terms' => $queried_object->term_id,
            'field' => 'id',
        ),
        array(
            'taxonomy' => 'post_tag',
            'terms' => ['special'],
            'field' => 'slug',
            'operator' => 'NOT IN',
        )
    )
);
$blogs = new WP_Query($args);
?>
<?php get_header(); ?>
    <main class=" main blogs" id="blog-overview">
        <!-- -------------------------------- categories tab -->
        <section class="category-tabs container">
            <?php get_template_part(
                'templates/components/category-list',
                null,
            ); ?>
            <?php get_template_part(
                'templates/components/search-blog-form',
                null,
            ); ?>
        </section>

        <!-- -------------------------------- Pin Blogs -->
        <section class=" pin-blogs">
            <?php if (is_array($stickies) && count($stickies) > 0) : ?>
                <div class="container pin-blogs-row">
                    <?php foreach ($stickies as $key => $postPin) :
                        if ($key < 3) :
                            set_query_var('id', $postPin->ID);
                            get_template_part(
                                'templates/components/pin-blog-cart',
                                'null',
                            );
                        endif;
                    endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- -------------------------------- All Blogs in category-->
        <section class="all-blogs">
            <div id="all" class="all-blogs-row container">
                <?php
                if ($blogs->have_posts()) :
                    $counter = 1;
                    while ($blogs->have_posts()) : $blogs->the_post();
                        $post_id = get_the_ID();
                        set_query_var('id', $post_id);
                        get_template_part(
                            'templates/components/blog-cart',
                            null,
                        );

                        if ($counter == 8) {
                            set_query_var('page-name', 'tax');
                            get_template_part(
                                'templates/components/blog-special',
                                null,
                            );
                        }
                        $counter++;
                    endwhile;
                else:
                    get_template_part(
                        'templates/components/empty-service-overview',
                        null,
                    );
                endif;
                    wp_reset_postdata();
                ?>
            </div>


        </section>
    </main>

<?php get_footer(); ?>