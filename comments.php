
<div class="article_detail_wrapss single_article_wrap format-standard">

    <div class="comment-area">
        <div class="all-comments">
            <?php if (get_comments_number() == 0): ?>
                <h4 class="comments-title">اولین نفری باشید که برای این مطلب دیدگاه می‌گذارید</h4>
            <?php else: ?>
                <h3 class="comments-title"><?php echo get_comments_number() ?> دیدگاه</h3>
            <?php endif; ?>
            <div class="comment-list">
                <ul>
                    <?php
                    $args = [
                        'callback' => 'sy_theme_comment',
                        'style' => 'ul',
                        'avatar_size' => 100
                    ];
                    wp_list_comments($args) ?>
                </ul>
            </div>
        </div>
        <?php if (comments_open()): ?>
            <div class="comment-box submit-form" id="comment_box">
                <h3 class="reply-title">ثبت دیدگاه</h3>
                <h6 class="reply-to"></h6>
                <div class="alert alert-info main-comment-content d-none"></div>
                <div class="comment-form">
<!--                    --><?php //comment_form();?>
                    <form  action="<?php echo site_url().'/wp-comments-post.php'?>" method="post">
                        <div class="row">
                            <?php if (!is_user_logged_in()): ?>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input id="author" name="author" type="text" class="form-control" placeholder="نام کامل" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input name="email" type="text" class="form-control" placeholder="ایمیل معتبر" required="required">
                                    </div>
                                </div>
                                <div class="comment-form-cookies-consent global-rtl col-lg-12 col-md-12 col-sm-12">
                                    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                    <label for="wp-comment-cookies-consent">ذخیره نام و ایمیل من در مرورگر برای زمانی که دوباره دیدگاهی می‌نویسم.</label>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control comment-textarea" cols="30" rows="6"
                                              placeholder="نظر خود را بنویسید..."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn search-btn" value="ارسال دیدگاه">
                                    <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID()?>" id="comment_post_ID">
                                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    <?php
                                    if (is_user_logged_in()):?>
                                        <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="<?php echo wp_create_nonce()?>">
                                    <?php
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-info">ارسال دیدگاه برای این مطلب مقدور نیست!</div>
        <?php endif; ?>
    </div>

</div>
