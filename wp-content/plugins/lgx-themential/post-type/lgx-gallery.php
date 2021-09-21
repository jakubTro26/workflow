<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Gallery post type
 *
 */



/**
 * Register post type Gallery
 *
 * @return void
 */


function lgx_post_type_gallery()
{
    $labels = array(
        'name'                	=> _x( 'Gallery', 'Gallery', 'lgx-themential' ),
        'singular_name'       	=> _x( 'Gallery', 'Gallery', 'lgx-themential' ),
        'menu_name'           	=> __( 'Photo Gallery', 'lgx-themential' ),
        'parent_item_colon'   	=> __( 'Parent Gallery:', 'lgx-themential' ),
        'all_items'           	=> __( 'All Gallery', 'lgx-themential' ),
        'view_item'           	=> __( 'View Gallery', 'lgx-themential' ),
        'add_new_item'        	=> __( 'Add New Gallery', 'lgx-themential' ),
        'add_new'             	=> __( 'Add New', 'lgx-themential' ),
        'edit_item'           	=> __( 'Edit Gallery', 'lgx-themential' ),
        'update_item'         	=> __( 'Update Gallery', 'lgx-themential' ),
        'search_items'        	=> __( 'Search Gallery', 'lgx-themential' ),
        'not_found'           	=> __( 'No article found', 'lgx-themential' ),
        'not_found_in_trash'  	=> __( 'No article found in Trash', 'lgx-themential' )
    );

    $args = array(
        'labels'             	=> $labels,
        'public'             	=> true,
        'publicly_queryable' 	=> true,
        'show_in_menu'       	=> true,
        'show_in_admin_bar'   	=> true,
        'can_export'          	=> true,
        'has_archive'        	=> true,
        'hierarchical'       	=> false,
        'menu_position'      	=> null,
        'menu_icon'				=> 'dashicons-format-image',
        'supports'           	=> array( 'title', 'thumbnail')
    );

    register_post_type('gallery', $args);

}

add_action('init','lgx_post_type_gallery');
