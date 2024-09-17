<?php
$post_id = $args['post-id'] ?? get_the_ID();

?>
<div class="blog-pin">

    <div class="image-card">
        <?= get_the_post_thumbnail($post_id, 'full') ?>
    </div>

    <div class="blog-excerpt">
        <div href="<?= get_permalink($post_id) ?>">
            <h5 class="h3"><?= get_the_title($post_id) ?></h5>
        </div>
        <p><?= get_the_excerpt($post_id) ?></p>
    </div>
</div>