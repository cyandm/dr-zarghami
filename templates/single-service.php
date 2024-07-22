<?php
$page_id = get_queried_object_id();
$front_id = get_option('page_on_front');

$img = get_field('service_img', $page_id);
$extraServices = get_field('sub_service_group', $page_id);
$doctors = get_field('team_images', $page_id);
$videos = get_field('video_group', $page_id);
$blogs = get_field('choose_blogs', $page_id);
?>

<main class="  main single-service-page">
    <!--    ******************************************* single service main section-->
    <section class="single-service ">
        <?php $excerpt = get_field('service_description', $page_id);
        if ($excerpt && $img) : ?>
            <div class="single-service-text container">
                <div class="has-border">
                    <h1 class="h2"><?= get_field('service_title', $page_id); ?></h1>
                    <div class="single-excerpt-content"><?= $excerpt ?></div>
                </div>
                <a href="tel:<?= get_field('service_call_link', $page_id); ?>" class="btn-b">تماس بگیر</a>
            </div>
            <div class="single_service-img">
                <?= wp_get_attachment_image($img, 'full', false, []); ?>
            </div>
        <?php endif; ?>
    </section>

    <!--    *******************************************  extra-services section-->
    <section class="extra-services ">
        <div class="title-2 container">
            <h2 class="h1"><?= get_field('sub_service_title', $page_id); ?></h2>
            <p><?= get_field('sub_servise_sub_title', $page_id); ?></p>
        </div>
        <div class="extra-services-row container">
            <?php if (is_array($extraServices) && count($extraServices) > 0) :
                foreach ($extraServices as $key => $extra) :
                    if ($extra['sub_service_description'] && $extra['sub_service_img']) : ?>
                        <div class="service-box <?= ($key == 'sub_service_1') ? 'active' : '' ?>">
                            <?= wp_get_attachment_image($extra['sub_service_img'], 'full', false, []); ?>
                            <h5><?= $extra['sub_service_title']; ?></h5>
                            <div class="sub-serveic-description"><?= $extra['sub_service_description']; ?></div>
                        </div>
            <?php endif;
                endforeach;
            endif; ?>
        </div>

    </section>

    <!--    *******************************************  doctors section-->

    <section class="doctor-section">
        <div class="title-2 container">
            <h2 class="h1"><?= get_field('doctor_title', $page_id); ?></h2>
            <p><?= get_field('doctor_sub_title', $page_id); ?></p>
        </div>
        <div class="doctors-team container">
            <div class="team-images">

                <?php if (is_array($doctors) && count($doctors) > 0) :
                    foreach ($doctors as $key => $doctor) : ?>

                        <div class="team-img <?= $key ?>">
                            <?= wp_get_attachment_image($doctor, "full") ?>
                        </div>

                <?php
                    endforeach;
                endif; ?>

            </div>
        </div>

    </section>

    <!--    *******************************************  video section-->
    <section class="video-section">
        <div class="title-2 container">
            <h2 class="h1"><?= get_field('video_title_sec', $page_id); ?></h2>
            <p><?= get_field('video_sub_title', $page_id); ?></p>
        </div>
        <?php
        if (is_array($videos)) :
            if ($videos['video_1']['video_file']) : ?>
                <div class="video-list container">
                    <div class="main-video">
                        <div class="video-cover"></div>
                        <video id="mainVideo" controls>
                            <source src="<?= $videos['video_1']['video_file']; ?>" type="video/mp4">
                        </video>
                    </div>
                    <div class="video-thumbnails">
                        <?php
                        $num = 1;
                        foreach ($videos as $key => $video) : ?>
                            <div class="video-thumbnail video-<?= $num ?>" data-video-src="<?= $video['video_file'] ?>">
                                <i class="icon-play"></i>
                                <?= wp_get_attachment_image($video['video_img'], 'full', false, []); ?>
                            </div>
                        <?php $num++;
                        endforeach; ?>
                    </div>
                </div>
        <?php endif;
        endif; ?>
    </section>

    <!--    *******************************************  main content section-->
    <?php if (get_the_content()) : ?>
        <section class="main-content">
            <div class="title-2 container">
                <h2 class="h1"><?= get_field('content_title', $page_id); ?></h2>
                <p><?= get_field('content_sub_title', $page_id); ?></p>
            </div>
            <div class="service-main-content container">
                <?= get_the_content(); ?>
            </div>
        </section>
    <?php endif; ?>

    <!--    *******************************************  recommended section-->
    <section class="recommended-service-single">
        <div class="title-2 container">
            <h2 class="h1"><?= get_field('recommended_title', $page_id); ?></h2>
            <p><?= get_field('recommended_sub_title', $page_id); ?></p>
        </div>
        <?php if (is_array($blogs) && count($blogs) > 0) : ?>
            <div class="recommended-row container">
                <?php foreach ($blogs as $key => $blog) :
                    if ($key < 3) {
                        set_query_var('id', $blog->ID);
                        get_template_part(
                            'templates/components/blog-cart',
                            null,
                        );
                    }
                endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>