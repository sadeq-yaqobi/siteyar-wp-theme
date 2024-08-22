<?php
function sy_archive_filter_html_output(): string
{
    $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
    if (!empty($post_cat)) {
        $cat = '<div class="topic_level bg-warning text-white">' . get_the_category_by_ID($post_cat) . '</div>';
    };

    $post_type = get_post_meta(get_the_ID(), '_sy_post_types', true);
    if ($post_type == 1) {
        $video = '
         <div class="overlay_icon">
                                    <div class="bb-video-box">
                                        <div class="bb-video-box-inner">
                                            <div class="bb-video-box-innerup">
                                                <a href="https://www.aparat.com/video/video/embed/videohash/cNpW0/vt/frame"
                                                   data-toggle="modal"
                                                   data-target="#popup-video"
                                                   class="theme-cl"><i
                                                            class="ti-control-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="edu_duration">25:10</div>';
    }

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
                        <div class="education_block_thumb property_video">
                            <a href="' . get_the_permalink() . '">' . sy_post_thumbnail() . '</a>
                            ' . $cat . $video . '
                        </div>
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>
                            <p>' . ExcerptPost::sy_excerpt_post_limit() . '</p>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="">
                                        ' . sy_author_avatar(get_the_author_meta('user_email'), 35,  get_the_author()) . '

                                    </a></div>
                                <h5>' . get_the_author_posts_link() . '</h5>
                            </div>
                            ' . $level . '
                        </div>
                    </div>
                </div>
    ';
}
