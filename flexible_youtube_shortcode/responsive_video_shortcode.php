<?php
/*
	Plugin Name: FPP - Responsive YouTube Shortcode
	Description: Provides a shortcode ID of a video in YouTube. Code is responsive [vid id="xxxx"][/vid], where 'source' is the iframe embed code for your video.
	Version: 1.0
	Author: Francois Peloquinb
*/

// Register the shortcode to wrap html around the content
function responsive_video_shortcode( $atts ) {
    extract( shortcode_atts( array (
        'id' => ''
    ), $atts ) );
    return '<div class="video-container"><iframe src="//www.youtube.com/embed/'.$id.'?wmode=transparent&amp;controls=0&amp;autohide=2&amp;showinfo=0&amp;rel=0" width="640" height="480" allowfullscreen="" frameborder="0"></iframe></div>';
}
add_shortcode ('vid', 'responsive_video_shortcode' );

// Register stylesheet with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
function responsive_video_add_stylesheet() {
    wp_register_style( 'responsive_video_style', plugins_url( 'style.css', __FILE__ ) );
    wp_enqueue_style( 'responsive_video_style' );
}
add_action( 'wp_enqueue_scripts', 'responsive_video_add_stylesheet' );
