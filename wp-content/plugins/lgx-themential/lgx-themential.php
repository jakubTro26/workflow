<?php
/*
* The Event Point Theme Core Plugin By LogicHunt
*
* Plugin Name: LGX Themential
* Plugin URI: http://themearth.com/lgx-themential
* Author: LogicHunt
* Author URI: http://logichunt.com
* License - GNU/GPL V2 or Later
* Description: LGX Themential is Core required plugin for this theme.
* Version: 1.8.0
*************************************************************************/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/************************************************************************
 * LGX Themential Plugin Language
 *************************************************************************/


function themential_core_language_load(){
    $plugin_dir = basename(dirname(__FILE__))."/languages";
    load_plugin_textdomain( 'lgx-themential', false, $plugin_dir );
}
add_action( 'init', 'themential_core_language_load' );


/************************************************************************
 * Important Helpers Function
 *************************************************************************/
include_once( 'helpers/helpers.php' );


/************************************************************************
 * Redux integration
 *************************************************************************/

global $lgx_event_point;
include_once( 'lib/redux/framework.php' );


/************************************************************************
 * Metabox Include & Configuration
 *************************************************************************/

include_once( 'meta-data/metabox-config.php' );

/*****************************************
 *  Post Type Declaration
 *****************************************/

include_once( 'post-type/lgx-slider.php');
include_once( 'post-type/lgx-gallery.php');
include_once( 'post-type/lgx-pricing.php');
include_once( 'post-type/lgx-schedule.php');
include_once( 'post-type/lgx-speaker.php');
include_once( 'post-type/lgx-testimonial.php');

/************************************************************************
 * Redux Integration & Configuration
 *************************************************************************/

//Add Here .....................

/************************************************************************
 * Register Global Shortcode
 *************************************************************************/

//Add Here .....................

/************************************************************************
 * Register Theme Shortcode
 *************************************************************************/

include_once( 'vc-addons/lgx-brand-btn.php' );
include_once( 'vc-addons/lgx-title.php' );
include_once( 'vc-addons/lgx-title-2.php' );
include_once( 'vc-addons/lgx-pricing-2.php' );
include_once( 'vc-addons/lgx-get-ticket.php' );
include_once( 'vc-addons/lgx-latest-news.php' );
include_once( 'vc-addons/lgx-photo-gallery.php' );
include_once( 'vc-addons/lgx-schedule.php' );
include_once( 'vc-addons/lgx-speaker.php' );
include_once( 'vc-addons/lgx-sponsors.php' );
include_once( 'vc-addons/lgx-testimonial.php' );
include_once( 'vc-addons/lgx-travel-info.php' );
include_once( 'vc-addons/lgx-video-embed.php' );
include_once( 'vc-addons/lgx-countdown.php' );
include_once( 'vc-addons/lgx-gmap.php' );
include_once( 'vc-addons/lgx-address.php' );
include_once( 'vc-addons/lgx-about.php' );


/************************************************************************
 * Important Helpers Function
 *************************************************************************/
include_once( 'one-click-demo/init-one.php' );

/************************************************************************
 * Post Type Template
 *************************************************************************/

include_once( 'templates/templates.php');

/************************************************************************
 * Enqueue Assets
 *************************************************************************/

include_once( 'assets/assets.php');


/**
 *  Initialising Visual shortcode editor
 */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function lgx_themential_requireVcExtend(){
		include_once( 'vc_extend/extend_vc.php');
	}
	add_action('init', 'lgx_themential_requireVcExtend',2);
}



/**
 * Post Formate Display Procedure.
 */
add_action('admin_print_scripts', 'lgx_themential_display_procedure', 1000);

function lgx_themential_display_procedure(){ ?>
	<?php if(get_post_type() == 'post') : ?>
		<script>
			jQuery(document).ready(function(){
				var id = jQuery( 'input[name="post_format"]:checked' ).attr('id');
				if(id == 'post-format-video'){
					jQuery('.cmb2-id---lgx--pformat-vdo').show();
				}else{
					jQuery('.cmb2-id---lgx--pformat-vdo').hide();
				}  

				if(id == 'post-format-audio'){
					jQuery('.cmb2-id---lgx--pformat-ado').show();
				}else{
					jQuery('.cmb2-id---lgx--pformat-ado').hide();
				} 

				if(id == 'post-format-quote'){
					jQuery('.cmb2-id---lgx--pformat-qte').show();
				}else{
					jQuery('.cmb2-id---lgx--pformat-qte').hide();
				}  

				if(id == 'post-format-gallery'){
					jQuery('.cmb2-id---lgx--pformat-glr').show();
				}else{
					jQuery('.cmb2-id---lgx--pformat-glr').hide();
				}  


				jQuery( 'input[name="post_format"]' ).change(function(){
						jQuery('.cmb2-id---lgx--pformat-vdo').hide(); 
						jQuery('.cmb2-id---lgx--pformat-ado').hide(); 
						jQuery('.cmb2-id---lgx--pformat-qte').hide(); 
						jQuery('.cmb2-id---lgx--pformat-glr').hide(); 

					var id = jQuery( 'input[name="post_format"]:checked' ).attr('id');

					if(id == 'post-format-video'){
						jQuery('.cmb2-id---lgx--pformat-vdo').show();
					}else{
						jQuery('.cmb2-id---lgx--pformat-vdo').hide();
					}  

					if(id == 'post-format-audio'){
						jQuery('.cmb2-id---lgx--pformat-ado').show();
					}else{
						jQuery('.cmb2-id---lgx--pformat-ado').hide();
					} 

					if(id == 'post-format-quote'){
						jQuery('.cmb2-id---lgx--pformat-qte').show();
					}else{
						jQuery('.cmb2-id---lgx--pformat-qte').hide();
					}  

					if(id == 'post-format-gallery'){
						jQuery('.cmb2-id---lgx--pformat-glr').show();
					}else{
						jQuery('.cmb2-id---lgx--pformat-glr').hide();
					}  

				});
			})
		</script> 
	<?php endif; ?>

	<?php if(get_post_type() == 'page') : ?>
	<script>
		jQuery(document).ready(function(){
			var id = jQuery( 'input[name="__lgx__header_type"]:checked' ).attr('id');
			if(id == '__lgx__header_type3'){
				jQuery('.cmb2-id---lgx--page-banner').show();
				jQuery('.cmb2-id---lgx--page-banner-top').show();
				jQuery('.cmb2-id---lgx--page-banner-title').show();
			}else{ 
				jQuery('.cmb2-id---lgx--page-banner').hide();
				jQuery('.cmb2-id---lgx--page-banner-top').hide();
				jQuery('.cmb2-id---lgx--page-banner-title').hide();
			} 
			
			if(id == '__lgx__header_type8'){
				jQuery('.cmb2-id---lgx--rev-slidr-alias').show(); 
			}else{ 
				jQuery('.cmb2-id---lgx--rev-slidr-alias').hide(); 
			} 

			jQuery( 'input[name="__lgx__header_type"]' ).change(function(){
					jQuery('.cmb2-id---lgx--page-banner').hide();
					jQuery('.cmb2-id---lgx--page-banner-top').hide();
					jQuery('.cmb2-id---lgx--page-banner-title').hide();
					jQuery('.cmb2-id---lgx--rev-slidr-alias').hide(); 

				var id = jQuery( 'input[name="__lgx__header_type"]:checked' ).attr('id');

				if(id == '__lgx__header_type3'){
					jQuery('.cmb2-id---lgx--page-banner').show();
					jQuery('.cmb2-id---lgx--page-banner-top').show();
					jQuery('.cmb2-id---lgx--page-banner-title').show();
				}else{ 
					jQuery('.cmb2-id---lgx--page-banner').hide();
					jQuery('.cmb2-id---lgx--page-banner-top').hide();
					jQuery('.cmb2-id---lgx--page-banner-title').hide();
				} 

				if(id == '__lgx__header_type8'){
					jQuery('.cmb2-id---lgx--rev-slidr-alias').show(); 
				}else{ 
					jQuery('.cmb2-id---lgx--rev-slidr-alias').hide(); 
				} 
			});
		})
	</script>
	<?php endif; ?>


<?php }

/************************************************************************
 * Custom Color
 *************************************************************************/

include_once( 'assets/custom-color.php' );


