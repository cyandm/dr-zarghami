<?php
/* Template Name: Students Page */

$pageId = get_queried_object_id();

$send_article_img = get_field('send_article_img');
$send_article_title = get_field('send_article_title');
$send_article_subtitle = get_field('send_article_subtitle');
?>

<?php get_header(); ?>

<main class="main blogs" id="blog-overview">
    <!-- -------------------------------- categories tab -->
    <section class="category-tabs container">

        <p class="text-xl font-semibold text-[#17242f]">مقالات دانشجویان</p>

        <div class="flex items-center justify-center gap-2 max-xl:flex-row-reverse max-sm:flex-col">
            <a href="#send-article" class="text-base font-semibold text-white-2 btn flex justify-center items-center">ارسال مقاله</a>

            <?php get_template_part(
                'templates/components/search-blog-form',
                null,
            ); ?>
        </div>

    </section>

    <!-- -------------------------------- All Blogs in category-->
    <section class="all-blogs">
        <div id="all" class="all-blogs-row container">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $allposts = array(
                'post_type' => 'post',
                'posts_per_page' => 8,
                'paged' => $paged,
                'tax_query' => [
                    [
                        'taxonomy' => 'category',
                        'terms' => 'students',
                        'field' => 'slug',
                        'operator' => 'IN'
                    ]
                ]
            );
            $posts = new WP_Query($allposts);

            if ($posts->have_posts()) :
                while ($posts->have_posts()) : $posts->the_post();

                    $post_id = get_the_ID();

                    set_query_var('id', $post_id);
                    get_template_part(
                        'templates/components/blog-cart',
                        null,
                    );

                endwhile;

                echo '<div class="pagination">';
                echo paginate_links(array(
                    'total' => $posts->max_num_pages,
                    'current' => $paged,
                    'prev_text' => false,
                    'next_text' => false,
                    'end_size' => 1,
                    'mid_size' => 1,
                ));
                echo '</div>';

            endif;
            wp_reset_query(); ?>

        </div>
    </section>

    <section class="container" id="send-article">

        <div class="send-article-row my-16 flex w-full gap-14 flex-wrap max-lg:gap-3 max-md:flex-col">
            <div class="send-article-img flex flex-[1.5] rounded-2xl min-h-[22rem] max-md:min-h-80" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($send_article_img)); ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
                <?php  ?>
            </div>
            <div class="send-article-form w-full flex-[2] md:pt-4">
                <div class="title p-0">
                    <h2 class="send-article-title"><?php echo $send_article_title ?></h2>
                    <p><?php echo $send_article_subtitle ?></p>
                </div>

                <form method="post" action="" id="send-article-form" class="flex flex-col items-start gap-4 mt-3 w-full">

                    <div class="form-input flex p-4 items-center gap-1 w-full rounded-2xl border border-gray-200 bg-[rgba(15,123,156,0.04)] backdrop-blur-sm">
                        <i class="icon-user-1 text-[1.12rem] text-[#1a1a1a]"></i>
                        <input type="text" name="name" id="name" placeholder=" نام شما " required class="w-full bg-[#f1f6f7] text-gray-600 text-base focus:outline-none">
                    </div>

                    <div class="form-input flex p-4 items-center gap-1 w-full rounded-2xl border border-gray-200 bg-[rgba(15,123,156,0.04)] backdrop-blur-sm">
                        <i class="icon-call1 text-[1.12rem] text-[#1a1a1a]"></i>
                        <input type="text" name="phone" id="phone" placeholder=" تلفن همراه" required class="w-full bg-[#f1f6f7] text-gray-600 text-base focus:outline-none">
                    </div>

                    <div class="form-input flex p-4 items-center gap-1 w-full rounded-2xl border border-gray-200 bg-[rgba(15,123,156,0.04)] backdrop-blur-sm">
                        <i class="icon-sms text-[1.12rem] text-[#1a1a1a]"></i>
                        <input type="email" name="email" id="email" placeholder=" ایمیل" required class="w-full bg-[#f1f6f7] text-gray-600 text-base focus:outline-none">
                    </div>

                    <div class="form-input form-textarea flex p-4 items-start gap-1 w-full rounded-2xl border border-gray-200 bg-[rgba(15,123,156,0.04)] backdrop-blur-sm">
                        <i class="icon-message-2 text-[1.12rem] text-[#1a1a1a] mt-1"></i>
                        <input type="text" name="title" id="title" placeholder=" عنوان مقاله " required class="w-full bg-[#f1f6f7] text-gray-600 text-base focus:outline-none">
                    </div>

                    <div class="form-group w-full p-4 rounded-2xl border border-gray-200 bg-[rgba(15,123,156,0.04)] backdrop-blur-sm">
                        <label for="article_content" class="text-gray-600 text-base cursor-default">محتوای مقاله: <span class="text-red-500">(میتوانید به جای نوشتن در جعبه متن از امکان آپلود فایل متنی که در زیر جعبه وجود دارد استفاده نمایید)</span></label>
                        <?php
                        wp_editor('', 'article_content', array(
                            'textarea_name' => 'article_content',
                            'media_buttons' => false,
                            'textarea_rows' => 15,
                            'teeny' => false,
                            'tinymce' => array(
                                'toolbar1' => 'bold,italic,underline,strikethrough,|,bullist,numlist,|,link,unlink,|,image,|,formatselect,|,alignleft,aligncenter,alignright,|,undo,redo',
                                'toolbar2' => 'fontselect,fontsizeselect,forecolor,backcolor,|,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,blockquote',
                                'paste_data_images' => false,           // غیرفعال کردن پیست base64
                                'paste_webkit_styles' => 'none',        // حذف استایل‌های webkit
                                'paste_remove_styles' => true,          // حذف استایل‌های اضافی
                                'paste_remove_spans' => true,           // حذف span های اضافی
                                'paste_strip_class_attributes' => 'all', // حذف class attributes
                                'paste_text_sticky' => false,           // غیرفعال کردن حالت paste text
                                'verify_html' => true,                  // اعتبارسنجی HTML
                                'cleanup' => true,                      // پاکسازی کد
                                'convert_urls' => false,                // جلوگیری از تبدیل خودکار URL
                                //محدود کردن تگ‌های مجاز
                                'valid_elements' => 'p,br,strong/b,em/i,u,strike,ol,ul,li,a[href|title],h1,h2,h3,h4,h5,h6,blockquote,pre,code,span[style],div[style]',
                                //حذف تگ‌های خطرناک
                                'invalid_elements' => 'script,object,embed,iframe,form,input,textarea,button,select,option,applet,meta,link,style,base,basefont,frame,frameset,head,html,body,title,area,map,param,isindex,nextid,sound,bgsound,marquee,blink,comment,xml,import,meta,noscript'

                            )
                        ));
                        ?>
                    </div>

                    <div class="form-group w-full p-4 rounded-2xl border border-gray-200 bg-[rgba(15,123,156,0.04)] backdrop-blur-sm">
                        <label for="article_content" class="text-gray-600 text-base cursor-default">آپلود فایل متنی: <span class="text-red-500">(فقط مجاز هستید فایل با فرمت Word(docx) و txt آپلود نمایید)</span></label>
                        <input type="file"
                            name="article_file"
                            id="article_file"
                            accept=".docx,.txt"
                            class="w-full mt-2 p-2 border border-gray-300 rounded-lg cursor-pointer">
                    </div>

                    <div class="form-btn flex items-end justify-end w-full">
                        <button id="submit_form" class="btn-icon w-full md:w-auto" data-callback="send-articleForm" type="submit"><i class="icon-send-2"></i>ارسال پیام
                        </button>
                    </div>

                </form>

                <div class="form-message success" id="success_message"></div>
                <div class="form-message fail" id="fail_message"></div>

            </div>
        </div>

    </section>

</main>

<?php get_footer(); ?>