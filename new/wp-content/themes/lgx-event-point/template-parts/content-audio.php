<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LGX_Event_Point
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="col-sm-12 col-md-12">
        <div class="lgx-card-single">
            <div class="card-inner">
                <?php $lgx_audio = get_post_meta(get_the_ID(),'__lgx__pformat-ado',true); ?>
                <?php if($lgx_audio): ?>
                    <figure> 
                        <iframe src="<?php echo esc_url($lgx_audio); ?>"></iframe>
                    </figure>
                <?php endif; ?>
                <div class="content">
                    <div class="cat-icon">
                        <span>
                            <i class="fa fa-file-audio-o" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="text-area">
                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php   if ( is_sticky() ) {
                            printf( '<span class="dashicons dashicons-admin-post"></span><span class="featured-post">%s</span>', esc_html__( 'Sticky', 'lgx-event-point' ) );
                        } ?>
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
    </div>
</article><!-- #post-## -->
