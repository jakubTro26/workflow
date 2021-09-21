<?php
/**
 * Theme Core Functions
 *
 *************************************************************************/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/************************************************************************
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *************************************************************************/

function lgx_event_point_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'lgx_event_point_content_width', 640 );
}
add_action( 'after_setup_theme', 'lgx_event_point_content_width', 0 );


/************************************************************************
 * Helpers Function
 *************************************************************************/

if ( file_exists(get_template_directory(). '/lib/theme-main-functions/_helpers.php')) {
    require get_template_directory() . '/lib/theme-main-functions/_helpers.php';
}


/************************************************************************
 * Enqueue Theme Assets (Scripts & Styles)
 *************************************************************************/

if ( file_exists(get_template_directory() . '/lib/theme-main-functions/_enqueue-assets.php')) {
    require get_template_directory() . '/lib/theme-main-functions/_enqueue-assets.php';
}



/************************************************************************
 * register  Function
 *************************************************************************/

if ( file_exists(get_template_directory(). '/lib/theme-main-functions/_register.php')) {

    require get_template_directory() . '/lib/theme-main-functions/_register.php';
}
/************************************************************************
 * nav walker function
 *************************************************************************/

if ( file_exists(get_template_directory(). '/lib/theme-main-functions/_nav-walker.php')) {

    require get_template_directory() . '/lib/theme-main-functions/_nav-walker.php';
}


/**
 * Visual Composer addon for speaker
 *
 *
 */

if(function_exists ('lgx_get_speaker_id_list')) {

    if (class_exists('WPBakeryVisualComposerAbstract')) {
        vc_map(array(
            "name" => esc_html__("Speaker", 'lgx-event-point'),
            "base" => "lgx_speaker",
            // 'icon' => 'icon_travel_info',
            "class" => "",
            "description" => esc_html__("Display Speaker", 'lgx-event-point'),
            "category" => esc_html__('Event Point', 'lgx-event-point'),
            "params" => array(
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Select a Speaker", 'lgx-event-point'),
                    "param_name"    => "id",
                    "value"         => lgx_get_speaker_id_list()
                ),
            )
        ));
    }
}
