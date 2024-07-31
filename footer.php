<?php
$front_page_id = get_option('page_on_front');

$address = get_field('address', $front_page_id);
$locations = get_field('locations_links', $front_page_id);

?>
<footer class="flex w-full flex-col items-center gap-4 max-md:gap-16">
    <div class="container main-row gap-8 w-full">
        <div class="main-fotter-menu footer-widget">
            <h4 class="h4">صفحه اصلی</h4>
            <?php wp_nav_menu(['theme_location' => 'footer_menu_main']) ?>
        </div>
        <div class="main-fotter-menu footer-widget">
            <h4 class="h4">اطلاعات بیشتر</h4>
            <?php wp_nav_menu(['theme_location' => 'footer_menu_information']) ?>
        </div>
        <div class="footer-widget address-widget">
            <h4 class="h4">ساعت مراجعه درمانگاه</h4>
            <p><?= get_option('open_time'); ?></p>
        </div>
        <div class="footer-widget address-widget">
            <h4 class="h4">آدرس درمانگاه</h4>
            <p><?= get_option('address'); ?></p>
        </div>
        <div class="footer-widget tel-widget">
            <span><?= get_option('phone_number_title'); ?></span>
            <a href="tel:<?= get_option('phone_number'); ?>" class="text-blue-3"><?= get_option('phone_number'); ?></a>
            <span><?= get_option('phone_number2_title'); ?></span>
            <a href="tel:<?= get_option('phone_number2'); ?>" class="text-blue-3"><?= get_option('phone_number2'); ?></a>
            <span><?= get_option('phone_number3_title'); ?></span>
            <a href="tel:<?= get_option('phone_number3'); ?>" class="text-blue-3"><?= get_option('phone_number3'); ?></a>
            <p>ایمیل</p>
            <a href="mailto:<?= get_option('email'); ?>" class="text-blue-3"><?= get_option('email'); ?></a>
        </div>

        <div class="footer-widget map-widget">
            <h4>مشاهده آدرس روی نقشه</h4>
            <div class="social-media flex gap-4">
                <?php
                for ($i = 1; $i < 5; $i++) {
                ?>
                    <a href="<?= get_option("location_link_$i"); ?>">
                        <img class="" src="<?= get_option("location_logo_$i") ?>" />

                    </a>

                <?php } ?>


            </div>
        </div>
    </div>
    <div class="social-row center container">
        <div class="logo-contain">
            <?php the_custom_logo() ?>
        </div>
        <p>دکتر یحیی ضرغامی</p>
        <p class="caption">متخصص انواع جراحی های داخلی</p>
        <div class="grayscale flex items-center gap-3 ">
            <?php
            for ($i = 1; $i < 6; $i++) {
            ?>
                <a href="<?= get_option("social_link_$i"); ?>" class="w-6 flex items-center aspect-square">
                    <img src="<?= get_option("social_logo_$i") ?>" />

                </a>

            <?php } ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>