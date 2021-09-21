<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_testimonial', 'lgx_testimonial_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_testimonial_function($atts) {
    extract(shortcode_atts(array(
        'limit' 	=>	'5',
        'order' 	=>	'DESC',
        'orderby' 	=>	'date',//orderby
    ), $atts));


    $item = '';
    global $post;
    global $wpdb;

    $testimonial_args = array(
        'post_type'      => array( 'testimonial' ),
        'post_status'    => array( 'publish' ),
        'order'          => $order,//ASC,DESC
        'orderby'        => $orderby,//ID / title/ modified/ rand
        'posts_per_page' => esc_attr($limit)// Any number, -1 for all
    );

    $testimonial_loop = new WP_Query( $testimonial_args );
    if ( $testimonial_loop->have_posts() ) :
        while ( $testimonial_loop->have_posts() ) : $testimonial_loop->the_post();

            // $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));

            $thumb_url = '';
            if ( has_post_thumbnail( $post->ID ) ) {
                $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), true);
                $thumb_url = $thumb_url[0];
            }

            $designation = get_post_meta($post->ID,'__lgx__client-designation',true);
            $client_name = get_post_meta(get_the_ID(),'__lgx__client-name',true);

            $item .= '<div class="item lgx-fadeInLeft">
                <figure class="lgx-client-image">
                    <img class="lgx-zoomIn"  src="'.$thumb_url.'" alt="testpersion1"/>
                    <figcaption class="lgx-zoomIn-q">
                        <i class="fa fa-quote-left"></i>
                    </figcaption>
                </figure>
                <div class="testi-info-area">
                    <p class="lgx-review">'. get_the_content() .'</p>
                    <h4 class="lgx-client-name">'.$client_name.'<span>'.$designation.'</span></h4>
                </div>
            </div>';
        endwhile;
    endif;
    wp_reset_postdata();// Restore original Post Data



    $output = '<section>
    <div class="lgx-testimonials">
        <div class="lgx-inner">
            <div class="lgx-wrapper">
                <div class="lgx-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="lgx-testiowlarea">
                                <div class="owl-carousel lgx-owltestimonial">
                                    '.$item.'
                                </div><!--l//#LGX-OWL TESTIMONIAL-->
                            </div>
                        </div> <!--//.COL 12 -->
                    </div> <!--//.ROW-->
                </div>
            </div> <!--//.CONTAINER-->
        </div>
    </div><!--//.LGX SECTION -->
</section>';

    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Testimonial", 'lgx-themential'),
        "base" => "lgx_testimonial",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Testimonial", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Testimonial Limit", "lgx-themential"),
                "param_name" 	=> "limit",
                "value" 		=> 5,
            ),
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'lgx-themential'),
                "param_name" 	=> "order",
                "value" 		=> array('Descending'=>'DESC', 'Ascending'=>'ASC'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order By", 'lgx-themential'),
                "param_name" 	=> "orderby",
                "value" 		=> array('Date'=>'date', 'ID'=>'ID','Title'=>'title' , 'Modified'=>'modified' , 'Rand'=> 'rand'),//ID / title/ modified/ rand
            ),


        )
    ));
}