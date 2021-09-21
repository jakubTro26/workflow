<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Testimonial post type
 *
 */



/**
 * Register post type Testimonial
 *
 * @return void
 */

function lgx_post_type_testimonial()
{
    $labels = array(
        'name'                	=> _x( 'Testimonial', 'Testimonial', 'lgx-themential' ),
        'singular_name'       	=> _x( 'Testimonial', 'Testimonial', 'lgx-themential' ),
        'menu_name'           	=> __( 'Testimonial', 'lgx-themential' ),
        'parent_item_colon'   	=> __( 'Parent Testimonial:', 'lgx-themential' ),
        'all_items'           	=> __( 'All Testimonial', 'lgx-themential' ),
        'view_item'           	=> __( 'View Testimonial', 'lgx-themential' ),
        'add_new_item'        	=> __( 'Add New Testimonial', 'lgx-themential' ),
        'add_new'             	=> __( 'Add New', 'lgx-themential' ),
        'edit_item'           	=> __( 'Edit Testimonial', 'lgx-themential' ),
        'update_item'         	=> __( 'Update Testimonial', 'lgx-themential' ),
        'search_items'        	=> __( 'Search Testimonial', 'lgx-themential' ),
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
        'menu_icon'				=> 'dashicons-media-interactive',
        'supports'           	=> array( 'title','editor','thumbnail','comments')
    );

    register_post_type('testimonial',$args);

}

add_action('init','lgx_post_type_testimonial');