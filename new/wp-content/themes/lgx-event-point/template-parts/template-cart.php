<?php 
// Template Name: Cart Page

get_header();
?>
<div class="container">
	<div class="col-md-8">
		<?php echo do_shortcode('[woocommerce_cart]'); ?>
	</div>
	<div class="col-md-4"> 
		<?php 
			if ( is_active_sidebar( 'sidebar-shop' ) ) {
				 dynamic_sidebar( 'sidebar-shop' );
			} 
		?>
	</div>
</div>

<?php get_footer(); ?>