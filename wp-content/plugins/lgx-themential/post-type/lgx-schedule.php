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


function lgx_post_type_schedule()
{
	$labels = array(
		'name'                	=> _x( 'Schedule', 'Schedule', 'lgx-themential' ),
		'singular_name'       	=> _x( 'Schedule', 'Schedule', 'lgx-themential' ),
		'menu_name'           	=> __( 'Schedule','Schedule', 'lgx-themential' ),
		'parent_item_colon'   	=> __( 'Parent Schedule:', 'lgx-themential' ),
		'all_items'           	=> __( 'All Schedule', 'lgx-themential' ),
		'view_item'           	=> __( 'View Schedule', 'lgx-themential' ),
		'add_new_item'        	=> __( 'Add New Schedule', 'lgx-themential' ),
		'add_new'             	=> __( 'Add New', 'lgx-themential' ),
		'edit_item'           	=> __( 'Edit Schedule', 'lgx-themential' ),
		'update_item'         	=> __( 'Update Schedule', 'lgx-themential' ),
		'search_items'        	=> __( 'Search Schedule', 'lgx-themential' ),
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
		'menu_icon'				=> 'dashicons-calendar-alt',
		'supports'           	=> array( 'title','editor','excerpt')
	);

	register_post_type('schedule',$args);

}

add_action('init','lgx_post_type_schedule');


/**
 * Register Custom Taxonomies
 */

function lgx_create_schedule_taxonomy()
{
	$labels = array(
		'name'  			=> _x( 'Categories', 'Category','lgx-themential'),
		'singular_name'     => _x( 'Category', 'Category','lgx-themential' ),
		'search_items'      => __( 'Search Category','lgx-themential'),
		'all_items'         => __( 'All Category','lgx-themential'),
		'parent_item'       => __( 'Parent Category','lgx-themential'),
		'parent_item_colon' => __( 'Parent Category:','lgx-themential'),
		'edit_item'         => __( 'Edit Category','lgx-themential'),
		'update_item'       => __( 'Update Category','lgx-themential'),
		'add_new_item'      => __( 'Add New Category','lgx-themential'),
		'new_item_name'     => __( 'New Category Name','lgx-themential'),
		'menu_name'         => __( 'Categories','lgx-themential')
	);



	$args = array(	'hierarchical' => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy('schedule_cat',array( 'schedule' ),$args);

}
add_action('init','lgx_create_schedule_taxonomy');
