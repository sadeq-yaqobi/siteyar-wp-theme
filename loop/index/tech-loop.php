<!-- Single Article -->
<?php
$args = [
    'post_type' => 'tech',
    'posts_per_page' => 3
];
$the_query = new WP_Query($args);
//echo '<pre>';
//var_dump($the_query);
//echo '</pre>';


?>
<?php if ($the_query->have_posts()): ?>
    <?php while ($the_query->have_posts()):$the_query->the_post(); ?>
<div class="col-lg-4 col-md-4 col-sm-12">
    <div class="articles_grid_style">
        <div class="articles_grid_thumb">
            <a href="<?php the_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('', ['class' => 'img-fluid', 'alt' => get_the_title()]);
                } else
                    echo sy_default_post_thumbnail();
                ?>"
            </a>
        </div>

        <div class="articles_grid_caption">
            <h4><?php the_title() ?></h4>
            <div class="articles_grid_author">
                <div class="articles_grid_author_img">
                    <?php echo get_avatar( get_the_author_meta('user_email'),40,'',get_the_author(),['class'=>'img-fluid'])?>

                </div>
                <h4><?php the_author();?></h4>
            </div>
        </div>
    </div>
</div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <div class="alert alert-info">تا کنون مطلبی منتشر نشده است</div>
<?php endif; ?>
