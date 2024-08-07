<!-- ============================ Full Width Courses  ================================== -->
<section class="pt-0">
    <div class="container">
        <!-- Onclick Sidebar -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div id="filter-sidebar" class="filter-sidebar">
                    <div class="filt-head">
                        <h4 class="filt-first">جستجوی پیشرفته</h4>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">بستن <i class="ti-close"></i></a>
                    </div>
                    <div class="show-hide-sidebar">

                        <!-- Find New Property -->
                        <div class="sidebar-widgets">

                            <!-- Search Form -->
                            <form class="form-inline addons mb-3" method="get" action="<?php bloginfo('url'); ?>">
                                <input name="s" class="form-control" type="search" placeholder="جستجو مطالب"
                                       aria-label="Search">
                                <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
                            </form>

                            <form id="archive_filter_form">
                                <h4 class="side_title">نویسنده</h4>
                                <ul class="no-ul-list mb-3">
                                    <?php
                                    $args = [
                                        'role__in' => ['Administrator', 'author'],
                                        'has_published_posts' => true,
                                        'orderby' => 'post_count',
                                        'order' => 'DESC',
                                        'fields' => ['ID', 'display_name']
                                    ];
                                    $users = new WP_User_Query($args);
                                    $users = $users->get_results();
                                    if ($users):
                                        foreach ($users as $user):?>
                                            <li>
                                                <?php $userID = $user->ID;
                                                $user_display_name = $user->display_name;
                                                ?>
                                                <input id="user-id-<?php echo $userID ?>"
                                                       class="checkbox-custom user-id"
                                                       name=user-id-"<?php echo $userID ?>" type="checkbox"
                                                       value="<?php echo $userID ?>">
                                                <label for="user-id-<?php echo $userID ?>"
                                                       class="checkbox-custom-label"><?php echo $user_display_name ?></label>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li class="alert alert-warning">کاربری یافت نشد ابتدا یک کاربر اضافه کنید.</li>
                                    <?php endif; ?>
                                </ul>

                                <h4 class="side_title">دسته بندی مطالب</h4>
                                <ul class="no-ul-list mb-3">
                                    <!--                                    main post type category-->
                                    <?php
                                    if (is_page('post') || is_archive()):
                                        unset($args);
                                        $args = [
                                            'taxonomy' => ['category'],
                                            'hide_empty' => true,
                                            'orderby' => 'count',
                                            'order' => 'DESC',
                                        ];
                                        $terms = get_terms($args);
                                        if (!empty($terms) && is_array($terms)):
                                            foreach ($terms as $term):?>

                                                <li>
                                                    <input id="post-term-id-<?php echo $term->term_id; ?>"
                                                           class="checkbox-custom post-term-id"
                                                           name="post-term-id-<?php echo $term->term_id; ?>"
                                                           type="checkbox"
                                                           value="<?php echo $term->term_id; ?>">
                                                    <label for="post-term-id-<?php echo $term->term_id; ?>"
                                                           class="checkbox-custom-label"><?php echo $term->name; ?></label>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li class="alert alert-warning">تاکنون دسته بندی برای مطالب اصلی ایجاد نشده
                                                است
                                            </li>
                                        <?php endif; ?>
                                        <?php endif;?>
                                    <!--                                    tech custom post type category-->
                                    <?php
                                    if (is_page('technology') || is_archive()):
                                    unset($args);
                                    $args = [
                                        'taxonomy' => ['cat-tech'],
                                        'hide_empty' => true,
                                        'orderby' => 'count',
                                        'order' => 'DESC',
                                    ];
                                    $terms = get_terms($args);
                                    if (!empty($terms) && is_array($terms)):
                                        foreach ($terms as $term):?>

                                            <li>
                                                <input id="tech-term-id-<?php echo $term->term_id; ?>"
                                                       class="checkbox-custom tech-term-id"
                                                       name="tech-term-id-<?php echo $term->term_id; ?>" type="checkbox"
                                                       value="<?php echo $term->term_id; ?>">
                                                <label for="tech-term-id-<?php echo $term->term_id; ?>"
                                                       class="checkbox-custom-label"><?php echo $term->name; ?></label>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li class="alert alert-warning">تاکنون دسته بندی برای مطالب تکنولوژی ایجاد نشده
                                            است
                                        </li>
                                    <?php endif; ?>
                                    <?php endif;?>
                                </ul>

                                <h4 class="side_title">نوع مطلب</h4>
                                <ul class="no-ul-list mb-3">
                                    <li>
                                        <input id="a-10" class="checkbox-custom" name="post-type" type="radio" checked>
                                        <label for="a-10" class="checkbox-custom-label">همه</label>
                                    </li>
                                    <li>
                                        <input id="a-11" class="checkbox-custom meta-post-type" name="post-type"
                                               type="radio" value="2">
                                        <label for="a-11" class="checkbox-custom-label">مقاله</label>
                                    </li>
                                    <li>
                                        <input id="a-12" class="checkbox-custom meta-post-type" name="post-type"
                                               type="radio" value="1">
                                        <label for="a-12" class="checkbox-custom-label">ویدیو</label>
                                    </li>
                                </ul>

                                <button type="submit" class="btn btn-theme full-width mb-2" id="archive_filter_btn">
                                    فیلتر کن
                                </button>
                                <input type="hidden" id="filter_content_query">
                                <?php if (is_page('post')) {
                                    echo '<input type="hidden" class="page-name" value="post">';
                                } elseif (is_page('technology')) {
                                    echo '<input type="hidden" class="page-name" value="tech">';
                                }?>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <?php //DebugHelper::dump($users); ?>
        <!--                --><?php //DebugHelper::dump($terms); ?>
