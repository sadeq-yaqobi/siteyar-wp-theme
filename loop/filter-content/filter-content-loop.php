<?php
// Hooking the function to handle both logged-in and non-logged-in users
add_action('wp_ajax_sy_filter_content', 'sy_filter_content');
add_action('wp_ajax_nopriv_sy_filter_content', 'sy_filter_content');

/**
 * AJAX handler function to filter and retrieve posts based on various criteria
 */
function sy_filter_content()
{
    // Verify the nonce for security
    if (!wp_verify_nonce($_POST['_nonce'])) {
        wp_send_json([
            'error' => true,
            'message' => 'دسترسی غیر مجاز است', // Unauthorized access message
        ], 403);
    }

    // Sanitize and prepare the input data
    $user_ids = isset($_POST['userID']) ? array_map('intval', $_POST['userID']) : [];
    $post_term_ids = isset($_POST['postTermID']) ? array_map('intval', $_POST['postTermID']) : [];
    $tech_term_ids = isset($_POST['techTermID']) ? array_map('intval', $_POST['techTermID']) : [];
    $post_types = $_POST['postType'] ?? '';

    // Build query arguments based on the input data
    if (empty($post_term_ids) && empty($tech_term_ids) && empty($post_types) && empty($user_ids)) {
        // Case: No specific filters provided
        $args = [
            'post_type' => ['post', 'tech'],
        ];
    } elseif (empty($post_term_ids) && empty($tech_term_ids) && empty($user_ids)) {
        // Case: Filter by post types only
        $args = [
            'post_type' => ['post', 'tech'],
            'meta_query' => [
                [
                    'key' => '_sy_post_types',
                    'value' => $post_types,
                    'compare' => 'LIKE'
                ]
            ]
        ];
    } elseif (empty($post_term_ids) && empty($tech_term_ids) && empty($post_types)) {
        // Case: Filter by user IDs only
        $args = [
            'post_type' => ['post', 'tech'],
            'author__in' => $user_ids,
        ];
    } elseif (empty($post_term_ids) && empty($tech_term_ids)) {
        // Case: Filter by user IDs and post types
        $args = [
            'post_type' => ['post', 'tech'],
            'author__in' => $user_ids,
            'meta_query' => [
                [
                    'key' => '_sy_post_types',
                    'value' => $post_types,
                    'compare' => 'LIKE'
                ]
            ]
        ];
    } else {
        // Case: Filter by term IDs, user IDs, and post types
        $args = [
            'post_type' => ['post', 'tech'],
            'posts_per_page' => -1, // Adjust the number of posts to display
            'author__in' => $user_ids,
            'tax_query' => [
                'relation' => 'OR',
                [
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $post_term_ids,
                    'include_children' => false,
                ],
                [
                    'taxonomy' => 'cat-tech',
                    'field' => 'term_id',
                    'terms' => $tech_term_ids,
                    'include_children' => false,
                ],
            ],
            'meta_query' => [
                [
                    'key' => '_sy_post_types',
                    'value' => $post_types,
                    'compare' => 'LIKE'
                ]
            ]
        ];
    }

    // Execute the query with the prepared arguments
    $the_query = new WP_Query($args);

    // Check if there are posts matching the query
    if ($the_query->have_posts()) :
        $html_output = '';
        // Loop through the posts and generate HTML output
        while ($the_query->have_posts()): $the_query->the_post();
            $html_output .= sy_archive_filter_html_output(); // Custom function to generate post HTML
        endwhile;
        // Send a successful response with the generated HTML and total post count
        wp_send_json([
            'success' => true,
            'message' => 'فیلتر با موفقیت اعمال شد', // Filter applied successfully message
            'content' => $html_output,
            'total_posts_num' => $the_query->found_posts,
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
?>