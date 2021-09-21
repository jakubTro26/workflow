<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LGX_Event_Point
 */

$lgx_event_point_pag_sidbr = get_post_meta(get_the_ID(),'__lgx__page_sidebar',true);
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section>
			    <div class="lgx-blog lgx-blog-list">
			        <div class="lgx-inner">
						<?php if($lgx_event_point_pag_sidbr =='fulls'): ?>
							<?php if ( have_posts() ) :  
								while ( have_posts() ) : the_post(); 
									get_template_part( 'template-parts/content','page');
								endwhile; 		
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif; ?>
						<?php else: ?>
				            <div class="container">  
			                	<div class="row">
			                		<?php if($lgx_event_point_pag_sidbr=='left'): ?> 
					                	<div class="col-sm-12 col-md-4">
					                		<?php get_sidebar(); ?>
					                	</div> 
							    	<?php endif; ?>
			                        <?php if($lgx_event_point_pag_sidbr=='fullw'){
				                    	$lgx_event_point_column ='12';
				                    }else{
				                    	$lgx_event_point_column ='8';
				                    } ?>
				                	<div class="col-sm-12 col-md-<?php echo esc_attr($lgx_event_point_column); ?>"> 
										<?php
										if ( have_posts() ) : 
											/* Start the Loop */
											while ( have_posts() ) : the_post();
												/*
												 * Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'template-parts/content','page');
											endwhile; 
										else :
											get_template_part( 'template-parts/content', 'none' );
										endif; ?>  
				                	</div>
			                		<?php if( ($lgx_event_point_pag_sidbr !='left') && ($lgx_event_point_pag_sidbr !='fullw')  && ($lgx_event_point_pag_sidbr !='fulls') ): ?>  
					                	<div class="col-sm-12 col-md-4">
					                		<?php get_sidebar(); ?>
					                	</div> 
							    	<?php endif; ?>
			                	</div> 
				            </div><!-- //.CONTAINER --> 
						<?php endif; ?> 
			        </div><!-- //.INNER -->
			    </div>
			</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();