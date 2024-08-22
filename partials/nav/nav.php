<!-- ============================================================== -->
<!-- Start Navigation -->
<div class="header <?php echo is_front_page()?'header-index':'header-light' ?> ">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="#">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/'.(is_front_page()?'logo-light.png':'logo.png' )?>" class="logo" alt=""/>
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <?php if (!is_user_logged_in()):?>
                    <ul class="nav-menu nav-menu-social align-to-left">

                        <li class="login_click light">
                            <a href="#" data-toggle="modal" data-target="#login">ورود</a>
                        </li>
                        <li class="login_click theme-bg">
                            <a href="#" data-toggle="modal" data-target="#signup">ثبت نام</a>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav-menu align-to-left" dir="ltr">
<!--                        <li id="profileName"><a href="#" class="profile-link"><span class="profile-name">صادق یعقوبی</span><img src="--><?php //echo get_template_directory_uri() . '/assets/img/user-1.jpg' ?><!--"  class="circle " width="30" alt=""><span class="submenu-indicator"></span></a>-->
                        <li id="profileName"><a href="#" class="profile-link"><span class="profile-name"><?php echo wp_get_current_user()->display_name;?></span><?php echo sy_author_avatar(wp_get_current_user()->user_email,30,wp_get_current_user()->display_name,'circle')?><span class="submenu-indicator"></span></a>

                            <ul dir="ltr" class="nav-dropdown nav-submenu">
                                <li><a href="dashboard.html">پنل مدیریت<span class="submenu-indicator"></span></a>
                                    <ul class="nav-dropdown nav-submenu profile-sub-dropdown">
                                        <li><a href="#">مدیریت دوره ها</a></li>
                                        <li><a href="#">مدیریت تیکت ها</a></li>
                                        <li><a href="#">مدیریت نظرات</a></li>
                                        <li><a href="#">مدیریت مطالب</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">داشبورد</a></li>
                                <li><a href="#">پروفایل من</a></li>
                                <li><a href="#">دوره های من</a></li>
                                <li><a href="<?php echo wp_logout_url(home_url())?>">خروج</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
                <?php
                wp_nav_menu([
                    'theme_location' => 'top nav', // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                    'depth' => 3, // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
                    'container' => "div", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
//                    'container_class'=> "nav-menus-wrapper", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
//                    'menu_class'=> "nav-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                    'walker' => new WP_Bootstrap_Navwalker(), // (object) Instance of a custom walker class.
                    'items_wrap' => '<ul id="%1$s" class="nav-menu">%3$s</ul>', //How the list items should be wrapped. Uses printf() format with numbered placeholders. Default is a ul with an id and class.

                ]);
                ?>
                <!--<ul class="nav-menu">
                    <li class="active"><a href="#">خانه</a></li>
                    <li><a href="#">دوره های آموزشی<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="course.html"> دوره طراحی وب </a></li>
                            <li><a href="course.html"> دوره جاوااسکریپت </a></li>
                            <li><a href="course.html"> دوره ری اکت </a></li>
                            <li><a href="course.html"> دوره لاراول </a></li>
                            <li><a href="course.html"> دوره PHP </a></li>
                            <li><a href="course.html"> دوره پلاگین نویسی وردپرس </a></li>

                            <li><a href="#"> دوره طراحی قالب وردپرس </a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">تماس با ما</a></li>
                </ul>-->

            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->