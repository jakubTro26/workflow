<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/************************************************************************
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 *************************************************************************/

if ( ! function_exists( 'lgx_event_point_setup' ) ) :

    function lgx_event_point_setup() {

        //Text Domain
        load_theme_textdomain( 'lgx-event-point', get_template_directory() . '/languages' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );

        add_image_size( 'lgx-event-point-thumbnails', 200, 200, true );
        add_image_size( 'lgx-event-point-blog', 540, 260, true );
        add_image_size( 'lgx-event-point-sblog', 740, 360, true );


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'mainmenu' => esc_html__( 'Main Menu', 'lgx-event-point' ),
        ) );

        add_theme_support( 'post-formats', array( 'audio','gallery','image','link','quote','video'));
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form'));
        add_theme_support( 'automatic-feed-links' );

        add_editor_style('');

        if ( ! isset( $content_width ) )
            $content_width = 660;

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style( array( 'assets/css/editor-style.css', lgx_event_point_fonts_url() ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'lgx_event_point_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'video', 'quote', 'gallery', 'audio'
        ) );


    }
endif;
add_action( 'after_setup_theme', 'lgx_event_point_setup' );


/**
 * Enqueue scripts and styles.
 */
function lgx_event_point_scripts() {
    global $lgx_event_point;  
    $lgx_event_point_opt = new LgxFrameworkOpt();
    $lgx_event_point_banner = $lgx_event_point_opt->lgx_event_point_page_banner();
    $lgx_event_map_apikey = (!empty($lgx_event_point['lgx_map_key'])) ? $lgx_event_point['lgx_map_key'] : '';
    // LOAD FONTS
    wp_enqueue_style( 'lgx-event-point-fonts', lgx_event_point_fonts_url(), array(), '1.0.0' );


    //LOAD STYLE SHEET
    wp_enqueue_style( 'bootstrap', LGXEVENTPOINT_URI . 'assets/vendor/bootstrap/css/bootstrap.min.css' );
    if(is_rtl()){
        wp_enqueue_style( 'bootstrap-rtl', LGXEVENTPOINT_URI . 'assets/vendor/bootstrap/css/bootstrap-rtl.css' );
    }

    wp_enqueue_style( 'font-awesome', LGXEVENTPOINT_URI . 'assets/vendor/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'magnific-popup', LGXEVENTPOINT_URI . 'assets/vendor/maginificpopup/magnific-popup.css' );
    wp_enqueue_style( 'owl-carousel', LGXEVENTPOINT_URI . 'assets/vendor/owlcarousel/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-theme-default', LGXEVENTPOINT_URI . 'assets/vendor/owlcarousel/owl.theme.default.min.css' );
    wp_enqueue_style( 'animate', LGXEVENTPOINT_URI . 'assets/css/animate.css' );
    wp_enqueue_style( 'lgx-slider', LGXEVENTPOINT_URI . 'assets/css/slider.css' );
    wp_enqueue_style( 'lgx-event-point-main-style', LGXEVENTPOINT_URI . 'assets/css/main-style.min.css' );
    wp_enqueue_style( 'lgx-event-point-responsive', LGXEVENTPOINT_URI . 'assets/css/responsive.css' );
    wp_enqueue_style( 'lgx-event-point-style', get_stylesheet_uri() );


    //LOAD SCRIPT
    wp_enqueue_script( 'lgx-event-point-modernizr', LGXEVENTPOINT_SCRIPT . 'modernizr-2.8.3.min.js', array(), '1.0', false );

    wp_enqueue_script( 'bootstrap', LGXEVENTPOINT_VENDOR . 'bootstrap/js/bootstrap.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'lgx-slider', LGXEVENTPOINT_URI . 'assets/js/slider.js', array(), '1.0', true );
    wp_enqueue_script( 'smooth-scroll', LGXEVENTPOINT_VENDOR . 'jquery.smooth-scroll.min.js', array(), '1.0', true );
    wp_enqueue_script( 'validate', LGXEVENTPOINT_VENDOR . 'jquery.validate.js', array(), '1.0', true );
    wp_enqueue_script( 'map-api', 'https://maps.googleapis.com/maps/api/js?key='.$lgx_event_map_apikey, array(), '', false );
    wp_enqueue_script( 'gmap', LGXEVENTPOINT_VENDOR . 'gmap/jquery.googlemap.js', array(), '1.0', true );
    wp_enqueue_script( 'maginificpopup', LGXEVENTPOINT_VENDOR . 'maginificpopup/jquery.magnific-popup.min.js', array(), '1.0', true );
    wp_enqueue_script( 'owlcarousel', LGXEVENTPOINT_VENDOR . 'owlcarousel/owl.carousel.min.js', array(), '1.0', true );
    wp_enqueue_script( 'countdown', LGXEVENTPOINT_VENDOR . 'countdown.js', array(), '1.0', true ); 
    wp_enqueue_script( 'TimeCircles', LGXEVENTPOINT_VENDOR . 'timer/TimeCircles.js', array(), '1.0', true ); 
    wp_enqueue_script( 'easing', LGXEVENTPOINT_VENDOR . 'jquery.easing.min.js', array(), '1.0', true );
    wp_enqueue_script( 'lgx-event-point-typed', LGXEVENTPOINT_VENDOR . 'typed/typed.min.js', array(), '1.0', true );

    wp_enqueue_script( 'lgx-event-point-script', LGXEVENTPOINT_SCRIPT . 'lgx-theme-main.js?v=1', array(), '1.0', true );
    wp_enqueue_script( 'lgx-event-point-navigation', LGXEVENTPOINT_SCRIPT . 'navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'lgx-event-point-skip-link-focus-fix',  LGXEVENTPOINT_SCRIPT .'skip-link-focus-fix.js', array(), '20151215', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    $lgx_event_point_custom_css = ""; 
    if(isset($lgx_event_point['logo-width']) && !empty($lgx_event_point['logo-width'])){
        $lgx_event_point_logo_wd = $lgx_event_point['logo-width'];
        $lgx_event_point_custom_css .= "
            .lgx-header .lgx-navbar .lgx-logo a img{
                width:{$lgx_event_point_logo_wd};
            }
        ";
    } 
    if(isset($lgx_event_point['dflt-banrimg']['url']) && !empty($lgx_event_point['dflt-banrimg']['url'])){
        $lgx_event_point_dflt_bgimg = $lgx_event_point['dflt-banrimg']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-banner.default{
                background:url({$lgx_event_point_dflt_bgimg}) top center no-repeat fixed;
            }
        ";
    }  
    if(isset($lgx_event_point['dflt-banrimg-top']['url']) && !empty($lgx_event_point['dflt-banrimg-top']['url'])){
        $lgx_event_point_dflt_bgimgt = $lgx_event_point['dflt-banrimg-top']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-banner.default .lgx-banner-style{
                background:url({$lgx_event_point_dflt_bgimgt}) top left no-repeat;
            }
        ";
    }  

    // big banner gradiant 
    $lgx_event_point_big_bnr_left_grad = (!empty($lgx_event_point['anthr-gradint1'])) ? $lgx_event_point['anthr-gradint1'] : '#2e3439';
    $lgx_event_point_big_bnr_right_grad = (!empty($lgx_event_point['anthr-gradint2'])) ? $lgx_event_point['anthr-gradint2'] : '#dc4e41';
    $lgx_event_point_big_bnr_left_opct = (!empty($lgx_event_point['anthr-grd-op-l'])) ? $lgx_event_point['anthr-grd-op-l'] : '.8';
    $lgx_event_point_big_bnr_right_opct = (!empty($lgx_event_point['anthr-grd-op-r'])) ? $lgx_event_point['anthr-grd-op-r'] : '.7';
    $lgx_event_point_big_bnr_clr_pos = (!empty($lgx_event_point['anthr-gradint-slide'])) ? $lgx_event_point['anthr-gradint-slide'] : '200';

    $lgx_event_point_grd_left = lgx_event_point_hex2rgb($lgx_event_point_big_bnr_left_grad);
    $lgx_event_point_grd_right = lgx_event_point_hex2rgb($lgx_event_point_big_bnr_right_grad);
    $lgx_event_point_custom_css .= "
        .lgx-banneranother .lgx-banner-style{
            background: linear-gradient(to right,rgba({$lgx_event_point_grd_left},{$lgx_event_point_big_bnr_left_opct}) 0,rgba({$lgx_event_point_grd_right},{$lgx_event_point_big_bnr_right_opct}) {$lgx_event_point_big_bnr_clr_pos}%);
        }
    ";
     

    if(isset($lgx_event_point['anthr-banrimg']['url']) && !empty($lgx_event_point['anthr-banrimg']['url'])){
        $lgx_event_point_anthr_bgimg = $lgx_event_point['anthr-banrimg']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-banneranother{
                background:url({$lgx_event_point_anthr_bgimg}) top center no-repeat fixed;
                background-size:cover;
            }
        ";
    }  
    if(isset($lgx_event_point['anthr-banrimg1']['url']) && !empty($lgx_event_point['anthr-banrimg1']['url'])){
        $lgx_event_point_anthr_bgimg1 = $lgx_event_point['anthr-banrimg1']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-banneranother .lgx-inneranother{
                background:url({$lgx_event_point_anthr_bgimg1}) bottom right no-repeat;
            }
        ";
    }  
    if(isset($lgx_event_point['dflt-overly']) && !empty($lgx_event_point['dflt-overly'])){

        if(isset($lgx_event_point['dflt-overly-opcty']) && !empty($lgx_event_point['dflt-overly-opcty'])){
            $lgx_event_point_dflt_overly_opcty = $lgx_event_point['dflt-overly-opcty']; 
        }else{
             $lgx_event_point_dflt_overly_opcty = '.9'; 
        }
        $lgx_event_point_dflt_overly = $lgx_event_point['dflt-overly'];
        $lgx_event_point_dflt_overly = lgx_event_point_hex2rgb($lgx_event_point_dflt_overly);
        $lgx_event_point_custom_css .= "
            .lgx-banner.default .lgx-inner{
                background:rgba({$lgx_event_point_dflt_overly},{$lgx_event_point_dflt_overly_opcty});
            }
        ";
    }  
    if( 1==isset($lgx_event_point['footer-bg-type']) ){
        $lgx_event_point_footer_overly_clr = (!empty($lgx_event_point['footer-bg-color']['rgba'])) ? $lgx_event_point['footer-bg-color']['rgba'] : ''; 
        $lgx_event_point_custom_css .= "
            .lgx-footer .lgx-footer-bg{ 
                background: {$lgx_event_point_footer_overly_clr};
            }
        ";
    }  

    if(  0==isset($lgx_event_point['footer-bg-type']) ){ 
        $lgx_event_point_footer_overly_clr = (!empty($lgx_event_point['bg-img-up']['url'])) ? $lgx_event_point['bg-img-up']['url'] : get_template_directory_uri().'/assets/images/footer-bg.jpg';
        $lgx_event_point_custom_css .= "
            .lgx-footer .lgx-footer-bg{  
                background: url({$lgx_event_point_footer_overly_clr}) bottom left no-repeat;
            }
        ";
    }  

    // blog banner
    if(isset($lgx_event_point['blog-overly']) && !empty($lgx_event_point['blog-overly'])){

        if(isset($lgx_event_point['blog-overly-opcty']) && !empty($lgx_event_point['blog-overly-opcty'])){
            $lgx_event_point_blog_overly_opcty = $lgx_event_point['blog-overly-opcty']; 
        }else{
             $lgx_event_point_blog_overly_opcty = '.9'; 
        }
        $lgx_event_point_blog_overly = $lgx_event_point['blog-overly'];
        $lgx_event_point_blog_overly = lgx_event_point_hex2rgb($lgx_event_point_blog_overly);
        $lgx_event_point_custom_css .= "
            .lgx-banner-inner.blog .lgx-inner{
                background:rgba({$lgx_event_point_blog_overly},{$lgx_event_point_blog_overly_opcty});
            }
        ";
    }  

    if(is_page()){
        $lgc_page_banner = get_post_meta(get_the_ID(),'__lgx__page_banner',true);
        if($lgc_page_banner !=''){ 
            $lgx_event_point_custom_css .= "
                .lgx-banner-inner.blog{
                    background:url({$lgc_page_banner}) bottom center no-repeat fixed;
                    background-size: cover;
                }
            ";
        } 
        $lgc_page_banner_tp = get_post_meta(get_the_ID(),'__lgx__page_banner_top',true);
        if($lgc_page_banner_tp !=''){ 
            $lgx_event_point_custom_css .= "
                .lgx-banner-inner.blog .lgx-banner-inner{
                    background:url({$lgc_page_banner_tp}) top left no-repeat; 
                }
            ";
        }  
    }else{ 
        if(is_search()){
            if(isset($lgx_event_point['srch-banner']['url']) && !empty($lgx_event_point['srch-banner']['url'])){
                $lgx_event_point_banner_img = $lgx_event_point['srch-banner']['url'];
                $lgx_event_point_custom_css .= "
                    .lgx-banner-inner.blog{
                        background:url({$lgx_event_point_banner_img}) bottom center no-repeat fixed;
                        background-size: cover;
                    }
                ";
            } 
            if(isset($lgx_event_point['srch-banner-top']['url']) && !empty($lgx_event_point['srch-banner-top']['url'])){
                $lgx_event_point_banner_imgt = $lgx_event_point['srch-banner-top']['url'];
                $lgx_event_point_custom_css .= "
                    .lgx-banner-inner.blog .lgx-banner-inner{
                        background:url({$lgx_event_point_banner_imgt}) top left no-repeat;
                    }
                ";
            } 
        }elseif(is_archive()){ 
            if ( class_exists('WooCommerce' ) ){ 
                if(isset($lgx_event_point['shop-banner-b']['url']) && !empty($lgx_event_point['shop-banner-b']['url'])){
                    $lgx_event_point_banner_img = $lgx_event_point['shop-banner-b']['url'];
                    $lgx_event_point_custom_css .= "
                        .lgx-banner-inner.blog{
                            background:url({$lgx_event_point_banner_img})  bottom center no-repeat fixed;
                            background-size: cover;
                        }
                    ";
                } 
                if(isset($lgx_event_point['shop-banner-t']['url']) && !empty($lgx_event_point['shop-banner-t']['url'])){
                    $lgx_event_point_banner_imgt = $lgx_event_point['shop-banner-t']['url'];
                    $lgx_event_point_custom_css .= "
                        .lgx-banner-inner.blog .lgx-inner-bg{
                            background:url({$lgx_event_point_banner_imgt}) top left no-repeat;
                        }
                    ";
                } 
            }else{ 
                if(isset($lgx_event_point['archv-banner']['url']) && !empty($lgx_event_point['archv-banner']['url'])){
                    $lgx_event_point_banner_img = $lgx_event_point['archv-banner']['url'];
                    $lgx_event_point_custom_css .= "
                        .lgx-banner-inner.blog{
                            background:url({$lgx_event_point_banner_img}) bottom center no-repeat fixed;
                            background-size: cover;
                        }
                    ";
                } 
                if(isset($lgx_event_point['archv-banner-top']['url']) && !empty($lgx_event_point['archv-banner-top']['url'])){
                    $lgx_event_point_banner_imgt = $lgx_event_point['archv-banner-top']['url'];
                    $lgx_event_point_custom_css .= "
                        .lgx-banner-inner.blog .lgx-banner-inner{
                            background:url({$lgx_event_point_banner_imgt}) top left no-repeat;
                        }
                    ";
                } 
            } 
        }else{
            if(isset($lgx_event_point['blog-banner']['url']) && !empty($lgx_event_point['blog-banner']['url'])){
                $lgx_event_point_banner_img = $lgx_event_point['blog-banner']['url'];
                $lgx_event_point_custom_css .= "
                    .lgx-banner-inner.blog{
                        background:url({$lgx_event_point_banner_img}) bottom center no-repeat fixed;
                        background-size: cover;
                    }
                ";
            } 
            if(isset($lgx_event_point['blog-banner-top']['url']) && !empty($lgx_event_point['blog-banner-top']['url'])){
                $lgx_event_point_banner_imgt = $lgx_event_point['blog-banner-top']['url'];
                $lgx_event_point_custom_css .= "
                    .lgx-banner-inner.blog .lgx-banner-inner{
                        background:url({$lgx_event_point_banner_imgt}) top left no-repeat;
                    }
                ";
            } 
        }
    }
    // typed banner
    if(isset($lgx_event_point['typed-banrimg']['url']) && !empty($lgx_event_point['typed-banrimg']['url'])){
        $lgx_event_point_typed_bnrimg = $lgx_event_point['typed-banrimg']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-banner.lgx-banner-typed{
                background:url({$lgx_event_point_typed_bnrimg}) top center no-repeat fixed;
            }
        ";
    }  
    if(isset($lgx_event_point['typed-banrimg-top']['url']) && !empty($lgx_event_point['typed-banrimg-top']['url'])){
        $lgx_event_point_typed_bnrimgtp = $lgx_event_point['typed-banrimg-top']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-banner-typed .lgx-banner-style{
                background:url({$lgx_event_point_typed_bnrimgtp}) top left no-repeat;
            }
        ";
    }  
    if(isset($lgx_event_point['typed-overly']) && !empty($lgx_event_point['typed-overly'])){
        if(isset($lgx_event_point['typed-overly-opcty']) && !empty($lgx_event_point['typed-overly-opcty'])){
            $lgx_event_point_typedbg_clrop = $lgx_event_point['typed-overly-opcty'];
        }else{
            $lgx_event_point_typedbg_clrop = '.9';
        }
        $lgx_event_point_typedbg_clr = $lgx_event_point['typed-overly'];
        $lgx_event_point_typedbg_clr = lgx_event_point_hex2rgb($lgx_event_point['typed-overly']);
        $lgx_event_point_custom_css .= "
            .lgx-banner-typed .lgx-inner{
                background:rgba({$lgx_event_point_typedbg_clr},{$lgx_event_point_typedbg_clrop});
            }
        ";
    }  

    // content slider
    if(isset($lgx_event_point['cntnt-banrimg']['url']) && !empty($lgx_event_point['cntnt-banrimg']['url'])){
        $lgx_event_point_contntslidr = $lgx_event_point['cntnt-banrimg']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-contentslider{
                background:url({$lgx_event_point_contntslidr}) top center no-repeat fixed;
            }
        ";
    }  
    // gradiant slider
    if(isset($lgx_event_point['grdnt-banrimg']['url']) && !empty($lgx_event_point['grdnt-banrimg']['url'])){
        $lgx_event_point_grdnt = $lgx_event_point['grdnt-banrimg']['url'];
        $lgx_event_point_custom_css .= "
            .lgx-banner-gradient .lgx-banner-style{
                background:url({$lgx_event_point_grdnt}) top left no-repeat;
                background-size: 100% 100%,cover;
            }
        ";
    }  

    // gradiant slider
    if(!empty($lgx_event_point['footer-column'])){
        $lgx_event_point_ftr_clm = $lgx_event_point['footer-column'];
        if($lgx_event_point_ftr_clm==3){
            $lgx_event_point_col = '33.33%';
        }else{
            $lgx_event_point_col = '25%';
        }
        $lgx_event_point_custom_css .= "
            .widget-col {
                width: {$lgx_event_point_col}; 
            }
        ";
    }  

    $lgx_event_point_adv_css = (isset($lgx_event_point['custom_css'])) ? $lgx_event_point['custom_css'] : '' ;
    $lgx_event_point_custom_css .= "{$lgx_event_point_adv_css}";

    wp_add_inline_style( 'lgx-event-point-style', $lgx_event_point_custom_css );


    $lgx_event_point_custom_js = "";
    $lgx_event_point_adv_js = (isset($lgx_event_point['custom_js'])) ? $lgx_event_point['custom_js'] : '' ;
    $lgx_event_point_custom_js .= "{$lgx_event_point_adv_js}";

    wp_add_inline_script( 'lgx-event-point-script', $lgx_event_point_custom_js );

    // Localize the script
    $lgx_loc_scirpt = array(
      'typed_string' =>  $lgx_event_point_opt->lgx_event_point_typing_string(), 
      'grdnt_day' =>  (!empty($lgx_event_point['grdnt-date-day-clr'])) ? $lgx_event_point['grdnt-date-day-clr'] : '#ff8a00',  
      'grdnt_hour' =>  (!empty($lgx_event_point['grdnt-date-hour-clr'])) ? $lgx_event_point['grdnt-date-hour-clr'] : '#dc4e41',  
      'grdnt_min' =>  (!empty($lgx_event_point['grdnt-date-min-clr'])) ? $lgx_event_point['grdnt-date-min-clr'] : '#00b9ff',  
      'grdnt_sec' =>  (!empty($lgx_event_point['grdnt-date-sec-clr'])) ? $lgx_event_point['grdnt-date-sec-clr'] : '#42bd41', 
      'days' =>  __('Day\'s','lgx-event-point'),
      'hours' =>  __('Hour\'s','lgx-event-point'),
      'minutes' =>  __('Minute\'s','lgx-event-point'),
      'secs' =>  __('Second\'s','lgx-event-point')
    );
    wp_localize_script( 'lgx-event-point-script', 'lgxScript', $lgx_loc_scirpt ); 

}
add_action( 'wp_enqueue_scripts', 'lgx_event_point_scripts' );


/************************************************************************
 * // Remove the Open Sans From Frontend & Backend
 *************************************************************************/

if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
    // Uncomment below to remove from admin
    // add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

/************************************************************************
 * Fonts Enqueue
 *************************************************************************/

function lgx_event_point_fonts_url() {
    $lgx_event_point_font = '';
    $Oswald = _x( 'on', 'Oswald font: on or off', 'lgx-event-point' );
    $Lora = _x( 'on', 'Lora font: on or off', 'lgx-event-point' );

    if ( ('off' !== $Oswald) || ('off' !== $Lora) ) {
        $font_families = array();

        if ( 'off' !== $Oswald ) {
            $font_families[] = 'Oswald: 400,300,700';
        }
        if ( 'off' !== $Lora ) {
            $font_families[] = 'Lora: 400,400i,700,700i';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' )
        );

        $lgx_event_point_font = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    return esc_url_raw( $lgx_event_point_font );
}
