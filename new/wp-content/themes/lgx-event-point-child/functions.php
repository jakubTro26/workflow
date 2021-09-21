<?php 

add_action( 'wp_enqueue_scripts', 'lgx_event_point_enqueue_styles' );
function lgx_event_point_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


// Start writing your functions here






















