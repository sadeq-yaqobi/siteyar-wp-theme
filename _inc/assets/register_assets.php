<?php
// Register asset registration actions for front-end
add_action('wp_enqueue_scripts', 'sy_register_assets');
add_action('admin_enqueue_scripts', 'sy_register_assets');

function sy_register_assets()
{
    define("SY_THEME_ASSETS_STYLE", get_stylesheet_directory_uri() . '/assets/css/');

    define("SY_THEME_ASSETS_JS", get_template_directory_uri() . '/assets/js/');
    //<----- REGISTER AND ENQUEUE CSS ----->
    if (!is_admin()) {
        // bootstrap-4.0.0
        wp_register_style('bootstrap-4', SY_THEME_ASSETS_STYLE . 'bootstrap.min.css', '', '4.0.0');
        wp_enqueue_style('bootstrap-4');

        //  jquery toast plugin
        wp_register_style('jquery-toast', SY_THEME_ASSETS_STYLE . 'jquery.toast.min.css', '', '1.0.0');
        wp_enqueue_style('jquery-toast');

        // custom style - style and colors files
         wp_register_style('theme_colors', SY_THEME_ASSETS_STYLE. 'colors.min.css', '', '1.0.0');
         wp_enqueue_style('theme_colors');

        wp_register_style('main-style', get_stylesheet_directory_uri() . '/style.css', '', '1.0.0');
        wp_enqueue_style('main-style');

    }


    // <----- REGISTER AND ENQUEUE JS ----->
    if (is_admin()) {
        //dashboard ajax
        wp_register_script('dashboard-ajax', SY_THEME_ASSETS_JS . 'dashboard-ajax.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('dashboard-ajax');
    } else {
        // bootstrap-4.0.0
        wp_register_script('bootstrap-4-js', SY_THEME_ASSETS_JS . 'bootstrap.min.js', '', '4.0.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('bootstrap-4-js');

        // popper-1.12.9
        wp_register_script('popper-1', SY_THEME_ASSETS_JS . 'popper.min.js', ['jquery'], '1.12.9', ['strategy' => 'async', 'in_footer' => false]);
        wp_enqueue_script('popper-1');

        // select2/4.0.6-rc.1
        wp_register_script('select2', SY_THEME_ASSETS_JS . 'select2.min.js', '', '4.0.6', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('select2');

        // slick-1.6.0

        wp_register_script('slick', SY_THEME_ASSETS_JS . 'slick.min.js', '', '1.6.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('slick');

        // counter-up-1.0
        wp_register_script('counter-up', SY_THEME_ASSETS_JS . 'counterup.min.js', '', '1.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('counter-up');

        // jquery toast plugin
        wp_register_script('jquery-toast', SY_THEME_ASSETS_JS . 'jquery.toast.min.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('jquery-toast');

        // google recaptcha
        wp_register_script('google-recaptcha-api', 'https://www.google.com/recaptcha/api.js?hl=fa', '', '2.0.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('google-recaptcha-api');

        // custom js
        wp_register_script('custom', SY_THEME_ASSETS_JS . 'custom.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('custom');

        // front ajax
        wp_register_script('front-ajax', SY_THEME_ASSETS_JS . 'front-ajax.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
        wp_enqueue_script('front-ajax');
    }

    // localize script
    wp_localize_script('front-ajax', 'ajax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        '_nonce' => wp_create_nonce()
    ]);

    // localize script for custom.js
    wp_localize_script('custom', 'sy_theme_data', [
        'is_home' => is_home() || is_front_page(), // True if on the home or front page
    ]);
}


