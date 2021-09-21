<?php
/*
Template Name: Kalendarium
*/


get_header(); ?>



<?php 
$categories =  get_categories('child_of=3&hide_empty=0&current_category=0&hierarchical=1&show_count=0&depth=1&walker=0&pad_counts=0');

$i=0;
foreach ($categories as $category) : 
$tablica = explode(" ", $category->name);
$tablica2 = explode(".", $tablica[0]);
if(is_numeric($tablica2[0]) ==1 && is_numeric($tablica2[1]) ==1 && is_numeric($tablica2[2]) ==1){
$ts_time[$i] = mktime(0,0,0,$tablica2[1], $tablica2[0], $tablica2[2]);
$ts_id[$ts_time[$i]] = $category->term_id;
$i++;
}

endforeach;

sort($ts_time);

echo '<table class="kalendarium">';
?>
<tr>
<td>Data</td>
<td>Miejsce</td>
<td>Kategoria</td>
<td>Szkolenie</td>
<td>Trener</td>
<td>Więcej</td>
</tr>
<?php 
for( $c = 0 ; $c <$i ;$c++){
	 $cat = get_category($ts_id[$ts_time[$c]]);
	 
	 
	 
	 		$args  = array('category'=>$ts_id[$ts_time[$c]]);
			
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); 
				
				if(get_the_title() == 'Trenerzy'){
				$txt=get_the_content();
				preg_match_all("/(\d+)/", $txt, $wynik);
				$wynik=$wynik[0];
				$trener = $wynik;
				}
				

			 endforeach; 
	 
	 
	 
	 
	 
	 
	 $cat_parent_name = get_category($cat->parent);
	 $cat2 = $cat->name;
	 $tablica3 = explode(" ", $cat2);
	 echo '<tr>';
	 echo '<td>'.date("d-m-Y", $ts_time[$c]).'</td>';
	 echo '<td>'.$tablica3[1].'</td>';
	 echo '<td>'.$cat_parent_name->name.'</td>';
	 echo '<td>'.$cat->description.'</td>';
	 echo '<td>'.get_post($trener[0])->post_title.'</td>';
	 echo '<td><a href="'.get_category_link( $ts_id[$ts_time[$c]]).'">więcej</a></td>';
	 echo '</tr>';
}
echo '</table>'
?>








<?php get_footer(); ?>