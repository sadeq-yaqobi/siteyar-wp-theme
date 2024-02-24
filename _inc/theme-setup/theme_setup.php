<?php
function theme_setup()
{
    date_default_timezone_set('Asia/Tehran');

    // to show title in all pages
    add_theme_support('title-tag');

    // to enable Post Thumbnails support for the theme
    add_theme_support('post-thumbnails');

    // to crop the image to a custom size while it is uploading.
    add_image_size('sy-size',200,200,['center','center']);

    // to remove admin bar menu from front side
    add_filter('show_admin_bar', '__return_false');

    // to register nav menu
    register_nav_menu('top nav','منو اصلی بالای سایت');

    // to require custom nav walker class that was extended of WordPress nav walker class
    require_once get_template_directory() . '/class/nav-walker/WP_Bootstrap_Navwalker.php';
}

add_action('after_setup_theme', 'theme_setup');

