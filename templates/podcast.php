<?php

use LiteSpeed\Tag;

$pageId = get_queried_object_id();


?>
<?php
/* Template Name: Podcasts Page */
?>

<?php get_header(); ?>

<main class="podcasts main blogs" id="blog-overview">

    <!-- -------------------------------- All Blogs in category-->
    <section class="all-blogs">
        <div id="all" class="all-blogs-row container">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'podcast',
                'posts_per_page' => 16,
                'paged' => $paged,
                'taxonomy' => 'category',
                // 'tax_query' => [
                //     [
                //         'taxonomy' => 'post_tag',
                //         'terms' => ['special'],
                //         'field' => 'slug',
                //         'operator' => 'NOT IN',
                //     ]
                // ]
            );
            $posts = new WP_Query($args);

            if ($posts->have_posts()) :
                $counter = 1;
                while ($posts->have_posts()) : $posts->the_post();

                    $post_id = get_the_ID();

                    set_query_var('id', $post_id);
                    get_template_part(
                        'templates/components/podcast-cart',
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
            else :
                get_template_part(
                    'templates/components/empty-service-overview',
                    null,
                );
            endif;
            wp_reset_query(); ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>