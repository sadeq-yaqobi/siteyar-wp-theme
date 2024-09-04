<?php
 class CatsWidget extends WP_Widget { function __construct() { parent::__construct(false, 'دسته بندی مطالب'); } function widget($args, $instance) { echo $args['before_widget']; if (!empty($instance['title'])) { echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title']; } else { echo '<p class="bg-secondary text-white p-2 rounded">یک عنوان برای ویجت انتخاب نمایید</p>'; } $cat_args = [ 'title_li' => '', 'depth' => 1, 'show_count' => true, 'orderby' => 'name', 'echo' => false, ]; $variable= wp_list_categories($cat_args); $variable = preg_replace( '~\((\d+)\)(?=\s*+<)~', '<span class="cat-count">$1</span>', $variable ); echo $variable; echo $args['after_widget']; } function form($instance) { $title = !empty($instance['title']) ? $instance['title'] : ''; ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')) ?>">عنوان ویجت</label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')) ?>" value="<?php echo esc_attr($title) ?>"
                   placeholder="یک عنوان برای ویجت خود انتخاب نمایید">
        </p>
        <?php
 } function update($new_instance, $old_instance): array { $instance = []; $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : ''; return $instance; } } function sy_register_category_widget() { register_widget('CatsWidget'); } add_action('widgets_init', 'sy_register_category_widget'); 