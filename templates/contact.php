<?php

/**
 * Template Name: Contact Page
 */
?>
<?php get_header();
?>
<main class=" main " id=" contact-page">
    <section class="container">
        <div class="title mt-10">
            <h2><?= get_the_title();
                ?></h2>
            <p><?= get_the_content();
                ?></p>
        </div>
        <?= get_template_part('templates/components/contact', null,);  ?>
    </section>
</main>

<?php get_footer() ?>