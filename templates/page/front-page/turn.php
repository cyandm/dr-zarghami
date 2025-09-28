<?php
$page_id = get_option('page_on_front');
?>

<section class="container" id="contact-item">
    <div class="title">
        <h2><?= get_field('turn_title', $page_id); ?></h2>
        <p><?= get_field('turn_subtitle', $page_id); ?></p>
    </div>
    <?= get_template_part('templates/components/contact', null,);  ?>
</section>