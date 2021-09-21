<?php
add_filter('cmb2_meta_boxes', 'lgx_custom_meta_box');
function lgx_custom_meta_box(array $meta_boxes) {

    $prefix   = '__lgx__';

    $meta_boxes['lgx-speaker'] = array(
        'id'           => 'lgxspeaker',
        'title'        => esc_html__('Add Custom Information', 'lgx-themential'),
        'object_types' => array('speaker'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => esc_html__('Company Name', 'lgx-themential'),
                'desc' => esc_html__('Please Company Name', 'lgx-themential'),
                'id'   => $prefix . 'speaker-company',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Designation', 'lgx-themential'),
                'desc' => esc_html__('Please Add Designation', 'lgx-themential'),
                'id'   => $prefix . 'speaker-designation',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Twitter Url', 'lgx-themential'),
                'desc' => esc_html__('Please Add Twitter Profile Url ', 'lgx-themential'),
                'id'   => $prefix . 'speaker-twitter-url',
                'type' => 'text_url'
            ),
            array(
                'name' => esc_html__('Facebook Url', 'lgx-themential'),
                'desc' => esc_html__('Please Add Facebook Profile Url ', 'lgx-themential'),
                'id'   => $prefix . 'speaker-facebook-url',
                'type' => 'text_url'
            ),
            array(
                'name' => esc_html__('Instagram Url', 'lgx-themential'),
                'desc' => esc_html__('Please Add Instagram Profile Url ', 'lgx-themential'),
                'id'   => $prefix . 'speaker-instagram-url',
                'type' => 'text_url'
            ),
            array(
                'name' => esc_html__('Linkedin Url', 'lgx-themential'),
                'desc' => esc_html__('Please Add Linkedin Profile Url ', 'lgx-themential'),
                'id'   => $prefix . 'speaker-linkedin-url',
                'type' => 'text_url'
            ),

        )
    );//Single Box End

    $meta_boxes['lgx-testimonial'] = array(
        'id'           => 'lgxtestimonial',
        'title'        => esc_html__('Add Client Information', 'lgx-themential'),
        'object_types' => array('testimonial'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => esc_html__('Client Name', 'lgx-themential'),
                'desc' => esc_html__('Please Add Client Name.', 'lgx-themential'),
                'id'   => $prefix . 'client-name',
                'type' => 'text'
            ),

            array(
                'name' => esc_html__('Client Designation', 'lgx-themential'),
                'desc' => esc_html__('Please Add Client Designation', 'lgx-themential'),
                'id'   => $prefix . 'client-designation',
                'type' => 'text'
            ),
        )
    );//Single Box End

    $meta_boxes['lgx-post-format'] = array(
        'id'           => 'lgxpostformat',
        'title'        => esc_html__('Post Format', 'lgx-themential'),
        'object_types' => array('post'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => esc_html__('Video Url', 'lgx-themential'),
                'desc' => esc_html__('Put youtube video embeded src here.', 'lgx-themential'),
                'id'   => $prefix . 'pformat-vdo',
                'type' => 'text'
            ), 
            array(
                'name' => esc_html__('Audio Url', 'lgx-themential'),
                'desc' => esc_html__('Put soundclud embeded src here.', 'lgx-themential'),
                'id'   => $prefix . 'pformat-ado',
                'type' => 'textarea_small'
            ), 
            array(
                'name' => esc_html__('Quote Text', 'lgx-themential'),
                'desc' => esc_html__('Put quote text here.', 'lgx-themential'),
                'id'   => $prefix . 'pformat-qte',
                'type' => 'textarea'
            ), 
            array(
                'name' => esc_html__('Gallery', 'lgx-themential'),
                'desc' => esc_html__('Upload Gallery Images Here. Upload max 3 images accoridng to desing.', 'lgx-themential'),
                'id'   => $prefix . 'pformat-glr',
                'type' => 'file_list'
            ), 
        )
    );//Single Box End

    $meta_boxes['lgx-schedule'] = array(
        'id'           => 'lgxschedule',
        'title'        => __('Add Schedule Information', 'lgx-themential'),
        'object_types' => array('schedule'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => __('Time', 'lgx-themential'),
                'desc' => __('Please Add Time', 'lgx-themential'),
                'id'   => $prefix . 'schedule-time',
                'type' => 'text'
            ),

            array(
                'name'       => __( 'Select First Speaker', 'lgx-themential' ),
                'desc'       => __( 'Please Select First Speaker', 'lgx-themential' ),
                'id'         => $prefix . 'schedule-speaker',
                'type'       => 'select',
                'options_cb' => 'cmb2_get_speaker_post_options',
            ),

            array(
                'name' => esc_html__('Show  Second Speaker', 'lgx-themential'),
                'desc' => esc_html__('Second Speaker in frontend.', 'lgx-themential'),
                'id'   => $prefix . 'schedule-speaker_two_show',
                'type' => 'select',
                'options' => array(
                    'no'   => __( 'NO', 'lgx-themential' ),
                    'yes'    => __( 'Yes', 'lgx-themential' ),
                ),
                'default' => 'No',
            ),

            array(
                'name'       => __( 'Select Second Speaker', 'lgx-themential' ),
                'desc'       => __( 'Please Select Second Speaker', 'lgx-themential' ),
                'id'         => $prefix . 'schedule-speaker_two',
                'type'       => 'select',
                'options_cb' => 'cmb2_get_speaker_post_options',
            ),
        )
    );//Single Box End


    $meta_boxes['lgx-page'] = array(
        'id'           => 'lgxpage',
        'title'        => esc_html__('Page Settings', 'lgx-themential'),
        'object_types' => array('page'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name'    =>  esc_html__( 'Header Style', 'lgx-themential' ),
                'id'      => $prefix.'header_type',
                'type'    => 'radio_inline',
                'default' => '3',
                'options' => array(
                    '1'     => esc_html__( 'Default', 'lgx-themential' ),
                    '2'     => esc_html__( 'Banner Big', 'lgx-themential' ),
                    '3'     => esc_html__( 'Banner Small', 'lgx-themential' ),
                    '4'     => esc_html__( 'Typed', 'lgx-themential' ),
                    '5'     => esc_html__( 'Slider', 'lgx-themential' ),
                    '6'     => esc_html__( 'Content Slider', 'lgx-themential' ),
                    '7'     => esc_html__( 'Gradiant', 'lgx-themential' ),
                    '8'     => esc_html__( 'Revolution Slider', 'lgx-themential' ),
                    '9'     => esc_html__( 'Christmas', 'lgx-themential' )
                )
            ),

            array(
                'name'             =>  esc_html__('Rev Slider Alias','lgx-themential' ), 
                'id'               => $prefix.'rev_slidr_alias',
                'type'             => 'select',
                'options'          => cmb2_get_rev_sliders(),
                'default'          => '',
                'desc'             => esc_html__( 'Select any One, Which One You want to display','lgx-themential' ), 
            ),
     
            array(
                'name'   =>  esc_html__( 'Banner Image Bottom', 'lgx-themential' ),
                'id'     => $prefix.'page_banner',
                'desc'   => esc_html__( 'Upload page banner','lgx-themential' ),
                'type'   => 'file',
            ),
            array(
                'name'   =>  esc_html__( 'Banner Image Top', 'lgx-themential' ),
                'id'     => $prefix.'page_banner_top',
                'desc'   => esc_html__( 'Upload page banner','lgx-themential' ),
                'type'   => 'file',
            ),
            array(
                'name'   =>  esc_html__( 'Banner Title', 'lgx-themential' ),
                'id'     => $prefix.'page_banner_title',
                'desc'   => esc_html__( 'Write page title here.','lgx-themential' ),
                'type'   => 'text',
            )
        )
    );//Single Box End

    $meta_boxes['lgx-pagesidebar'] = array(
        'id'           => 'lgxpagesidebar',
        'title'        => esc_html__('Sidebar Settings', 'lgx-themential'),
        'object_types' => array('page'), // Tells CMB to use user_meta vs post_meta
        'context'      => 'side',
        'fields'       => array(
            array(
                'name'   =>  esc_html__( 'Sidebar Layout', 'lgx-themential' ),
                'desc'   => esc_html__( 'Select sidebar from here.','lgx-themential' ),
                'id'     => $prefix . 'page_sidebar',
                'type'     => 'select',
                'default'  => 'right',
                'options'  => array(
                    'left'    => esc_html__( 'Left Sidebar', 'lgx-themential' ),
                    'right'   => esc_html__( 'Right Sidebar', 'lgx-themential' ),
                    'fullw'   => esc_html__( 'Box Layout', 'lgx-themential' ),
                    'fulls'   => esc_html__( 'Full Width', 'lgx-themential' )
                )
            ),
        )
    );//Single Box End

    $meta_boxes['lgx-pricing'] = array(
        'id'           => 'lgxpricing',
        'title'        => __('Pricing Box Makes Recommended', 'lgx-themential'),
        'object_types' => array('pricing'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => __('Sub Title', 'lgx-themential'),
                'desc' => __('Please Add Sub Title', 'lgx-themential'),
                'id'   => $prefix . 'pricing-sub-title',
                'type' => 'text'
            ),
            array(
                'name' => __('Ticket Price', 'lgx-themential'),
                'desc' => __('Please Add Ticket Price ($)', 'lgx-themential'),
                'id'   => $prefix . 'pricing-price',
                'type' => 'text'
            ),

            array(
                'name' => __('Currency Symbol', 'lgx-themential'),
                'desc' => __('Please Add Currency Symbol in Text', 'lgx-themential'),
                'id'   => $prefix . 'pricing-symbol',
                'default'=>'$',
                'type' => 'text'
            ),
            array(
                'name' => __('Buy URL', 'lgx-themential'),
                'desc' => __('Please Add Ticket URL', 'lgx-themential'),
                'id'   => $prefix . 'pricing-url',
                'type' => 'text_url'
            ),
            array(
                'name'    =>  __('Pricing Box', 'lgx-themential'),
                'id'      => $prefix . 'pricing-recommended',
                'type'    => 'radio_inline',
                'options' => array(
                    'recommended' => __( 'Recommended', 'lgx-themential' ),
                    'none'   => __( 'None', 'lgx-themential' ),
                ),
                'default' => 'none',
            ),
        )
    );//Single Box End



    $meta_boxes['lgx-slider'] = array(
        'id'           => 'lgxslider',
        'title'        => esc_html__('Slider Information', 'lgx-themential'),
        'object_types' => array('slider'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => esc_html__('Sub Title', 'lgx-themential'),
                'desc' => esc_html__('Write Subtitle here.', 'lgx-themential'),
                'id'   => $prefix . 'sldr-sbttl',
                'type' => 'text'
            ), 
            array(
                'name' => esc_html__('Sub Title 2', 'lgx-themential'),
                'desc' => esc_html__('Write Subtitle here.', 'lgx-themential'),
                'id'   => $prefix . 'sldr-sbttl-2',
                'type' => 'textarea'
            ) 
        )
    );//Single Box End

    $meta_boxes['lgx-slider-2'] = array(
        'id'           => 'lgxslider2',
        'title'        => esc_html__('Slider Setings', 'lgx-themential'),
        'object_types' => array('slider'), // Tells CMB to use user_meta vs post_meta
        'fields'       => array(
            array(
                'name' => esc_html__('Sub Title', 'lgx-themential'),
                'desc' => esc_html__('Write Subtitle here.', 'lgx-themential'),
                'id'   => $prefix . 'sldr-pos',
                'type' => 'select',
                'options' => array(
                    'left'    => __( 'Left', 'lgx-themential' ),
                    'right'   => __( 'Right', 'lgx-themential' ),
                    'center'  => __( 'Center', 'lgx-themential' ),
                ),
                'default' => 'left',
            ) 
        )
    );//Single Box End

    return $meta_boxes;
}


 
function cmb2_get_rev_sliders() { 
    global $wpdb; 
    $lgx_id = 99999;
    $lgx_rev_tbl_name = esc_sql( 'revslider_sliders' );
    $lgx_rev_tbl = $wpdb->prefix . $lgx_rev_tbl_name; 
    $lgx_rs = $wpdb->get_results( $wpdb->prepare("SELECT alias FROM $lgx_rev_tbl WHERE id!=%d ORDER BY id ASC LIMIT 999", $lgx_id) );
    $lgx_revsliders = array();
    if ($lgx_rs) {
        foreach ( $lgx_rs as $lgx_slider ) {
            $lgx_revsliders[$lgx_slider->alias] = $lgx_slider->alias;
        }
    } else {
        $lgx_revsliders["No sliders found"] = esc_html__('No Alias found','lgx');
    } 
    return $lgx_revsliders;
}
 