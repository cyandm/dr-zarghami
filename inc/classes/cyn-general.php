<?php
if (!class_exists('cyn_general')) {
    class cyn_general
    {
        function __construct()
        {
            add_filter('comment_form_default_fields', [$this, 'custom_remove_comment_url']);
            add_filter('comment_form_default_fields', [$this, 'custom_remove_comment_labels']);
            add_action('wp_enqueue_scripts', [$this, 'mytheme_enqueue_comment_reply']);
           
        }

        // ****************************************** remove_comment_url comment

        public function custom_remove_comment_url($fields)
        {
            if (isset($fields['url']))
                unset($fields['url']);
            if (isset($fields['cookies'])) {
                unset($fields['cookies']);
            }
            return $fields;
        }
        public function custom_remove_comment_labels($fields)
        {
            $fields['author'] = '<div class="input-group2 author-field "><i class="icon-user-1"></i><input id="author" name="author" class="form-control" placeholder="نام شما" required></div>';
            $fields['email'] = '<div class="input-group2 email-field"><i class="icon-message-2"></i><input id="email" name="email" class="form-control" placeholder="ایمیل شما" required></div>';
            return $fields;
        }

        // ****************************************** add reply comment
        public function mytheme_enqueue_comment_reply()
        {
            // on single blog post pages with comments open and threaded comments
            if (is_singular() && comments_open() && get_option('thread_comments')) {
                // enqueue the javascript that performs in-link comment reply fanciness
                wp_enqueue_script('comment-reply');
            }
        }

     
    }
}
