<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_shortcode( 'lgx_latest_news', 'lgx_latest_news_function');


/**
 * Short Code
 * @param $atts
 * @return string
 */

function lgx_latest_news_function($atts)
{
    $category 	= '';
    $number 	= 2;
    $order_by	= 'date';
    $order		= 'DESC';

    extract(shortcode_atts(array(
        'category' 		=> '',
        'number' 		=>  2,
        'order_by'		=> 'date',
        'order'			=> 'DESC',
    ), $atts));

    global $post;
    global $wpdb;

    // Basic Query
    $args = array(
        'post_status'		=> 'publish',
        'posts_per_page'	=> esc_attr($number),
        'order'				=> $order,
        'orderby'			=> $order_by
    );

    // Category Add
    if( ( $category != '' )){
        $args2 = array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'id',
                    'terms'    => $category,
                ),
            ),
        );
        $args = array_merge( $args,$args2 );
    }

    ob_start(); ?>

    <div id="lgx-blog" class="lgx-blog">
        <div class="lgx-inner">
            <div class="lgx-wrapper">
                <div class="blog-area">
                    <div class="row">
                        <?php
                        $data = new WP_Query($args);
                        if ( $data->have_posts() ) {
                            while ( $data->have_posts() ) {
                                $data->the_post();

                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'lgx-medium' );
                                ?>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="lgx-card-single lgx-blog-loop">
                                        <div class="card-inner">
                                            <figure>
                                                <a href="<?php echo get_the_permalink(); ?>" target="_blank">
                                                    <img src="<?php echo esc_url( $image[0]); ?>" alt="<?php echo get_the_title(); ?>"/>
                                                </a>
                                            </figure>
                                            <div class="content">
                                                <div class="cat-icon">
                                            <span>
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            </span>
                                                </div>
                                                <div class="text-area">
                                                    <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

                                                    <div class="hits-area">
                                                        <span class="date"><a href="javascript:void(0)"><?php echo get_the_date('m M Y'); ?></a></span>
                                                    <span class="hit-right">
                                                        <?php comments_popup_link(
                                                            esc_html__( 'No Comment', 'lgx-event-point' ),
                                                            esc_html__( '1 Comment', 'lgx-event-point' ),
                                                            esc_html__( '% Comments', 'lgx-event-point' ),
                                                            esc_html__( '', 'lgx-event-point' ),
                                                            esc_html__( 'Comments Closed', 'lgx-event-point' )
                                                        ); ?>
                                                        <a href="<?php the_permalink(); ?>"><?php echo lgx_event_point_getPostViews(get_the_ID()); ?></a>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><!--// Single -->
                            <?php      }
                        }
                        wp_reset_postdata();// Restore original Post Data
                        ?>

                    </div>
                </div>
            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.INNER -->
    </div>

    <?php
    return ob_get_clean();
}

/**
 * Visual Composer
 */



if (class_exists('WPBakeryVisualComposerAbstract')) {
    vc_map(array(
        "name" => esc_html__("Latest News", 'lgx-themential'),
        "base" => "lgx_latest_news",
        // 'icon' => 'icon_travel_info',
        "class" => "",
        "description" => esc_html__("Display Latest News.", 'lgx-themential'),
        "category" => esc_html__('Event Point', 'lgx-themential'),
        "params" => array(
            array(
                "type" 			=> "dropdown",
                "heading" 		=> esc_html__("Category Filter", 'lgx-themential'),
                "param_name" 	=> "category",
                "value" 		=> lgx_get_post_category(),
            ),

            array(
                "type" 			=> "textfield",
                "heading" 		=> esc_html__("Number of items", 'lgx-themential'),
                "param_name" 	=> "number",
                "value" 		=> 2,
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