<?php
$s = get_search_query();
$args = array(
    's' => $s
);
// count search query
$the_query = new WP_Query($args);
$count = 0;
foreach ($the_query->posts as $post) {

    $count++;
}
?>
<?php
get_header()
?>
<main class=" main blog-search">

    <section>
        <div class="search-content container">
            <?php
            get_template_part(
                'templates/components/blog-sidebar',
                null,
            );
            ?>

            <div class="result-content ">
                <div class="search-title">
                    <h2 class="h3"> نتیجه جستجو برای<span class="search-keyword"><?= get_search_query(); ?></span></h2>

                    <?php if ($count <= 0) : ?>
                        <h3>متاسفانه چیزی یافت نشد</h3>
                </div>
                <div class="not-found-img">
                <div class="cloudy-circle"><div class="dark"></div><div class="light"></div></div>
                    <img src="<?= get_stylesheet_directory_uri() ?>/imgs/not-found.png" alt="not-found">
                </div>
            <?php else : ?>
            </div>
        <?php endif; ?>

        <div class="result-row">
            <?php if (have_posts()) :
                while (have_posts()) : the_post();
                    if (get_post_field('post_type', get_the_id()) == 'post') :

                        set_query_var('id', get_the_id());
                        get_template_part(
                            'templates/components/blog-cart',
                            null,
                        );
                    endif;
                endwhile;
            endif;
            ?>
        </div>
        </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>