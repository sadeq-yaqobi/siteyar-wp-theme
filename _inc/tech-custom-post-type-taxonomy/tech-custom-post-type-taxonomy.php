<?php
add_action('init','sy_register_tech_post_type');
add_action('init','sy_register_tech_taxonomy');

function sy_register_tech_post_type()
{
    $labels = array(
        'name'                  => 'اخبار تکنولوژی',
        'singular_name'         => 'tech',
        'menu_name'             => 'اخبار تکنولوژی',
        'name_admin_bar'        => 'tech',
        'add_new'               => 'افزودن مطلب جدید',
        'add_new_item'          =>  'افزودن مطلب جدید',
        'new_item'              =>  'مطلب جدید',
        'edit_item'             =>  'ویرایش مطلب',
        'view_item'             =>  'مشاهده',
        'all_items'             =>'همه مطالب',
        'search_items'          => 'جستجو',
        'parent_item_colon'     => 'والد مطلب',
        'not_found'             => 'مطلبی پیدا نشد',
        'not_found_in_trash'    => 'مطلبی در زباله‌دان پیدا نشد',
        'featured_image'        => 'تصویر شاخص',
        'set_featured_image'    =>  'انتخاب تصویر شاخص',
        'remove_featured_image' =>  'حذف تصویر شاخص',
        'use_featured_image'    =>  'استفاده به عنوان تصویر شاخص',
        'archives'              =>  'آرشیو مطالب',
        'insert_into_item'      =>  'افزودن به مطالب',
        'uploaded_to_this_item' =>  'آپلود ',
        'filter_items_list'     =>  'فیلتر لیست مطالب',
        'items_list_navigation' =>  'پیمایش لیست مطالب',
        'items_list'            =>  'لیست مطالب'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'tech' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
//        'taxonomies'=>['category','post_tag'], //showing post categories and tags on custom post type
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields' ),
        'show_in_rest'=> true
    );

    register_post_type( 'tech', $args );

}

function sy_register_tech_taxonomy()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => 'دسته بندی ها',
        'singular_name'     => 'دسته بندی',
        'search_items'      =>  'جستجو',
        'all_items'         =>  'تمام موارد',
        'parent_item'       =>  'دسته بندی والد',
        'parent_item_colon' =>  'Parent Genre:',
        'edit_item'         =>  'ویرایرش دسته بندی',
        'update_item'       =>  'به روزرسانی دسته‌بندی',
        'add_new_item'      =>  'افزودن دسته جدید',
        'new_item_name'     =>  'نام دسته‌بندی جدید',
        'menu_name'         =>'دسته‌ها',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'cat-tech' ),
    );

    register_taxonomy( 'cat-tech', array( 'tech' ), $args );

    unset( $args );
    unset( $labels );

    $labels = array(
        'name'              => 'برچسب‌ها',
        'singular_name'     => 'برچسب',
        'search_items'      =>  'جستجو',
        'all_items'         =>  'تمام موارد',
        'parent_item'       =>  'دسته بندی والد',
        'parent_item_colon' => 'Parent Genre:',
        'edit_item'         =>  'ویرایرش برچسب',
        'update_item'       =>  'به روزرسانی برچسب',
        'add_new_item'      =>  'افزودن برچسب جدید',
        'new_item_name'     =>  'نام برچسب جدید',
        'menu_name'         =>'برچسب‌ها',
    );

    $args = array(
        'hierarchical'      => false, //set false if you want to show by input
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tag-tech' ),
    );

    register_taxonomy( 'tag-tech', array( 'tech' ), $args );
}

