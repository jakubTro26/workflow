<?php

 include_once(TEMPLATEPATH.'/include/nav-menu-dropdown.php' );
 
 
function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ) )
  );
}
add_action( 'init', 'register_my_menus' );

function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


function be_mobile_menu($menu_name) { 
		wp_nav_menu( array(
		'menu'=>$menu_name,
		'walker' => new Walker_Nav_Menu_Dropdown(),
		'items_wrap' => '<nav class="menu-select mobile-menu visible-table visible-mobile hidden-desktop"> <select class="mydropdown" onchange="if (this.value) window.location.href=this.value"><option selected="selected" value="">-- Select a page --</option>%3$s</select></nav>',
		) );
	}
add_action( 'genesis_before_header', 'be_mobile_menu' );


function wpse45700_get_menu_by_location( $location ) {
    if( empty($location) ) return false;

    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;

    $menu_obj = get_term( $locations[$location], 'nav_menu' );

    return $menu_obj;
}