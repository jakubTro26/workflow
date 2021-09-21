<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_event_title_2', 'lgx_event_title_function_2');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */

function lgx_event_title_function_2($atts)
{
    extract(shortcode_atts(array(
        'title'     => 'Section Title 2', // Section Title 
    ), $atts));



    $output = '<div class="lgx-heading-area-2">
                  <h2 class="lgx-heading"> '.$title.' </h2> 
               </div>';
    return $output;
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Section Title 2", 'lgx-themential'),
        "base" => "lgx_event_title_2",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Section Title", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Section Title", "lgx-themential"),
                "param_name" 	=> "title",
                "value" 		=> "Section Title",
            ),

        )

    ));
}