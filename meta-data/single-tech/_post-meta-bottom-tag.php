<div class="post-tags">
    <h4 class="pbm-title">تگ های پربازدید</h4>
    <ul class="list">

        <?php
        $custom_post_tags = get_terms([
            'taxonomy'   => 'tag-tech'
        ]);
        if ($custom_post_tags):
            foreach ($custom_post_tags as $custom_post_tag) :
                $tag_link = get_tag_link($custom_post_tag->term_id) ?>
                <li><a href="<?php echo $tag_link; ?>"><?php echo $custom_post_tag->name; ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
