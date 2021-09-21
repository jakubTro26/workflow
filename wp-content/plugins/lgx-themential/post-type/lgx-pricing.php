<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Admin functions for the Pricing post type
 *
 */



/**
 * Register post type Pricing
 *
 * @return void
 */

function lgx_post_type_pricing()
{
    $labels = array(
        'name'                	=> _x( 'Pricing', 'Pricing', 'lgx-themential' ),
        'singular_name'       	=> _x( 'Pricing', 'Pricing', 'lgx-themential' ),
        'menu_name'           	=> __( 'Pricing','Pricing', 'lgx-themential' ),
        'parent_item_colon'   	=> __( 'Parent Pricing:', 'lgx-themential' ),
        'all_items'           	=> __( 'All Pricing', 'lgx-themential' ),
        'view_item'           	=> __( 'View Pricing', 'lgx-themential' ),
        'add_new_item'        	=> __( 'Add New Pricing', 'lgx-themential' ),
        'add_new'             	=> __( 'Add New', 'lgx-themential' ),
        'edit_item'           	=> __( 'Edit Pricing', 'lgx-themential' ),
        'update_item'         	=> __( 'Update Pricing', 'lgx-themential' ),
        'search_items'        	=> __( 'Search Pricing', 'lgx-themential' ),
        'not_found'           	=> __( 'No Pricing found', 'lgx-themential' ),
        'not_found_in_trash'  	=> __( 'No Pricing found in Trash', 'lgx-themential' )
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
        'menu_icon'				=> 'dashicons-list-view',
        'supports'           	=> array( 'title')
    );

    register_post_type('pricing',$args);

}

add_action('init','lgx_post_type_pricing');


/**
 * Register Custom Taxonomies
 */

function lgx_create_pricing_taxonomy()
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

    register_taxonomy('pricing_cat',array( 'pricing' ),$args);

}
add_action('init','lgx_create_pricing_taxonomy');