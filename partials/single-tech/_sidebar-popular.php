<!-- Trending Posts -->
<div class="single_widgets widget_thumb_post">
    <!--<h4 class="title">پرمخاطب</h4>
    <ul>
        <li>
            <span class="left"><img src="<?php /*echo get_template_directory_uri() . '/assets/img/blog-sm-01.jpg' */?>"
                                    alt="" class=""></span>
            <span class="right"><a class="feed-title" href="#">در الکامپ امسال چه خبر است؟</a><span class="post-date"><i
                            class="ti-calendar"></i>10دقیقه پیش</span></span>
        </li>
        <li>
										<span class="left">
											<img src="<?php /*echo get_template_directory_uri() . '/assets/img/blog-sm-02.jpg' */?>"
                                                 alt="" class="">
										</span>
            <span class="right">
											<a class="feed-title" href="#">چگونه بهانه آوردن را متوقف کنید؟</a>
											<span class="post-date"><i class="ti-calendar"></i>2ساعت پیش</span>
										</span>
        </li>
        <li>
										<span class="left">
											<img src="<?php /*echo get_template_directory_uri() . '/assets/img/blog-sm-03.jpg' */?>"
                                                 alt="" class="">
										</span>
            <span class="right">
											<a class="feed-title" href="#">مشخصات اولین تبلت فراسو</a>
											<span class="post-date"><i class="ti-calendar"></i>4ساعت پیش</span>
										</span>
        </li>
        <li>
										<span class="left">
											<img src="<?php /*echo get_template_directory_uri() . '/assets/img/blog-sm-01.jpg' */?>"
                                                 alt="" class="">
										</span>
            <span class="right">
											<a class="feed-title" href="#">مالزی به دنبال دانشجویان آمریکایی</a>
											<span class="post-date"><i class="ti-calendar"></i>7ساعت پیش</span>
										</span>
        </li>
        <li>
										<span class="left">
											<img src="<?php /*echo get_template_directory_uri() . '/assets/img/blog-sm-02.jpg' */?>"
                                                 alt="" class="">
										</span>
            <span class="right">
											<a class="feed-title" href="#">فیلترینگ 100 هزار واژه از سوی گوگل</a>
											<span class="post-date"><i class="ti-calendar"></i>3روز پیش</span>
										</span>
        </li>
    </ul>-->
    <?php if (is_active_sidebar('sidebar-2')):?>
    <ul>
        <?php dynamic_sidebar('sidebar-2')?>
    </ul>
    <?php endif;?>
</div>

