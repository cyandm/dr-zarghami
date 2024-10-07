<?php

class cyn_ajax
{
    function __construct()
    {
        add_action('rest_api_init', function () {
            register_rest_route('cynApi/v1', '/contactForm', [
                'methods' => 'POST',
                'callback' => [$this, 'contactForm'],
                'permission_callback' => '__return_true',
            ]);

            register_rest_route('cynApi/v1', '/testimonialForm', [
                'methods' => 'POST',
                'callback' => [$this, 'testimonialForm'],
                'permission_callback' => '__return_true',
            ]);
        });
    }



    public function contactForm(WP_REST_Request $request)
    {

        $formData = $request->get_params();

        $new_post_ID = wp_insert_post([
            'post_type' => 'contact_form',
            'post_title' => $formData['phone'] . "  (فرم تماس با ما)  ",
            'post_content' => "نام: $formData[name] <br> شماره تلفن: $formData[phone] <br> پیام: $formData[message] ",
            'post_status' => 'publish',
        ]);


        if ($new_post_ID === 0 || is_wp_error($new_post_ID)) {
            wp_send_json_error(['error' => 'not created'], 403);
        }

        $to = "info@dr-zarghami.com"; // ایمیل شما
        $subject = "درخواست تماس با شما ثبت شد";
        $message = "<h2>اطلاعات درخواست تماس:</h2>\n\n" .
            "نام: {$formData['name']}\n" .
            "ایمیل: {$formData['email']}\n" .
            "تلفن: {$formData['phone']}\n" .
            "پیام: {$formData['message']}\n";
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        wp_mail($to, $subject, nl2br($message), $headers);

        wp_send_json_success(['new_post' => $new_post_ID]);
    }

    public function testimonialForm(WP_REST_Request $request)
    {

        $formData = $request->get_params();

        $new_post_ID = wp_insert_post([
            'post_type' => 'contact_form',
            'post_title' => $formData['phone'] . "  (فرم نظرات)  ",
            'post_content' => "نام: $formData[name] <br> شماره تلفن: $formData[phone] <br> پیام: $formData[message] <br> امتیاز: $formData[rating]",
            'post_status' => 'publish'
        ]);


        if ($new_post_ID === 0 || is_wp_error($new_post_ID)) {
            wp_send_json_error(['error' => 'not created'], 403);
        }

        $to = "info@dr-zarghami.com";
        $subject = "نظر جدید ثبت شد";
        $message = "<h2>اطلاعات نظر جدید:</h2>\n\n" .
            "نام: {$formData['name']}\n" .
            "ایمیل: {$formData['email']}\n" .
            "تلفن: {$formData['phone']}\n" .
            "پیام: {$formData['message']}\n" .
            "امتیاز: {$formData['rating']}\n";
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        wp_mail($to, $subject, nl2br($message), $headers);

        wp_send_json_success(['new_post' => $new_post_ID]);
    }
}
