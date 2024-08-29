<?php
//setting default default posts
function sy_default_post_thumbnail(): string
{
    $thumb_logo = get_template_directory_uri() . '/assets/img/webp/thumb-logo.webp';
    return "<img width='640' height='427' class='img-responsive' src=$thumb_logo alt='image'>";
}

// getting post thumbnail
function sy_post_thumbnail($class='img-fluid'): string
{
    if (has_post_thumbnail()) {
        return get_the_post_thumbnail('','', ['class' => $class, 'alt' => get_the_title()]);
    } else {
       return sy_default_post_thumbnail();
    }
}