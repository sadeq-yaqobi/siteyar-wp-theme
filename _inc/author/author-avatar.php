<?php
function sy_default_author_avatar($alt,$size): string
{
    $default_avatar = get_template_directory_uri() . '/assets/img/webp/avatar-man-01.webp';
    return '<img class="img-fluid" src="' . $default_avatar . '" alt="' . $alt . '" height="'.$size.'" width="'.$size.'" loading="lazy" decoding="async"></img>';
}

function sy_author_avatar($id_or_email, $size, $alt,$class='')
{
//    $default_avatar_url = site_url('/assets/img/webp/avatar-man-01.webp'); // URL to your custom default avatar
//    $avatar = get_avatar($id_or_email, $size, $default_avatar_url, $alt);
    $avatar = get_avatar($id_or_email, $size, '', $alt,['class'=>$class]);
    if (!$avatar) {
        return sy_default_author_avatar($alt,$size);
    }
    return $avatar;
}
