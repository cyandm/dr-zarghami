<?php
$termId = get_queried_object();
$page_name = get_query_var('page-name');
$args = [];
if ($page_name == 'blogs') {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 99999,
        'taxonomy' => 'category',
        'tag' => 'special'
    );
} else {
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 99999,
        'tag' => 'special',
        'tax_query' =>
        [
            'taxonomy' => 'category',
            'terms' => $termId->term_id,
            'field' => 'id',
        ],
    ];
}
$blogs = get_posts($args);
?>
</div>
<div class="special-row ">
    <div class="swiper special-blog-slider container">
        <div class="swiper-wrapper">
            <?php foreach ($blogs as $blog) :

                $author = get_field('blog_auther', $blog->ID);

                if (!$author) {
                    $author = "دکتر ضرغامی _متخصص و جراح";
                }
            ?>

                <div class="swiper-slide">
                    <div class="image-zoom">
                        <div class="date">
                            <span class="blog-date"><i class=""></i><span><?= get_the_date('j F Y', $blog->ID); ?></span></span>
                            <a href="<?= get_permalink($blog->ID) ?>">
                        </div>
                        <div class="image-card">
                            <?php $thumbnail_id = get_post_thumbnail_id($blog->ID); ?>
                            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
                        </div>
                        </a>
                    </div>
                    <div class="blog-excerpt">
                        <a href="<?= get_permalink($blog->ID) ?>">
                            <h5 class="h3"><?= $blog->post_title ?></h5>
                        </a>
                        <?php $excerpt = $blog->post_excerpt ?>
                        <p><?= (strlen($excerpt) > 300) ? substr($excerpt, 0, 300) . '...' : $excerpt; ?></p>
                        <span class="name"><?= $author ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-progress-bar">
            <span class="slide_progress-bar"></span>
        </div>
    </div>
</div>
<div class="all-blogs-row container">