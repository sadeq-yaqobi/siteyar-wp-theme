<?php
// Hook the 'fetchPopularPosts' function to handle AJAX requests for the 'video' action
add_action('wp_ajax_video', 'video');// Logged-in users
add_action('wp_ajax_nopriv_video', 'video');// Non-logged-in users

// Callback function to retrieve and display posts that have video
function video()
{
    // Define query arguments to fetch posts that have video
    $args = [
        'post_type' => ['tech'], // Limit to the 'tech' post type
        'showposts' => 3, // show 3 posts
        'meta_key' => '_sy_post_types',  // Use a custom meta key for video post
        'meta_value' => '1'
    ];

    // Create a new WP_Query object with the defined arguments
    $the_query = new WP_Query($args);

    // Check if there are posts in the query result
    if ($the_query->have_posts()):
        $html_output = ''; // Initialize an empty variable to store HTML output

        // Loop through each post in the query result
        while ($the_query->have_posts()):$the_query->the_post();
            // Append HTML markup for each post to the output variable
            $html_output .= sy_tech_html_output();
        endwhile;
// Send JSON response with success status, HTML content, and a success message
        wp_send_json([
            'success' => true,
            'message' => 'فیلتر محتوا بر اساس پست ویدیوئی با موفقیت اعمال گردید',
            'content' => $html_output // HTML content of popular posts
        ], 200);

    else:
        // Send JSON response with error message if no posts are found
        wp_send_json([
            'error' => true,
            'message' => 'پست ویدیوئی یافت نشد',
        ], 403);
    endif;
    // Reset post data to restore the global post object
    wp_reset_postdata();

}