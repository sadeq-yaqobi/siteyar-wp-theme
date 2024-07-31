<?php
// Hooking the function to handle both logged-in and non-logged-in users
add_action('wp_ajax_sy_more_content', 'sy_more_content');
add_action('wp_ajax_nopriv_sy_more_content', 'sy_more_content');

function sy_more_content()
{
    // Verify the nonce for security
    if (!isset($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'])) {
        wp_send_json([
            'error' => true,
            'message' => 'دسترسی غیر مجاز است', // Unauthorized access message
        ], 403);
    }
        $args = [
            'post_type' => $_POST['pageSlug'],
            'posts_per_page' => 3,
            'paged' => $_POST['paged'],
            'status' => 'publish'
        ];
    // Execute the query with the prepared arguments
    $the_query = new WP_Query($args);

    // Check if there are posts matching the query
    if ($the_query->have_posts()) :
        $html_output = '';
        // Loop through the posts and generate HTML output
        while ($the_query->have_posts()): $the_query->the_post();
            $html_output .= sy_archive_filter_html_output(); // Custom function to generate post HTML
        endwhile;
        // Send a successful response with the generated HTML
        wp_send_json([
            'success' => true,
            'message' => 'مطالب با موفقیت ارسال شد', //  the contents were successfully sent
            'content' => $html_output,
            'max_page' => $the_query->max_num_pages,
        ], 200);
    else:
        // Send an error response if no posts are found
        wp_send_json([
            'error' => true,
            'message' => 'پستی یافت نشد', // No posts found message
        ], 404);
    endif;

    // Reset post data to avoid conflicts
    wp_reset_postdata();
}