<!-- Tags Cloud -->
<!-- This code snippet displays a tag cloud using WordPress functions -->
<div class="single_widgets widget_tags">
    <h4 class="title">تگ</h4>
    <?php
    // Check if the wp_tag_cloud function exists and if there are tags to display
    if (function_exists('wp_tag_cloud')): ?>
        <ul>
            <?php
            // Generate the tag cloud with specific parameters
            $cloud_tags = wp_tag_cloud('smallest=10&largest=16&format=array&unit=px');
            if ($cloud_tags) {
                foreach ($cloud_tags as $tag) {
                    // Output each tag as a list item
                    echo '<li>' . $tag . '</li>';
                }
            }else{
                echo '<div class="alert-warning alert">تگی یافت نشد</div>';
            }
                ?>
        </ul>

    <?php else: ?>
        <!-- Display a warning message if no tags are found -->
        <div class="alert-warning alert">تگی یافت نشد</div>
    <?php endif; ?>
</div>
