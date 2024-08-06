<?php

/**
 * Template Name: Contact Page
 */
?>
<?php get_header();

$contact_img = get_field('contact_img');
$contact_title = get_field('contact_title');
$contact_subtitle = get_field('contact_subtitle');
?>

<main class="main " id="contact-page">
    <section class="container">
        <div class="title mt-10">
            <h2><?= get_the_title(); ?></h2>
            <p><?= get_the_content(); ?></p>
        </div>
        <?= get_template_part('templates/components/contact', null,);  ?>
    </section>

    <?php if ($contact_img && $contact_title) : ?>

        <section class="contact-page container">
            <div class="contact-row mt-16">
                <div class="contact-img rounded-2xl max-md:min-h-80" style="background-image: url(<?php echo wp_get_attachment_url($contact_img) ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
                    <?php  ?>
                </div>
                <div class="contact-form md:pt-4" id="contact-form">
                    <div class="title p-0">
                        <h2 class="contact-title"><?php echo $contact_title ?></h2>
                        <p><?php echo $contact_subtitle ?></p>
                    </div>

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
                            <textarea name="message" id="message" rows="7" maxlength="65525" placeholder="پیام شما"></textarea>
                        </div>
                        <div class="form-btn">

                            <button id="submit_form" class="btn-icon" data-callback="ContactForm" type="submit"><i class="icon-send-2"></i>ارسال پیام
                            </button>
                        </div>
                    </form>
                    <div class="form-message success" id="success_message"></div>
                    <div class="form-message fail" id="fail_message"></div>
                </div>
            </div>
        </section>

    <?php endif ?>

</main>

<?php get_footer() ?>