<div class="article_top_info">
    <ul class="article_middle_info">
        <li><a href="#"><span class="icons"><i class="ti-user"></i></span><?php the_author();?></a></li>
        <li><a href="#"><span class="icons"><i class="ti-comment-alt"></i></span><?php echo get_comments_number(); ?> نظر ثبت
                شده</a></li>
        <li><span class="icons mr-2"><i class="ti-eye"></i></span><?php echo PostView::sy_get_post_view(get_the_ID())?> بازدید</li>
        <li><span class="icons mr-2"><i class="ti-timer"></i></span><?php echo ReadingEstimateTime::sy_reading_estimate_time(get_the_content());?> دقیقه</li>
        <li><span class="icons mr-2"><i class="ti-search"></i></span>12 ورودی از گوگل</li>
    </ul>
</div>
