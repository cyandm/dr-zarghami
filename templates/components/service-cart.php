


<?php $post_id =get_the_ID();
$thumbnail_id = get_the_post_thumbnail($post_id);
 ?>
<a href="<?php the_permalink($post_id) ?>" class=" w-full right-0">
    <div class="card  flex [&_img]:w-2/4">
                <?= $thumbnail_id ?>
        <div class="detail w-2/4">
            <p class="paragraph">
                <?= get_the_title($post_id);
                ?>
            </p>
            <?= get_the_content($post_id); ?>
        </div>
    </div>
</a>