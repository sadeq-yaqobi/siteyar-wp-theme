<?php
/**
 * Register custom theme sidebar widget.
 */
function register_custom_sidebar_widget() {
    register_sidebar(
        array(
            'name'          => 'My Theme Sidebar',
            'id'            => 'sidebar-1',
            'description'   => 'Custom sidebar for the theme',
            'before_widget' => '<li id="%1$s" class="%2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h4 class="title">',
            'after_title'   => '</h4>',
        )
    );
}
add_action( 'widgets_init', 'register_custom_sidebar_widget' );