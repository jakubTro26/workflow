<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/**
 * Enqueue Themential scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'lgx_themential_scripts' );

if(!function_exists('lgx_themential_scripts')){
    function lgx_themential_scripts() {

        //LOAD STYLE SHEET
        wp_enqueue_style('lgx-magnific-style',plugins_url('css/magnific-popup.css',__FILE__));
        wp_enqueue_style('themential-style',plugins_url('css/themential-style.css',__FILE__));


        //LOAD SCRIPT
        wp_enqueue_script('lgx-magnific-min',plugins_url('js/jquery.magnific-popup.min.js',__FILE__), array('jquery'));
        wp_enqueue_script('themential-script',plugins_url('js/themential-script.js',__FILE__), array('jquery'));

    }
}

