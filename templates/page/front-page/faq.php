<?php $faqs = get_field('fags', $page_id);

$pageLink = get_page_url_by_template('templates/contact.php');
?>
<section class=" faq-section" id="faq-section">
    <div class="title-with-btn container">
        <div>
            <h2><?= get_field('faq_section_title', $page_id) ?></h2>
            <p><?= get_field('faq_section_description', $page_id) ?></p>
        </div>
        <!-- <a href="<?= get_field('faq_section_button_link', $page_id) ?>"
               class="btn"><?= get_field('faq_section_button_title', $page_id) ?></a> -->
    </div>
    <div class="faq-row container">
        <div class="faq-img">
            <?= wp_get_attachment_image(get_field('image_faq_section', $page_id), 'full', false, []); ?>
        </div>
        <div class="faq-content">
            <?php if (is_array($faqs) && count($faqs) > 0) : ?>
                <?php foreach ($faqs as $key => $faq) :
                    if ($faq['question'] && $faq['answer']) : ?>
                        <div class="accordion-item">
                            <div class="accordion-item-header <?= ($key == 'faq_1') ? 'active' : '' ?>">
                                <div class="h4"><?= $faq['question'] ?></div>
                                <i class="icon-arrow-down-1"></i>
                            </div>
                            <div class="accordion-item-body  <?= ($key == 'faq_1') ? 'active' : '' ?>">
                                <div class="accordion-item-body-content">
                                    <?= $faq['answer'] ?>
                                </div>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>

                <?php if (get_field('faq_section_button_title', $page_id)) : ?>
                    <div>

                        <a href="<?= $pageLink ?>" class="btn max-md:w-full mt-5 mb-8"><?= get_field('faq_section_button_title', $page_id); ?></a>

                    </div>

                <?php endif ?>

            <?php endif; ?>
        </div>

    </div>

</section>