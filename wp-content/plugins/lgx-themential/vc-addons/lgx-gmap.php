<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_lgmap', 'lgx_lgmap_function');

 
/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_lgmap_function($atts) {
    extract(shortcode_atts(array(
        'lgx_map_type'     => 'default',
        'lgx_map_lat'      => '40.7127',
        'lgx_map_long'     => '74.0059',
        'lgx_map_jom'      => '8',
        'lgx_map_pop_ttl'  => 'Eventpoint',
        'lgx_map_pop_txt'  => '121 King St, Melbourne VIC 3000, Australia',
        'lgx_map_icon'     => get_template_directory_uri().'/assets/img/map/map-icon.png'  
    ), $atts));
    
        $lgx_map_icon_id = wp_get_attachment_image_src($lgx_map_icon,'lgx-img');
        $lgx_map_icon_iup = $lgx_map_icon_id[0]; 
    if(!empty($lgx_map_icon_iup)) {
    }else{
        $lgx_map_icon_iup = $lgx_map_icon; 
    }

    ob_start(); ?> 
        <div class="innerpage-section">
            <div class="lgxmapcanvas map-canvas-<?php echo esc_attr($lgx_map_type);?>" id="map_canvas"> </div>
        </div>
        <script> 
           jQuery(document).ready(function($){
                if (typeof google != 'undefined') {
                    //for Default  map
                    if ($('.map-canvas-default').length) {
                        $(".map-canvas-default").googleMap({
                            zoom: <?php echo esc_js($lgx_map_jom); ?>, // Initial zoom level (optiona
                            coords: [<?php echo esc_js($lgx_map_lat); ?>,<?php echo esc_js($lgx_map_long); ?>], // Map center (optional)
                            type: "ROADMAP", // Map type (optional),
                            mouseZoom: false
                        });

                        //for marker
                        $(".map-canvas-default").addMarker({
                            coords: [<?php echo esc_js($lgx_map_lat); ?>,<?php echo esc_js($lgx_map_long); ?>], // GPS coords
                            title: '<?php echo esc_js($lgx_map_pop_ttl); ?>',
                            text: '<?php echo esc_js($lgx_map_pop_txt); ?>',
                            icon: '<?php echo esc_url($lgx_map_icon_iup); ?>'
                        });
                    }

                    // FOR DARK MAP
                    if ($('.map-canvas-dark').length) {
                        $(".map-canvas-dark").googleMap({
                            zoom: <?php echo esc_js($lgx_map_jom); ?>, // Initial zoom level (optiona
                            coords: [<?php echo esc_js($lgx_map_lat); ?>,<?php echo esc_js($lgx_map_long); ?>], // Map center (optional)
                            type: "HYBRID", // Map type (optional),
                            mouseZoom: false
                        });

                        //for marker
                        $(".map-canvas-dark").addMarker({
                            coords: [<?php echo esc_js($lgx_map_lat); ?>,<?php echo esc_js($lgx_map_long); ?>], // GPS coords
                            title: '<?php echo esc_js($lgx_map_pop_ttl); ?>',
                            text: '<?php echo esc_js($lgx_map_pop_txt); ?>',
                            icon: '<?php echo esc_url($lgx_map_icon_iup); ?>'
                        });
                    }
                }
            });

        </script>

    <?php

    return ob_get_clean();
 
}
 

 

// VC Addons goes to theme
/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("LGX Map", 'lgx-themential'),
        "base" => "lgx_lgmap",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display LGX Map", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Latitude", "lgx-themential"),
                "param_name"    => "lgx_map_lat",
                "value"         => '',
                "description"   => 'Input latitude here.'
            ), 
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Longitude", "lgx-themential"),
                "param_name"    => "lgx_map_long",
                "value"         => '',
                "description"   => 'Input longitude here.'
            ), 

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Zoom", "lgx-themential"),
                "param_name"    => "lgx_map_jom",
                "value"         => '',
                "description"   => 'Input zoom value here. Default is 8'
            ), 

            array(
                "type"          => "textfield",
                "heading"       => esc_html__("PopUp Title", "lgx-themential"),
                "param_name"    => "lgx_map_pop_ttl",
                "value"         => '',
                "description"   => 'Input title here. It will display when click on the map icon.'
            ), 
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("PopUp Text", "lgx-themential"),
                "param_name"    => "lgx_map_pop_txt",
                "value"         => '',
                "description"   => 'Input title here. It will display when click on the map icon.'
            ), 
            array(
                "type"          => "attach_image",
                "heading"       => esc_html__("Map Icon", "lgx-themential"),
                "param_name"    => "lgx_map_icon", 
                "description"   => 'Uplaod a map icon.'
            ), 
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Map Style", "lgx-themential"),
                "param_name"    => "lgx_map_type",
                "value"         => array(
                    esc_html__("Default", "lgx-themential") => 'default',
                    esc_html__("Dark", "lgx-themential") => 'dark'
                ), 
                "description"   => "Select a style."
            ), 


        )
    ));
}