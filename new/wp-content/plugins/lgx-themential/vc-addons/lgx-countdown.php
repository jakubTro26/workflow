<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_countdown', 'lgx_countdown_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_countdown_function($atts) {
    extract(shortcode_atts(array(
        'circl_coun_date'     => '' 
    ), $atts));

    ob_start(); ?>
    <div id="lgx-circular" class="lgx-circular">
        <div class="circular-inner">
            <div id="circular-countdown" data-date="<?php echo esc_attr($circl_coun_date);?>" ></div>
        </div>
    </div>
    <?php
    return ob_get_clean();
 
}


// VC Addons goes to theme
/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Cicrcle Countdown", 'lgx-themential'),
        "base" => "lgx_countdown",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Cicrcle Countdown", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Input Date", "lgx-themential"),
                "param_name"    => "circl_coun_date",
                "value"         => '',
                "description"   => 'Input estimated date here. Date Formate : "2018-01-20"'
            ), 


        )
    ));
}