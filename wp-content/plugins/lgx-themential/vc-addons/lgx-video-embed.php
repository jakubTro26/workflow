<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_video_embed', 'lgx_video_embed_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_video_embed_function($atts) {
    extract(shortcode_atts(array(
        'video_id' 	=>	'P6_WPjl2d3A',
        'video_bg_img' => '',
        'top_padding' => 10,
        'bottom_padding' => 10,

    ), $atts));


    $image_url = '';
    $bg_style = '';
    if(!empty ($atts['video_bg_img'])) {
        $img = wp_get_attachment_image_src($atts['video_bg_img'], true);
        $image_url = $img[0];
    }

    if(!empty ($image_url)) {
        $bg_style = 'background: url('.$image_url.') center center no-repeat;';
    }




    $output = '
    <div class="lgx-video" style="'.$bg_style.'padding:'.floatval($top_padding).'rem 0 '.floatval($bottom_padding).'rem;">
        <div class="lgx-inner">
            <div class="lgx-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="video-area">
                            <div class="video-icon">
                                <span class="play-border"><a id="myModalLabel" href="#" data-toggle="modal" data-target="#lgx-modal"><img src="'.plugins_url().'/lgx-themential/assets/images/play.png" alt="play icon"/></a></span>
                            </div>
                            <!-- Modal-->
                            <div id="lgx-modal" class="modal fade lgx-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                                    aria-hidden="true">&times;</span><span class="sr-only">'.esc_html__('Close', 'lgx-themential').'</span></button>

                                        </div>
                                        <div class="modal-body">
                                            <iframe id="modalvideo" src="https://www.youtube.com/embed/'.$video_id.'" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- //.Modal-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
';

    return $output;

}


/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Video Section", 'lgx-themential'),
        "base" => "lgx_video_embed",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Youtube Video", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Youtube Video ID", "lgx-themential"),
                "description" => esc_html__("Please add Youtube Video ID", 'lgx-themential'),
                "param_name" 	=> "video_id",
                "value" 		=> "P6_WPjl2d3A",
            ),

            array(
                "type" 			=> "attach_image",
                "heading" 		=> esc_html__("Upload Background Image", "lgx-themential"),
                "param_name" 	=> "video_bg_img",
                "value" 		=> "",
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Top Padding in REM", "lgx-themential"),
                "param_name" 	=> "top_padding",
                "value" 		=> 10,
            ),


            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Bottom Padding in REM", "lgx-themential"),
                "param_name" 	=> "bottom_padding",
                "value" 		=> 10,
            ),


        )

    ));
}