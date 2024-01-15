<?php

/**
 * Class to manage post views in WordPress.
 */
class PostView
{
    /**
     * Set post view count for a given post ID.
     *
     * @param int $postID The ID of the post.
     */
    public static function sy_set_post_view(int $postID): void
    {
        $view_nums_key = '_sy_post_view_nums';
        $post_view = get_post_meta($postID, $view_nums_key, true);

        // Check if post metadata exists; if not, initialize it.
        if (!metadata_exists('post', $postID, $view_nums_key))
            add_post_meta($postID, $view_nums_key, '1');
        $post_view++;
        update_post_meta($postID, $view_nums_key, $post_view);
    }

    /**
     * Get post view count for a given post ID.
     *
     * @param int $postID The ID of the post.
     *
     * @return string The post view count as a string.
     */
    public static function sy_get_post_view(int $postID): string
    {
        $view_nums_key = '_sy_post_view_nums';
        $post_view = get_post_meta($postID, $view_nums_key, true);

        // If post metadata doesn't exist, return '0'.
        if (!metadata_exists('post', $postID, $view_nums_key))
            return '0';
        return $post_view;
    }
}
