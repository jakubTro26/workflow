<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_address', 'lgx_address_function');

/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_address_function($atts) {
    extract(shortcode_atts(array(
        'title' 	    =>	'Address Title',
    ), $atts));

    ob_start(); ?>
    <div class="lgx-contact-box">
        <div class="address">
            <h3 class="title"><?php echo $title; ?></h3>
            <p>
                <?php
                $lgx_items = vc_param_group_parse_atts( $atts['address_texts']);
                $lgx_num = count($lgx_items);
                $count = 1;
                if($lgx_num > 0) {
                    for($i=0; $i<$lgx_num; $i++){
                        echo trim($lgx_items[$i]['address_text']);
                        echo ($lgx_num != $count) ? '<br>' : '';
                        $count ++;
                    }
                }
                ?>
            </p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Contact Address", 'lgx-themential'),
        "base" => "lgx_address",
        'icon' => 'icon_openiconic',
        "class" => "",
        "description" => esc_html__("Display Address for Contact Page", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(
            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Address Title", "lgx-themential"),
                "param_name" 	=> "title",
                "value" 		=> "Sponsor Title",
            ),
            array(
                'heading' => esc_html__('Add Address Info', 'lgx-themential'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'address_texts',
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" 			=> "textfield",
                        "heading" 		=> esc_html__("Address Info", "lgx-themential"),
                        "param_name" 	=> "address_text",
                        "value" 		=> "",
                    ),
                )
            )

        )

    ));
}