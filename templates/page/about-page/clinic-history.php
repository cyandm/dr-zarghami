<?php  $page_id = get_queried_object_id();
 $attributes = get_field('attributes_group', $page_id);
  if (is_array($attributes) && count($attributes) > 0) : ?>
    <section class="mt2 clinic-history-section">
        <div class="title container">
            <h2><?= get_field('clinic_history_title', $page_id); ?></h2>
            <p><?= get_field('clinic_history_sub_title', $page_id); ?></p>
        </div>
        <div class="clinic-history-row container">
            <div class="clinic-history-img">
                <?= wp_get_attachment_image(get_field('clinic_history_img', $page_id), 'full', false, []); ?>
            </div>
            <div class="clinic-history-content">
                <?= get_field('clinic_history_description', $page_id); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<div class="title last-comment-title container">
    <h2><?= get_field('last_comment_title', $page_id); ?></h2>
    <p><?= get_field('last_comment_sun_title', $page_id); ?></p>
</div>