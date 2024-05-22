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
                                            <input id="user-id-<?php echo $userID ?>" class="checkbox-custom user-id"
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
                                <?php
                                unset($args);
                                $args = [
                                    'taxonomy' => ['category', 'cat-tech'],
//                                    'hide_empty' => true,
                                    'orderby' => 'count',
                                    'order' => 'DESC',
//                                    'fields' => 'id name'
                                ];
                                $terms = get_terms($args);
                                if (!empty($terms) && is_array($terms)):
                                    foreach ($terms as $term):
                                        if ($term->taxonomy === 'category'):?>
                                            <li>
                                                <input id="term-id-<?php echo $term->term_id; ?>"
                                                       class="checkbox-custom"
                                                       name="term-id-<?php echo $term->term_id; ?>" type="checkbox">
                                                <label for="term-id-<?php echo $term->term_id; ?>"
                                                       class="checkbox-custom-label"><?php echo $term->name; ?></label>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php foreach ($terms as $term):
                                    if ($term->taxonomy === 'cat-tech'):?>
                                        <li>
                                            <input id="term-id-<?php echo $term->term_id; ?>"
                                                   class="checkbox-custom"
                                                   name="term-id-<?php echo $term->term_id; ?>" type="checkbox">
                                            <label for="term-id-<?php echo $term->term_id; ?>"
                                                   class="checkbox-custom-label"><?php echo $term->name; ?> <small> (در
                                                    اخبار تکنولوژی)</small></label>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <li class="alert alert-warning">دسته‌بندی تعریف نشده است. ابتدا دسته‌بندی ایجاد
                                        کنید
                                    </li>
                                <?php endif; ?>
                            </ul>

                            <h4 class="side_title">نوع مطلب</h4>
                            <ul class="no-ul-list mb-3">
                                <li>
                                    <input id="a-10" class="checkbox-custom" name="a-10" type="checkbox">
                                    <label for="a-10" class="checkbox-custom-label">همه (75)</label>
                                </li>
                                <li>
                                    <input id="a-11" class="checkbox-custom" name="a-11" type="checkbox">
                                    <label for="a-11" class="checkbox-custom-label">رایگان (15)</label>
                                </li>
                                <li>
                                    <input id="a-12" class="checkbox-custom" name="a-12" type="checkbox">
                                    <label for="a-12" class="checkbox-custom-label">نقدی (60)</label>
                                </li>
                            </ul>

                            <button class="btn btn-theme full-width mb-2">فیلتر کن</button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <?php //DebugHelper::dump($users); ?>
        <!--                --><?php //DebugHelper::dump($terms); ?>
