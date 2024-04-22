<?php
$args = [
//    'post_type' => ['post','tech'], //show post and custom post type both by a single query
    'post_type' => ['post'],
    'posts_per_page' => 4
];
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()): ?>
    <?php while ($the_query->have_posts()):$the_query->the_post(); ?>
        <div class="singles_items ">
            <div class="edu_cat">
                <div class="pic">

                    <!--pinning the level on post-->
                    <?php
                    $post_level = get_post_meta(get_the_ID(), '_sy_post_level', true);
                    if (!empty($post_level)) {
                        switch ($post_level) {
                            case 1:
                                echo '<div class="topic_level bg-info text-white">سطح :مقدماتی</div>';
                                break;
                            case 2:
                                echo '<div class="topic_level bg-info text-white">سطح :متوسط</div>';
                                break;
                            case 3:
                                echo '<div class="topic_level bg-info text-white">سطح :پیشرفته</div>';
                                break;
                        }
                    }
                    ?>

                    <!-- pinning the category on post-->
                    <?php
                    $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
                    if (!empty($post_cat)):?>
                        <div class="topic_cat bg-warning text-white"><?php echo get_the_category_by_ID($post_cat) ?></div>
                    <?php endif; ?>


                    <a class="pic-main" href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('', ['class' => 'img-responsive', 'alt' => get_the_title()]);
                        } else {
                            echo sy_default_post_thumbnail();
                        } ?>
                    </a>
                </div>
                <div class="edu_data singles_items_border_bottom">
                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                    <ul class="meta d-flex mt-4">
                        <li class="d-flex align-items-center"><?php the_author() ?></li>
                        <?php
                        $post_types = get_post_meta(get_the_ID(), '_sy_post_types', true);
                        if (!empty($post_types)) {
                            switch ($post_types) {
                                case 1:
                                    echo '<li class="video d-flex align-items-center"><i class="ti-video-clapper"></i>ویدئو</li>';
                                    break;
                                case 2:
                                    echo '<li class="video d-flex align-items-center"><i class="ti-video-clapper"></i>مقاله</li>';
                                    break;
                            }
                        }
                        ?>
                        <li class="video d-flex align-items-center"><i class="ti-eye"></i><?php echo PostView::sy_get_post_view(get_the_ID());?></li>
                        <li class="d-flex align-items-center"><i
                                    class="ti-calendar theme-cl"></i><?php the_date('j F Y') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <div class="alert alert-info">تا کنون مطلبی منتشر نشده است</div>
<?php endif; ?>
<?php $the_query->rewind_posts();?>