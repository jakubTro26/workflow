<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_travel_info', 'lgx_travel_info_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_travel_info_function($atts, $content = null ) {

    extract(shortcode_atts(array(
        'info_title' 	=>	'',
        'travel_image' 	=>	'',
        //'content' 	=>	'',
        'info_alignment' 	=>	'center',
        'is_container' => true,
    ), $atts));

    $image_url = '';
    if(!empty ($atts['travel_image'])) {
        $img = wp_get_attachment_image_src($atts['travel_image']);
        $image_url = $img[0];
    }


    $output = '<div class="lgx-single-travel-info text-'.$info_alignment.'">
                '.(!empty($image_url) ? '<img src="'.esc_url($image_url).'" alt="location"/>' : '') .'
                 <h3 class="title">'.$info_title.'</h3>
               <p class="info">'.$content.'</p>
              </div>';

    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Travel Info", 'lgx-themential'),
        "base" => "lgx_travel_info",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display all of the Travel Information", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(
            array(
                "type" 			=> "attach_image",
                "heading" 		=> esc_html__("Upload Image", "lgx-themential"),
                "param_name" 	=> "travel_image",
                "value" 		=> "",
            ),
            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Title", "lgx-themential"),
                "param_name" 	=> "info_title",
                "value" 		=> "",
            ),
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Alignment", 'lgx-themential'),
                "param_name" 	=> "info_alignment",
                "value" 		=> array('Center'=>'center','Left'=>'left','Right'=>'right'),
            ),

            array(
                "type"       => "textarea_html",
                "holder"        => "div",
                "heading" 		=> esc_html__("Content", "lgx-themential"),
                "param_name" 	=> "content",
                "value" 		=> "",
               // 'admin_label' => true,
            ),

        )

    ));
}