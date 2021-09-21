<?php
// production
//show_admin_bar( false );

/************************************************************************
 * LGX Event Point functions and definitions
 *************************************************************************/
define('LGXEVENTPOINT_NAME', wp_get_theme()->get( 'Name' ));
define('LGXEVENTPOINT_STYLE', get_template_directory_uri().'/assets/css/');
define('LGXEVENTPOINT_SCRIPT', get_template_directory_uri().'/assets/js/');
define('LGXEVENTPOINT_VENDOR', get_template_directory_uri().'/assets/vendor/'); 
define('LGXEVENTPOINT_URI', get_template_directory_uri().'/');

/************************************************************************
 * Include Theme Config
 *************************************************************************/

if ( file_exists( get_template_directory() . '/lib/theme-config/theme-config.php' ) ) {

	require_once get_template_directory(). '/lib/theme-config/theme-config.php';
}


/************************************************************************
 * Theme Core Functions
 *************************************************************************/

if ( file_exists( get_template_directory() . '/lib/theme-main-functions/theme-core-functions.php' ) ) {

	require_once get_template_directory() . '/lib/theme-main-functions/theme-core-functions.php';
}


/************************************************************************
 * Implement the Custom Header feature.
 *************************************************************************/

if ( file_exists(get_template_directory()  . '/inc/custom-header.php')) {
	require get_template_directory() . '/inc/custom-header.php';
}

/************************************************************************
 * Custom template tags for this theme.
 *************************************************************************/

if ( file_exists(get_template_directory()  . '/inc/template-tags.php')) {
	require get_template_directory() . '/inc/template-tags.php';
}

/************************************************************************
 * Custom functions that act independently of the theme templates.
 *************************************************************************/

if ( file_exists(get_template_directory()  . '/inc/extras.php')) {
	require get_template_directory() . '/inc/extras.php';
}

/************************************************************************
 * Customizer additions.
 *************************************************************************/

if ( file_exists(get_template_directory()  . '/inc/customizer.php')) {
	require get_template_directory() . '/inc/customizer.php';
}

/************************************************************************
 * Load Jetpack compatibility file.
 *************************************************************************/

if ( file_exists(get_template_directory()  . '/inc/jetpack.php')) {
	require get_template_directory() . '/inc/jetpack.php';
}

remove_action( 'woocommerce_after_single_product_summary' ,'woocommerce_upsell_display',15);