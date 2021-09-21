<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_pricing_2_info', 'lgx_pricing_2_info_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_pricing_2_info_function($atts, $content = null ) {

    extract(shortcode_atts(array(
        'info_title' 	=>	'',
        'pricing_2_image' 	=>	'',
        //'content' 	=>	'',
        'info_alignment' 	=>	'center',
        'is_container' => true,
    ), $atts));

    $image_url = '';
    if(!empty ($atts['pricing_2_image'])) {
        $img = wp_get_attachment_image_src($atts['pricing_2_image']);
        $image_url = $img[0];
    }


    $output = '
<div style="background:green">
<h1>pricing table goes to here</h1>
</div>
    ';

    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("pricing_2 Info", 'lgx-themential'),
        "base" => "lgx_pricing_2_info",
        // 'icon' => 'icon_pricing_2_info',
        "class" => "",
        "description" => esc_html__("Display all of the pricing_2 Information", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(
            array(
                "type" 			=> "attach_image",
                "heading" 		=> esc_html__("Upload Image", "lgx-themential"),
                "param_name" 	=> "pricing_2_image",
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