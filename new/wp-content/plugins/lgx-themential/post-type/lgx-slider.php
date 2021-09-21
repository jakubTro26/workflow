<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Slider post type
 *
 */



/**
 * Register post type Slider
 *
 * @return void
 */



function lgx_post_type_Slider() {
    $labels = array(
        'name'               => _x( 'Slider', 'Slider', 'lgx-themential' ),
        'singular_name'      => _x( 'Slider', 'Slider', 'lgx-themential' ),
        'menu_name'          => _x( 'Sliders', 'Slider', 'lgx-themential' ),
        'name_admin_bar'     => _x( 'Slider', 'Slider', 'lgx-themential' ),
        'add_new'            => _x( 'Add New', 'Slider', 'lgx-themential' ),
        'add_new_item'       => __( 'Add New Slider', 'lgx-themential' ),
        'new_item'           => __( 'Add New', 'lgx-themential' ),
        'edit_item'          => __( 'Edit Slider', 'lgx-themential' ),
        'view_item'          => __( 'View Slider', 'lgx-themential' ),
        'all_items'          => __( 'All Slider', 'lgx-themential' ),
        'search_items'       => __( 'Search Slider', 'lgx-themential' ),
        'parent_item_colon'  => __( 'Parent Slider:', 'lgx-themential' ),
        'not_found'          => __( 'No Slider found.', 'lgx-themential' ),
        'not_found_in_trash' => __( 'No Slider found in Trash.', 'lgx-themential' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'lgx-themential' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'			 => 'dashicons-admin-users',
        'supports'           => array( 'title',  'thumbnail')
    );

    register_post_type( 'slider', $args );
}

add_action( 'init', 'lgx_post_type_Slider' );