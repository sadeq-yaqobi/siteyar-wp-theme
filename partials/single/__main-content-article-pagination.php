<div class="single_article_pagination">
    <?php $prev_post = get_previous_post('', '', 'category') ?>
    <?php if (!empty($prev_post)): ?>
        <div class="prev-post">
            <a href="<?php echo get_permalink($prev_post->ID);?>" class="theme-bg">
                <div class="title-with-link">
                    <span class="intro"><?php echo mb_substr($prev_post->post_title,0,30).' '.'...'; ?></span>
                </div>
            </a>
        </div>
    <?php endif; ?>
    <div class="article_pagination_center_grid">
        <a href="#"><i class="ti-layout-grid3"></i></a>
    </div>
    <?php $next_post = get_next_post('', '', 'category') ?>
    <?php if (!empty($next_post)): ?>
        <div class="next-post">
            <a href="<?php echo get_permalink($next_post->ID); ?>" class="theme-bg">
                <div class="title-with-link">
                    <span class="intro"><?php echo mb_substr($next_post->post_title,0,30).' '.'...'; ?> </span>
                </div>
            </a>
        </div>
    <?php endif; ?>
</div>