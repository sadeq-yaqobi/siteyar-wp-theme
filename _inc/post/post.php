<?php
//setting default default posts
function sy_default_post_thumbnail(): string
{
    $thumb_logo = get_template_directory_uri() . '/assets/img/thumb-logo.jpg';
    return "<img class='img-responsive' src=$thumb_logo alt='image'>";
}

// getting post thumbnail
function sy_post_thumbnail(): string
{
    if (has_post_thumbnail()) {
        return get_the_post_thumbnail('','', ['class' => 'img-fluid', 'alt' => get_the_title()]);
    } else {
       return sy_default_post_thumbnail();
    }
}