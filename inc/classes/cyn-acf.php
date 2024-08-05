<?php

if (!class_exists('cyn_acf')) {
    class cyn_acf
    {

        function __construct()
        {
            define('MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/');
            define('MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/');
            include_once(MY_ACF_PATH . 'acf.php');

            add_filter('acf/settings/url', function ($url) {
                return MY_ACF_URL;
            });
            add_filter('acf/settings/show_updates', '__return_false', 100);
            // add_filter('acf/settings/show_admin', '__return_false');

            $this->cyn_acf_actions();
        }

        public function cyn_acf_actions()
        {
            add_action('acf/init', [$this, 'cyn_front_page']);
            add_action('acf/init', [$this, 'cyn_podcasts']);
            add_action('acf/init', [$this, 'cyn_about_page']);
            add_action('acf/init', [$this, 'cyn_partners']);
            add_action('acf/init', [$this, 'cyn_contact']);
        }
        public function cyn_front_page()
        {
            $fields = [
                cyn_acf_add_tab('درباره دکتر'),
                cyn_acf_add_text("about_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("about_subtitle", ' متن بخش  ', '', ' 50'),
                cyn_acf_add_url("about_button_link", ' لینک دکمه  ', '', ' 50'),
                cyn_acf_add_image("about_poster", 'پوستر ویدیو',),
                cyn_acf_add_file("about_video", '  ویدیو درباره ', '', '50'),
                cyn_acf_add_url("about_video_link", ' لینک ویدیو  ', '', ' 50'),
                cyn_acf_add_tab('نوبت گیری'),
                cyn_acf_add_text("turn_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("turn_subtitle", ' متن بخش  ', '', ' 50'),
                cyn_acf_add_image("turn_img", 'عکس بخش نوبت گیری',),
                cyn_acf_add_tab(' پادکست های پزشکی'),
                cyn_acf_add_text("podcasts_section_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("podcasts_section_subtitle", ' متن بخش  ', '', ' 50'),
                cyn_acf_add_post_object("choose_podcasts", ' انتخاب پادکست  ', 'podcast', '', 1),
                cyn_acf_add_tab("متن درمورد جراحی"),
                cyn_acf_add_image("surgery_img", 'عکس در مورد جراحی'),
                cyn_acf_add_text("surgery_section_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("surgery_section_subtitle", ' زیر تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("surgery_section_text", ' متن بخش  ', '', ' 50'),
                cyn_acf_add_text("surgery_section_title2", ' تیتر 2 بخش  ', '', ' 50'),
                cyn_acf_add_text("surgery_section_title3", ' تیتر3  بخش  ', '', ' 50'),
                cyn_acf_add_text("surgery_section_text2", ' متن قسمت دوم بخش  ', '', ' 50'),



                cyn_acf_add_url("surgery_video_link", ' لینک بخش ', '', ' 50'),

                cyn_acf_add_tab(' نکات پیوند اعضا'),
                cyn_acf_add_text("points_section_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("poins_section_subtitle", ' متن بخش  ', '', ' 50'),


            ];
            $arr = [];
            for ($i = 1; $i < 5; $i++) {
                array_push(
                    $arr,
                    cyn_acf_add_image("points_img_$i", '  عکس نکته', '', '50'),
                    cyn_acf_add_text("points_title_$i", 'تیتر نکته', '', '50'),
                    cyn_acf_add_text("points_text_$i", 'متن نکته', '', '100'),
                );
            }
            $fields = array_merge($fields, $arr);
            $location = [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/front-page.php',
                    ],
                ],
            ];
            cyn_register_acf_group(' تنظیمات صفحه اصلی ', $fields, $location);
        }

        public function cyn_podcasts()
        {
            $fields = [

                cyn_acf_add_file("podcasts_voice", ' فایل پادکست ', '', '50'),

            ];

            $location = [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'podcasts',
                    ],
                ],
            ];
            cyn_register_acf_group(' توضیحات پادکست ', $fields, $location);
        }
        public function cyn_about_page()
        {
            $fields = [
                cyn_acf_add_tab('سکشن درباره دکتر'),
                cyn_acf_add_text("about_section_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("about_section_subtitle", 'زیر تیتر بخش ', '', ' 50'),
                cyn_acf_add_image("about_poster_1", 'پوستر  ویدیو اول',),
                cyn_acf_add_file("about_video_1", '  ویدیو اول درباره  دکتر ', '', '50'),
                cyn_acf_add_image("about_poster_2", 'پوستر  ویدیو دوم',),
                cyn_acf_add_file("about_video_2", '  ویدیو دوم درباره  دکتر ', '', '50'),
                cyn_acf_add_image("about_poster_3", 'پوستر  ویدیو سوم',),
                cyn_acf_add_file("about_video_3", '  ویدیو سوم درباره  دکتر ', '', '50'),
                cyn_acf_add_tab('تاریخچه کلینیک'),
                cyn_acf_add_text("clinic_history_title", ' تایتل تاریخچه کلینیک ', '', ' 50'),
                cyn_acf_add_text("clinic_history_sub_title", ' ساب تایتل تاریخچه کلینیک ', '', ' 50'),
                cyn_acf_add_image("clinic_history_img", 'عکس تاریخچه کلینیک',),
                cyn_acf_add_text("clinic_history_description", ' توضیحات تاریخچه کلینیک ', '', ' 50'),
                cyn_acf_add_tab('سخن پایانی  '),
                cyn_acf_add_text("last_comment_title", 'تایتل سخن پایانی کلینیک  ', '', ' 50'),
                cyn_acf_add_text("last_comment_sun_title", 'ساب تایتل سخن پایانی کلینیک  ', '', ' 50'),
                cyn_acf_add_tab('سکشن گواهینامه ها'),

                cyn_acf_add_text("certificate_section_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("certificate_section_subtitle", ' تیتر بخش رنگی  ', '', ' 50'),



            ];
            $arr = [];
            for ($i = 1; $i < 6; $i++) {
                array_push(
                    $arr,
                    cyn_acf_add_image("certificate_img_$i", '  عکس گواهینامه', '', '50'),
                );
            }
            $fields = array_merge($fields, $arr);
            $location = [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/about-page.php',
                    ],
                ],
            ];
            cyn_register_acf_group(' تنظیمات صفحه درباره ما ', $fields, $location);
        }


        public function cyn_partners()
        {
            $fields = [

                cyn_acf_add_text("partners_section_title", ' تیتر بخش  ', '', ' 50'),
                cyn_acf_add_text("parners_section_subtitle", 'زیر تیتر بخش ', '', ' 50'),
                cyn_acf_add_post_object("choose_partners", ' انتخاب همکاران  ', 'doctor', '', 1),

            ];

            $location = [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/archive-partners.php',
                    ],
                ],
            ];
            cyn_register_acf_group(' صفحه همکاران ', $fields, $location);
        }


        public function cyn_contact()
        {
            $fields = [

                cyn_acf_add_text("contact_title", ' عنوان بالای فرم ', '', ' 50'),
                cyn_acf_add_text("contact_subtitle", ' زیر عنوان بالای فرم ', '', ' 50'),
                cyn_acf_add_image("contact_img", 'عکس کنار فرم تماس',),
            ];

            $location = [
                [
                    [
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'templates/contact.php',
                    ],
                ],
            ];
            cyn_register_acf_group(' صفحه تماس با ما ', $fields, $location);
        }
    }
}
