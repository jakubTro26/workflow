<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Puremind
 * @since Puremind 1.0
 */
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl-pl" lang="pl-pl" dir="ltr" >
<head>
<link href='http://fonts.googleapis.com/css?family=Cinzel|Cinzel+Decorative' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style2.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Rosario:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>

<script>
(function($){
	$.fn.imgslide = function(options){
		// Declare default values
		var defaults = {
				top : '0px',
				right : '0px',
				bottom : '0px',
				left : '0px',
				duration : 200
			},
			// Override default values if options are passed in
			options = $.extend(defaults, options);
		// Loop through all images being called
		this.each(function(){
			var $this = $(this),
			// Grab original css property values
			defTop = '',
			defRight = '',
			defBottom = '',
			defLeft = ''; 
			// If original value is 'auto' change to 0px. Needed for browsers other than Firefox	
			(($this).css('top') == 'auto')? defTop = '0px' : defTop = ($this).css('top');
			(($this).css('right') == 'auto')? defRight = '0px' : defRight = ($this).css('right');
			(($this).css('bottom') == 'auto')? defBottom = '0px' : defBottom = ($this).css('bottom');
			(($this).css('left') == 'auto')? defLeft = '0px' : defLeft = ($this).css('left');
			// Run animation when hovered 
			$this.hover(function(){
				$($this).stop().animate({
				top:options.top,right:options.right,bottom:options.bottom,left:options.left},{queue:false,duration:options.duration});					 
			}, function(){
				$($this).stop().animate({top:defTop,right:defRight,bottom:defBottom,left:defLeft},{queue:false,duration:options.duration});					 
			});
		});
	// Ensure chainability	
	return this;
	}
})(jQuery);




jQuery(function(){
	jQuery('.box6_img').imgslide();
	jQuery('.box1_img').imgslide();
	jQuery('.box2_img').imgslide();
	jQuery('.box3_img').imgslide();
	jQuery('.box4_img').imgslide();
	jQuery('.box5_img').imgslide(); 
}); 

</script>




<link href='http://fonts.googleapis.com/css?family=Ultra' rel='stylesheet' type='text/css'>
<script src="<?php echo get_template_directory_uri(); ?>/font/jquery_cufon.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/font/Trajan_Pro_400-Trajan_Pro_700.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('.wkrotce'); 
			Cufon.replace('.title_rejestracja'); 		
			Cufon.replace('h3.title');  
			Cufon.replace('.kto');  
			Cufon.replace('.temat');  
			Cufon.replace('.title_index'); 
			Cufon.replace('.title_sponsorzy'); 
			Cufon.replace('.temat2');  
			Cufon.replace('ul#menu-footer li a', { 
			hover: {
					color: '#f0861d'
				}
			});
			Cufon.replace('ul#menu li a'); // Requires a selector engine for IE 6-7, see above
			Cufon.replace('ul#menu-topmenu li a', {
			hover: {
					color: '#f0861d'
				}
			});
		</script>
		<link href='http://fonts.googleapis.com/css?family=Cinzel:400,700' rel='stylesheet' type='text/css'> 
</head>

<?php 
	$defaults = array(
	'theme_location'  => '',
	'menu'            => 'TopMenu',
	'container'       => 'div',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);
?>




<body>
	<div id="header">
		<div class="container"">
		<ul id="menu"> 
		<li><a href="" title="">Nadchodzące wydarzenia</a> 
		

<ul><li><a href="http://bigdatasummit.pl/" title="">&nbsp BIG DATA SUMMIT </a></li>
		<li><a href="http://itsecuritytrends.pl/" title="">&nbsp IT SECURITY TRENDS </a></li>
		<li><a href="http://itfuture.pl/" title="">&nbsp TARGI IT FUTURE EXPO</a></li>
<li><a href="http://itcareersummit.pl/warszawa/" title="">&nbsp IT CAREER SUMMIT </a></li>

		</ul> 
		</li> 
      <li><a href="" title="">Zrealizowane wydarzenia</a> 
      <ul>
<li><a href="http://hrtrends.pl/" title="">&nbsp HR SOLUTIONS TRENDS</a></li> 
<li><a href="http://digitalsignagesummit.pl/" title="">&nbsp DIGITAL SIGNAGE SUMMIT </a></li> 
<li><a href="http://bigdatasummit.pl/" title="">&nbsp BIGDATA SUMMIT</a></li> 
<li><a href="http://backupstorage.pl/" title="">&nbsp BACKUP &STORAGE SYSTEMS</a></li> 
<li><a href="http://workflowtrends.pl/wrzesien2017" title="">&nbsp Workflow&Document Management Trends</a></li> 
<li><a href="http://itfuture.pl/" title="">&nbsp IT FUTURE EXPO 2015</a></li> 
<li><a href="http://bankingtech.pl/" title="">&nbsp BANKING TECH&SECURITY</a></li> 
<li><a href="http://retailcongress.pl/" title="">&nbsp RETAIL CONGRESS</a></li> 
<li><a href="http://integratedit.pl/" title="">&nbsp INTEGRETED IT SYSTEMS</a></li> 
		<li><a href="http://mobilesummit.pl/" title="">&nbsp MOBILE SUMMIT </a></li>
	  <li><a href="http://digitalsignagesummit.pl/" title="">&nbsp DIGITAL SIGNAGE SUMMIT </a></li>
		<li><a href="http://itsecuritytrends.pl/" title="">&nbsp IT SECURITY TRENDS </a></li>
		<li><a href="http://bpmtrends.pl/" title="">&nbsp BPM TRENDS </a></li>
	  <li><a href="http://datacentertrends.pl/" title="">&nbsp DATA CENTER TRENDS </a></li>
	  <li><a href="http://knowledgemanagementsummit.pl/" title="">&nbsp KNOWLEDGE MANAGEMENT SOLUTIONS</a></li>
	  
	  <li><a href="http://workflowtrends.pl/wrzesien2017/?page_id=30" title="">&nbsp Workflow&Document Management Trends</a></li>
	  <li><a href="http://www.pureconferences.pl/kalendarium/konferencje/209-28-08-2013-warszawa" title="">&nbsp IT LOGISTIC TECH</a></li> 
      <li><a href="http://www.pureconferences.pl/archiwum/konferencje/194-03-07-2013-warszawa" title="">&nbsp BANKING TECH & SECURITY </a></li> 
      <li><a href="http://www.pureconferences.pl/archiwum/konferencje/178-k27-06-2013" title="">&nbsp EDU IT TRENDS </a></li> 
	  <li><a href="http://www.pureconferences.pl/archiwum/konferencje/169-20-06-2013-warszawa" title="">&nbsp BUSINESS INTELLIGENCE TRENDS </a></li> 
		<li><a href="http://itfuture.pl/" title="">&nbsp TARGI IT FUTURE EXPO 2014</a></li>
		<li><a href="http://backupstorage.pl/" title="">&nbsp BACKUP & STORAGE SYSTEMS</a></li>		
		<li><a href="http://cloudcomputingtrends.pl/" title="">&nbsp CLOUD COMPUTING TRENDS</a></li>
		<li><a href="http://erptrends.pl" title="">&nbsp ERP Trends</a></li>
      </ul> 
      </li> 
  </ul> 	
		</div>
	</div>
	
	<div id="header_Q">
		<div class="container">
			<div class="logo">
				<a href="<?php echo get_bloginfo('url'); ?>"><img alt="Logo" title="logo" src="http://workflowtrends.pl/wrzesien2017/wp-content/uploads/2017/11/logotyp3311.png"></a>  
			</div>
			<h2 class="wkrotce" style="position: relative; top: 50px; left:105px;">Już wkrótce...</h2> 
			<div class="countdown"><?php echo get_countdown();?></div>
			
		</div>
		<div id="top_menu" class="clearfix">
			 <?php wp_nav_menu( $args ); ?> 
		</div>

	</div>
	
	<div id="content">
			<div class="container">
				<div class="slider">
				
					<?php echo do_shortcode("[metaslider id=803]"); ?>
				</div>