<?php
$post_id = get_queried_object_id();
$blog = get_post($post_id);

$currentCat = get_the_category($post_id);
$args = [
    'post_type' => 'post',
    'posts_per_page' => 99999,
    'tag' => 'special',
    'tax_query' =>
    [
        'taxonomy' => 'category',
        'terms' => $currentCat[0]->term_id,
        'field' => 'id',
    ],
];
$blogs = get_posts($args);


$author = get_field('blog_auther', $post_id);

if (!$author) {
    $author = "دکتر ضرغامی _متخصص و جراح";
}
?>
<main class="  main single-blog">
    <section class="single-blog">
        <div class="container main-container">
            <div class="breadcramb container">
                <?php $currentCat = get_the_category($post_id); ?>
                <ul>
                    <li><a href="<?= get_term_link($currentCat[0]->term_id); ?>"><?= $currentCat[0]->name; ?></a>
                    </li>
                    <i class="icon-arrow"></i>
                    <li class="current"><?= get_the_title(); ?></li>
                </ul>
            </div>
            <div class="blog-content ">
                <?php
                get_template_part(
                    'templates/components/blog-sidebar',
                    null,
                );
                ?>
                <div class="all-content container">
                    <h1 class="h2"><?= get_the_title($post_id) ?></h1>
                    <div class="blog-img-single">
                        <?= wp_get_attachment_image(get_field('blog_main_img', $post_id), 'full', false, []); ?>
                    </div>
                    <div class="author-info">
                        <span class="name"><?= $author ?></span>
                        <span class="blog-date"><i class="icon-date"></i><span><?= get_the_date('j F Y', $post_id); ?></span></span>
                    </div>
                    <?php if ($blog->post_content) : ?>
                        <div class="content-single" id="content-single">
                            <?= get_the_content(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="blog-comments">
                        <div class="single-comment-number">
                            <h6><span> <?php echo get_comments_number($post_id); ?></span> دیدگاه</h6>
                        </div>
                        <?php comments_template(); ?>
                    </div>
                    <?php
                    if (is_array($blogs) && count($blogs) > 0) : ?>
                        <div class="mobile-recommended-blogs">
                            <h5>بیشتر خوانده شده </h5>

                            <div class="pin-blog-sidebar">
                                <?php foreach ($blogs as $blog) :
                                    set_query_var('id', $blog->ID);
                                    get_template_part(
                                        'templates/components/blog-cart',
                                        null,
                                    );
                                endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>