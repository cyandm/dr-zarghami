<footer class="flex w-full flex-col items-center gap-4 max-md:gap-16">
    <div class="container main-row gap-8 w-full">

        <div class="main-fotter-menu footer-widget">
            <h4 class="h4">دسترسی سریع</h4>
            <?php wp_nav_menu(['theme_location' => 'footer_menu_main']) ?>
        </div>

        <div class="main-fotter-menu footer-widget">
            <h4 class="h4">اطلاعات بیشتر</h4>
            <?php wp_nav_menu(['theme_location' => 'footer_menu_information']) ?>
        </div>

        <?php if (!empty(get_option('open_time'))): ?>
            <div class="footer-widget address-widget">
                <h4 class="h4">ساعت مراجعه درمانگاه</h4>
                <p><?= get_option('open_time'); ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty(get_option('address'))): ?>
            <div class="footer-widget address-widget">
                <h4 class="h4">آدرس درمانگاه</h4>
                <p><?= get_option('address'); ?></p>
            </div>
        <?php endif ?>

        <?php if (!empty(get_option('phone_number')) || !empty(get_option('phone_number2')) || !empty(get_option('phone_number3')) || !empty(get_option('email'))): ?>
            <div class="footer-widget tel-widget">
                <?php if (!empty(get_option('phone_number_title'))): ?>
                    <span><?= get_option('phone_number_title'); ?></span>
                <?php endif; ?>

                <?php if (!empty(get_option('phone_number')) || !empty(get_option('phone_number_link'))): ?>
                    <a href="<?= !empty(get_option('phone_number_link')) ? get_option('phone_number_link') : 'tel:' . get_option('phone_number'); ?>" class="text-blue-3"><?= get_option('phone_number'); ?></a>
                <?php endif; ?>

                <?php if (!empty(get_option('phone_number2_title'))): ?>
                    <span><?= get_option('phone_number2_title'); ?></span>
                <?php endif; ?>
                <?php if (!empty(get_option('phone_number2'))): ?>
                    <a href="tel:<?= get_option('phone_number2'); ?>" class="text-blue-3"><?= get_option('phone_number2'); ?></a>
                <?php endif; ?>

                <?php if (!empty(get_option('phone_number3_title'))): ?>
                    <span><?= get_option('phone_number3_title'); ?></span>
                <?php endif; ?>
                <?php if (!empty(get_option('phone_number3'))): ?>
                    <a href="tel:<?= get_option('phone_number3'); ?>" class="text-blue-3"><?= get_option('phone_number3'); ?></a>
                <?php endif; ?>

                <?php if (!empty(get_option('email'))): ?>
                    <p>ایمیل</p>
                    <a href="mailto:<?= get_option('email'); ?>" class="text-blue-3"><?= get_option('email'); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty(get_option("location_link_1")) && !empty(get_option("location_logo_1"))): ?>
            <div class="footer-widget map-widget">
                <h4>مشاهده آدرس روی نقشه</h4>
                <div class="social-media flex gap-4">
                    <?php
                    for ($i = 1; $i < 5; $i++) {
                    ?>
                        <?php if (!empty(get_option("location_link_$i")) && !empty(get_option("location_logo_$i"))): ?>
                            <a href="<?= get_option("location_link_$i"); ?>">
                                <img class="" src="<?= get_option("location_logo_$i") ?>" />
                            </a>
                        <?php endif; ?>

                    <?php } ?>
                </div>
            </div>
        <?php endif ?>

    </div>
    <div class="social-row center container w-full whitespace-nowrap">
        <div class="logo-contain">
            <?php the_custom_logo() ?>
        </div>
        <?php if (!empty(get_option("doctor_name"))): ?>
            <p><?= get_option("doctor_name"); ?></p>
        <?php endif; ?>
        <?php if (!empty(get_option("doctor_skill"))): ?>
            <p class="caption"><?= get_option("doctor_skill"); ?></p>
        <?php endif; ?>
        <div class="grayscale flex items-center gap-3 ">
            <?php
            for ($i = 1; $i <= 6; $i++):
                if (!empty(get_option("social_link_$i"))):
            ?>
                    <a href="<?= get_option("social_link_$i"); ?>" class="w-6 flex items-center aspect-square">
                        <img src="<?= get_option("social_logo_$i") ?>" />

                    </a>

            <?php
                endif;
            endfor;
            ?>
        </div>

        <?php if (!empty(get_option("developer_name"))): ?>
            <p class="caption"><?= get_option("developer_name"); ?></p>
        <?php endif; ?>

    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>