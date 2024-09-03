<!-- Author Detail -->
<div class="article_detail_wrapss single_article_wrap format-standard">

    <div class="article_posts_thumb">
<!--        <span class="img"><span class="img-fluid">--><?php //echo get_avatar(get_the_author_meta('email'),120, '','') ?><!--</span></span>-->
        <span class="img img-fluid"><?php echo sy_author_avatar(get_the_author_meta('email'),120,get_the_author_meta('display_name'))?></span>
        <h3 class="pa-name"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"><?php echo get_the_author_meta('display_name')?></a></h3>
        <ul class="social-links">
            <?php echo get_the_author_meta('facebook') ? '<li><a href="' . get_the_author_meta('facebook') . '"><i class="fab fa-facebook-f"></i></a></li>
            ' : '' ?>
            <li><a href="<?php echo get_the_author_meta('twitter') ?>"><i class="fab fa-twitter"></i></a></li>
            <li><a href="<?php echo get_the_author_meta('instagram') ?>"><i class="fab fa-instagram"></i></a></li>
            <li><a href="<?php echo get_the_author_meta('youtube') ?>"><i class="fab fa-youtube"></i></a></li>
            <li><a href="<?php echo get_the_author_meta('linkedin') ?>"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <p class="pa-text"><?php echo get_the_author_meta('description')?></p>
    </div>

</div>
