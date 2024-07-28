 <?php
    $allServices = get_field('choose_services', $page_id);

    $cat_services = get_terms([
        'taxonomy' => 'service_type',
        'hide_empty' => true,
    ]);

    ?>



 <section class="container services-section">
     <div class="title">
         <h2><?= get_field('services_section_title', $page_id); ?></h2>
         <p><?= get_field('services_section_title_description', $page_id); ?></p>
     </div>






     <?php if (is_array($posts) && count($posts) > 0) : ?>

         <div class="service-tabs">
             <div class="tab-row">
                 <select class="tab-mobile" id="dropdown-menu">

                     <?php foreach ($cat_services as $key => $cat) : ?>

                         <option class="tablinks" <?= ($key == 0) ? 'active' : '' ?> value="tab-<?= $key ?>">
                             <?= $cat->name ?></option>

                     <?php endforeach; ?>

                 </select>

                 <div class="empty-div"></div>

                 <div class="tabs">

                     <div class="tab">

                         <?php foreach ($cat_services as $key => $cat) : ?>
                             <button class="tablinks landing-tablinks <?= ($key == 0) ? 'active' : '' ?>" id="tab-<?= $key ?>"><?= $cat->name ?></button>
                         <?php endforeach; ?>

                     </div>

                     <div class="radio-btn-tab flex flex-row gap-4">

                         <?php foreach ($cat_services as $key => $cat) :

                                $posts = get_posts([
                                    'post_type' => 'service',
                                    'tax_query' => [
                                        [
                                            'taxonomy' => 'service_type',
                                            'terms' => $cat,
                                        ]
                                    ]
                                ]);


                                foreach ($posts as $key => $post) : ?>

                                 <div>
                                     <input type="radio" name="radio-<?= $key ?>" id="radio-<?= $key ?>" value="radio-<?= $key ?>" class="<?= ($key == 0) ? 'active' : '' ?>" />
                                     <label for="radio-<?= $key ?>"><?= $post->post_title ?></label>
                                 </div>

                             <?php endforeach; ?>
                         <?php endforeach ?>
                     </div>

                 </div>

             </div>
             <div class="service-tabcontent">
                 <?php foreach ($posts as $key => $post) : ?>
                     <div id="tab-<?= $key ?>" class="tabcontent  <?= ($key == 0) ? 'active' : '' ?> ">

                         <div class="service-img">
                             <?php $thumbnail_id = get_field('service_image', $cat->ID); ?>
                             <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
                         </div>
                         <div class="service-content animate-text animate-letter">
                             <h2 class="service-title title_with_bg h2 animation">
                                 <?= get_field('service_title_front', $cat->ID) ?>
                                 <span class="focuse"></span>
                             </h2>
                             <div class="service-description">
                                 <?= get_field('service_description_front', $cat->ID) ?>
                             </div>
                             <div class="service-btn">
                                 <a href="<?= get_permalink($cat->ID) ?>" class="btn-b">اطلاعات بیشتر</a>
                             </div>
                         </div>
                     </div>
                 <?php endforeach; ?>
             </div>

         </div>
     <?php endif; ?>

     </div>


     </div>

 </section>