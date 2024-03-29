<?php
/**
 * Register custom theme sidebar widget.
 */
function register_custom_sidebar_widget() {
    register_sidebar(
        array(
            'name'          => 'My Theme Sidebar cats',
            'id'            => 'sidebar-1',
            'description'   => 'Custom sidebar for the categories theme',
            'before_widget' => '<li id="%1$s" class="%2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h4 class="title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => 'My Theme Sidebar hot post',
            'id'            => 'sidebar-2',
            'description'   => 'Custom sidebar for the hot posts theme',
            'before_widget' => '<li id="%1$s" class="%2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h4 class="title">',
            'after_title'   => '</h4>',
        )
    );
}
add_action( 'widgets_init', 'register_custom_sidebar_widget' );