<?php
/*
Single Post Template: Trenerzy
Description: This part is optional, but helpful for describing the Post Template
*/


get_header(); ?>


			<div class="left">
			<?php while (have_posts()) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_content();?>
			<?php endwhile; ?>

			</div>
			
			<div class="right">
			<?php get_sidebar(); ?>
			
			</div>

<?php get_footer(); ?>

