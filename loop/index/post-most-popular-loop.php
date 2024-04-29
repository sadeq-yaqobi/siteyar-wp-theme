<?php
// Hook the 'fetchPopularPosts' function to handle AJAX requests for the 'popular' action
add_action('wp_ajax_popular', 'fetchPopularPosts'); // Logged-in users
add_action('wp_ajax_nopriv_popular', 'fetchPopularPosts'); // Non-logged-in users

// Callback function to retrieve and display popular posts
function fetchPopularPosts()
{
    // Define query arguments to fetch popular posts
    $args = [
        'post_type' => ['tech'], // Limit to the 'tech' post type
        'posts_per_page' => 3, // Display 3 posts per page
        'meta_key' => '_sy_post_view_nums', // Use a custom meta key for post views
        'orderby' => '_sy_post_view_nums', // Order by post views
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
            $html_output .=  '
<div class="col-lg-4 col-md-4 col-sm-12">
    <div class="articles_grid_style">
        <div class="articles_grid_thumb">
            <a href="' . get_the_permalink() . '">
           
            </a>
        </div>
        <div class="articles_grid_caption">
            <h4>' . get_the_title() . '</h4>
            <div class="articles_grid_author">
                <div class="articles_grid_author_img">
                    ' . get_avatar(get_the_author_meta('user_email'), 40, '', get_the_author(), ['class' => 'img-fluid']) . '
                </div>
                <h4>' . get_the_author() . '</h4>
            </div>
        </div>
    </div>
</div>
        ';

        endwhile;

        // Send JSON response with success status, HTML content, and a success message
        wp_send_json([
            'success'=>true,
            'content' => $html_output, // HTML content of popular posts
            'message' => 'فیلتر محتوا بر اساس محبوب‌ترین پست‌ها با موفقیت اعمال گردید' // Success message
        ],200);

    else:
        // Send JSON response with error message if no posts are found
        wp_send_json_error('محبوب‌ترین پستی پیدا نشد');

    endif;

    // Reset post data to restore the global post object
    wp_reset_postdata();
}


