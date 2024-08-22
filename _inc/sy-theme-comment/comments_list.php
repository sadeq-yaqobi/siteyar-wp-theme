<?php
function sy_theme_comment($comment, $args)
{
    $comment = $GLOBALS['comment'];

    ?>
    <li id="comment-<?php echo $comment->comment_ID; ?>" <?php comment_class('article_comments_wrap') ?>>
        <article>
            <div class="article_comments_thumb">
<!--                --><?php //echo get_avatar($comment->comment_author_email, $args['avatar_size'], '', $comment->comment_author/*,['class'=>'test']*/) ?>
                <span class="img img-fluid"><?php echo sy_author_avatar(get_the_author_meta('email'),'70',get_the_author_meta('display_name'))?></span>

            </div>
            <div class="comment-details">
                <div class="comment-meta">
                    <div class="comment-left-meta">
                        <h4 class="author-name"><?php echo $comment->comment_author ?><?php
                            $user_data = get_userdata($comment->user_id);
                            if ($user_data and $user_data->roles[0] == 'administrator'):?>
                                <span class="selected"><i class="fas fa-bookmark"></i></span>
                            <?php endif; ?>
                        </h4>
                        <div class="comment-date"><?php echo get_comment_date('j F Y'); ?></div>
                    </div>
                    <div class="comment-reply">

                        <!--                        reply to comment by default wordPress form -->
                        <!--                        <a href="#comment_box" class="reply" data-comment-id="-->
                        <?php //echo $comment->comment_ID;
                        ?><!--" data-comment-author="--><?php //echo $comment->comment_author
                        ?><!--" data-comment-content="--><?php //echo $comment->comment_content
                        ?><!--"><span class="icona"><i class="ti-back-right"></i></span>پاسخ</a>-->

                        <!--                        reply  to comment by bootstrap modal -->
                        <a href="" title="پاسخ" class="reply" data-toggle="modal" data-target="#commentModal"
                           data-comment-id="<?php echo $comment->comment_ID; ?>"
                           data-comment-author="<?php echo $comment->comment_author ?>"
                           data-comment-content="<?php echo wp_strip_all_tags($comment->comment_content) ?>"><span
                                    class="icona"><i class="ti-back-right"></i></span></a>
                        <?php if (current_user_can('manage_options')) {
                            edit_comment_link('<span title="ویرایش"  class="icona comment-edit pl-2"><i class="ti-pencil"></i></span>');
                        } ?>

                    </div>
                </div>
                <div class="comment-text">
                    <?php if ($comment->comment_approved): ?>
                        <p><?php echo $comment->comment_content; ?></p>
                    <?php else: ?>
                        <div class="alert alert-info">دیدگاه شما ارسال شد و بعد تایید مدیر نمایش داده می‌شود</div>
                    <?php endif; ?>
                </div>
            </div>
        </article>
    </li>

    <?php

}
