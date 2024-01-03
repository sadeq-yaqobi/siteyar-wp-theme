<?php
function theme_setup()
{
    // to show title in all pages
    add_theme_support('title-tag');

    // remove admin bar menu from front side
    add_filter('show_admin_bar', '__return_false');

    // register menu
    register_nav_menu('top nav','منو اصلی بالای سایت');

    // require custom nav walker class that was extended of WordPress nav walker class
    require_once get_template_directory() . '/class/nav-walker/WP_Bootstrap_Navwalker.php';
}

add_action('after_setup_theme', 'theme_setup');

