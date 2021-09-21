<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_schedule', 'lgx_schedule_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_schedule_function($atts) {

    extract(shortcode_atts(array(
        'order_by'		=> 'date',
        'order'			=> 'DESC',
    ), $atts));


    ob_start(); ?>

    <div id="lgx-schedule" class="lgx-schedule">
        <div class="lgx-inner">
            <div class="lgx-wrapper">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-tab">
                            <?php
                            $taxonomy = 'schedule_cat';
                            $terms = get_terms($taxonomy); // Get all terms of a taxonomy
                            $i = 1;
                            if ( $terms && !is_wp_error( $terms ) ) :

                                ?>
                                <ul class="nav nav-pills text-center">
                                    <?php foreach ( $terms as $term ):   ?>
                                        <li <?php echo ($i == 1) ?  'class="active"' : '' ;?> >
                                            <a data-toggle="pill" href="#schedule<?php echo $term->term_id; ?>">
                                                <h3><?php echo lgx_spilt_heading($term->name); ?></h3>
                                                <p><?php echo lgx_spilt_heading($term->description, 'left'); ?></p>
                                            </a>
                                        </li>
                                        <?php  $i++; endforeach; ?>
                                </ul>
                            <?php endif;?>
                            <div class="tab-content lgx-tab-content text-center">
                                <?php
                                $count = 1;
                                if ( $terms && !is_wp_error( $terms ) ) :
                                    foreach ( $terms as $term ):   ?>
                                        <div id="schedule<?php echo $term->term_id; ?>" class="tab-pane fade in <?php echo ($count == 1) ?  'active' : '' ;?>">
                                            <?php

                                            $posts_array = get_posts(
                                                array(
                                                    'posts_per_page' => -1,
                                                    'post_type' => 'schedule',
                                                    //'order'   => 'ASC',
                                                    'order'				=> $order,
                                                    'orderby'			=> $order_by,
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'schedule_cat',
                                                            'field' => 'term_id',
                                                            'terms' => $term->term_id,
                                                        )
                                                    )
                                                )
                                            );

                                            foreach ( $posts_array as $schedule) :
                                                $spekears_img = '';
                                                $spekears_name = '';
                                                $spekears_url = '';
                                                $spekears_designation = '';
                                                $id = $schedule->ID;
                                                $spekears_time          = get_post_meta($id,'__lgx__schedule-time',true);
                                                $spekears_id            = get_post_meta($id,'__lgx__schedule-speaker',true);
                                                $spekears_two_en            = get_post_meta($id,'__lgx__schedule-speaker_two_show',true);
                                                $spekears_id_two            = get_post_meta($id,'__lgx__schedule-speaker_two',true);

                                                if(!empty($spekears_id)) {
                                                    $spekears_img           = wp_get_attachment_image_src(get_post_thumbnail_id( $spekears_id ), true);
                                                    $spekears_img           = $spekears_img[0];
                                                    $spekears_name          =  get_the_title($spekears_id);
                                                    $spekears_url           = get_permalink($spekears_id);
                                                    $spekears_designation   = get_post_meta($spekears_id,'__lgx__speaker-designation',true);
                                                }
                                                if(!empty($spekears_id_two)) {
                                                    $spekears_img_two           = wp_get_attachment_image_src(get_post_thumbnail_id( $spekears_id_two ), true);
                                                    $spekears_img_two           = $spekears_img_two[0];
                                                    $spekears_name_two          =  get_the_title($spekears_id_two);
                                                    $spekears_url_two           = get_permalink($spekears_id_two);
                                                    $spekears_designation_two   = get_post_meta($spekears_id_two,'__lgx__speaker-designation',true);
                                                }

                                                //              var_dump($spekears_id_two);
                                                ?>
                                                <div class="lgx-single-tab">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-2">
                                                            <div class="time-area">
                                                                <h4 class="time"><?php echo ($spekears_time ? lgx_spilt_heading($spekears_time) : ' '); ?></h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-3">
                                                            <div class="author">
                                                                <a class="author-img" href="<?php echo ($spekears_url ? $spekears_url : 'javascript:void(0)'); ?>">
                                                                    <img src="<?php echo esc_url( $spekears_img); ?>" alt="<?php echo $spekears_name; ?>"/>
                                                                </a>


                                                                <div class="author-info">
                                                                    <h5 class="name"><a href="<?php echo ($spekears_url ? $spekears_url : 'javascript:void(0)'); ?>"><?php echo($spekears_name ? $spekears_name : ' '); ?></a></h5>
                                                                    <p class="author-title"><?php echo($spekears_designation ? $spekears_designation : ''); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if($spekears_two_en == 'yes'): ?>
                                                            <div class="col-xs-12 col-sm-3">
                                                                <div class="author">
                                                                    <a class="author-img" href="<?php echo ($spekears_url_two ? $spekears_url_two : 'javascript:void(0)'); ?>">
                                                                        <img src="<?php echo esc_url( $spekears_img_two); ?>" alt="<?php echo $spekears_name_two; ?>"/>
                                                                    </a>


                                                                    <div class="author-info">
                                                                        <h5 class="name"><a href="<?php echo ($spekears_url_two ? $spekears_url_two : 'javascript:void(0)'); ?>"><?php echo($spekears_name_two ? $spekears_name_two : ' '); ?></a></h5>
                                                                        <p class="author-title"><?php echo($spekears_designation_two ? $spekears_designation_two : ''); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="col-xs-12  <?php echo ($spekears_two_en == 'yes') ? 'col-sm-4' : 'col-sm-7';?>">
                                                            <div class="schedule-info">                                                                <h3 class="title"><?php echo $schedule->post_title; ?></h3>                                                                <p><?php echo $schedule->post_content; ?></p>                                                            </div>
                                                            <!--//.single tab-->
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach;
                                            wp_reset_postdata();?>

                                        </div> <!--//Tabs -->
                                        <?php  $count++;  endforeach; ?>
                                <?php endif;?>
                            </div><!--//tab-content-->

                        </div><!--//lgx tab-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();

}


/**
 * Visual Composer
 *
 * Visual Composer for Schedule
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Schedule Section", 'lgx-themential'),
        "base" => "lgx_schedule",
        "class" => "",
        "description" => esc_html__("Display all Schedule", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),

        "params" => array(
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'lgx-themential'),
                "param_name" 	=> "order",
                "value" 		=> array('Select'=>'','DESC'=>'DESC','ASC'=>'ASC'),
            ),
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("OderBy", 'lgx-themential'),
                "param_name" 	=> "order_by",
                "value" 		=> array('Select'=>'','Date'=>'date','Title'=>'title','Modified'=>'modified','Author'=>'author','Random'=>'rand'),
            ),

        )
    ));
}