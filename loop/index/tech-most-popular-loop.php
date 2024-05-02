<?php
// Hook the 'fetchPopularPosts' function to handle AJAX requests for the 'popular' action
add_action('wp_ajax_popular', 'popular'); // Logged-in users
add_action('wp_ajax_nopriv_popular', 'popular'); // Non-logged-in users

// Callback function to retrieve and display popular posts
function popular()
{
    // Define query arguments to fetch popular posts
    $args = [
        'post_type' => ['tech'], // Limit to the 'tech' post type
        'showposts' => 3, // show 3 posts
        'meta_key' => '_sy_post_view_nums', // Use a custom meta key for post views
        'orderby' => 'meta_value_num', // Order by post views
        'order' => 'DESC' // Sort in descending order (most popular first)
    ];

    // Create a new WP_Query object with the defined arguments
    $the_query = new WP_Query($args);

    // Check if there are posts in the query result
    if ($the_query->have_posts()):
        $html_output = ''; // Initialize an empty variable to store HTML output

        // Loop through each post in the query result
        while ($the_query->have_posts()): $the_query->the_post();
            // Append HTML markup for each post to the output variable
            $html_output .= sy_tech_html_output();
        endwhile;

        // Send JSON response with success status, HTML content, and a success message
        wp_send_json([
            'success'=>true,
            'content' => $html_output, // HTML content of popular posts
            'message' => 'فیلتر محتوا بر اساس محبوب‌ترین پست‌ها با موفقیت اعمال گردید' // Success message
        ],200);

    else:
        // Send JSON response with error message if no posts are found
        wp_send_json([
            'error' => true,
            'message' => 'محبوب‌ترین یافت نشد',
        ],403);

    endif;

    // Reset post data to restore the global post object
    wp_reset_postdata();
}


