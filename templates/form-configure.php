<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $service = isset($_POST['service']) ? $_POST['service'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : '';

    $to = "info@dr-zarghami.com";
    $subject = "فرم جدید ثبت شده";
    $headers = "از: $email\r\n";
    $headers .= "پاسخ به: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // متن ایمیل
    $email_body = "
        <html>
        <body>
            <h2>اطلاعات فرم پرشده</h2>
            <p><strong>نام:</strong> $name</p>
            <p><strong>شماره تلفن:</strong> $phone</p>
            <p><strong>ایمیل:</strong> $email</p>
            <p><strong>پیام:</strong> $message</p>
    ";

    if (!empty($service) || !empty($rating)) {
        $email_body .= "
            <p><strong>خدمات:</strong> $service</p>
            <p><strong>امتیاز:</strong> $rating</p>
        ";
    }

    $email_body .= "
        </body>
        </html>
    ";



    // ارسال ایمیل
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
