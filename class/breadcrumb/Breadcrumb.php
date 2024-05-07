<?php

/**
 * Generate and display breadcrumb navigation.
 */
class Breadcrumb
{
    public static function get_breadcrumb()
    {
        // Home breadcrumb
        echo '<li class="breadcrumb-item"><a href="' . home_url() . '" rel="nofollow">خانه</a></li>';

        // Category, Single Post, or Archive breadcrumb
        if (is_category() || is_single() || is_archive()) {
            // Get category information by custom meta box
            $category_id = get_post_meta(get_the_ID(), '_sy_post_cat', true);
            if ($category_id) {
                echo '&nbsp;&#187;&nbsp';
                echo '<li><a href="' . get_category_link($category_id) . '" >' . get_the_category_by_ID($category_id) . '</a></li>';
            } else {
                echo '';
            }

            // Single Post breadcrumb
            if (is_single()) {
                echo '&nbsp;&#187;&nbsp';
                the_title('<li>', '</li>');
            }
        } // Page breadcrumb
        elseif (is_page()) {
            echo '&nbsp;&#187;&nbsp';
            the_title('<li>', '</li>');
        } // Search breadcrumb
        elseif (is_search()) {
            echo '&nbsp;&#187;&nbsp';
            echo '<em>';
             the_search_query();
            echo '</em>';
        } // 404 page breadcrumb
        elseif (is_404()) {
            echo '&nbsp;&#187;&nbsp';
            echo 'خطای 404: صفحه پیدا نشد';
        }
    }
}