<div class="post-tags">
    <h4 class="pbm-title">تگ های پربازدید</h4>
    <ul class="list">
        <?php
        $post_tags = get_the_tags();
        if ($post_tags):
            foreach ($post_tags as $post_tag):
                $tag_link = get_tag_link($post_tag->term_id); ?>
                <li><a href="<?php echo $tag_link; ?>"><?php echo $post_tag->name; ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
