<?php
/** Template Name: About Page*/ get_header(); ?>
<?= get_template_part('templates/page/about-page/about-slider', null, ); 
 get_template_part('templates/page/about-page/about-attr', null, ); 
 get_template_part('templates/page/about-page/about', null, );
get_template_part('templates/page/about-page/clinic-history', null, );
get_template_part('templates/page/front-page/testimonial', null, ); 
get_template_part('templates/page/about-page/Certificate', null, ); ?>
<?php get_footer() ?>