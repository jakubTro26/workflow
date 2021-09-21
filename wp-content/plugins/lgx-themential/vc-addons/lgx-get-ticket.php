<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_get_ticket', 'lgx_get_ticket_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_get_ticket_function($atts) {
    $row_number	= 4;
    $order_by	= 'date';
    $order		= 'ASC';
    $pricingcatlist = '';

    extract(shortcode_atts(array(
        'row_number' 		=> 4,
        'pricingcatlist'    => '',
        'order_by'		=> 'date',
        'order'			=> 'ASC',
    ), $atts));

    global $post;


    // Basic Query
    $args_pricing = array(
        'post_type'      => array( 'pricing' ),
        'post_status'		=> 'publish',
        'posts_per_page'	=> -1,
        'order'				=> $order,
        'orderby'			=> $order_by,

    );

   //print_r(lgxEventpricingCat());


    $cats = $pricingcatlist;
    // Category to Array Convert
    if( !empty($cats) && $cats != '' ){
        $cats = trim($cats);
        $cats_arr   = explode(',', $cats);

        if(is_array($cats_arr) && sizeof($cats_arr) > 0){
            $args_pricing['tax_query'] = array(
                array(
                    'taxonomy' => 'pricing_cat',
                    'field'    => 'slug',
                    'terms'    => $cats_arr
                )
            );

        }
    }



    $data = new WP_Query($args_pricing);

    ?>
    <div id="lgx-register" class="lgx-register">
        <div class="lgx-inner">
            <div class="lgx-wrapper">
                <div class="row">

                    <?php
                    if ( $data->have_posts() ) :
                        while ( $data->have_posts() ) :
                            $data->the_post();
                            $id = $post->ID;

                            $price          = get_post_meta($id,'__lgx__pricing-price',true);
                            $symbol         = get_post_meta($id,'__lgx__pricing-symbol',true);
                            $sub_title      = get_post_meta($id,'__lgx__pricing-sub-title',true);
                            $url            = get_post_meta($id,'__lgx__pricing-url',true);
                            $recommended    = get_post_meta($id,'__lgx__pricing-recommended',true);
                            $priceLists     = get_post_meta($id,'__lgx__pricing-group',true);

                            ?>

                            <div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr($row_number);?>">
                                <div class="single <?php echo ($recommended == 'recommended') ? 'active' : '' ;?> ">
                                    <div class="single-top">
                                        <h4 class="price"><?php echo $price; ?><span><?php echo (!empty($symbol) ? $symbol : '$'); ?></span></h4>
                                        <h3 class="title"><?php echo get_the_title(); ?></h3>
                                        <p><?php echo $sub_title; ?></p>
                                    </div>
                                    <div class="single-bottom">
                                        <ul class="list-unstyled list">
                                            <?php
                                            if ( isset($priceLists) && is_array( $priceLists ) ) {
                                                foreach($priceLists as $list) {
                                                    echo '<li><i class="fa fa-'.(($list['__lgx__pricing-list-style'] == 'no') ? 'times' : 'check').'" aria-hidden="true"></i> '.$list['__lgx__pricing-list-text'].'</li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <a class="lgx-btn" href="<?php echo $url; ?>" target="_blank"><span><?php esc_html_e('Buy Ticket', 'lgx-themential');?></span></a>
                                    </div>
                                </div>
                            </div>
                        <?php      endwhile;
                    endif;
                    wp_reset_postdata();// Restore original Post Data
                    ?>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
    <?php
}

/**
 * Visual Composer
 */

if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Register/ Ticket", 'lgx-themential'),
        "base" => "lgx_get_ticket",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Register or Ticket", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(


            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Number of items in Per Row", 'lgx-themential'),
                "param_name" 	=> "row_number",
                "value" 		=> array('Three'=>4,'Four'=>3),
            ),
            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Add Category Slug", 'lgx-themential'),
                "param_name" 	=> "pricingcatlist",
                "value" 		=>'',
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("OderBy", 'lgx-themential'),
                "param_name" 	=> "order_by",
                "value" 		=> array('Select'=>'','Date'=>'date','Title'=>'title','Modified'=>'modified','Author'=>'author','Random'=>'rand'),
            ),

            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Order", 'lgx-themential'),
                "param_name" 	=> "order",
                "value" 		=> array('Select'=>'','DESC'=>'DESC','ASC'=>'ASC'),
            ),



        )

    ));
}
