<?php
/**
 * // This is custom blog page. which will display 2 column blog post without sidebar.
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LGX_Event_Point
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section>
			    <div class="lgx-blog lgx-blog-list">
			        <div class="lgx-inner">
			            <div class="container">
			                <div class="blog-area">
			                	<div class="row">
									<?php
									if ( have_posts() ) :
										/* Start the Loop */
										while ( have_posts() ) : the_post();
											get_template_part( 'template-parts/content', get_post_format() );
										endwhile; ?>
										<div class="col-sm-12 col-md-12">
											<div class="row">
												<?php lgx_event_point_pagination(); ?>
											</div>
										</div>
									<?php else :
										get_template_part( 'template-parts/content', 'none' );
									endif; ?>
			                	</div>
			                </div>
			            </div><!-- //.CONTAINER -->
			        </div><!-- //.INNER -->
			    </div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
