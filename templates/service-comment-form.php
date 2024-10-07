<?php $query_arg = array(
    'posts_per_page' => -1,
    'post_type' => 'service',
    'orderby' => array(
        'date' => 'DE',
        'menu_order' => 'ASC',
    ),
    'post_status' => 'publish',
);
$allServices = new WP_Query($query_arg);
$services = $allServices->posts; ?>
<?php

/**
 * Template Name: comment form Page
 */
?>
<?php get_header();
?>

<main class=" main " id="comment-service-page">
    <section class="contact-page container">
        <div class="contact-row">
            <div class="contact-img">
                <img src="<?= get_stylesheet_directory_uri() ?>/imgs/comment.webp" alt="contact">
            </div>
            <div class="contact-form">
                <h2 class="h2 contact-title">نظراتتون رو با ما به اشتراک بذارید</h2>
                <span>تجربه های خودتون رو با ما به اشتراک بذارید</span>
                <form method="post" action="" id="service_comment_form">
                    <div class="form-input">

                        <i class="icon-call1"></i>
                        <input type="text" name="phone" id="phone" placeholder=" تلفن همراه" required>
                    </div>
                    <div class="form-input">
                        <i class="icon-user-1"></i>
                        <input type="text" name="name" id="name" placeholder=" نام شما " required>
                    </div>
                    <div class="form-input">
                        <select name="service" id="">
                            <option value="">خدمات</option>
                            <?php foreach ($services as $service) : ?>
                                <option value="<?= $service->ID ?>"><?= $service->post_title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-input form-textarea">
                        <i class="icon-message-2"></i>
                        <textarea name="message" id="message" rows="7" maxlength="65525" placeholder="پیام شما" required></textarea>
                    </div>
                    <div class="form-rate">
                        <span for="rating">چند ستاره امتیاز میدی؟</span>
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="5 stars">
                                <?php get_template_part('imgs/star', null,); ?>
                            </label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="4 stars">
                                <?php get_template_part('imgs/star', null,); ?>
                            </label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="3 stars">
                                <?php get_template_part('imgs/star', null,); ?>
                            </label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="2 stars">
                                <?php get_template_part('imgs/star', null,); ?>
                            </label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="1 star">
                                <?php get_template_part('imgs/star', null,); ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-btn">
                        <button id="submit_form" class="btn-icon" data-callback="ContactForm" type="submit"><i class="icon-send-2"></i>ارسال نظر
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