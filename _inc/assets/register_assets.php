<?php
// Register asset registration actions for front-end
add_action('wp_enqueue_scripts', 'sy_register_assets');

/*// Register jquery in footer instead of header
add_action('wp_enqueue_scripts', 'sy_register_jquery_in_footer');

function sy_register_jquery_in_footer()
{
    // dequeue jquery files
    wp_dequeue_script('jquery');
    wp_dequeue_script('jquery-core');
    wp_dequeue_script('jquery-migrate');

    // enqueue jquery files in footer
    wp_enqueue_script('jquery', false, [], false, ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('jquery-core', false, [], false, ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('jquery-migrate', false, [], false, ['strategy' => 'async', 'in_footer' => true]);
}*/

function sy_register_assets()
{
    //<----- REGISTER AND ENQUEUE CSS ----->

    // bootstrap-4.0.0
//    wp_register_style('bootstrap-4', 'https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css', '', '4.0.0');
    wp_register_style('bootstrap-4', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css', '', '4.0.0');
    wp_enqueue_style('bootstrap-4');

    // custom style - style and colors files
    wp_register_style('main-style', get_stylesheet_directory_uri() . '/style.css', '', '1.0.0');
    wp_enqueue_style('main-style');
    wp_register_style('theme_colors', get_stylesheet_directory_uri() . '/assets/css/colors.css', '', '1.0.0');
    wp_enqueue_style('theme_colors');


    // <----- REGISTER AND ENQUEUE JS ----->

    // popper-1.12.9
    wp_register_script('popper-1', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.12.9', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('popper-1');

    // bootstrap-4.0.0
//    wp_register_script('bootstrap-4-js', 'https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js', '', '4.0.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_register_script('bootstrap-4-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', '', '4.0.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('bootstrap-4-js');

    // select2/4.0.6-rc.1
    wp_register_script('select2', get_template_directory_uri() . '/assets/js/select2.min.js', '', '4.0.6', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('select2');

    // slick-1.6.0
    wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.js', '', '1.6.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('slick');

    // counter-up-1.0
    wp_register_script('counter-up', get_template_directory_uri() . '/assets/js/counterup.min.js', '', '1.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('counter-up');

    // custom js
    wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('custom');

    // ajax
    wp_register_script('front-ajax', get_template_directory_uri() . '/assets/js/front-ajax.js', ['jquery'], '1.0.0', ['strategy' => 'async', 'in_footer' => true]);
    wp_enqueue_script('front-ajax');

    // localize script
    wp_localize_script('front-ajax', 'ajax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        '_nonce' => wp_create_nonce()
    ]);

}


