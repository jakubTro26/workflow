<?php

function cookimize_fs()
{
    global  $cookimize_fs ;
    
    if ( !isset( $cookimize_fs ) ) {
        // Include Freemius SDK.
        require_once dirname( __FILE__ ) . '/freemius/start.php';
        $cookimize_fs = fs_dynamic_init( array(
            'id'             => '2333',
            'slug'           => 'easy-wp-cookie-popup',
            'type'           => 'plugin',
            'public_key'     => 'pk_4c3f34537d04709eff0922c07d81e',
            'is_premium'     => false,
            'has_addons'     => false,
            'has_paid_plans' => true,
            'menu'           => array(
            'slug'    => 'cookimize',
            'support' => false,
            'parent'  => array(
            'slug' => 'options-general.php',
        ),
        ),
            'is_live'        => true,
        ) );
    }
    
    return $cookimize_fs;
}

cookimize_fs();
do_action( 'cookimize_fs_loaded' );
function cookimize_cleanup()
{
    $options = array( 'cookimize_options', 'cookimize_style', 'cookimize_gdpr' );
    
    if ( is_multisite() ) {
        foreach ( $options as $option ) {
            delete_site_option( $option );
        }
    } else {
        foreach ( $options as $option ) {
            delete_option( $option );
        }
    }

}

cookimize_fs()->add_action( 'after_uninstall', 'cookimize_cleanup' );