<?php
// include assets registration
include_once '_inc/assets/register_assets.php';

// to show title in all pages
function my_theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_theme_setup');