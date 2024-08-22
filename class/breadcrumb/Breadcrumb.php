<?php

/**
 * Generate and display breadcrumb navigation.
 */
class Breadcrumb
{
    public static function get_breadcrumb()
    {
        echo '<li class="breadcrumb-item"><a href="' . home_url() . '" rel="nofollow">خانه</a></li>';

        if (is_single()) {
            self::single_breadcrumb();
        } elseif (is_page()) {
            self::page_breadcrumb();
        } elseif (is_search()) {
            self::search_breadcrumb();
        } elseif (is_404()) {
            self::error_breadcrumb();
        } elseif (is_category() || is_tax()) {
            self::category_breadcrumb();
        } elseif (is_tag()) {
            self::tag_breadcrumb();
        } elseif (is_archive()) {
            self::archive_breadcrumb();
        }
    }

    private static function single_breadcrumb()
    {
        $category_id = get_post_meta(get_the_ID(), '_sy_post_cat', true);
        if ($category_id) {
        echo '&nbsp;&#187;&nbsp;<li><a href="' . get_category_link($category_id) . '">' . get_the_category_by_ID($category_id) . '</a></li>';
        }else{
            echo '&nbsp;&#187;&nbsp;دسته‌بندی نشده';
        }
        echo '&nbsp;&#187;&nbsp;';
        the_title('<li>', '</li>');
    }

    private static function page_breadcrumb()
    {
        echo '&nbsp;&#187;&nbsp;';
        the_title('<li>', '</li>');
    }

    private static function search_breadcrumb()
    {
        echo '&nbsp;&#187;&nbsp;<em>' . get_search_query() . '</em>';
    }

    private static function error_breadcrumb()
    {
        echo '&nbsp;&#187;&nbsp;خطای 404: صفحه پیدا نشد';
    }

    private static function category_breadcrumb()
    {
        echo '&nbsp;&#187;&nbsp;<li>' . single_cat_title('', false) . '</li>';
    }

    private static function tag_breadcrumb()
    {
        echo '&nbsp;&#187;&nbsp;<li>' . single_tag_title('', false) . '</li>';
    }

    private static function archive_breadcrumb()
    {
        echo '&nbsp;&#187;&nbsp;آرشیو مطالب ';

        if (is_year()) {
            echo get_the_date('Y');
        } elseif (is_month()) {
            echo get_the_date('F Y');
        } else {
            echo get_the_date('j F Y');
        }
    }
}
