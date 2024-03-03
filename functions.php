<?php

// Include theme setup file
include_once '_inc/theme-setup/theme_setup.php';

// Include assets registration
include_once '_inc/assets/register_assets.php';

// Include file about post functionality
include_once '_inc/post/post.php';

// Include meta box registration file
include_once '_inc/meta-box/meta_box.php';

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

// Include widget file
include_once '_inc/widget/sidebar_widget.php';

// Include category widget file
include_once '_inc/widget/CatsWidget.php';

// Include hotPost widget file
include_once '_inc/widget/HotPostWidget.php';

// include shortcode files
include_once '_inc/shortcode/shortcode.php';

add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');
