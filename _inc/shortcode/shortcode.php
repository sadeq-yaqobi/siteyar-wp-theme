<?php

// Video Link Shortcode Function
function video_link_shortcode($attr, $content=null) : string
{
    // Create video element with source and download link
    return '
        <video width="100%" height="auto" controls preload="auto">
            <source src="' . $attr['src'] . '" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="my-3 d-flex justify-content-center">
            <a class="text-white bg-success px-4 py-3 rounded font-normal" style="transition: all .5s" href="' . $attr['src'] . '" target="_blank">
                <i class="fas fa-download"><span class="mx-2">دانلود ویدیو</span></i>
            </a>
        </div>
    ';
}

// Add Video Link Shortcode
add_shortcode('video-link', 'video_link_shortcode');


// Quotation Shortcode Function
function quotation_shortcode($attr, $content=null) : string
{
    // Create blockquote element with quote text and author
    return '
        <blockquote>
            <span class="icon"><i class="fas fa-quote-right"></i></span>
            <p class="text">' . $attr['text'] . '</p>
            <h5 class="name">- ' . $attr['name'] . '</h5>
        </blockquote>
    ';
}

// Add Quotation Shortcode
add_shortcode('quote', 'quotation_shortcode');
