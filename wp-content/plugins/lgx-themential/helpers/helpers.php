<?php

/*
 *  Get Post Category
 */

function lgx_get_post_category() {
    $categories_array = array();
    $categories = get_categories();
    foreach( $categories as $category ){
        $categories_array[$category->name] = $category->term_id;
    }

    return $categories_array;
}

/**
 *  Get Speaker Post Array  for VC
 */


function lgx_get_speaker_id_list() {

    $args = array('post_type' => 'speaker', 'posts_per_page' => -1);

    $list = array();
    if( $data = get_posts($args)){

        foreach($data as $key){
            $list[$key->post_title] = $key->ID;
        }
    }else{
        $list[ esc_html__('No item found', 'lgx-themential')] = 0;
    }

    return $list ;
}


if ( ! function_exists( 'lgx_spilt_heading' ) ) {
    /**
     * Splited heading to use theme style
     *
     * @param $heading
     *
     * @return string
     */
    function lgx_spilt_heading( $heading, $type = '' ) {
        $heading_first = '';
        $heading_last  = '';
        $heading_str   = trim( $heading );
        if ( isset( $heading_str ) && ! empty( $heading_str ) ) {
            $heading_arr   = explode( " ", $heading_str );
            $heading_first = isset( $heading_arr[0] ) ? $heading_arr[0] : '';
            unset( $heading_arr[0] );
            $heading_last = implode( $heading_arr );
        }

        $output =  $heading_first . ' <span>' . $heading_last . '</span>';

        if($type == 'left') {
            $output = '<span>'. $heading_first . ' </span>' . $heading_last ;
        }
        return $output;
    }
}

/**
 *  Get Post
 */

// paste below code in your functions.php

function cmb2_lgx_get_post_options( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' => 10,
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}


function cmb2_get_speaker_post_options() {
    return cmb2_lgx_get_post_options( array( 'post_type' => 'speaker', 'numberposts' => -1 ) );
}

/**
 *
 * @return array
 */
function lgxThemeAllPage () {
    $allPage = get_pages( array( 	'post_type' => 'page','post_status' => 'publish', 'sort_order' => 'asc' ) );

    $pageArray = array();

    if(!empty ($allPage)) {
        foreach($allPage as $page)  {
            $pageArray[$page->post_title] = $page->ID;
        }
    }

    return $pageArray;
}


/**
 * @return array
 */

function lgxEventpricingCat(){

    $taxo = 'pricing_cat';
    $terms = get_terms($taxo); // Get all terms of a taxonomy
    $output = array();
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $output[$term->name] =$term->slug;
        }
    }
    return $output;
}




add_action( 'init', 'lgx_add_excerpts_to_pages' );

function lgx_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );

}



// remove empty p tag
add_filter( 'the_content', 'trade_remove_ptag' );
function trade_remove_ptag( $content ) {
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );
}

// admin area css
function trade_admin_styles() {
    ?>
    <style type="text/css">
        .rs-update-notice-wrap,
        .redux-timer,
        #wpfooter #footer-left,
        .redux-dev-qtip,
        .rAds span a img,
        .redux-notice,
        #redux_blast_1454922210,
        #admin_config{
            display: none !important;
        }
        .redux-notice-field{
            background: #666;
            color: #fff;
            border-color:#000
        }
        .redux-notice-field .redux-info-desc {
            margin-top: 10px;
        }
    </style>
    <?php
}
function lgxl_themential_point_hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    if(strlen($hex) == 3) {
        $r = hexdec($hex[0].$hex[0]);
        $g = hexdec($hex[1].$hex[1]);
        $b = hexdec($hex[2].$hex[2]);
    } else {
        $r = hexdec($hex[0].$hex[1]);
        $g = hexdec($hex[2].$hex[3]);
        $b = hexdec($hex[4].$hex[5]);
    }
    return implode(', ',array($r, $g, $b));
}


