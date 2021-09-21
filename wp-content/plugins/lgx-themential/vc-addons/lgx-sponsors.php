<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_sponsor', 'lgx_sponsor_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_sponsor_function($atts) {
    extract(shortcode_atts(array(
        'title' 	    =>	'Sponsor Title',
    ), $atts));

    ob_start(); ?>
    <div class="lgx-sponsored-wrapper">
        <div class="lgx-sponsored-title"><h3 class="sponsored-heading"><?php echo $title; ?></h3></div>
        <?php
        $lgx_sponsor_partner_items = array();
        if (class_exists('WPBakeryVisualComposerAbstract')){
        $lgx_sponsor_partner_items = vc_param_group_parse_atts( $atts['sponsor_images']);
        }
        $lgx_sponsor_partner_num = count($lgx_sponsor_partner_items);
        if($lgx_sponsor_partner_num > 0){
            for($i=0; $i<$lgx_sponsor_partner_num; $i++){
                $sponsor_logo = (isset($lgx_sponsor_partner_items[$i]['sponsor_image'])) ? $lgx_sponsor_partner_items[$i]['sponsor_image'] : '';
                $sponsor_url = (isset($lgx_sponsor_partner_items[$i]['sponsor_url'])) ? $lgx_sponsor_partner_items[$i]['sponsor_url'] : 'javascript:void(0)';
                $sponsor_image = wp_get_attachment_image_src($sponsor_logo,'img-size');
                $sponsor_img = $sponsor_image[0];
                ?>
                <div class="sponsors-area">
                    <div class="lgx-single-sponsor">
                        <a class="<?php echo $title; ?>" href="<?php echo $sponsor_url;?>" target="_blank" ><img src="<?php echo esc_url($sponsor_img);?>" alt="Sponsor"/></a>
                    </div> <!--//single-->
                </div><!--//area-->
            <?php
            }
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}



/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Sponsors", 'lgx-themential'),
        "base" => "lgx_sponsor",
        'icon' => 'icon_openiconic',
        "class" => "",
        "description" => esc_html__("Display Sponsors", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(
            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Sponsor Title", "lgx-themential"),
                "param_name" 	=> "title",
                "value" 		=> "Sponsor Title",
            ),
            array(
                'heading' => esc_html__('Add Sponsors Image', 'lgx-themential'),
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'sponsor_images',
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" 			=> "attach_image",
                        "heading" 		=> esc_html__("Upload Image", "lgx-themential"),
                        "param_name" 	=> "sponsor_image",
                        "value" 		=> "",
                    ),
                    array(
                        "type" 			=> "textfield",
                        "heading" 		=> esc_html__("URL", "lgx-themential"),
                        "param_name" 	=> "sponsor_url",
                        "value" 		=> "javascript:void(0)",
                    ),
                )
            )

        )

    ));
}