<?php
function sy_theme_comment($comment, $args)
{
    $comment = $GLOBALS['comment'];

    ?>
    <li id="comment-<?php echo $comment->comment_ID; ?>" <?php comment_class('article_comments_wrap') ?>>
        <article>
            <div class="article_comments_thumb">
                <?php echo get_avatar($comment->comment_author_email, $args['avatar_size'], '', $comment->comment_author/*,['class'=>'test']*/) ?>
            </div>
            <div class="comment-details">
                <div class="comment-meta">
                    <div class="comment-left-meta">
                        <h4 class="author-name"><?php echo $comment->comment_author ?><?php
                            $user_data = get_userdata($comment->user_id);
                            if ($user_data and $user_data->roles[0]=='administrator'):?>
                                <span class="selected"><i class="fas fa-bookmark"></i></span>
                            <?php endif; ?>
                        </h4>
                        <div class="comment-date"><?php echo get_comment_date('j F Y'); ?></div>
                    </div>
                    <div class="comment-reply">
                        <a href="#comment_box" class="reply" data-comment-id="<?php echo $comment->comment_ID; ?>" data-comment-author="<?php echo $comment->comment_author ?>" data-comment-content="<?php echo $comment->comment_content ?>"><span class="icona"><i class="ti-back-right"></i></span>پاسخ</a>
                    </div>
                </div>
                <div class="comment-text">
                    <p><?php echo $comment->comment_content; ?></p>
                </div>
            </div>
        </article>
    </li>

    <?php

}
