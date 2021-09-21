<?php
/**
 * File: lgx-theme-config.php
 * Purpose: Global Theme Config And Constant
 */


/************************************************************************
 * Include TGM, REDUX, CMB2 & AUTHOR BOX
 *************************************************************************/

// Adding for External Plugins Requirement
if ( file_exists(get_template_directory() . '/lib/theme-config/config-tgm/tgm-config.php')) {

	require_once get_template_directory() . '/lib/theme-config/config-tgm/tgm-config.php';
}


//Adding custom config to redux framework
if ( file_exists(get_template_directory() . '/lib/theme-config/config-redux/config-redux.php')){ 
	require_once get_template_directory() . '/lib/theme-config/config-redux/config-redux.php';
}
//Adding custom config to redux framework
if ( file_exists(get_template_directory() . '/lib/theme-config/config-redux/_custom-config.php')){ 
	require get_template_directory() . '/lib/theme-config/config-redux/_custom-config.php';
}

/************************************************************************
 * Enqueue Redux Styles (Over right Redux Core Css )
 *************************************************************************/

function addPanelCSS() {
	wp_register_style( 'redux-custom-css', get_stylesheet_directory_uri() .'/lib/theme-config/config-redux/redux-custom.css', array( 'redux-admin-css' ), time(),'all');
	wp_enqueue_style('redux-custom-css');
}

add_action( 'redux/page/lgx_opt/enqueue', 'addPanelCSS' );
