<!-- ============================ Instructor header Start================================== -->
<?php
global $wp_query;
$author = $wp_query->get_queried_object();

//DebugHelper::dump($author);
//exit();

// author id was set in author_key key that we can use in author-loop.php file
set_query_var('author_id',$author->ID);
?>


<div class="image-cover ed_detail_head invers" style="background:#f4f5f7;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="viewer_detail_wraps">
                    <div class="viewer_detail_thumb">
                        <?php  echo sy_author_avatar($author->ID,150,$author->display_name);?>
                        <div class="viewer_status"><?php
                            switch ($author->roles[0]) {
                                case 'administrator':
                                    echo 'مدیر';
                                    break;
                                case 'editor':
                                    echo 'ویرایشگر';
                                    break;
                                case 'author':
                                    echo 'نویسنده';
                                    break;
                            }

                        ?></div>
                    </div>
                    <div class="caption">
                        <div class="viewer_package_status">عضویت از <?php echo TimeModify::time_ago($author->user_registered)?></div>
                        <div class="viewer_header">
                            <h4 class="my-2"><?php echo $author->display_name?></h4>
                            <span class="viewer_location"><?php echo get_user_meta($author->ID,'_sy_user_expertise',true)?></span>
                            <ul class="mt-2">
                                <li> تعداد مطالب: <strong><?php echo count_user_posts($author->ID,['post','tech'])?></strong></li>
                                <li> ویدئو آموزشی: <strong>87</strong></li>
                                <li> دوره: <strong>120</strong></li>
                            </ul>
                        </div>
                        <div class="viewer_header">
                            <ul class="badge_info">
                                <li class="started"><i class="ti-rocket"></i></li>
                                <li class="medium"><i class="ti-cup"></i></li>
                                <li class="platinum"><i class="ti-thumb-up"></i></li>
                                <li class="elite unlock"><i class="ti-medall"></i></li>
                                <li class="power unlock"><i class="ti-crown"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ============================ Instructor header End ================================== -->

