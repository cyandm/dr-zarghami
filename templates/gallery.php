<?php /* Template Name: Gallery Page */ ?>
<?php get_header();

$post_id = get_the_ID();
$gallery_videos_title = get_field('gallery_videos_title');
$gallery_videos_subtitle = get_field('gallery_videos_subtitle');
$gallery_images_title = get_field('gallery_images_title');
$gallery_images_subtitle = get_field('gallery_images_subtitle');


$photo_query_args = array(
    'post_type' => 'gallery',
    'posts_per_page' => -1,
    'orderby' => array(
        'date' => 'DESC',
        'menu_order' => 'ASC',
    ),
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'gallery_department',
            'field'    => 'slug',
            'terms'    => 'photos'
        )
    )
);
$photoGallery = new WP_Query($photo_query_args);

$video_query_args = array(
    'post_type' => 'gallery',
    'posts_per_page' => -1,
    'orderby' => array(
        'date' => 'DESC',
        'menu_order' => 'ASC',
    ),
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'gallery_department',
            'field'    => 'slug',
            'terms'    => 'videos'
        )
    )
);
$videoGallery = new WP_Query($video_query_args);
?>


<section class="container mt-16">
    <div class="flex justify-center items-center title">
        <h2><?php echo $gallery_videos_title ?></h2>
        <p><?php echo $gallery_videos_subtitle ?></p>
    </div>

    <div class="flex flex-col md:flex-row gap-4 flex-wrap">

        <?php
        if ($videoGallery->have_posts()) :
            while ($videoGallery->have_posts()) : $videoGallery->the_post();
                $post_id = get_the_ID();

                get_template_part('templates/components/gallery-video-cart', null, ['post_id' => $post_id]);

            endwhile;
            wp_reset_postdata();
        endif;
        ?>


    </div>

</section>


<section class="container mt-16">
    <div class="flex justify-center items-center title">
        <h2><?php echo $gallery_images_title ?></h2>
        <p><?php echo $gallery_images_subtitle ?></p>
    </div>

    <div class="flex flex-col md:flex-row gap-4 flex-wrap">

        <?php
        if ($photoGallery->have_posts()) :
            while ($photoGallery->have_posts()) : $photoGallery->the_post();
                $post_id = get_the_ID();

                get_template_part('templates/components/gallery-image-cart', null, ['post_id' => $post_id]);

            endwhile;
            wp_reset_postdata();
        endif;
        ?>


    </div>

</section>



<?php
if ($photoGallery->have_posts()) :
    while ($photoGallery->have_posts()) : $photoGallery->the_post();


    endwhile;
    wp_reset_postdata();
endif;
?>

<?php get_footer() ?>