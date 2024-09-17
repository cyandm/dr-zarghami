<?php
$post_id = get_the_ID();
$podcast = get_post($post_id);
$audio_url = get_field('podcast_file', $podcast);

if (!$audio_url) return;

?>


<div class="blog-box podcast-cart">
    <div class="image-zoom">
        <div class="date">
            <span class="blog-date"><i class="icon-date"></i><span><?= get_the_date('j F Y', $post_id); ?></span></span>
        </div>
        <div class="image-card">
            <?php $thumbnail_id = get_post_thumbnail_id($podcast->ID); ?>
            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>

            <audio class="audio-player" id="player" controls>
                <source src="<?= $audio_url ?>" type="audio/mp3" />
                <source src="<?= $audio_url ?>" type="audio/ogg" />
            </audio>

        </div>
    </div>
    <div class="blog-excerpt">

        <h5 class="h3"><?= $podcast->post_title ?></h5>

    </div>
</div>