<!-- Row -->
<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- Row -->
        <div class="row align-items-center mb-3">
            <?php if (is_page('technology')) {
                $tech_post_num = get_option('_sy_tech_post_num');
                echo '<div class="col-lg-6 col-md-6 col-sm-12">تعداد مطالب یافت شده: <strong
                            class="badge badge-light py-1 px-2 num-post-found">' . $tech_post_num . '</strong>
                </div>';
            } elseif (is_page('post')) {
                $post_num = get_option('_sy_post_num');
                echo '<div class="col-lg-6 col-md-6 col-sm-12">تعداد مطالب یافت شده: <strong
                            class="badge badge-light py-1 px-2 num-post-found">' . $post_num . '</strong>
                </div>';
            } else {
                echo '<div class="col-lg-6 col-md-6 col-sm-12">تعداد مطالب یافت شده: <strong
                                class="badge badge-light py-1 px-2 num-post-found">' . $wp_query->found_posts . '</strong>
                    </div>';
            } ?>

            <!--  <?php /*$post_count = wp_count_posts('tech')->publish */ ?>
            <div class="col-lg-6 col-md-6 col-sm-12">تعداد مطالب یافت شده: <strong
                        class="badge badge-light py-1 px-2 num-post-found"><?php /*echo $post_count ?: '0' */ ?></strong>
            </div>-->

            <div class="col-lg-6 col-md-6 col-sm-12 ordering">
                <div class="filter_wraps">
                    <div class="dl">
                        <div id="main2">
                            <a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()"
                               id="open2"><span><i class="fas fa-arrow-alt-circle-right"></i></span>باکس فیلتر</a>
                        </div>
                    </div>
                    <!--<div class="dropdown show">
                        <a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            دوره های آموزشی
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">پرمخاطب</a>
                            <a class="dropdown-item" href="#">جدید</a>
                            <a class="dropdown-item" href="#">ویژه</a>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- /Row -->

        <!--        <div class="row">-->

        <!-- Course Grid 1 -->
        <?php if (is_page('technology')) {
            get_template_part('loop/archive/archive-technology-loop', 'archive-technology-loop');
        } elseif (is_page('post')) {
            get_template_part('loop/archive/archive-post-loop', 'archive-post-loop');
        } else {
            get_template_part('loop/archive/archive-loop', 'archive-loop');
        } ?>


        <!--        </div>-->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <button id="load_more_btn" type="button" class="btn btn-loader d-none"> نمایش مطالب بیشتر<i
                                    class="fa fa-spin fa-spinner mr-3 d-none load-more-icon"></i></button>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Row -->
    </div>
</div>
<!-- Row -->
</div>
</section>
<!-- ============================ Full Width Courses End ================================== -->

