<?php
add_action('wp_ajax_sy_filter_content', 'sy_filter_content');
add_action('wp_ajax_nopriv_sy_filter_content', 'sy_filter_content');

function sy_filter_content()
{
    // Verify the nonce for security
    if (!wp_verify_nonce($_POST['_nonce'])) {
        wp_send_json([
            'error' => true,
            'message' => 'دسترسی غیر مجاز است',
        ], 403);
    }

    // Sanitize and prepare the input data
    $user_ids = isset($_POST['userID']) ? array_map('intval', $_POST['userID']) : [];
    $post_term_ids = isset($_POST['postTermID']) ? array_map('intval', $_POST['postTermID']) : [];
    $tech_term_ids = isset($_POST['techTermID']) ? array_map('intval', $_POST['techTermID']) : [];

    if (empty($post_term_ids) && empty($tech_term_ids)) {
        $args = [
            'post_type' => ['post', 'tech'],
            'posts_per_page' => -1, // Adjust the number of posts to display
            'author__in' => $user_ids,
        ];
    } else {


        // Build the query arguments
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
        ];
    }
    $the_query = new WP_Query($args);
//    DebugHelper::dump($the_query);
    if ($the_query->have_posts()) :
        $html_output = '';
        while ($the_query->have_posts()):$the_query->the_post();
            $html_output .= sy_archive_filter_html_output();
        endwhile;
        wp_send_json([
            'success' => true,
            'message' => 'فیلتر با موفقیت اعمال شد',
            'content' => $html_output,
            'total_posts_num' => $the_query->found_posts,
        ], 200);
    else:
        wp_send_json([
            'error' => true,
            'message' => 'پستی یافت نشد',
        ], 404);
    endif;
    wp_reset_postdata();
}

