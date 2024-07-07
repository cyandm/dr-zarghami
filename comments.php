<?php
if (post_password_required()) {
    return;
}
comment_form(
    array(
        'logged_in_as' => null,
        'title_reply' => "شماهم توی این بحث شرکت کنید",
        'title_reply_to' => "ارسال پاسخ به %s",
        'comment_field' => '<div class="input-group"><i class="icon-sms"></i><textarea id="comment" name="comment" class="form-control" rows="3" maxlength="65525" placeholder="دیدگاه" required></textarea></div>',
        'id_submit' => "submit-commentform",
        'class_submit' => "btn-primary cursor-pointer",
        'name_submit' => "submit-commentform",
        'label_submit' => "ارسال دیدگاه",
        'submit_field' => '<div class="form-submit btn-default"><i class="icon-send-2"></i>%1$s %2$s</div>',
        'comment_notes_before' => ''
    )
);
if (have_comments()) :
    ?>
    <div class="comment-list" id="comment-list">
        <?php
        $list = wp_list_comments(
            array(
                'walker' => null,
                'max_depth' => '',
                'style' => 'div',
                'callback' => null,
                'end-callback' => null,
                'type' => 'all',
                'page' => '',
                'per_page' => '',
                'avatar_size' => 32,
                'reverse_top_level' => null,
                'reverse_children' => '',
                'format' => current_theme_supports('html5', 'comment-list') ? 'html5' : 'xhtml',
                'short_ping' => true,
                'echo' => true,
            )
        );
        ?>
    </div>
<?php
else :
    ?>
    <div class="comment-list">

        <p style="margin-top: 1rem;">دیدگاهی وجود ندارد.</p>
    </div>
<?php
endif;


?>