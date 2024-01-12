<?php
//setting default default posts
function sy_default_post_thumbnail(): string
{
    $thumb_logo = get_template_directory_uri().'/assets/img/thumb-logo.jpg';
    return "<img class='img-responsive' src=$thumb_logo alt='image'>";
}
