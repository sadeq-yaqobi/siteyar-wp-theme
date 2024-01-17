<?php

class GoogleReferer
{
    /**
     * Sets Google referer count for a given post.
     *
     * @param int    $postID Post ID.
     * @param string $url    Referring URL.
     *
     * @return void
     */
    public static function sy_set_google_referer(int $postID, $url): void
    {
        // Check if the referring URL contains 'https://www.google.com'
        if (stripos($url, 'https://www.google.com')) {
            $google_referer_key = '_sy_google_referer_nums';
            $google_referer_nums = get_post_meta($postID, $google_referer_key, true);

            // If metadata doesn't exist, initialize with '1'
            if (!metadata_exists('post', $postID, $google_referer_key))
                add_post_meta($postID, $google_referer_key, '1');

            // Increment and update the Google referer count
            $google_referer_nums++;
            update_post_meta($postID, $google_referer_key, $google_referer_nums);
        }
    }

    /**
     * Gets the Google referer count for a given post.
     *
     * @param int $postID Post ID.
     *
     * @return string The Google referer count.
     */
    public static function sy_get_google_referer(int $postID): string
    {
        $google_referer_key = '_sy_google_referer_nums';
        $google_referer_nums = get_post_meta($postID, $google_referer_key, true);

        // If metadata doesn't exist, return '0'
        if (!metadata_exists('post', $postID, $google_referer_key))
            return '0';

        // Return the Google referer count
        return $google_referer_nums;
    }
}
