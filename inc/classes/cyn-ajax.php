<?php

if (!class_exists('cyn_ajax')) {

    class cyn_ajax
    {
        function __construct()
        {
            add_action('wp_ajax_contact_form', [$this, 'wp_ajax_contact_form']);
            add_action('wp_ajax_nopriv_contact_form', [$this, 'wp_ajax_contact_form']);

            add_action('wp_ajax_testimonial_form', [$this, 'wp_ajax_testimonial_form']);
            add_action('wp_ajax_nopriv_testimonial_form', [$this, 'wp_ajax_testimonial_form']);
        }

        public function wp_ajax_contact_form()
        {


            if (isset($_POST["data"])) {
                $formData = $_POST["data"];


                if (
                    isset($formData['name']) &&
                    isset($formData['phone']) &&
                    isset($formData['message'])
                ) {
                    $name = $formData['name'];
                    $phone = $formData['phone'];
                    $message = $formData['message'];
                    //sanitize
                    $sanitized_username = sanitize_text_field($name);
                    $sanitized_phone = sanitize_text_field($phone);
                    $sanitized_comment = sanitize_text_field($message);

                    // Put the sanitized fields into an array
                    $sanitized_array = array(
                        'name' => $sanitized_username,
                        'phone' => $sanitized_phone,
                        'message' => $sanitized_comment
                    );

                    //                  check array
                    if (!empty($sanitized_array['name']) && !empty($sanitized_array['phone']) && !empty($sanitized_array['message'])) {


                        $page_id = get_option('page_on_front');

                        $adminEmail = get_field("website_email", $page_id);
                        $emailTemplate = get_field("email_template", $page_id);
                        $emailFrom = get_field("email_from", $page_id);
                        $placedEmail = $emailTemplate;

                        $placedEmail = str_replace("{name}", $sanitized_array['name'], $placedEmail);
                        $placedEmail = str_replace("{phone}", $sanitized_array['phone'], $placedEmail);
                        $placedEmail = str_replace("{message}", $sanitized_array['message'], $placedEmail);
                        $placedEmail = str_replace("{website}", get_bloginfo('name'), $placedEmail);

                        wp_insert_post(array(
                            'post_title' => $sanitized_array['name'] . " - " . $sanitized_array['phone'],
                            'post_content' => $placedEmail,
                            'post_type' => 'contact_form',
                            'post_status' => 'private',
                            'post_author' => 1
                        ));
                        $headers[] = "Content-type: text/html; harset=iso-8859-1" . "\r\n";
                        $headers[] = "From: " . $emailFrom . " <no-reply@" . $_SERVER['SERVER_NAME'] . ">";
                        $headers[] = "MIME-Version: 1.0" . "\r\n";
                        //Admin email
                        wp_mail($adminEmail, $sanitized_array['name'] . " - " . $sanitized_array['email'], $placedEmail, $headers);
                        //Customer email
                        /*  wp_mail($inputs['email'], $inputs['name'] . " - " . $inputs['email'], $placedEmail, $headers);*/

                        wp_send_json(array(
                            'success' => true,
                            'message' => 'پیام با موفقیت ارسال شد. '
                        ));
                    } else {
                        // Error: One of the fields is empty
                        wp_send_json(array(
                            'success' => false,
                            'message' => 'has error'
                        ));
                    }
                } else {
                    // Error: Required fields or data are missing
                }
            } else {
                // Error: Data is not sent
            }
        }

        public function wp_ajax_testimonial_form()
        {
            if (isset($_POST["data"])) {
                $formData = $_POST["data"];
                if (
                    isset($formData['name']) &&
                    isset($formData['phone']) &&
                    isset($formData['message']) &&
                    isset($formData['service']) &&
                    isset($formData['rating'])
                ) {
                    $name = $formData['name'];
                    $phone = $formData['phone'];
                    $message = $formData['message'];
                    $service = $formData['service'];
                    $rate = $formData['rating'];

                    //sanitize
                    $sanitized_username = sanitize_text_field($name);
                    $sanitized_phone = sanitize_text_field($phone);
                    $sanitized_comment = sanitize_text_field($message);
                    $sanitized_service = sanitize_text_field($service);
                    $sanitized_rate = intval($rate);

                    // Put the sanitized fields into an array
                    $sanitized_array = array(
                        'name' => $sanitized_username,
                        'phone' => $sanitized_phone,
                        'message' => $sanitized_comment,
                        'service' => $sanitized_service,
                        'rating' => $sanitized_rate
                    );

                    //                  check array
                    if (!empty($sanitized_array['name']) && !empty($sanitized_array['phone']) && !empty($sanitized_array['message'])
                        && !empty($sanitized_array['service']) && !empty($sanitized_array['rating'])) {


                        $page_id = get_option('page_on_front');

                        $adminEmail = get_field("website_email", $page_id);
                        $emailTemplate = get_field("email_template", $page_id);
                        $emailFrom = get_field("email_from", $page_id);
                        $placedEmail = $emailTemplate;

                        $placedEmail = str_replace("{name}", $sanitized_array['name'], $placedEmail);
                        $placedEmail = str_replace("{phone}", $sanitized_array['phone'], $placedEmail);
                        $placedEmail = str_replace("{message}", $sanitized_array['message'], $placedEmail);
                        $placedEmail = str_replace("{website}", get_bloginfo('name'), $placedEmail);


                        wp_insert_comment(array(
                            'comment_post_ID' => $sanitized_array['service'],
                            'comment_author' => $sanitized_array['name'],
                            'comment_author_email' => $sanitized_array['phone'],
                            'comment_content' => $sanitized_array['message'],
                            'comment_meta' => array(
                                'custom_field' => $sanitized_array['rating']
                            ),
                            'comment_approved' => 0,

                        ));
                        $headers[] = "Content-type: text/html; harset=iso-8859-1" . "\r\n";
                        $headers[] = "From: " . $emailFrom . " <no-reply@" . $_SERVER['SERVER_NAME'] . ">";
                        $headers[] = "MIME-Version: 1.0" . "\r\n";
                        //Admin email
                        wp_mail($adminEmail, $sanitized_array['name'] . " - " . $sanitized_array['email'], $placedEmail, $headers);
                        //Customer email
                        /*  wp_mail($inputs['email'], $inputs['name'] . " - " . $inputs['email'], $placedEmail, $headers);*/

                        wp_send_json(array(
                            'success' => true,
                            'message' => 'پیام با موفقیت ارسال شد. '
                        ));
                    } else {
                        // Error: One of the fields is empty

                        wp_send_json(array(
                            'success' => false,
                            'message' => 'has error'
                        ));
                    }
                } else {
                    // Error: Required fields or data are missing
                }
            } else {
                // Error: Data is not sent
            }
        }
    }
}
