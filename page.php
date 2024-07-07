<?php

/* Template Name: Default Page */


get_header()
?>
    <main class=" main default-page container">
		<h1>
		<?= get_the_title() ?>
			
		</h1>
        <?php the_content(); ?>
    </main>
<?php get_footer(); ?>