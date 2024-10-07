<?php

if (!class_exists('cyn-theme-init')) {
    class cyn_theme_init
    {


        function __construct()
        {
            add_action('init', [$this, 'cyn_theme_init']);
            add_action('wp_enqueue_scripts', [$this, 'cyn_enqueue_files']);
            add_action('wp_head', [$this, 'cyn_script_head']);
            add_action('wp_body_open',  [$this, 'cyn_script_body']);
            add_action('admin_enqueue_scripts', [$this, 'cyn_admin_files']);
            add_action('wp_logout', [$this, 'cyn_logout_user']);
            add_action('after_setup_theme', [$this, 'cyn_theme_setup']);
            add_filter('wp_check_filetype_and_ext', [$this, 'cyn_allow_svg'], 10, 4);
            add_filter('upload_mimes', [$this, 'cyn_mime_types']);
            add_filter('nav_menu_css_class',  [$this, 'special_nav_class'], 10, 2);
            add_action('init', [$this, 'add_metabox_service_comments']);
        }


        public function cyn_enqueue_files()
        {


            wp_enqueue_style('cyn-photoswipe', get_stylesheet_directory_uri() . '/css/photoswipe.css', [], '0.0.0', 'all');
            wp_enqueue_style('cyn-swiper', get_stylesheet_directory_uri() . '/css/swiper.min.css', [], '0.0.0', 'all');
            wp_enqueue_style('cyn-final', get_stylesheet_directory_uri() . '/css/scripts-bundle.css', [], false, 'all');
            wp_enqueue_style('cyn-tailwind', get_stylesheet_directory_uri() . '/css/final-tailwind.css'); //When @build must change to final.css


            wp_enqueue_script('cyn-photoswipe-core', get_stylesheet_directory_uri() . '/js/libs/photoswipe.esm.min.js', [], '0.0.0', true);
            wp_enqueue_script('cyn-photoswipe', get_stylesheet_directory_uri() . '/js/libs/photoswipe-lightbox.esm.min.js', [], '0.0.0', true);
            wp_enqueue_script('cyn-swiper', get_stylesheet_directory_uri() . '/js/libs/swiper-bundle.min.js', [], '0.0.0', true);
            wp_enqueue_script('cyn-gsap', get_stylesheet_directory_uri() . '/js/libs/gsap.min.js', [], '0.0.0', true);
            wp_enqueue_script('cyn-script', get_stylesheet_directory_uri() . '/js/dist/scripts.bundle.min.js', ['cyn-swiper', 'cyn-gsap', 'jquery'], null, true);

            wp_localize_script('cyn-script', 'rest_details', [
                'url' => rest_url(),
                'nonce' => wp_create_nonce('rest_nonce'),
            ]);

            wp_dequeue_script('global-styles');
        }

        // ********************************************add script to head
        public function cyn_script_head()
        {
            echo get_field('header_script', get_option('page_on_front'));
        }

        // ********************************************add script to body
        public function cyn_script_body()
        {
            echo get_field('body_script', get_option('page_on_front'));
        }

        public function cyn_remove_unneccesaries()
        {
            // REMOVE WP EMOJI
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('admin_print_styles', 'print_emoji_styles');

            remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
            remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');
            remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
        }

        public function cyn_admin_files()
        {
            wp_enqueue_style('cyn-admin', get_stylesheet_directory_uri() . '/css/admin.css');
        }

        public function cyn_logout_user()
        {
            wp_redirect(home_url());
            exit();
        }

        public function cyn_theme_setup()
        {
            add_filter('the_content', 'wpautop');

            add_theme_support('custom-logo');
            add_theme_support('post-thumbnails');
            add_theme_support('title-tag');
            add_theme_support('automatic-feed-links');

            register_nav_menus([
                'header-menu' => 'Header Menu',
                'footer_menu_main' => 'Footer Menu Main',
                'footer_menu_information' => 'Footer Menu Information'
            ]);
        }

        public function cyn_theme_init()
        {
            add_filter('use_block_editor_for_post', '__return_false');
            add_filter('login_errors', function () {
                return null;
            });
            $this->cyn_remove_unneccesaries();
        }

        public function cyn_allow_svg($data, $file, $filename, $mimes)
        {
            $filetype = wp_check_filetype($filename, $mimes);

            return [
                'ext' => $filetype['ext'],
                'type' => $filetype['type'],
                'proper_filename' => $data['proper_filename']
            ];
        }

        public function cyn_mime_types($mimes)
        {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }

        /********************************************************* Add active class for menu */
        public function special_nav_class($classes, $item)
        {
            if (in_array('current-menu-item', $classes)) {
                $classes[] = 'active ';
            }
            return $classes;
        }

        // **********************************************************Add a custom metabox to comment edit screen
        public function add_metabox_service_comments()
        {
            function add_comment_metabox()
            {
                add_meta_box(
                    'custom_comment_metabox', // Metabox ID
                    'فیلد امتیاز برای کامنت', // Metabox title
                    'render_comment_metabox', // Callback function to render the content
                    'comment',                // Screen where the metabox should be shown (comment edit page)
                    'normal',                 // Context (normal, side, advanced)
                    'high'                    // Priority (high, default, low)
                );
            }
            add_action('add_meta_boxes', 'add_comment_metabox');

            // Callback function to render the metabox content
            function render_comment_metabox($comment)
            {
                $custom_field = get_comment_meta($comment->comment_ID, 'custom_field', true); ?>
                <p>
                    <label for="custom_field">امتیاز سرویس یک عدد از 1 تا 5</label><br>
                    <input type="number" min="1" max="5" id="custom_field" name="custom_field" value="<?php echo esc_attr($custom_field); ?>" />
                </p>
<?php
            }
            // Save the metabox data
            function save_comment_metabox($comment_id)
            {
                if (isset($_POST['custom_field'])) {
                    $custom_field = sanitize_text_field($_POST['custom_field']);
                    update_comment_meta($comment_id, 'custom_field', $custom_field);
                }
            }
            add_action('edit_comment', 'save_comment_metabox');
        }
    }
}
