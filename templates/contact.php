<?php
/**
 * Template Name: Contact Page
 */
?>
<?php get_header();
?>
    <main class=" main " id=" contact-page">
        <section class="contact-page container">
            <div class="contact-row">
                <div class="contact-img">
                    <img src="<?= get_stylesheet_directory_uri() ?>/imgs/hospital.png" alt="contact">
                </div>
                <div class="contact-form">
                    <h2 class="h2 contact-title">تماس با ما</h2>
                    <span>اگه سوال یا درخواستی داری پیام بزار</span>
                    <form method="post" action="" id="contact_form">
                        <div class="form-input">

                            <i class="icon-call1"></i>
                            <input type="text" name="phone" id="phone" placeholder=" تلفن همراه">
                        </div>
                        <div class="form-input">
                            <i class="icon-user-1"></i>
                            <input type="text" name="name" id="name" placeholder=" نام شما ">

                        </div>
                        <div class="form-input form-textarea">
                            <i class="icon-message-2"></i>
                            <textarea name="message" id="message" rows="7" maxlength="65525"
                                      placeholder="پیام شما"></textarea>
                        </div>
                        <div class="form-btn">

                            <button id="submit_form" class="btn-icon" data-callback="ContactForm" type="submit"><i
                                        class="icon-send-2"></i>ارسال پیام
                            </button>
                        </div>
                    </form>
                    <div class="form-message success" id="success_message"></div>
                    <div class="form-message fail" id="fail_message"></div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer() ?>