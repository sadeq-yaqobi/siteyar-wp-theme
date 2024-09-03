<?php

/**
 * Class CatsWidget
 */
class HotPostWidget extends WP_Widget
{
    /**
     * Constructs the new widget.
     *
     * @see WP_Widget::__construct()
     */
    public function __construct()
    {
        parent::__construct(false, 'مطالب پرمخاطب');
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
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['before_title'];
        } else {
            echo '<p class="bg-secondary text-white p-2 rounded">یک عنوان برای ویجت انتخاب نمایید</p>';
        }
        $query_args = [
            'post_type' => 'post',
            'post_per_page' => 5,
            'orderby' => 'comment_count',
            'order' => 'DESC'
        ];
        $hot_posts = new WP_Query($query_args);
        echo '<ul>';
        if ($hot_posts->have_posts()) {
            while ($hot_posts->have_posts()):$hot_posts->the_post(); ?>
                <li>
                    <span class="left">
                        <?php echo sy_post_thumbnail('img-responsive')?>
                    </span>
                    <span class="right"><a class="feed-title" href="<?php the_permalink(); ?>"><?php the_title() ?></a><span class="post-date"><i class="ti-calendar"></i><?php echo TimeModify::time_ago($hot_posts->post->post_date);?></span></span>
                </li>
            <?php
            endwhile;
            wp_reset_postdata();
        }
        echo '</ul>';
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
    function update($new_instance, $old_instance)
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
function sy_register_hot_post_widget()
{
    register_widget('HotPostWidget');
}

add_action('widgets_init', 'sy_register_hot_post_widget');

