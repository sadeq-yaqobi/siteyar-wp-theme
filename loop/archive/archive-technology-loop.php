<div class="row" id="filter-content">
    <?php
    $page = (get_query_var('paged')) ? (get_query_var('paged')) : 1;
    $args = [
        'post_type' => ['tech'],
        'posts_per_page' => 3,
        'paged' => $page,
        'status'=>'publish'
    ];

    // Execute the query with the prepared arguments
    $the_query = new WP_Query($args);
//    $the_query = query_posts($args);


    update_option('_sy_tech_post_num', $the_query->found_posts);
    // Check if there are posts matching the query
    if ($the_query->have_posts()) :

// Loop through the posts and generate HTML output
        while ($the_query->have_posts()): $the_query->the_post(); ?>
<<<<<<< HEAD
            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid">
                    <div class="education_block_thumb property_video">
                        <a href=" <?php echo get_the_permalink() ?> "><?php echo sy_post_thumbnail() ?></a>
                        <?php
                        $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
                        if (!empty($post_cat)): ?>
                            <div class="topic_level bg-warning text-white"> <?php echo get_the_category_by_ID($post_cat); ?></div>
                        <?php endif;
                        $post_type = get_post_meta(get_the_ID(), '_sy_post_types', true);
                        if ($post_type == 1) :?>
=======

            <div class="col-lg-4 col-md-6">
                <div class="education_block_grid">
                    <div class="education_block_thumb property_video">
                        <a href=" <?php echo get_the_permalink() ?> "><?php echo sy_post_thumbnail() ?>  </a>
                        <?php
                        $post_cat = get_post_meta(get_the_ID(), '_sy_post_cat', true);
                        if (!empty($post_cat)): ?>
                            <div class="topic_level bg-warning text-white"> <?php get_the_category_by_ID($post_cat) ?> </div>
                        <?php endif;
                        $post_type = get_post_meta(get_the_ID(), '_sy_post_types', true);
                        if ($post_type == 1) :?>

>>>>>>> 1a90ab4 (main local)
                            <div class="overlay_icon">
                                <div class="bb-video-box">
                                    <div class="bb-video-box-inner">
                                        <div class="bb-video-box-innerup">
                                            <a href="https://www.aparat.com/video/video/embed/videohash/cNpW0/vt/frame"
                                               data-toggle="modal"
                                               data-target="#popup-video"
                                               class="theme-cl"><i
                                                        class="ti-control-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edu_duration">25:10</div>
                        <?php endif;
                        ?></div>
                    <div class="education_block_body">
                        <h4 class="bl-title"><a
                                    href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                        </h4>
                        <p><?php echo ExcerptPost::sy_excerpt_post_limit() ?></p>
                    </div>
<<<<<<< HEAD
=======

>>>>>>> 1a90ab4 (main local)
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="">
                                    <?php echo sy_author_avatar(get_the_author_meta('user_email'), 35,  get_the_author()) ?>

                                </a></div>
                            <h5><?php echo get_the_author_posts_link() ?></h5>
                        </div>
                        <?php
                        $post_level = get_post_meta(get_the_ID(), '_sy_post_level', true);
                        if (!empty($post_level)) {
                            switch ($post_level) {
                                case 1;
                                    echo $level = ' <span class="education_block_time " > سطح : مقدماتی </span > ';
                                    break;
                                case 2;
                                    echo $level = '<span class="education_block_time " > سطح : متوسط </span > ';
                                    break;
                                case 3;
                                    echo $level = '<span class="education_block_time " > سطح : پیشرفته </span > ';
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

        <?php endwhile;

    else:
        echo 'پستی یافت نشد'; // No posts found message
    endif;

    // Reset post data to avoid conflicts
    wp_reset_postdata(); ?>
</div>

<!-- Row -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- Pagination -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <button id="load_more_archive_btn" type="button" class="btn btn-loader" data-page-slug="tech"> نمایش مطالب بیشتر<i
                            class="fa fa-spin fa-spinner mr-3 d-none load-more-icon"></i></button>
            </div>
        </div>

    </div>
</div>
<!-- /Row -->
   <!-- <div class="text-center theme-pagination" id="archive_pagination"><?php
/*        echo Pagination::paginate($the_query);
        */?>
    </div>-->


