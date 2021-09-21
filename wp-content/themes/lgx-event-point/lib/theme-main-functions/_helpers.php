<?php
/**
 * Created by PhpStorm.
 * User: logichunt
 * Date: 1/4/16
 * Time: 1:18 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
 
/************************************************************************
 * //  Custom Excerpt
 *************************************************************************/

function lgx_event_point_excerpt($count){
	//$permalink = get_permalink($postid);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	//$excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
	return $excerpt;
}

/************************************************************************
 * //Custom Excerpt End
 *************************************************************************/


/**=====================================================================
 * wp event point Pagination
 =====================================================================*/
 
if ( ! function_exists( 'lgx_event_point_pagination' ) ){ 

	function lgx_event_point_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $GLOBALS['wp_query']->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 3,
    		'show_all'  => False,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			'type'      => 'list',
            'before_page_number' => '<b>',
            'after_page_number' => '</b>'
		) );

		if ( $links ) :
		 printf(esc_html__('%s','lgx-event-point'),$links);
		endif;
	}
}


/**=====================================================================
 * wp event post views
 =====================================================================*/
function lgx_event_point_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==0){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }elseif($count==1){
		return $count.' View';
    }else{
    	return $count.' Views';
    }
}
function lgx_event_point_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
/**=====================================================================
 * Comment form field order change 
=====================================================================*/
 
add_action( 'comment_form_after_fields', 'lgx_event_point_form_order_textarea' );
add_action( 'comment_form_logged_in_after', 'lgx_event_point_form_order_textarea' );

function lgx_event_point_form_order_textarea()
{
    echo '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'lgx-event-point' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
}

/**=====================================================================
 *  Comment args change
=====================================================================*/
  
add_filter( 'comment_form_defaults', 'lgx_event_point_comment_form_allowed_tags' );
function lgx_event_point_comment_form_allowed_tags( $defaults ) {      $defaults['comment_field'] = '';
	$defaults['label_submit'] =  esc_html__( 'Submit','lgx-event-point' ); 
	return $defaults;

}

/**=====================================================================
 *  BreadCrumb
=====================================================================*/
function lgx_event_point_breadcrumb(){
	global $post,$lgx_event_point;
	if(isset($lgx_event_point['blog-title'])){
		$lgx_event_point_blog_title=  $lgx_event_point['blog-title'];
	}else{
		$lgx_event_point_blog_title=  esc_html__('Blog','lgx-event-point');
	}

	if(is_front_page() && is_home()){
		echo esc_html($lgx_event_point_blog_title);

	}elseif(is_home() || is_page()){
		if(is_page()){
		    if(''!=get_post_meta($post->ID,'__lgx__page_banner_title',true)){
		        $lgx_event_point_ptitle = get_post_meta($post->ID,'__lgx__page_banner_title',true);
			}else{
				$lgx_event_point_ptitle =  get_the_title();
			}
		}else{
			$lgx_event_point_ptitle =  $lgx_event_point_blog_title;
		}
	  printf( esc_html__('%s','lgx-event-point'),$lgx_event_point_ptitle);
	}elseif(is_single()){
		if(isset($lgx_event_point['single-title']) && (''!=$lgx_event_point['single-title'])){
			printf(  $lgx_event_point['single-title'] );
		}else{
			the_title();
		}
	}elseif(is_search()){
		if(isset($lgx_event_point['srch-title']) && (''!=$lgx_event_point['srch-title'])){
			printf( $lgx_event_point['srch-title'] );
		}else{
			printf( get_search_query()  );
		}
	}elseif(is_category() || is_tag()) {
		if(isset($lgx_event_point['archv-title']) && (''!=$lgx_event_point['archv-title'])){
			printf(esc_html__('%s','lgx-event-point'),$lgx_event_point['archv-title']);
		}else{
			single_cat_title("", true);
		}
	}elseif(is_archive()){

 		if ( class_exists('WooCommerce' ) ){ 
 			if(is_shop() || is_product_category() || is_product_tag() ){ 
	 			if(isset($lgx_event_point['shop-title']) && (''!=$lgx_event_point['shop-title'])){ 
					printf($lgx_event_point['shop-title']); 
				}else{ 
	 				woocommerce_page_title();   
	 			}  
 			}else{ echo get_the_date('F Y'); }  
 		}else{  
 			if(isset($lgx_event_point['archv-title']) && (''!=$lgx_event_point['archv-title'])){
				printf($lgx_event_point['archv-title']);
			}else{
 				echo get_the_date('F Y'); 
 			}
		} 
	}elseif(is_404()){ esc_html_e('404 Error','lgx-event-point');}else{ the_title();}
}



/**=====================================================================
 *  Menu Function
=====================================================================*/
function lgx_event_point_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'mainmenu',
		'depth'             => 4,
		'container'         => false, 
		'menu_id'        	=> 'lgx-mn',
		'menu_class'        => 'nav navbar-nav lgx-nav',
		'fallback_cb'       => 'lgx_event_point_menu',
		'walker'			=> new lgx_event_point_navwalker()
	));
}

/**=====================================================================
 *  Fall back Menu Function
=====================================================================*/ 
if(is_user_logged_in()):
	function lgx_event_point_menu() {
		?>
	    <ul class="nav navbar-nav lgx-nav">
	    	<li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e( 'Add Menu', 'lgx-event-point' ); ?></a></li>
		</ul>
		<?php
	}
endif;

/**=====================================================================
 *  User Custom Field
=====================================================================*/ 
add_action( 'show_user_profile', 'lgx_event_point_extra_profile_fields' );
add_action( 'edit_user_profile', 'lgx_event_point_extra_profile_fields' );

function lgx_event_point_extra_profile_fields( $user ) { ?>

	<h3><?php esc_html_e('Extra profile information','lgx-event-point'); ?></h3>

	<table class="form-table">

		<tr>
			<th><label for="user_position"><?php esc_html_e('Position','lgx-event-point'); ?></label></th>

			<td>
				<input type="text" name="user_position" id="user_position" value="<?php echo esc_attr( get_the_author_meta( 'user_position', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your position here.','lgx-event-point'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="company_name"><?php esc_html_e('Company Name','lgx-event-point'); ?></label></th>

			<td>
				<input type="text" name="company_name" id="company_name" value="<?php echo esc_attr( get_the_author_meta( 'company_name', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your company name here.','lgx-event-point'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="company_url"><?php esc_html_e('Company Url','lgx-event-point'); ?></label></th>

			<td>
				<input type="text" name="company_url" id="company_url" value="<?php echo esc_attr( get_the_author_meta( 'company_url', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your company url here.','lgx-event-point'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="follows_url"><?php esc_html_e('Follow','lgx-event-point'); ?></label></th>

			<td>
				<input type="text" name="follows_url" id="follows_url" value="<?php echo esc_attr( get_the_author_meta( 'follows_url', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php esc_html_e('Please enter your social url here.','lgx-event-point'); ?></span>
			</td>
		</tr>

	</table>
<?php }


/**=====================================================================
 *  User Custom Field Data SAve
=====================================================================*/ 
add_action( 'personal_options_update', 'lgx_event_point_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'lgx_event_point_save_extra_profile_fields' );

function lgx_event_point_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'user_position', $_POST['user_position'] );
	update_user_meta( $user_id, 'company_name', $_POST['company_name'] );
	update_user_meta( $user_id, 'company_url', $_POST['company_url'] );
	update_user_meta( $user_id, 'follows_url', $_POST['follows_url'] );
}

/**=====================================================================
 *  hexa to rgb color converter
=====================================================================*/ 
function lgx_event_point_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex); 
   if(strlen($hex) == 3) {
      $r = hexdec($hex[0].$hex[0]);
      $g = hexdec($hex[1].$hex[1]);
      $b = hexdec($hex[2].$hex[2]);
   } else {
      $r = hexdec($hex[0].$hex[1]);
      $g = hexdec($hex[2].$hex[3]);
      $b = hexdec($hex[4].$hex[5]);
   } 
   return implode(', ',array($r, $g, $b));  
}


/**=====================================================================
 *  body class added
=====================================================================*/ 
add_filter( 'body_class', 'lgx_event_point_custom_class' );
function lgx_event_point_custom_class( $classes ) {
    if (  is_home() ) {
        $classes[] = 'page page-template';
    }
    return $classes;
}
