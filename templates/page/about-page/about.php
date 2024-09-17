<?php
 $video_file_1 = get_field('about_video_1');
$cover_vide_1 = get_field('about_poster_1');
$video_file_2 = get_field('about_video_2');
$cover_video_2 = get_field('about_poster_2');
$video_file_3 = get_field('about_video_3');
$cover_video_3 = get_field('about_poster_3');

?>
<section class="container h-screen max-lg:h-auto">
    <div class="title">
        <h2><?= get_field('about_section_title'); ?></h2>
        <p><?= get_field('about_section_subtitle'); ?></p>
    </div>
    <div class="about-section pc flex gap-4">


        <video controls class="about-video w-3/5 h-[680px] object-cover rounded-2xl"
            src="<?= $video_file_1["url"] ?>"
            poster=" <?= wp_get_attachment_image_url($cover_vide_1, 'full', false, []); ?>">
            <source src="<?= $video_file_1["url"] ?>" type="video/mp4" controls>
        </video>
        <div class="w-2/5">
                    <video controls class="about-video w-full h-[367px] object-cover rounded-2xl mb-4"
            src="<?= $video_file_2["url"] ?>"
                        poster=" <?= wp_get_attachment_image_url($cover_video_2, 'full', false, []); ?>">
                        <source src="<?= $video_file_2["url"] ?>" type="video/mp4" controls>
                    </video>
                            <video controls class="about-video w-full h-[367px] object-cover rounded-2xl"
            src="<?= $video_file_3["url"] ?>"
                                poster=" <?= wp_get_attachment_image_url($cover_video_3, 'full', false, []); ?>">
                                <source src="<?= $video_file_3["url"] ?>" type="video/mp4" controls>
                            </video>
        </div>
        </div>
          <!--        -------------------------------small view -->
    <div class="container swiper p-3 front-blogs-slider mobile">
        <div class="swiper-wrapper  -row">
                    <div
                        class=" swiper-slide shadow-lg flex flex-col gap-4 p-8 max-lg:p-0 justify-center [&_img]:w-full rounded-3xl [&_img]:aspect-square [&_img]:object-cover ">
                          <video controls class="about-video w-full h-[350px] object-cover rounded-2xl"
            src="<?= $video_file_1["url"] ?>"
                            poster=" <?= wp_get_attachment_image_url($cover_vide_1, 'full', false, []); ?>">
                            <source src="<?= $video_file_1["url"] ?>" type="video/mp4" controls>
                        </video>
        
                    </div>
                       <div
                        class=" swiper-slide shadow-lg flex flex-col gap-4 p-8 justify-center [&_img]:w-full rounded-3xl [&_img]:aspect-square [&_img]:object-cover ">
                          <video controls class="about-video w-full h-[350px] object-cover rounded-2xl"
            src="<?= $video_file_2["url"] ?>"
                            poster=" <?= wp_get_attachment_image_url($cover_video_2, 'full', false, []); ?>">
                            <source src="<?= $video_file_2["url"] ?>" type="video/mp4" controls>
                        </video>
                    
                    </div>
                       <div
                        class=" swiper-slide shadow-lg flex flex-col gap-4 p-8 justify-center [&_img]:w-full rounded-3xl [&_img]:aspect-square [&_img]:object-cover ">
                          <video controls class="about-video w-full h-[350px] object-cover rounded-2xl"
            src="<?= $video_file_3["url"] ?>"
                            poster=" <?= wp_get_attachment_image_url($cover_video_3, 'full', false, []); ?>">
                            <source src="<?= $video_file_3["url"] ?>" type="video/mp4" controls>
                        </video>
                    
                    </div>
                    
        
            </div>
        </div>

        <div class="swiper-pagination"></div>

        
    </div>

 

</section>