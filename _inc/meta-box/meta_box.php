<?php
add_action('add_meta_boxes', 'sy_register_more_setting');
add_action('save_post', 'sy_save_meta_box');

function sy_register_more_setting()
{
    add_meta_box(
        'sy_level',
        'تنظیمات بیشتر',
        'sy_more_setting_html',
        'post',
        'normal'
    );
}

function sy_more_setting_html($post)
{
    // to create a nonce field to check later for  level part
    wp_nonce_field('post_level_nonce', 'post_level_nonces');

    // to create a nonce field to check later for category part
    wp_nonce_field('post_cat_nonce', 'post_cat_nonces');

    /*level part
     Retrieve the current level of the _sy_post_level key from post meta*/
    $post_level = get_post_meta($post->ID, '_sy_post_level', true)
    ?>
    <div style="display: flex; justify-content: space-around">
        <div>
            <label for="post-level">سطح مقاله</label>
            <select name="post_level" id="post-level">
                <option value="1"<?php selected($post_level, 1) ?>>مقدماتی</option>
                <option value="2"<?php selected($post_level, 2) ?>>متوسط</option>
                <option value="3"<?php selected($post_level, 3) ?>>پیشرفته</option>
            </select>
        </div>

        <!--    category part-->
        <div>
            <label for="post-category">دسته بندی</label>
            <?php
            $category_id = get_post_meta($post->ID, '_sy_post_cat', true);
            wp_dropdown_categories([
                'show_option_all' => 'یک گزینه را انتخاب کنید',
                'name' => 'post_cat',
                'id' => 'post-category',
                'selected' => $category_id,
                'show_count'        => 1,
            ]);
            ?>

        </div>
    </div>
    <?php
}

function sy_save_meta_box($post_id)
{
    // Name of the nonce field
    $post_level_nonce_name = $_POST['post_level_nonces'] ?? '';
    $post_level_nonce_action = 'post_level_nonce';

    $post_cat_nonce_name = $_POST['post_cat_nonces'] ?? '';
    $post_cat_nonce_action = 'post_cat_nonce';

    // Check if the nonce is set and valid
    if ((!isset($post_level_nonce_name) || !wp_verify_nonce($post_level_nonce_name, $post_level_nonce_action))
        && (!isset($post_cat_nonce_name) || !wp_verify_nonce($post_cat_nonce_name, $post_cat_nonce_action))) {
        return;
    }

    // Check if the current user has permissions to save data for the post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if this is an AutoSave, as form submission may not have occurred
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Data is safe to save now, sanitize the post level and update post meta if not empty
    if (!empty($_POST['post_level']) && !empty($_POST['post_cat'])) {

        $post_level = sanitize_text_field($_POST['post_level']);
        $post_cat = sanitize_text_field($_POST['post_cat']);

        update_post_meta($post_id, '_sy_post_level', $post_level);
        update_post_meta($post_id, '_sy_post_cat', $post_cat);
    }
}