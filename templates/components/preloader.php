<?php if (!isset($_COOKIE['seen_preloader'])) :
?>

    <section class="preloader flex items-center justify-center inset-0 fixed top-0 left-0 w-full h-full bg-[#ffffff] z-[99999] opacity-100 transition-all duration-500" id="preloader">

        <div class="preloader-items animate-pulse h-auto flex items-center justify-center w-2/4 [&>a]:w-2/6 max-md:[&>a]:w-3/5 [&>a]:flex [&>a]:justify-center [&>a]:items-center [&>a>img]:w-full">
            <?php the_custom_logo() ?>
        </div>

    </section>

<?php endif;
?>