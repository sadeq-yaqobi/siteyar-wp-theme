<?php
// Hook into the 'pre_get_posts' action, which allows modification of the main query before it is executed.
add_action('pre_get_posts', 'sy_modify_author_query');

// Define the function that modifies the author query.
function sy_modify_author_query($query)
{
    // Check if the current query is the main query and if it's displaying an author archive page.
    if (is_main_query() && is_author()) {
        // If conditions are met, modify the query to include posts of type 'post' and 'tech'.
        set_query_var('post_type', ['post', 'tech']);
    }
}


