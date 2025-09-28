<?php

use RankMath\Thumbnail_Overlay;

if (!class_exists('cyn_register')) {
    class cyn_register
    {
        function __construct()
        {
            add_action('init', [$this, 'cyn_post_type_register']);
            add_action('init', [$this, 'cyn_taxonomy_register']);
            add_action('init', [$this, 'cyn_term_register']);
        }

        public function cyn_post_type_register()
        {
            /***************************** register Service post type */
            $labels = array(
                'name' => 'خدمات',
                'singular_name' => 'خدمت',
                'menu_name' => 'خدمات',
                'name_admin_bar' => 'خدمات',
                'add_new' => 'افزودن خدمت',
                'add_new_item' => 'افزودن خدمت جدید',
                'new_item' => 'خدمت جدید',
                'edit_item' => 'ویرایش خدمت',
                'view_item' => 'دیدن خدمت',
                'all_items' => 'همه خدمت ها',
                'search_items' => 'جستجو خدمات',
                'not_found' => 'خدمت پیدا نشد',
                'not_found_in_trash' => 'خدمت پیدا نشد'
            );
            $args = [
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'service'),
                'exclude_from_search' => false,
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-clipboard',
                'supports' => array('title', 'editor', 'thumbnail', 'comments')
            ];

            register_post_type('service', $args);


            //Start contact form
            $labels = array(
                'name' => 'فرم تماس با ما',
                'singular_name' => 'فرم تماس با ما',
                'menu_name' => 'فرم تماس با ما',
                'name_admin_bar' => 'فرم تماس با ما',
                'view_item' => 'دیدن فرم',
                'all_items' => 'همه فرم ها',
                'search_items' => 'جستجو فرم',
                'not_found' => 'فرم پیدا نشد',
                'not_found_in_trash' => 'فرم در زباله پیدا نشد'
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'contact_form'),
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-email-alt',
                'supports' => array('title', 'editor'),

            );

            register_post_type('contact_form', $args);
            //End contact form Post Type


            /***************************** register ِDoctor post type */
            $labels = array(
                'name' => 'پزشک',
                'singular_name' => 'پزشک',
                'menu_name' => 'پزشک',
                'name_admin_bar' => 'پزشک',
                'add_new' => 'افزودن پزشک',
                'add_new_item' => 'افزودن پزشک جدید',
                'new_item' => 'پزشک جدید',
                'edit_item' => 'ویرایش پزشک',
                'view_item' => 'دیدن پزشک',
                'all_items' => 'همه پزشک ها',
                'search_items' => 'جستجو پزشک',
                'not_found' => 'پزشک پیدا نشد',
                'not_found_in_trash' => 'پزشک پیدا نشد'
            );
            $args = [
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'doctor'),
                'exclude_from_search' => false,
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-clipboard',
                'supports' => array('title')
            ];

            register_post_type('doctor', $args);



            /***************************** register podcast post type */
            $labels = array(
                'name' => 'پادکست',
                'singular_name' => 'پادکست',
                'menu_name' => 'پادکست',
                'name_admin_bar' => 'پادکست',
                'add_new' => 'افزودن پادکست',
                'add_new_item' => 'افزودن پادکست جدید',
                'new_item' => 'پادکست جدید',
                'edit_item' => 'ویرایش پادکست',
                'view_item' => 'دیدن پادکست',
                'all_items' => 'همه پادکست ها',
                'search_items' => 'جستجو پادکست',
                'not_found' => 'پادکست پیدا نشد',
                'not_found_in_trash' => 'پادکست پیدا نشد'
            );
            $args = [
                'labels' =>  $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'podcast'),
                'exclude_from_search' => false,
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-megaphone',
                'supports' => array('title', 'thumbnail', 'category', 'excerpt'),
                'taxonomies' => array('category', 'post_tag'),
            ];

            register_post_type('podcast', $args);




            /***************************** register testimonial post type */
            $labels = array(
                'name' => 'نظرات',
                'singular_name' => 'نظر',
                'menu_name' => 'نظرات',
                'name_admin_bar' => 'نظرات',
                'add_new' => 'افزودن نظر',
                'add_new_item' => 'افزودن نظر جدید',
                'new_item' => 'نظر جدید',
                'edit_item' => 'ویرایش نظر',
                'view_item' => 'دیدن نظر',
                'all_items' => 'همه نظرات',
                'search_items' => 'جستجو نظرات',
                'not_found' => 'نظر پیدا نشد',
                'not_found_in_trash' => 'نظر پیدا نشد'
            );
            $args = [
                'labels' =>  $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'testimonial'),
                'exclude_from_search' => false,
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-video-alt3',
                'supports' => array('title', 'category', 'editor'),
                'taxonomies' => array('category', 'post_tag'),
            ];

            register_post_type('testimonial', $args);


            /***************************** register testimonial post type */
            $labels = array(
                'name' => 'نظرات',
                'singular_name' => 'نظر',
                'menu_name' => 'نظرات',
                'name_admin_bar' => 'نظرات',
                'add_new' => 'افزودن نظر',
                'add_new_item' => 'افزودن نظر جدید',
                'new_item' => 'نظر جدید',
                'edit_item' => 'ویرایش نظر',
                'view_item' => 'دیدن نظر',
                'all_items' => 'همه نظرات',
                'search_items' => 'جستجو نظرات',
                'not_found' => 'نظر پیدا نشد',
                'not_found_in_trash' => 'نظر پیدا نشد'
            );
            $args = [
                'labels' =>  $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'testimonial'),
                'exclude_from_search' => false,
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-video-alt3',
                'supports' => array('title', 'category', 'editor'),
                'taxonomies' => array('category', 'post_tag'),
            ];

            register_post_type('testimonial', $args);


            /***************************** register gallery post type */
            $labels = array(
                'name' => 'گالری',
                'singular_name' => 'گالری',
                'menu_name' => 'گالری',
                'name_admin_bar' => 'گالری',
                'add_new' => 'افزودن به گالری',
                'add_new_item' => 'افزودن به گالری',
                'new_item' => 'افزودن جدید',
                'edit_item' => 'ویرایش گالری',
                'view_item' => 'دیدن گالری',
                'all_items' => 'همه',
                'search_items' => 'جستجو گالری',
                'not_found' => 'گالری پیدا نشد',
                'not_found_in_trash' => 'گالری پیدا نشد'
            );
            $args = [
                'labels' =>  $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'gallery'),
                'exclude_from_search' => false,
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'menu_icon' => 'dashicons-format-gallery',
                'supports' => array('title', 'category', 'editor'),
                //'taxonomies' => array('category'),
            ];

            register_post_type('gallery', $args);
        }
        public function cyn_taxonomy_register()
        {

            function make_taxonomy($name, $slug, $post_types, $is_hierarchical = true)
            {
                $labels = [
                    'name' => $name . '‌ها',
                    'singular_name' => $name,
                    'search_items' => 'ها' . $name . 'جستجو در',
                    'all_items' => 'همه ' . $name . '‌ ها',
                    'edit_item' => ' ویرایش ' . $name,
                    'update_item' => 'به روز رسانی' . $name,
                    'add_new_item' => 'افزودن ' . $name . ' جدید',
                    'new_item_name' => $name . ' جدید',
                    'menu_name' => $name,
                ];

                $args = [
                    'hierarchical' => $is_hierarchical,
                    'labels' => $labels,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => ['slug' => $slug],
                ];

                register_taxonomy($slug, $post_types, $args);
            }

            make_taxonomy('دسته‌بندی خدمات', 'service_type', ['service']);
            make_taxonomy('بخش گالری', 'gallery_department', ['gallery']);
        }

        public function cyn_term_register()
        {
            wp_insert_term('جراحی', 'service_type', ['slug' => 'surgery']);
            wp_insert_term('پیوند کبد', 'service_type', ['slug' => 'peyvand']);
        }
    }
}
