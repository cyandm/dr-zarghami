<?php
$post_id = get_query_var('id');
$postPin = get_post($post_id);

$author = get_field('blog_auther', $postPin->ID);

if (!$author) {
    $author = "دکتر ضرغامی _متخصص و جراح";
}
?>
<div class="blog-pin">
    <a href="<?= get_permalink($postPin->ID) ?>">
        <div class="image-card">
            <?php $thumbnail_id = get_post_thumbnail_id($postPin->ID); ?>
            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
        </div>
    </a>
    <div class="blog-excerpt">
        <a href="<?= get_permalink($postPin->ID) ?>">
            <h5 class="h3"><?= $postPin->post_title ?></h5>
        </a>
        <p><?= $postPin->post_excerpt ?></p>
        <span class="name"><?= $author ?></span>
    </div>
</div>