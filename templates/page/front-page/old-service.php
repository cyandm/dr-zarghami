 <?php
$allServices = get_field('choose_services', $page_id);
?>
<section class="container services-section">
    <div class="title">
        <h2><?= get_field('services_section_title', $page_id); ?></h2>
        <p><?= get_field('services_section_title_description', $page_id); ?></p>
    </div>
    <?php
    if (is_array($allServices) && count($allServices) > 0): ?>
        <div class="service-tabs">
            <div class="tab-row">
                <select class="tab-mobile" id="dropdown-menu">
                    <?php foreach ($allServices as $key => $service): ?>
                        <option class="tablinks" <?= ($key == 0) ? 'active' : '' ?> " value=" tab-<?= $key ?>">
                            <?= $service->post_title ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="empty-div"></div>
                <div class="tab">
                    <?php foreach ($allServices as $key => $service): ?>
                        <button class="tablinks landing-tablinks <?= ($key == 0) ? 'active' : '' ?>"
                            id="tab-<?= $key ?>"><?= $service->post_title ?></button>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="service-tabcontent">
                <?php foreach ($allServices as $key => $service): ?>
                    <div id="tab-<?= $key ?>" class="tabcontent  <?= ($key == 0) ? 'active' : '' ?> ">

                        <div class="service-img">
                            <?php $thumbnail_id = get_field('service_image', $service->ID); ?>
                            <?= wp_get_attachment_image($thumbnail_id, 'full', false, []); ?>
                        </div>
                        <div class="service-content animate-text animate-letter">
                            <h2 class="service-title title_with_bg h2 animation">
                                <?= get_field('service_title_front', $service->ID) ?>
                                <span class="focuse"></span>
                            </h2>
                            <div class="service-description">
                                <?= get_field('service_description_front', $service->ID) ?>
                            </div>
                            <div class="service-btn">
                                <a href="<?= get_permalink($service->ID) ?>" class="btn-b">اطلاعات بیشتر</a>
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