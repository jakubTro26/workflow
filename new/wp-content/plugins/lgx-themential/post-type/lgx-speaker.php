<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Speaker post type
 *
 */



/**
 * Register post type Speaker
 *
 * @return void
 */



function lgx_post_type_speaker() {
    $labels = array(
        'name'               => _x( 'Speaker', 'Speaker', 'lgx-themential' ),
        'singular_name'      => _x( 'Speaker', 'Speaker', 'lgx-themential' ),
        'menu_name'          => _x( 'Speakers', 'Speaker', 'lgx-themential' ),
        'name_admin_bar'     => _x( 'Speaker', 'Speaker', 'lgx-themential' ),
        'add_new'            => _x( 'Add New', 'Speaker', 'lgx-themential' ),
        'add_new_item'       => __( 'Add New Speaker', 'lgx-themential' ),
        'new_item'           => __( 'Add New', 'lgx-themential' ),
        'edit_item'          => __( 'Edit Speaker', 'lgx-themential' ),
        'view_item'          => __( 'View Speaker', 'lgx-themential' ),
        'all_items'          => __( 'All Speaker', 'lgx-themential' ),
        'search_items'       => __( 'Search Speaker', 'lgx-themential' ),
        'parent_item_colon'  => __( 'Parent Speaker:', 'lgx-themential' ),
        'not_found'          => __( 'No Speaker found.', 'lgx-themential' ),
        'not_found_in_trash' => __( 'No Speaker found in Trash.', 'lgx-themential' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'lgx-themential' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'speaker' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'			 => 'dashicons-admin-users',
        'supports'           => array( 'title', 'editor', 'thumbnail')
    );

    register_post_type( 'speaker', $args );
}

add_action( 'init', 'lgx_post_type_speaker' );