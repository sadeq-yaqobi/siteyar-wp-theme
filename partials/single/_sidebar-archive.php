<!-- Searchbar -->
<div class="single_widgets widget_search">
    <h4 class="title mb-3">آرشیو مطالب</h4>
    <select class="form-control form-control-sm bg-light text-dark" name="archive-dropdown" onchange="document.location.href=options[this.selectedIndex].value">
        <option value="">آرشیو ماهانه مطالب</option>
        <?php $args = [
                'type'=>'monthly',
            'post_type' => 'post',
            'format' => 'option',
            'show_post_count' => true,
        ];
        wp_get_archives($args); ?>
    </select>
</div>

