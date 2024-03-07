<?php
// Add filters to include custom TinyMCE plugin JS and register custom buttons
add_filter('mce_external_plugins', 'add_tinymce_plugin_js');
add_filter('mce_buttons', 'register_custom_button_for_tinymce');

//add filter to filter tools will show in toolbar
add_filter('tiny_mce_before_init','format_tinymce');

// Function to add TinyMCE plugin JS
function add_tinymce_plugin_js($array) : array
{

    // Use array_fill_keys to simplify adding multiple buttons with the same JS file
    $keys = ['video', 'quote','shortcodes'];
    return array_fill_keys($keys, get_template_directory_uri() . '/assets/js/tinymce-button.js');
}

// Function to register custom buttons for TinyMCE
function register_custom_button_for_tinymce($buttons)
{
    // Add custom buttons 'video' and 'quote' to the existing buttons array
    array_push($buttons, 'video', 'quote','shortcodes');
    return $buttons;
}

//function to filter what are the tools will show in tinymce toolbar
function format_tinymce($in)
{
//    what are the tools will show in toolbar1
    $in['toolbar1'] = 'formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,spellchecker,wp_adv,dfw,ltr,hr,redo,undo,video,quote,shortcodes';
    return $in;
}

