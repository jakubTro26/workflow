<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_event_about', 'lgx_event_about_function');

/**
 *  Title Section Short Code
 * @param $atts
 * @return string
 */

function lgx_event_about_function($atts)
{
    $about_page_id = '';
    $buy_url = '';
    $buy_urlr = '';
    $buy_text = esc_html__("Buy Ticket", "lgx-themential");
    $buy_textr = esc_html__("Read More", "lgx-themential");
    $lead_text_one = '';
    $lead_text = '';
    $about_page_content = '';
    extract(shortcode_atts(array(
        'about_page_id' =>  '', // About Page
        'lead_text_one'  => '', // Section Lead
        'lead_text'  => '', // Section Lead
        'about_page_content'  => '', // Section Lead
        'buy_url'    => '', // Buy Button URL
        'buy_urlr'    => '', // Buy Button URL
        'buy_text'    => '', // Buy Button URL
        'buy_textr'    => '', // Buy Button URL
    ), $atts));

    $aboutPage   = get_post($about_page_id);
 
    $lead_text_one = (!empty($lead_text_one) ? '<h2 class="hi-text">'.$lead_text_one.'</h2>' : '');
    $lead_text_html = (!empty($lead_text) ? '<h4 class="hi-text">'.$lead_text.'</h4>' : '');

    $output = '<div class="lgx-about-text">
                           '.$lead_text_one.'
                           '.$lead_text_html.'
                            <p class="text">'.$about_page_content.'</p>
                            <a class="lgx-btn lgx-btn-brand lgx-btn-big" href="'.$buy_url.'"><span>'.$buy_text.'</span></a>
                            <a class="lgx-btn lgx-btn-big" href="'.$buy_urlr.'"><span>'.$buy_textr.'</span></a>
                        </div>';
    return $output;
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("About Section", 'lgx-themential'),
        "base" => "lgx_event_about",
        "class" => "",
        "description" => esc_html__("Display About Section from Page.", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(


            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Section Title", "lgx-themential"),
                "param_name"    => "lead_text_one",
                "description" => esc_html__("Leav bank if don't want to show.", 'lgx-themential'),
                "value"         => "",
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Section Lead Text", "lgx-themential"),
                "param_name" 	=> "lead_text",
                "value" 		=> "",
            ),
            array(
                "type"          => "textarea",
                "heading"       => esc_html__("Section Short Content", 'lgx-themential'),
                "param_name"    => "about_page_content",
                "description" => esc_html__("Write section short description here.", 'lgx-themential'),
                "value"         => '',
            ),

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Left Button URL", "lgx-themential"),
                "param_name"    => "buy_url",
                "value"         => "",
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Left Button Text", "lgx-themential"),
                "param_name"    => "buy_text",
                "value"         => "",
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Right Button URL", "lgx-themential"),
                "param_name"    => "buy_urlr",
                "value"         => "",
            ),
            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Right Button Text", "lgx-themential"),
                "param_name" 	=> "buy_textr",
                "value" 		=> "",
            ),



        )

    ));
}