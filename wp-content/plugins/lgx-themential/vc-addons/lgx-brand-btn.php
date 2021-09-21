<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_brand_btn', 'lgx_brand_btn_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_brand_btn_function($atts) {
    extract(shortcode_atts(array(
        'text' 	=>	'Brand Button', // Any Text
        'type'=>	'small', // small or large
        'url' 	=>	'#', //url
        'target'=>	'_blank', // )_blank, _self

    ), $atts));

    $output = '<div class="lgx-brand-btn-area">
                    <a class="lgx-btn lgx-brand-btn '.$type.' " href="'.$url.'" target="'.$target.'"><span>'.$text.'</span></a>
                </div>';

    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Brand Button", 'lgx-themential'),
        "base" => "lgx_brand_btn",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Add Brand Button", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Text", "lgx-themential"),
                "param_name" 	=> "text",
                "value" 		=> "Brand Button",
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("URL", "lgx-themential"),
                "param_name" 	=> "url",
                "value" 		=> "#",
            ),
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Type", 'lgx-themential'),
                "param_name" 	=> "type",
                "value" 		=> array('Default'=>'btn-sm','Large'=>'lgx-btn-big',  ),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Target Type", 'lgx-themential'),
                "param_name" 	=> "target",
                "value" 		=> array('New Window'=>'_blank','Current Window'=>'_self'),
            )
        )

    ));
}