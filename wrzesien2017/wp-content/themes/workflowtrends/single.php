<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
							<?php $category = get_the_category() ;
								$cat_id =  $category[0]->cat_ID;
								 $my_query = new WP_Query( 'cat='.$cat_id.'' );
							?>
				<div class="left">

				<ul>
				<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></li>


				<?php endwhile; // end of the loop. ?>
				</ul>
			</div>
			
			<div class="right">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
			</div>

<?php get_footer(); ?>