<?php

/*function sy_custom_avatar($avatar_defaults) {
    $custom_avatar_url = get_template_directory_uri() . '/assets/img/avatar-man-01.jpg';
    $avatar_defaults[$custom_avatar_url] = 'Custom Default Avatar';
    return $avatar_defaults;
}
add_filter('avatar_defaults', 'sy_custom_avatar');*/

function sy_default_author_avatar($alt,$size): string
{
    $default_avatar = get_template_directory_uri() . '/assets/img/avatar-man-01.jpg';
    return '<img class="img-fluid" src="' . $default_avatar . '" alt="' . $alt . '" height="'.$size.'" width="'.$size.'" loading="lazy" decoding="async"></img>';
}

function sy_author_avatar($id_or_email, $size, $alt,$class='')
{
    $default_avatar_url = site_url('/assets/img/avatar-man-01.jpg'); // URL to your custom default avatar
//    $avatar = get_avatar($id_or_email, $size, $default_avatar_url, $alt);
    $avatar = get_avatar($id_or_email, $size, '', $alt,['class'=>$class]);
    if (!$avatar) {
        return sy_default_author_avatar($alt,$size);
    }
    return $avatar;
}
