<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package LGX_Event_Point
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main"> 
			<section>
			    <div class="lgx-blog lgx-blog-single">
			        <div class="lgx-inner">
			            <div class="container">
			                <div class="blog-area">
			                    <div class="row">
			                        <div class="col-xs-12"> 
										<?php
										while ( have_posts() ) : the_post();

											get_template_part( 'template-parts/content','schedule' ); 

										endwhile; // End of the loop.
										?> 
			                        </div>
			                    </div>
			                </div>
			            </div><!-- //.CONTAINER -->

			        </div><!-- //.INNER -->

			    </div>
			</section> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
