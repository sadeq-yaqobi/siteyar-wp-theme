<?php
// Hook the 'fetchPopularPosts' function to handle AJAX requests for the 'popular' action
add_action('wp_ajax_hottest', 'hottest'); // Logged-in users
add_action('wp_ajax_nopriv_hottest', 'hottest'); // Non-logged-in users

// Callback function to retrieve and display the hottest posts
function hottest()
{
    // Define query arguments to fetch popular posts
    $args = [
        'post_type' => ['tech'], // Limit to the 'tech' post type
        'showposts' => 3, // show 3 posts
        'orderby' => 'comment_count', //order by comment count
        'order' => 'DESC',
    ];

    // Create a new WP_Query object with the defined arguments
    $the_query = new WP_Query($args);

    // Check if there are posts in the query result
    if ($the_query->have_posts()):
        $html_output = ''; // Initialize an empty variable to store HTML output
        // Loop through each post in the query result
        while ($the_query->have_posts()):$the_query->the_post();
            $html_output .= sy_tech_html_output();
        endwhile;

        // Send JSON response with success status, HTML content, and a success message
        wp_send_json([
            'success' => true,
            'message' => 'فیلتر محتوا بر اساس داغ‌ترین پست‌ها با موفقیت اعمال گردید',
            'content' => $html_output
        ], 200);
    else:
        // Send JSON response with error message if no posts are found
        wp_send_json([
            'error' => true,
            'message' => 'داغ‌ترین پستی یافت نشد',
        ],403);
    endif;
    // Reset post data to restore the global post object
    wp_reset_postdata();

}