<?php

if (!class_exists('cyn_customize')) {
    class cyn_customize
    {
        function __construct()
        {
            add_action('customize_register', [$this, 'cyn_basic_settings']);
        }

        public function cyn_basic_settings($wp_customize)
        {
            $this->cyn_register_panel_custom_code($wp_customize);

            $this->cyn_register_footer($wp_customize);
        }

        /**
         * Summary of cyn_add_control
         * @param mixed $wp_customize
         * @param string $section name of section that this control related to
         * @param string $type 'text' | 'textarea' | 'tel' | 'image' | 'file'
         * @param string $id name that saved on wp_option table on database
         * @param string $label 
         * @param string $description
         * @return void
         */
        private function cyn_add_control($wp_customize, $section, $type, $id, $label, $description = '')
        {
            $wp_customize->add_setting(
                $id,
                ['type' => 'option']
            );


            if ($type == "file") {
                $wp_customize->add_control(
                    new WP_Customize_Upload_Control(
                        $wp_customize,
                        $id,
                        [
                            'label' => $label,
                            'section' => $section,
                            'settings' => $id,
                            'description' => $description,
                        ]
                    )
                );
            }

            if ($type != 'file') {
                $wp_customize->add_control(
                    $id,
                    [
                        'label' => $label,
                        'section' => $section,
                        'settings' => $id,
                        'type' => $type,
                        'description' => $description,
                    ]
                );
            }
        }

        private function cyn_register_footer($wp_customize)
        {

            $wp_customize->add_panel(
                'customize_panel',
                [
                    'title' => 'شخصی سازی ',
                    'priority' => 1
                ]
            );
            $wp_customize->add_section(
                'information',
                [
                    'title' => ' تماس با ما',
                    'priority' => 1,
                    'panel' => 'customize_panel'
                ]
            );
            $wp_customize->add_section(
                'social_media',
                [
                    'title' => 'شبکه های اجتماعی',
                    'priority' => 1,
                    'panel' => 'customize_panel'
                ]
            );

            $wp_customize->add_section(
                'footer',
                [
                    'title' => 'فوتر ',
                    'priority' => 1,
                    'panel' => 'customize_panel'
                ]
            );
            $wp_customize->add_section(
                'visit',
                [
                    'title' => 'نوبت گیری ',
                    'priority' => 1,
                    'panel' => 'customize_panel'
                ]
            );
            $this->cyn_add_control($wp_customize, 'visit', 'text', 'visit_but_text', 'متن دکمه دریافت نوبت در هدر');
            $this->cyn_add_control($wp_customize, 'visit', 'url', 'visit_but_url', 'لینک دکمه دریافت نوبت در هدر');

            $this->cyn_add_control($wp_customize, 'visit', 'url', 'online', ' لینک دریافت نوبت اصلی');
            $this->cyn_add_control($wp_customize, 'visit', 'url', 'online_consultation', 'لینک دریافت مشاوره');
            $this->cyn_add_control($wp_customize, 'visit', 'text', 'visit_title', 'تیتر دریافت نوبت');
            $this->cyn_add_control($wp_customize, 'visit', 'text', 'visit_text', 'متن دریافت نوبت');

            $this->cyn_add_control($wp_customize, 'visit', 'text', 'consultation_title', 'تیتر دریافت مشاوره');
            $this->cyn_add_control($wp_customize, 'visit', 'text', 'consultation_text', 'متن دریافت مشاوره');

            $this->cyn_add_control($wp_customize, 'footer', 'text', 'doctor_name', 'نام دکتر نمایش در فوتر');
            $this->cyn_add_control($wp_customize, 'footer', 'text', 'doctor_skill', 'حرفه دکتر نمایش در فوتر');
            $this->cyn_add_control($wp_customize, 'footer', 'text', 'developer_name', 'اسم شرکت توسعه دهنده');
            $this->cyn_add_control($wp_customize, 'footer', 'text', 'phone_number_title', 'تیتر بخش تماس در فوتر');

            $this->cyn_add_control($wp_customize, 'information', 'text', 'hospital_title_hospital_one', 'عنوان بیمارستان اول');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number_hospital_one_link', 'شماره تلفن اول');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number_hospital_one_link_two', 'شماره تلفن دوم');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'email_hospital_one', 'ایمیل');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'address_title_hospital_one', 'عنوان آدرس');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'address_hospital_one', 'آدرس');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'open_time_hospital_one', 'ساعت مراجعه');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'online_hospital_one', 'لینک نوبت آنلاین');

            $this->cyn_add_control($wp_customize, 'information', 'text', 'hospital_title_hospital_two', 'عنوان بیمارستان دوم');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number_hospital_two_link', 'شماره تلفن اول');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number_hospital_two_link_two', 'شماره تلفن دوم');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'email_hospital_two', 'ایمیل');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'address_title_hospital_two', 'عنوان آدرس');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'address_hospital_two', 'آدرس');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'open_time_hospital_two', 'ساعت مراجعه');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'online_hospital_two', 'لینک نوبت آنلاین');


            $this->cyn_add_control($wp_customize, 'social_media', 'url', 'social_link_1', 'لینک شبکه اول',);
            $this->cyn_add_control($wp_customize, 'social_media', 'file', 'social_logo_1', 'لوگوی شبکه اول');
            $this->cyn_add_control($wp_customize, 'social_media', 'url', 'social_link_2', 'لینک شبکه دوم',);
            $this->cyn_add_control($wp_customize, 'social_media', 'file', 'social_logo_2', 'لوگوی شبکه دوم');
            $this->cyn_add_control($wp_customize, 'social_media', 'url', 'social_link_3', 'لینک شبکه سوم',);
            $this->cyn_add_control($wp_customize, 'social_media', 'file', 'social_logo_3', 'لوگوی شبکه سوم');
            $this->cyn_add_control($wp_customize, 'social_media', 'url', 'social_link_4', 'لینک شبکه چهارم',);
            $this->cyn_add_control($wp_customize, 'social_media', 'file', 'social_logo_4', 'لوگوی شبکه چهارم');
            $this->cyn_add_control($wp_customize, 'social_media', 'url', 'social_link_5', 'لینک شبکه پنجم',);
            $this->cyn_add_control($wp_customize, 'social_media', 'file', 'social_logo_5', 'لوگوی شبکه پنجم');
            $this->cyn_add_control($wp_customize, 'social_media', 'url', 'social_link_6', 'لینک شبکه ششم',);
            $this->cyn_add_control($wp_customize, 'social_media', 'file', 'social_logo_6', 'لوگوی شبکه ششم');
            $this->cyn_add_control($wp_customize, 'footer', 'url', 'location_link_1', 'لینک لوکیشن اول',);
            $this->cyn_add_control($wp_customize, 'footer', 'file', 'location_logo_1', 'لوگوی لوکیشن اول');
            $this->cyn_add_control($wp_customize, 'footer', 'url', 'location_link_2', 'لینک لوکیشن دوم',);
            $this->cyn_add_control($wp_customize, 'footer', 'file', 'location_logo_2', 'لوگوی لوکیشن دوم');
            $this->cyn_add_control($wp_customize, 'footer', 'url', 'location_link_3', 'لینک لوکیشن سوم',);
            $this->cyn_add_control($wp_customize, 'footer', 'file', 'location_logo_3', 'لوگوی لوکیشن سوم');
            $this->cyn_add_control($wp_customize, 'footer', 'url', 'location_link_4', 'لینک لوکیشن چهارم',);
            $this->cyn_add_control($wp_customize, 'footer', 'file', 'location_logo_4', 'لوگوی لوکیشن چهارم');
        }
        private function cyn_register_panel_custom_code($wp_customize)
        {
            $wp_customize->add_panel(
                'custom_code',
                [
                    'title' => 'تنظیمات کدهای سفارشی',
                    'priority' => 1
                ]
            );

            $wp_customize->add_section(
                'head_section',
                [
                    'title' => 'داخل تگ head',
                    'priority' => 1,
                    'panel' => 'custom_code'
                ]
            );


            for ($i = 1; $i <= 10; $i++) {
                $this->cyn_add_control($wp_customize, 'head_section', 'textarea', "cyn_head_code_$i", "کد سفارشی $i");
            }

            $wp_customize->add_section(
                'start_body_section',
                [
                    'title' => 'ابتدای تگ body',
                    'priority' => 1,
                    'panel' => 'custom_code'
                ]
            );

            for ($i = 1; $i <= 10; $i++) {
                $this->cyn_add_control($wp_customize, 'start_body_section', 'textarea', "cyn_start_body_code_$i", "کد سفارشی $i");
            }


            $wp_customize->add_section(
                'end_body_section',
                [
                    'title' => 'انتهای تگ body',
                    'priority' => 1,
                    'panel' => 'custom_code'
                ]
            );

            for ($i = 1; $i <= 10; $i++) {
                $this->cyn_add_control($wp_customize, 'end_body_section', 'textarea', "cyn_end_body_code_$i", "کد سفارشی $i");
            }
        }
    }
}
