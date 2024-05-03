<?php

// Hook the 'fetchPopularPosts' function to handle AJAX requests for the 'newest' action
add_action('wp_ajax_newest', 'newest'); // Logged-in users
add_action('wp_ajax_nopriv_newest', 'newest'); // Non-logged-in users

// Callback function to retrieve and display popular newest
function newest()
{
    if (!wp_verify_nonce($_POST['_nonce'])) {
        wp_send_json([
            'error' => true,
            'message' => 'access denied'
        ], 403);
    }

    // Define query arguments to fetch the newest posts
    $args = [
        'post_type' => ['tech'],// Limit to the 'tech' post type
        'showposts' => 3, // show 3 posts
    ];

    // Create a new WP_Query object with the defined arguments
    $the_query = new WP_Query($args);

    // Check if there are posts in the query result
    if ($the_query->have_posts()):

        $html_output = '';// Initialize an empty variable to store HTML output

        // Loop through each post in the query result
        while ($the_query->have_posts()):$the_query->the_post();
            // Append HTML markup for each post to the output variable
            $html_output .= sy_tech_html_output();
        endwhile;

        // Send JSON response with success status, HTML content, and a success message
        wp_send_json([
            'success' => true,
            'message' => 'فیلتر محتوا بر اساس جدید‌ترین پست‌ها با موفقیت اعمال گردید', // Success message
            'content' => $html_output // HTML content of popular posts
        ], 200);
    else:
        // Send JSON response with error message if no posts are found
        wp_send_json([
            'error' => true,
            'message' => 'جدید‌ترین پستی یافت نشد',
        ],403);
    endif;

    // Reset post data to restore the global post object
    wp_reset_postdata();
}