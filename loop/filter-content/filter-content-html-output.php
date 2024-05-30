<?php
function sy_archive_filter_html_output(): string
{
    $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
    if (!empty($post_cat)) {
        $cat = '<div class="topic_level bg-warning text-white">' . get_the_category_by_ID($post_cat) . '</div>';
    };

    $post_level = get_post_meta(get_the_ID(), '_sy_post_level', true);
    if (!empty($post_level)) {
        switch ($post_level) {
            case 1;
                $level = ' <span class="education_block_time " > سطح : مقدماتی </span > ';
                break;
            case 2;
                $level = '<span class="education_block_time " > سطح : متوسط </span > ';
                break;
            case 3;
                $level = '<span class="education_block_time " > سطح : پیشرفته </span > ';
                break;
        }
    }

    return '
<div class="col-lg-4 col-md-6">
                    <div class="education_block_grid">
                        <div class="education_block_thumb">
                            <a href="' . get_the_permalink() . '">' . sy_post_thumbnail() . '</a>
                            ' . $cat . '
                        </div>
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
                            <p>' . ExcerptPost::sy_excerpt_post_limit() . '</p>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="">
                                        ' . get_avatar(get_the_author_meta('user_email'), 35, '', get_the_author(), ['class' => 'img-fluid']) . '

                                    </a></div>
                                <h5>' . get_the_author_posts_link() . '</h5>
                            </div>
                            ' . $level . '
                        </div>
                    </div>
                </div>
    ';
}
