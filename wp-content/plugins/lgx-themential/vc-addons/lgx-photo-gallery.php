<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_photo_gallery', 'lgx_photo_gallery_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_photo_gallery_function($atts) {
    $number 	= -1;
    $order_by	= 'date';
    $order		= 'DESC';

    extract(shortcode_atts(array(
        'number' 		=> -1,
        'order_by'		=> 'date',
        'order'			=> 'DESC',
    ), $atts));

    global $post;

    // Basic Query
    $args = array(
        'post_type'      => array( 'gallery' ),
        'post_status'		=> 'publish',
        'posts_per_page'	=> esc_attr($number),
        'order'				=> $order,
        'orderby'			=> $order_by
    );

    $data = new WP_Query($args);
    ob_start(); ?>


    <div id="lgx-photo-gallery" class="lgx-photo-gallery">

        <div id="lgx-memorisinner" class="lgx-memorisinner">
            <div class="lgx-wrapper text-center">
                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        if ( $data->have_posts() ) :
                            while ( $data->have_posts() ) :
                                $data->the_post();
                                $id = $post->ID;

                                $thumb_url = '';
                                if ( has_post_thumbnail( $post->ID ) ) {
                                    $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), true);
                                    $thumb_url = $thumb_url[0];
                                }
                                ?>

                                <div  class="lgx-single">
                                    <figure>
                                        <img title="<?php echo get_the_title(); ?>" src="<?php echo $thumb_url; ?>" alt="<?php echo get_the_title(); ?>"/>
                                        <figcaption class="lgx-figcaption">
                                            <div class="lgx-hover-link">
                                                <div class="lgx-vertical">
                                                    <a title="<?php echo get_the_title(); ?>" href="<?php echo $thumb_url; ?>">
                                                        <i class="fa fa-search fa-2x"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            <?php      endwhile;
                        endif;
                        wp_reset_postdata();// Restore original Post Data
                        ?>
                    </div>
                </div>
            </div> <!--//.CONAINER-->
        </div><!--//.lgx CONTACT INNER-->
    </div>
    <?php
    return ob_get_clean();
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Photo Gallery", 'lgx-themential'),
        "base" => "lgx_photo_gallery",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Photo Gallery", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Number of items", 'lgx-themential'),
                "param_name" 	=> "number",
                "value" 		=> -1,
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("OderBy", 'lgx-themential'),
                "param_name" 	=> "order_by",
                "value" 		=> array('Select'=>'','Date'=>'date','Title'=>'title','Modified'=>'modified','Author'=>'author','Random'=>'rand'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'lgx-themential'),
                "param_name" 	=> "order",
                "value" 		=> array('Select'=>'','DESC'=>'DESC','ASC'=>'ASC'),
            ),


        )

    ));
}