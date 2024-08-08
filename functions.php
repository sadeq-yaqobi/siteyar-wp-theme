<?php

// Include theme setup file
include_once '_inc/theme-setup/theme_setup.php';

// Include assets registration
include_once '_inc/assets/register_assets.php';

// Include file about post functionality
include_once '_inc/post/post.php';

// Include meta box registration file
include_once '_inc/meta-box/meta_box.php';

// Include widget file
include_once '_inc/widget/sidebar_widget.php';

// Include category widget file
include_once '_inc/widget/CatsWidget.php';

// Include hotPost widget file
include_once '_inc/widget/HotPostWidget.php';

// include shortcode files
include_once '_inc/shortcode/shortcode.php';

// include tinymce custom buttons files
include_once '_inc/tinymce-custom-button/tinymce-custom-button.php';

// include comments structure
include_once '_inc/sy-theme-comment/comments_list.php';

// include post type and taxonomy builder
include_once '_inc/tech-custom-post-type-taxonomy/tech-custom-post-type-taxonomy.php';

// Include functionality of adding user's resume in profile
include_once '_inc/user/user-resume.php';

//include file that was used to modify main wordPress query
include_once '_inc/modify-queries/modify-queries.php';

//Include breadcrumb class
include_once 'class/breadcrumb/Breadcrumb.php';

// Include PostView counter class
include_once 'helper-class/PostView.php';

// Include ReadingEstimateTime class
include_once 'helper-class/ReadingEstimateTime.php';

// Include Time working functionality class
include_once 'helper-class/TimeModify.php';

// Include GoogleReferer numbers class
include_once 'helper-class/GoogleReferer.php';

// Include excerpt post class
include_once 'helper-class/ExcerptPost.php';

// Include debug helper class
include_once 'helper-class/DebugHelper.php';

// Include pagination helper class
include_once 'helper-class/Pagination.php';

include_once 'helper-class/MailLayout.php';

// include php function that handles ajax request to show the most popular posts
include_once 'loop/index/tech-most-popular-loop.php';

// include php function that handles ajax request to show the hottest posts
include_once 'loop/index/tech-hottest-loop.php';

// include php function that handles ajax request to show the newest posts
include_once 'loop/index/tech-newest-loop.php';

// include php function that handles ajax request to show the posts that has video
include_once 'loop/index/tech-video-loop.php';

// include php function that handles ajax output html structure
include_once 'loop/index/tech-html-output.php';

// include php function that handles filtering post in archive page by ajax
include_once 'loop/filter-content/filter-content-loop.php';

// include php function that handles filtering post ajax output html structure
include_once 'loop/filter-content/filter-content-html-output.php';

// include php function that handles showing post in tech archive page by ajax- load more button
include_once 'loop/archive/archive-loop-ajax.php';

//include php file to handle contact us functionality by ajax
include_once 'partials/contact/contact-ajax.php';

// configuration to send email
include_once '_inc/send-mail/send-mail-config.php';

add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');


add_filter( 'upload_mimes', 'filter_allowed_mimes_for_avif');
function filter_allowed_mimes_for_avif( $mime_types ) {
    $mime_types['avif'] = 'image/avif';
    return $mime_types;
}
