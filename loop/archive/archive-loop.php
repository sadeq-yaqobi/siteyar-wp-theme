
    <?php
    //Notice: If the $wp_query doesn't work you have to globalize it
    //global $wp_query;

?>
    <div class="row">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):the_post(); ?>
                <!-- Course Grid 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="education_block_grid">
                        <div class="education_block_thumb">
                            <a href="<?php the_permalink(); ?>"><?php echo sy_post_thumbnail() ?></a>
                            <?php $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
                            if (!empty($post_cat)):?>
                                <div class="topic_level bg-warning text-white"><?php echo get_the_category_by_ID($post_cat) ?></div>
                            <?php endif;?>
                        </div>
                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                            <p><?php echo ExcerptPost::sy_excerpt_post_limit() ?></p>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="instructor-detail.html">
                                        <?php echo get_avatar(get_the_author_meta('user_email'), 35, '', get_the_author(), ['class' => 'img-fluid']) ?>

                                    </a></div>
                                <h5><a href="instructor-detail.html"><?php the_author(); ?></a></h5>
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

