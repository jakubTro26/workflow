<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_event_title', 'lgx_event_title_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */

function lgx_event_title_function($atts)
{
    extract(shortcode_atts(array(
        'title'     => 'Section Title', // Section Title
        'sub_title'  =>  'Please add your section Sub title Here.', // Section Sub Title
        'icon_name' => 'fa-life-ring', // Section icon name
        'color'     => 'black',
    ), $atts));



    $output = '<div class="lgx-heading-area '.$color.'">
                            <h2 class="lgx-heading">
                                <span class="back-heading"><i class="fa '.$icon_name.'" aria-hidden="true"></i></span>
                                <span class="heading">'.$title.'</span>
                            </h2>
                            <p class="text">'.$sub_title.'</p>
              </div>';
    return $output;
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Section Title", 'lgx-themential'),
        "base" => "lgx_event_title",
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

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Section Sub  Title", "lgx-themential"),
                "param_name" 	=> "sub_title",
                "value" 		=> "Please add your section Sub title Here.",
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Section Title", "lgx-themential"),
                "param_name" 	=> "icon_name",
                "value" 		=> "fa-life-ring",
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Title color", 'lgx-themential'),
                "param_name" 	=> "color",
                "value" 		=> array('Default'=>'black','White'=>'lgx-heading-brand'),
            )

        )

    ));
}