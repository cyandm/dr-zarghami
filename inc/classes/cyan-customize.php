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
                'footer_panel',
                [
                    'title' => 'تنظیمات فوتر و بنر تماس با ما',
                    'priority' => 1
                ]
            );
            $wp_customize->add_section(
                'information',
                [
                    'title' => 'اطلاعات',
                    'priority' => 1,
                    'panel' => 'footer_panel'
                ]
            );
            $wp_customize->add_section(
                'social_media',
                [
                    'title' => 'شبکه های اجتماعی',
                    'priority' => 1,
                    'panel' => 'footer_panel'
                ]
            );
            $wp_customize->add_section(
                'footer_logo',
                [
                    'title' => 'لوگوی فوتر',
                    'priority' => 1,
                    'panel' => 'footer_panel'
                ]
            );
            $wp_customize->add_section(
                'footer_location',
                [
                    'title' => 'لکیشن ',
                    'priority' => 1,
                    'panel' => 'footer_panel'
                ]
            );
            $this->cyn_add_control($wp_customize, 'information', 'text', 'doctor_name', 'نام دکتر نمایش در فوتر');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'doctor_skill', 'حرفه دکتر نمایش در فوتر');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'developer_name', 'اسم شرکت توسعه دهنده');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number_title', 'تیتر شماره تلفن اول');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number2_title', 'تیتر شماره تلفن دوم');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number3_title', 'تیتر شماره تلفن سوم');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number', 'متن لینک به صفحه تماس با ما');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number_link', 'لینک به صفحه تماس با ما');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number2', 'شماره تلفن دوم');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'phone_number3', 'شماره تلفن سوم');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'email', 'ایمیل');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'address', 'آدرس');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'open_time', 'ساعت مراجعه');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'online_visit', 'متن ویزیت آنلاین');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'online_visit_text', 'متن لینک دار ویزیت آنلاین');
            $this->cyn_add_control($wp_customize, 'information', 'url', 'online', 'لینک مراجعه');
            $this->cyn_add_control($wp_customize, 'information', 'text', 'online_text', 'متن نوبت گیری با اسکن کد');
            $this->cyn_add_control($wp_customize, 'information', 'url', 'online_url', 'لینک کد');
            $this->cyn_add_control($wp_customize, 'information', 'file', 'online_file', 'عکس کد');
            $this->cyn_add_control($wp_customize, 'social_media', 'text', 'social_link_text', 'متن پاپ آپ هدر',);
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
            $this->cyn_add_control($wp_customize, 'footer_location', 'url', 'location_link_1', 'لینک لوکیشن اول',);
            $this->cyn_add_control($wp_customize, 'footer_location', 'file', 'location_logo_1', 'لوگوی لوکیشن اول');
            $this->cyn_add_control($wp_customize, 'footer_location', 'url', 'location_link_2', 'لینک لوکیشن دوم',);
            $this->cyn_add_control($wp_customize, 'footer_location', 'file', 'location_logo_2', 'لوگوی لوکیشن دوم');
            $this->cyn_add_control($wp_customize, 'footer_location', 'url', 'location_link_3', 'لینک لوکیشن سوم',);
            $this->cyn_add_control($wp_customize, 'footer_location', 'file', 'location_logo_3', 'لوگوی لوکیشن سوم');
            $this->cyn_add_control($wp_customize, 'footer_location', 'url', 'location_link_4', 'لینک لوکیشن چهارم',);
            $this->cyn_add_control($wp_customize, 'footer_location', 'file', 'location_logo_4', 'لوگوی لوکیشن چهارم');
        }


        // private function cyn_register_panel_demo_2($wp_customize)
        // {

        // 	$wp_customize->add_panel(
        // 		'demo_panel_2',
        // 		[
        // 			'title' => 'CyanTheme - Demo Panel 2',
        // 			'priority' => 2
        // 		]
        // 	);


        // 	$wp_customize->add_section(
        // 		'demo_section_2',
        // 		[
        // 			'title' => 'Demo section 2',
        // 			'priority' => 1,
        // 			'panel' => 'demo_panel_2'
        // 		]
        // 	);

        // 	$this->cyn_add_control($wp_customize, 'demo_section_2', 'file', 'demo_file_control', 'Demo File Control');
        // }
    }
}
