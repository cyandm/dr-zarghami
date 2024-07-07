<?php

if (!class_exists('cyn_register')) {
    class cyn_register
    {
        function __construct()
        {
            add_action('init', [$this, 'cyn_faq_post_type_register']);
        }

        public function cyn_faq_post_type_register()
        {
            /***************************** register Service post type */
            $labels = array(
                'name' => 'سرویس',
                'singular_name' => 'سرویس',
                'menu_name' => 'سرویس',
                'name_admin_bar' => 'سرویس',
                'add_new' => 'افزودن سرویس',
                'add_new_item' => 'افزودن سرویس جدید',
                'new_item' => 'سرویس جدید',
                'edit_item' => 'ویرایش سرویس',
                'view_item' => 'دیدن سرویس',
                'all_items' => 'همه سرویس ها',
                'search_items' => 'جستجو سرویس',
                'not_found' => 'سرویس پیدا نشد',
                'not_found_in_trash' => 'سرویس پیدا نشد'
            );
            $args = [
                'labels' =>  $labels,
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
                'supports' => array('title', 'editor', 'thumbnail','comments')
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
                'labels' =>  $labels,
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

        }
    }
}
