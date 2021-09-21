<?php
/**
 * Created by PhpStorm.
 * User: DCL network
 * Date: 17-Feb-17
 * Time: 1:28 PM
 */

/************************************************************************
 * Register widget area.
 *************************************************************************/


function lgx_event_point_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'lgx-event-point' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'lgx-event-point' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'lgx-event-point' ),
        'id'            => 'sidebar-shop',
        'description'   => esc_html__( 'Add widgets here.', 'lgx-event-point' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widgets', 'lgx-event-point' ),
        'id'            => 'sidebar-footer',
        'description'   => esc_html__( 'Add widgets here.', 'lgx-event-point' ),
        'before_widget' => '<div id="%1$s" class="widget-col %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'lgx_event_point_widgets_init' );



/*-------------------------------------------------------
*           Include the TGM Plugin Activation class
*-------------------------------------------------------*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}