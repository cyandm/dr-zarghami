<?php
get_header()
?>
    <main class=" 404">
        <section class="container">
            <div class="unfind-row">
                <div class="unfind-content">
                    <h3 class="h2">صفحه مورد نظر شما یافت نشد</h3>
                    <span>برای بازگشت روی دکمه کلیک کنید</span>
                    <div class="img">
                        <img src="<?= get_stylesheet_directory_uri() ?>/imgs/404.png" alt="404"></div>
                    <div class="btn-row"><a href="/" class="btn">بازگشت به صفحه اصلی</a></div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>