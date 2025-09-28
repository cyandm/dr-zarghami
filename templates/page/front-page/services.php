 <?php
    $allServices = get_field('choose_services', $page_id);

    $cat_services = get_terms([
        'taxonomy' => 'service_type',
        'hide_empty' => true,
        'slug' => ['hepatobiliary-surgery', 'liver-transplant-surgery'],
    ]);

    ?>



 <section class="container services-section">

     <div class="title">
         <h2><?= get_field('services_section_title', $page_id); ?></h2>
         <p><?= get_field('services_section_title_description', $page_id); ?></p>
     </div>

     <div class="flex w-full gap-4 max-lg:flex-col">

         <div class="service-img">
             <?php $thumbnail_id = get_field('img_services'); ?>
             <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
         </div>

         <div id="homePageTabs" class="service-tabs">

             <div id="tabTitleGroup" class="tab-row">

                 <div class="tab">
                     <?php foreach ($cat_services as $cat) : ?>

                         <div class="tab-title tablinks landing-tablinks" data-tab="<?php echo $cat->slug ?>">
                             <?php echo $cat->name ?>
                         </div>
                     <?php endforeach; ?>

                 </div>

             </div>

             <div class="service-tab-content">
                 <div id="tabContentGroup" class="service-tabcontent">
                     <?php foreach ($cat_services as $cat) : ?>
                         <div class="tabcontent tab-content" data-tab="<?php echo $cat->slug ?>">

                             <?php $services = get_posts([
                                    'post_type' => 'service',
                                    'tax_query' => [
                                        [
                                            'taxonomy' => 'service_type',
                                            'terms' => $cat,
                                        ]
                                    ]
                                ]);

                                ?>


                             <div class="radio-buttons flex w-full">
                                 <?php foreach ($services as $key => $service) : ?>

                                     <div class="title" data-value="<?php echo $service->ID ?>">
                                         <label class="flex items-center gap-2 h3 font-normal">
                                             <input type="radio" value="<?php echo $service->ID ?>" name="<?php echo $cat->name ?>" <?php echo $key === 0 ? 'checked' : '' ?> />
                                             <?php echo $service->post_title ?>
                                         </label>
                                     </div>

                                 <?php endforeach; ?>

                             </div>

                             <div class="radio-button-content flex flex-col">
                                 <?php foreach ($services as $key => $service) : ?>

                                     <div class="service-content content <?php echo $key === 0 ? 'active' : '' ?>" id="content-tab" data-value="<?php echo $service->ID ?>">
                                         <div class="service-content animate-text animate-letter">
                                             <h2 class="service-title title_with_bg h2 animation">
                                                 <?= get_field('service_title_front', $service->ID) ?>
                                                 <span class="focuse"></span>
                                             </h2>
                                         </div>

                                         <div class="service_description">
                                             <?php echo get_field('service_description_front', $service->ID) ?>
                                         </div>

                                         <div class="service-btn px-4 pb-6">
                                             <a href="<?= get_permalink($service->ID) ?>" class="btn">اطلاعات بیشتر</a>
                                         </div>
                                     </div>

                                 <?php endforeach; ?>

                             </div>

                         </div>
                     <?php endforeach; ?>


                 </div>
             </div>
         </div>
     </div>

 </section>


 <!-- <?php if (is_array($cat_services) && count($cat_services) > 0) : ?>

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


             </div>

         </div>

     </div>
     <div class="service-tabcontent">
         <?php foreach ($cat_services as $key => $cat) : ?>

             <div id="tab-<?= $key ?>" class="tabcontent  <?= ($key == 0) ? 'active' : '' ?> ">


                 <?php echo $cat->name ?>

             </div>
         <?php endforeach; ?>
     </div>

     </div>
 <?php endif; ?> -->