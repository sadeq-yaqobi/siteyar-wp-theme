<?php

/**
 * Class CatsWidget
 */
class CatsWidget extends WP_Widget
{
    /**
     * Constructs the new widget.
     *
     * @see WP_Widget::__construct()
     */
    function __construct()
    {
        // Instantiate the parent object.
        parent::__construct(false, 'دسته بندی مطالب');
    }

    /**
     * The widget's HTML output.
     *
     * @param array $args Display arguments including before_title, after_title,
     *                        before_widget, and after_widget.
     * @param array $instance The settings for the particular instance of the widget.
     * @see WP_Widget::widget()
     *
     */
    function widget($args, $instance)
    {
        echo $args['before_widget'];
//        echo $args['before_title'];
//        echo 'دسته‌بندی';
//        echo $instance['title'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        } else {
            echo '<p class="bg-secondary text-white p-2 rounded">یک عنوان برای ویجت انتخاب نمایید</p>';
        }
//        echo $args['after_title'];
//        echo 'متن آزمایشی';

        $cat_args = [
            'title_li' => '', //Text to use for the list title <li> element. Pass an empty string to disable. Default 'Categories'.
            'depth' => 1, //Category depth. Used for tab indentation. Default 0.
            'show_count' => true, //Whether to include post counts. Accepts 0, 1, or their bool equivalents.Default 0.
            'orderby' => 'name',
            'echo' => false,
        ];
        $variable= wp_list_categories($cat_args);
        $variable = preg_replace( '~\((\d+)\)(?=\s*+<)~', '<span class="cat-count">$1</span>', $variable );
        echo $variable;
        echo $args['after_widget'];
    }


    /**
     * Output the admin widget options form HTML.
     *
     * @param array $instance The current widget settings.
     * @see WP_Widget::form()
     */
    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')) ?>">عنوان ویجت</label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')) ?>" value="<?php echo esc_attr($title) ?>"
                   placeholder="یک عنوان برای ویجت خود انتخاب نمایید">
        </p>
        <?php

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @param array $new_instance The new instance of the widget.
     * @param array $old_instance The old instance of the widget.
     * @return array The updated instance of the widget.
     * @see WP_Widget::update()
     *
     */
    function update($new_instance, $old_instance): array
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }

}

/**
 * Register the new widget.
 *
 * @see 'widgets_init'
 */
function sy_register_category_widget()
{
    register_widget('CatsWidget');
}

add_action('widgets_init', 'sy_register_category_widget');
