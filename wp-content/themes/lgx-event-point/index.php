<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LGX_Event_Point
 */

$lgx_event_point_opt = new LgxFrameworkOpt();
$lgx_event_point_blogbar = $lgx_event_point_opt->lgx_event_point_blogSidebar(); 
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" >

			<section>
			    <div class="lgx-blog lgx-blog-list">
			        <div class="lgx-inner">
			            <div class="container">


			                <div class="blog-area">
			                	<div class="row">
				                	<?php if( $lgx_event_point_blogbar=='left' ): ?> 
					                	<div class="col-sm-12 col-md-4">
					                		<?php get_sidebar(); ?>
					                	</div>
					                <?php endif; ?>
				                	<div class="col-sm-12 col-md-8">
					                    <div class="row">
											<?php
											if ( have_posts() ) : 
												/* Start the Loop */
												while ( have_posts() ) : the_post();
													/*
													 * Include the Post-Format-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
													 */
													get_template_part( 'template-parts/content', get_post_format() );
												endwhile;
												lgx_event_point_pagination();
											else :
												get_template_part( 'template-parts/content', 'none' );
											endif; ?>  
					                    </div>
				                	</div>
				                	<?php if( $lgx_event_point_blogbar !='left' ): ?> 
					                	<div class="col-sm-12 col-md-4">
					                		<?php get_sidebar(); ?>
					                	</div>
					                <?php endif; ?>
			                	</div>
			                </div> 
			            </div><!-- //.CONTAINER -->

			        </div><!-- //.INNER -->

			    </div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
