
    <?php
    //Notice: If the $wp_query doesn't work you have to globalize it
    //global $wp_query;
//    DebugHelper::dump($wp_query);
?>
    <div class="row" id="filter-content">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):the_post(); ?>
                <!-- Course Grid 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="education_block_grid">
                        <div class="education_block_thumb property_video">
                            <a href="<?php the_permalink(); ?>"><?php echo sy_post_thumbnail() ?></a>
                            <?php $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
                            if (!empty($post_cat)):?>
                                <div class="topic_level bg-warning text-white"><?php echo get_the_category_by_ID($post_cat) ?></div>
                            <?php endif; ?>
                            <?php
                            $post_type_video = get_post_meta(get_the_ID(), '_sy_post_types', true);
                            if ($post_type_video == 1): ?>
                                <div class="overlay_icon">
                                    <div class="bb-video-box">
                                        <div class="bb-video-box-inner">
                                            <div class="bb-video-box-innerup">
                                                <a href="https://www.aparat.com/v/m52o86u"
                                                   id="popup-video-id"
                                                   data-toggle="modal"
                                                   data-target="#popup-video"
                                                   class="theme-cl"><i
                                                            class="ti-control-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="edu_duration">25:10</div>
                            <?php endif; ?>
                        </div>
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                            <p><?php echo ExcerptPost::sy_excerpt_post_limit() ?></p>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="">
                                        <?php echo get_avatar(get_the_author_meta('user_email'), 35, '', get_the_author(), ['class' => 'img-fluid']) ?>

                                    </a></div>
                                <h5><?php echo get_the_author_posts_link()?></h5>
                            </div>
                            <?php $post_level = get_post_meta(get_the_ID(), '_sy_post_level', true);
                            if (!empty($post_level)) {
                                switch ($post_level) {
                                    case 1;
                                        echo '<span class="education_block_time ">سطح : مقدماتی</span>';
                                        break;
                                    case 2;
                                        echo '<span class="education_block_time ">سطح : متوسط</span>';
                                        break;
                                    case 3;
                                        echo '<span class="education_block_time ">سطح : پیشرفته</span>';
                                        break;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata();?>
    </div>
    <div class="text-center theme-pagination"><?php the_posts_pagination();?></div>
    <!-- Video Modal -->
<!--    <div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popup-videoLabel"-->
<!--         aria-hidden="true">-->
<!--        <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <strong class="modal-title" id="popup-videoLabel">قبل از خروج ودیپ را متوقف کنید</strong>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <!-- Video iframe -->-->
<!--                    <style>.h_iframe-aparat_embed_frame {-->
<!--                            position: relative;-->
<!--                        }-->
<!---->
<!--                        .h_iframe-aparat_embed_frame .ratio {-->
<!--                            display: block;-->
<!--                            width: 100%;-->
<!--                            height: auto;-->
<!--                        }-->
<!---->
<!--                        .h_iframe-aparat_embed_frame iframe {-->
<!--                            position: absolute;-->
<!--                            top: 0;-->
<!--                            left: 0;-->
<!--                            width: 100%;-->
<!--                            height: 100%;-->
<!--                        }</style>-->
<!--                    <div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span>-->
<!--                        <iframe id="video"-->
<!--                                src="https://www.aparat.com/video/video/embed/videohash/m52o86u/vt/frame?titleShow=true&autoplay=true"-->
<!--                                allow="autoplay" allowFullScreen="true" webkitallowfullscreen="true"-->
<!--                                mozallowfullscreen="true"></iframe>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- End Video Modal -->






