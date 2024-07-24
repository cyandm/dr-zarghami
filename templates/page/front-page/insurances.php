<?php $insurances = get_field('insurances_group', $page_id);
 ?>
 <section class=" insurances-section">
    <div class=" insurances-row">
        <div class="title container">
            <h2><?= get_field('insurances_section_title', $page_id); ?></h2>
            <p><?= get_field('insurances_section_description', $page_id); ?></p>
        </div>
        <?php if (is_array($insurances) && count($insurances) > 0): ?>
            <div class="insurances-content container">
                <div class="swiper insurance-slider">
                    <div class="swiper-wrapper">

                        <?php foreach ($insurances as $insurance):
                            if ($insurance['insurances_item_image'] && $insurance['insurances_item_text']):
                                ?>
                                <div class="swiper-slide">
                                    <div class="insurance-item">
                                        <div class="img-content">
                                            <?= wp_get_attachment_image($insurance['insurances_item_image'], 'thumbnail', false, []); ?>
                                        </div>
                                        <span class="h4"><?= $insurance['insurances_item_text'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <!------------------------------------------------ repeat loop -->
                        <?php foreach ($insurances as $insurance):
                            if ($insurance['insurances_item_image'] && $insurance['insurances_item_text']):
                                ?>
                                <div class="swiper-slide">
                                    <div class="insurance-item">
                                        <div class="img-content">
                                            <?= wp_get_attachment_image($insurance['insurances_item_image'], 'thumbnail', false, []); ?>
                                        </div>
                                        <span class="h4"><?= $insurance['insurances_item_text'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <!------------------------------------------------ repeat loop -->
                        <?php foreach ($insurances as $insurance):
                            if ($insurance['insurances_item_image'] && $insurance['insurances_item_text']):
                                ?>
                                <div class="swiper-slide">
                                    <div class="insurance-item">
                                        <div class="img-content">
                                            <?= wp_get_attachment_image($insurance['insurances_item_image'], 'thumbnail', false, []); ?>
                                        </div>
                                        <span class="h4"><?= $insurance['insurances_item_text'] ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>