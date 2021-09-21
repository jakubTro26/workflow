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
			    <div id="lgx-speaker-single" class="lgx-speakers lgx-speaker-single">
			        <div class="lgx-inner">
			            <div class="container">
			                <div class="row">
			                	<?php while ( have_posts() ) : the_post(); ?> 
				                    <div class="col-sm-5 col-xs-12">
				                        <div class="lgx-single-speaker">
				                            <figure>
				                                <a class="<?php the_permalink(); ?>" href="#"><?php the_post_thumbnail(); ?></a>
				                            </figure>
				                        </div>
				                    </div>
				                    <div class="col-sm-7 col-xs-12">
				                        <div class="speakers-content">
				                            <h1 class="title"><?php the_title(); ?></h1>
				                            <?php $lgx_spkr_company = get_post_meta(get_the_ID(),'__lgx__speaker-company',true); 
				                             $lgx_spkr_company_url = (!empty(get_post_meta(get_the_ID(),'__lgx__speaker-company-url',true))) ? get_post_meta(get_the_ID(),'__lgx__speaker-company-url',true) : '#'; 
				                            ?>
				                            <h3 class="subtitle"><?php printf(esc_html__('%s','lgx-event-point'),get_post_meta(get_the_ID(),'__lgx__speaker-designation',true)); ?> <?php if('' != $lgx_spkr_company){ echo ', <br><a href="'.$lgx_spkr_company_url.'">'.esc_html($lgx_spkr_company).'</a>'; } ?></h3>
				                            <div class="social">
				                                <ul class="list-inline">
				                                	<?php 
				                                	$lgx_tw =get_post_meta(get_the_ID(),'__lgx__speaker-twitter-url',true);
				                                	$lgx_fb =get_post_meta(get_the_ID(),'__lgx__speaker-facebook-url',true);
				                                	$lgx_ins =get_post_meta(get_the_ID(),'__lgx__speaker-instagram-url',true);
				                                	$lgx_lnd =get_post_meta(get_the_ID(),'__lgx__speaker-linkedin-url',true);
				                                	 ?>
				                                	<?php if($lgx_fb): ?>
					                                    <li><a class="sp-fb" href="<?php echo esc_url($lgx_fb); ?>"><i class="fa fa-facebook"></i></a></li>
					                                <?php endif; ?>
				                                	<?php if($lgx_tw): ?>
				                                    	<li><a class="sp-tw" href="<?php echo esc_url($lgx_tw); ?>"><i class="fa fa-twitter"></i></a></li>
					                                <?php endif; ?>
				                                	<?php if($lgx_ins): ?>
				                                    	<li><a class="sp-google" href="<?php echo esc_url($lgx_ins); ?>"><i class="fa fa-instagram"></i></a></li>
					                                <?php endif; ?>
				                                	<?php if($lgx_lnd): ?>
				                                    	<li><a class="sp-in" href="<?php echo esc_url($lgx_lnd); ?>"><i class="fa fa-linkedin"></i></a></li> 
					                                <?php endif; ?> 
				                                </ul>
				                            </div>
				                            <?php the_content(); ?>
				                        </div>
				                    </div>
								<?php endwhile; ?>
			                </div>
			            </div><!-- //.CONTAINER -->

			        </div><!-- //.INNER -->

			    </div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
