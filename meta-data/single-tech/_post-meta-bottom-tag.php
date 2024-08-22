<div class="post-tags">
    <h4 class="pbm-title">تگ های این مطلب</h4>
    <ul class="list">

        <?php
        $custom_post_tags = get_the_terms($post->ID,'tag-tech');
        if ($custom_post_tags):
            foreach ($custom_post_tags as $custom_post_tag) :
                $tag_link = get_tag_link($custom_post_tag->term_id) ?>
                <li><a href="<?php echo $tag_link; ?>"><?php echo $custom_post_tag->name; ?></a></li>
            <?php endforeach; ?>
            <?php else:?>
        <span class="alert alert-warning">تگی برای این مطلب وجود ندارد.</span>
        <?php endif; ?>
    </ul>
</div>
