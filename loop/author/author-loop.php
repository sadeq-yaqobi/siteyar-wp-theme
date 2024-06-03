<!-- ============================ Instructor Detail ================================== -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="custom-tab customize-tab tabs_creative">
                    <ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">مطالب نویسنده</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">درباره نویسنده</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">نظرات</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <!-- Classes -->
                        <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <!-- Single Video -->
                                <?php if (have_posts()): ?>
                                    <?php while (have_posts()):the_post(); ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="edu-watching">
                                                <div class="property_video sm">
                                                    <div class="thumb">
                                                        <a href="<?php the_permalink(); ?>"><?php echo sy_post_thumbnail() ?></a>
                                                        <?php
                                                        $post_type_video = get_post_meta(get_the_ID(), '_sy_post_types', true);
                                                        if ($post_type_video == 1): ?>
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
                                                            <div class="edu_duration">25:10</div>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                                <div class="edu_video detail">
                                                    <div class="edu_video_header">
                                                        <h4>
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="edu_video_bottom">
                                                        <div class="edu_video_bottom_left mt-3">
                                                            <span>
                                                                <?php
                                                                $post_level = get_post_meta(get_the_ID(), '_sy_post_level', true);
                                                                if (!empty($post_level)) {
                                                                    switch ($post_level) {
                                                                        case 1:
                                                                            echo 'سطح :مقدماتی';
                                                                            break;
                                                                        case 2:
                                                                            echo 'سطح :متوسط';
                                                                            break;
                                                                        case 3:
                                                                            echo 'سطح :پیشرفته';
                                                                            break;
                                                                    }
                                                                }
                                                                ?>
                                                            </span>
                                                        </div>
                                                        <div class="edu_video_bottom_right mt-3">
                                                            <?php
                                                            $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
                                                            if (!empty($post_cat)):?>
                                                                <i class="ti-desktop"></i>
                                                                <span> <?php echo get_the_category_by_ID($post_cat) ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="text-center theme-pagination"><?php the_posts_pagination(); ?></div>
                        </div>

                        <!-- Education -->
                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="details_single p-2">
                                <ul class="skills_info">
                                    <?php $user_resume = get_user_meta(get_query_var('author_id'), '_sy_user_resume', true);

                                    $user_careers = explode('**', $user_resume);
                                    foreach ($user_careers as $user_career):
                                        $user_career_parts = explode('|', $user_career);
                                        ?>

                                        <li>
                                            <div class="skills_captions">
                                                <h4 class="Skill_title"><?php echo $user_career_parts[0]; ?></h4>
                                                <span><?php echo $user_career_parts[1] ?></span>
                                                <span><?php echo $user_career_parts[2] ?></span>
                                                <p class="skills_dec"><?php echo $user_career_parts[3] ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Reviews -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="reviews-comments-wrap">
                                <!-- reviews-comments-item -->
                                <?php $args = [
                                    'status' => 'approve',
                                    'post_author' => get_the_author_meta('ID'),
                                    'author__not_in' => get_the_author_meta('ID')
                                ];
                                $the_comments = new WP_Comment_Query();
                                // we set $args into query method of Wp_Comment_Query's object because we just need comments data not other things that it returns
                                $the_comments = $the_comments->query($args);
                                //                                DebugHelper::dump($the_comments);
                                ?>
                                <?php if ($the_comments): ?>
                                    <?php foreach ($the_comments as $the_comment): ?>
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <?php echo get_avatar($the_comment->comment_author_email, 80, '', $the_comment->comment_author, ['class' => 'img-fluid']) ?>
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h5>
                                                    <?php echo $the_comment->comment_author ?>
                                                    <span class="reviews-comments-item-date"><i
                                                                class="ti-calendar theme-cl"></i><?php echo get_comment_date('j F Y', $the_comment->comment_ID) ?></span>
                                                </h5>
                                                <h4 class="my-2">برای مطلب: <a
                                                            href="<?php echo get_comment_link($the_comment->comment_ID) ?>"><?php echo get_the_title($the_comment->comment_post_ID) ?></a>
                                                </h4>

                                                <!--  <div class="listing-rating high" data-starrating2="5">
                                                      <i class="ti-star active"></i>
                                                      <i class="ti-star active"></i><i class="ti-star active"></i>
                                                      <i class="ti-star active"></i><i class="ti-star active"></i><span class="review-count">4.9</span>
                                                  </div>-->

                                                <div class="clearfix"></div>
                                                <p class="my-2"><?php echo $the_comment->comment_content ?></p>
                                                <!--<div class="pull-left reviews-reaction">
                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i>
                                                        1</a>
                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                </div>-->
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="alert alert-info">تاکنون دیدگاهی برای مطالب این نویسنده منتشر نشده
                                        است!
                                    </div>
                                <?php endif; ?>
                                <!--reviews-comments-item end-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Instructor Detail ================================== -->

