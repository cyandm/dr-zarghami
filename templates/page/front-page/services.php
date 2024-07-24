<?php
$page_id = get_option('page_on_front');
$allServices = get_field('choose_services', $page_id);
$categories = get_terms([
    'taxonomy' => 'service_type',
    'hide_empty' => false,
    'number' => 5
]);

$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
 ?>
<section class="container services-section  flex flex-col items-center">
    <div class="title">
        <h2><?= get_field('services_section_title', $page_id); ?></h2>
        <p><?= get_field('services_section_title_description', $page_id); ?></p>
    </div>
    <div class="service-tabs relative flex   w-full">
        <div class="tab-row w-full ">
            <?php
            foreach ($categories as $key => $cat): ?>
                <div class="tab relative w-full  <?= ($key == 0) ? 'active' : '' ?>" id="<?= $key; ?>">
                    <button id="<?= $key ?>"
                        class="first-row w-full  tablinks landing-tablinks <?= ($key == 0) ? 'active' : '' ?>"
                        href="<?= get_term_link($cat->term_id) ?>"><?= $cat->name; ?>
                    </button>
                    
                    <?php $services = new WP_Query(
                        array(
                            'post_type' => 'service',
                            'tax_query' => [
                                array(
                                    'taxonomy' => 'service_type',
                                    'field' => 'slug',
                                    'terms' => $cat->slug
                                )
                            ]
                        )
                    );
                    ?>

                    <div class="relative right-0 cat-tab top-28 w-full   gap-8 " id="<?= $key; ?>">


                        <?php

                        while ($services->have_posts()):
                            $services->the_post();
                            $post_id = get_the_ID(); ?>
                            <div class=" gap-8 content  ">
                                <button type="radio" name="tabs" class=" radios flex <?= ($key == 0) ? 'active' : '' ?>"
                                    id=" ">
                                    <?= get_the_title($post_id); ?></button>
                                <div class="service-cart rel w-screen <?= ($key == 0) ? 'active' : '' ?>">
                                    
                                    <?= get_template_part('/templates/components/service-cart', '', ['post_id' => $post_id]); ?>
                                </div>

                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>

            <?php endforeach;
            ?>
        </div>
    </div>
</section>











<!-- 


 