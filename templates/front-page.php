<?php /* Template Name: Front Page */ ?>
<?php get_header(); ?>
<main class="front-page flex flex-col gap-10">
  <?php get_template_part('templates/page/front-page/front-hero-section', null,);
  get_template_part('templates/page/front-page/services', null,);
  get_template_part('templates/page/front-page/insurances', null,);
  get_template_part('templates/page/front-page/about', null,);
  get_template_part('templates/page/front-page/points', null,);
  get_template_part('templates/page/front-page/sample', null,);
  get_template_part('templates/page/front-page/turn', null,);
  get_template_part('templates/page/front-page/faq', null,);
  get_template_part('templates/page/front-page/front-blog-section', null,);
  get_template_part('templates/page/front-page/podcasts', null,);
  get_template_part('templates/page/front-page/testimonial-old', null,); ?>
</main>
<?php get_footer() ?>