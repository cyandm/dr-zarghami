<?php
$front_page_id = get_option('page_on_front');
$tel1 = get_field('call_number_1', $front_page_id);
$tel2 = get_field('call_number_2', $front_page_id);
$address = get_field('address', $front_page_id);
$locations = get_field('locations_links', $front_page_id);

?>
<footer>
    <div class="container main-row">
        <div class="main-fotter-menu footer-widget">
            <h4>صفحه اصلی</h4>
            <div class="menu">
                <?php wp_nav_menu(['theme_location' => 'footer_menu_main']) ?>
            </div>
        </div>
        <div class="main-fotter-menu footer-widget">
            <h4>اطلاعات بیشتر</h4>
            <div class="menu">
                <?php wp_nav_menu(['theme_location' => 'footer_menu_information']) ?>
            </div>
        </div>
        <div class="footer-widget tel-widget">
            <h4>شماره تماس</h4>
            <?php
            if ($tel1) : ?>
                <div class="tel-1"><a href="tel:<?= $tel1 ?>"><?= $tel1 ?></a></div>
            <?php endif;
            if ($tel2) : ?>
                <div class="tel-2"><a href="tel:<?= $tel2 ?>"><?= $tel2 ?></a></div>
            <?php endif;  ?>
        </div>
        <div class="footer-widget address-widget">
            <?php
            if ($address) : ?>
                <div class="address"><?= $address ?></div>
            <?php endif;  ?>
        </div>
        <div class="footer-widget map-widget">
            <h4>مشاهده آدرس روی نقشه</h4>
            <div class="maps">
                <?php foreach ($locations as $location) : ?>
                    <a target="_blank" href="<?= $location['location_address'] ?>"><?= wp_get_attachment_image($location['location_img'], 'thumbnail', false, []); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="social-row center container">
        <div class="logo-contain">
            <?php the_custom_logo() ?>
        </div>
        <div class="social-medis">
<!--            <a target="_blank" href="--><?//= get_field('whatsapp_link', $front_page_id); ?><!--"><i class="icon-telegram"></i></a>-->
            <a target="_blank" href="<?= get_field('instagram_link', $front_page_id); ?>"><i class="icon-insta"></i></a>
<!--            <a target="_blank" href="--><?//= get_field('whatsapp_link', $front_page_id); ?><!--"><i class="icon-whats"></i></a>-->
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>