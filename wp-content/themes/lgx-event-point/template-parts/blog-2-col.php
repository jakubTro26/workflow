<?php
/**
 * Template Name: Blog 2 Column
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
  
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section>
			    <div class="lgx-blog lgx-blog-list">
			        <div class="lgx-inner">
			            <div class="container"> 
			                <div class="blog-area">
			                	<div class="row">  
									<?php
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                            		query_posts(array( 'post_type'=> 'post','paged' => $paged ));  
									if ( have_posts() ) : 
										/* Start the Loop */
										while ( have_posts() ) : the_post(); ?>
					                        <div class="col-sm-12 col-md-6">
					                            <div class="lgx-card-single lgx-blog-loop">
					                                <div class="card-inner">
					                                    <figure>
					                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('lgx-event-point-sblog'); ?></a>
					                                    </figure>
					                                    <div class="content">
					                                        <div class="cat-icon">
					                                            <span>
					                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
					                                            </span>
					                                        </div>
					                                        <div class="text-area">
					                                            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                                                <?php   if ( is_sticky() ) {
                                                                    printf( '<span class="dashicons dashicons-admin-post"></span><span class="featured-post">%s</span>', esc_html__( 'Sticky', 'lgx-event-point' ) );
                                                                } ?>
					                                            <div class="hits-area">
					                                                <span class="date"><a href="javascript:void(0)"><?php echo get_the_date('m M Y'); ?></a></span>
					                                                <span class="hit-right">
										                            	<?php comments_popup_link( 
																		    esc_html__( 'No Comment', 'lgx-event-point' ), 
																		    esc_html__( '1 Comment', 'lgx-event-point' ), 
																		    esc_html__( '% Comments', 'lgx-event-point' ), 
																		    esc_html__( '', 'lgx-event-point' ), 
																		    esc_html__( 'Comments Closed', 'lgx-event-point' )
																		); ?> 
					                                                    <a href="<?php the_permalink(); ?>"><?php echo lgx_event_point_getPostViews(get_the_ID()); ?></a>
					                                                </span>
					                                            </div>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div> 
					                        </div>
                        				<?php 
										endwhile; ?>
										<div class="col-sm-12 col-md-12">
											<div class="row">
												<?php lgx_event_point_pagination(); ?>
											</div>
										</div>
									<?php else :
										get_template_part( 'template-parts/content', 'none' );
									endif; wp_reset_query(); ?>   
			                	</div>
			                </div> 
			            </div><!-- //.CONTAINER --> 
			        </div><!-- //.INNER --> 
			    </div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
