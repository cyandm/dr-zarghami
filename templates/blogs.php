<?php
$pageId = get_queried_object_id();
$stickies = get_posts(['post__in' => get_option('sticky_posts')]);

?>
<?php
/* Template Name: Blogs Page */
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
        <?php if (!empty($stickies)): ?>
            <div class="container pin-blogs-row">
                <?php foreach ($stickies as $key => $postPin) :
                    if ($key < 3) :
                        set_query_var('id', $postPin->ID);
                        get_template_part(
                            'templates/components/pin-blog-cart',
                            null,
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
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $allposts = array(
                'post_type' => 'post',
                'posts_per_page' => 8,
                'paged' => $paged,
        
            );
            $posts = new WP_Query($allposts);

            if ($posts->have_posts()) :
                 while ($posts->have_posts()) : $posts->the_post();

                    $post_id = get_the_ID();

                    set_query_var('id', $post_id);
                    get_template_part(
                        'templates/components/blog-cart',
                        null,
                    );
                     
                endwhile;

                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $posts->max_num_pages,
                    'current' => $paged,
                    'prev_text' => false,
                    'next_text' => false,
                    'end_size' => 1,
                    'mid_size' => 1,
                ));
                echo '</div>';
         
            endif;
            wp_reset_query(); ?>

        </div>
    </section>

        <section class="all-blogs">
        <div id="all" class="all-blogs-row container">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'paged' => $paged,
                     'tax_query' => [
                        [
                            'taxonomy' => 'post_tag',
                            'terms' => 'special',
                            'field' => 'slug',
                            // 'operator' => 'NOT IN',
                        ]
                    ]
                );
                $posts = new WP_Query($args);

                if ($posts->have_posts()):
                     while ($posts->have_posts()):
                        $posts->the_post();

                        $post_id = get_the_ID();

                        // set_query_var('id', $post_id);
                      
                            set_query_var('page-name', 'blogs');
                            get_template_part(
                                'templates/components/blog-special',
                                null,
                            );
                        
                     endwhile;
     
              
                endif;
                wp_reset_query(); ?>
        
            </div>
        </section>
</main>

<?php get_footer(); ?>