<?php
/*
Single Post Template: Trenerzy
Description: This part is optional, but helpful for describing the Post Template
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
			
			
			<?php while ( have_posts() ) : the_post(); ?>
			<?php
			$txt=get_the_content();
			preg_match_all("/(\d+)/", $txt, $wynik);
			$wynik=$wynik[0];
			$post_id_7=get_post( $wynik[0], $output );
			$id_trenera = $wynik[0];
			
			?> 
			<h3><?php echo $post_id_7->post_title ;?></h3>
		
			<?php echo $post_id_7->post_content  ; 
			
			
			?>
			<?php endwhile; // end of the loop. ?>
			<?php 
			$categories =  get_categories('child_of=3&hide_empty=0&current_category=0&hierarchical=1&show_count=0&depth=1&walker=0&pad_counts=0');

			$i=0;
			foreach ($categories as $category) : 
			$tablica = explode(" ", $category->name);
			$tablica2 = explode(".", $tablica[0]);
			if(is_numeric($tablica2[0]) ==1 && is_numeric($tablica2[1]) ==1 && is_numeric($tablica2[2]) ==1){
			
			
			$args  = array('category'=>$category->term_id);
			
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); 
				
				if(get_the_title() == 'Trenerzy'){
				$txt=get_the_content();
				preg_match_all("/(\d+)/", $txt, $wynik);
				$wynik=$wynik[0];
				if($id_trenera == $wynik[0]){
				 echo '<a href="'.get_category_link( $category->term_id).'">'.$category->name.'</a></br>';
				
				}
				
				}
				
				
			 endforeach; 
			
			
			
			}

			endforeach;

			
			
			?>
			
			</div>

<?php get_footer(); ?>

