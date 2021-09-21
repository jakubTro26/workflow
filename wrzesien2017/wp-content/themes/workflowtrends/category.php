<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<?php $adres = $_SERVER[REQUEST_URI];
$tablica = explode("/", $adres);
 ?>
 
 
		<section id="primary">
			<div id="content" role="main">
			
			 <?php 
			 
			 foreach((get_the_category()) as $category) { 
			 if($category->category_nicename == $tablica[4]){ $idcategory = $category->cat_ID; break; }
			 } 
		 
		 ?>	
		 



		 <?php echo category_description(get_category_by_slug('category-slug')->term_id); ?> 
	
		<?php 
		$categories =  get_categories('child_of='.$idcategory.'&hide_empty=0');
		echo '<table class="kalendarium">';
?>
<tr>
<td>Data</td>
<td>Miejsce</td>
<td>Szkolenie</td>
<td>Więcej</td>
</tr>
<?php 

foreach ($categories as $category) : 
	 $cat2 = $category->name;
	 $tablica3 = explode(" ", $cat2);
	 echo '<tr>';
	 echo '<td>'.$tablica3[0].'</td>';
	 echo '<td>'.$tablica3[1].'</td>';
	 echo '<td>'.$category->description.'</td>';
	 echo '<td><a href="'.get_category_link( $category->term_id).'">więcej</a></td>';
	 echo '</tr>';
endforeach;
	 
echo '</table>'
?>
	

		
			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
