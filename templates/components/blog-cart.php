<?php
$post_id = get_query_var('id');
$blog = get_post($post_id);
$author = get_field('blog_auther', $blog->ID);

if (!$author) {
    $author = "دکتر ضرغامی _متخصص و جراح";
}
?>


<div class="blog-box">
    <div class="image-zoom">
        <div class="date">
            <span class="blog-date"><i class="icon-date"></i><span><?= get_the_date('j F Y', $post_id); ?></span></span>
            <a href="<?= get_permalink($blog->ID) ?>">
        </div>
        <div class="image-card">
            <?php $thumbnail_id = get_post_thumbnail_id($blog->ID); ?>
            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
        </div>
        </a>
    </div>
    <div class="blog-excerpt">
        <span class="name"><?= $author ?></span>
        <a href="<?= get_permalink($blog->ID) ?>">
            <h5 class="h3"><?= $blog->post_title ?></h5>
        </a>
        <?php $excerpt = $blog->post_excerpt ?>
        <?php if ($excerpt) : ?>
            <p><?= $excerpt ?></p>
        <?php endif; ?>
    </div>
</div>