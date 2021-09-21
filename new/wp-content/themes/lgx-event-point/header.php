<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LGX_Event_Point
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon"/>
    <?php }
 
    $lgx_event_point_logo = '';
 
    $lgx_event_point_opt = new LgxFrameworkOpt();
    $lgx_event_point_logo = $lgx_event_point_opt->lgx_event_point_logo();

    if ( is_user_logged_in() ) {
        $lgx_event_point_addcls = 'hdrtop';
    } else {
        $lgx_event_point_addcls = '';
    }

    wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lgx-event-point' ); ?></a>

    <!--HEADER-->
    <header>
        <div id="lgx-header" class="lgx-header <?php echo esc_attr($lgx_event_point_addcls); ?>">
            <div class="lgx-header-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <nav id="menu-offscroll" class="navbar navbar-default lgx-navbar">
                                <div class="container">
                                    <nav class="navbar navbar-default lgx-navbar">
                                        <div class="lgxcontainer">
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                        data-target=".navbar-collapse">
                                                    <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'lgx-event-point' ); ?></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                                <div class="lgx-logo">
                                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="lgx-scroll">
                                                        <img src="<?php echo esc_url($lgx_event_point_logo); ?>" alt="Logo"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="collapse navbar-collapse">
                                                <?php lgx_event_point_main_menu(); ?>
                                            </div>
                                            <!--/.nav-collapse -->
                                        </div>
                                    </nav>
                                </div>
                                <!-- /.container -->
                            </nav>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER-->
        </div>
    </header>
    <!--HEADER END-->

    <?php
    if(is_page()){
        $lgx_rev_alias = get_post_meta(get_the_ID(),'__lgx__rev_slidr_alias',true);
        if(get_post_meta(get_the_ID(),'__lgx__header_type',true)==1){
            get_template_part('header/default');
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==2){
            get_template_part('header/banner');
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==3){
            get_template_part('header/blog');
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==4){
            get_template_part('header/typed');
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==5){
            get_template_part('header/slider');
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==6){
            get_template_part('header/content-slider');
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==7){
            get_template_part('header/gradiant');
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==8){
            if (class_exists('RevSlider')) {
                putRevSlider($lgx_rev_alias);
            }
        }elseif(get_post_meta(get_the_ID(),'__lgx__header_type',true)==9){
            get_template_part('header/christmas');
        }else{
            get_template_part('header/blog');
        }
    }else{
        get_template_part('header/blog');
    }
    ?>

    <div id="content" class="site-content">
