<!--blog content-->
<?php GoogleReferer::sy_set_google_referer(get_the_ID(),$_SERVER['HTTP_REFERER']);?>
<?php if (have_posts()): ?>
    <?php while (have_posts()):the_post(); ?>
        <?php PostView::sy_set_post_view(get_the_ID());?>
        <div class="article_detail_wrapss single_article_wrap format-standard">
            <div class="article_body_wrap">
                <div class="article_featured_image">
                    <?php echo sy_post_thumbnail('img-responsive')?>
                </div>
                <?php get_template_part('meta-data/single/post-meta-top', 'post-meta-top') ?>
                <div class="main-content">
                    <?php the_content(); ?>
                </div>

                <?php get_template_part('meta-data/single/post-meta-bottom', 'post-meta-bottom') ?>
                <?php get_template_part('partials/single/__main-content-article-pagination', '__main-content-article-pagination') ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
