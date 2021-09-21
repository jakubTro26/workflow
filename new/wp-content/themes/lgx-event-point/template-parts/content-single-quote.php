<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LGX_Event_Point
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('lgx-card-single'); ?>> 
    <header>
        <?php $lgx_quote = get_post_meta(get_the_ID(),'__lgx__pformat-qte',true); ?>
        <?php if($lgx_quote): ?> 
            <figure> 
                <blockquote>
                    <?php printf(esc_html__('%s','lgx-event-point'),$lgx_quote); ?>
                </blockquote>
            </figure>
        <?php endif; ?>
        <div class="author">
           <?php echo get_avatar( get_the_author_meta( 'ID' ), 190 ); ?>
            <div class="author-info">
                <h3 class="name"><?php the_author(); ?></h3>
                <?php echo ( !empty(get_the_author_meta( 'user_position' ))? '<h4 class="subtitle">'.get_the_author_meta( 'user_position' ).'</h4>' : '');?>
                <?php echo ( ( !empty(get_the_author_meta( 'company_url' )) && !empty(get_the_author_meta( 'company_name' ))) ? '<h4 class="comtitle"><a href="'.get_the_author_meta( 'company_url' ).'">'.get_the_author_meta( 'company_name' ).'</a></h4>' : '' );?>
                <?php echo (!empty(get_the_author_meta( 'follows_url' ))? '<a class="follow-btn" target="_blank" href="'.get_the_author_meta( 'follows_url' ).'">'.esc_html__('Follow','lgx-event-point').'</a>' : ' ');?>
            </div>
        </div>
        <div class="text-area">
            <h1 class="title"><?php the_title(); ?></h1>
            <div class="hits-area">
                <span class="date"><?php echo get_the_date('m M Y'); ?></span>
                <span class="hit-right">
                    <?php comments_popup_link( 
                        esc_html__( 'No Comment', 'lgx-event-point' ), 
                        esc_html__( '1 Comment', 'lgx-event-point' ), 
                        esc_html__( '% Comments', 'lgx-event-point' ), 
                        esc_html__( '', 'lgx-event-point' ), 
                        esc_html__( 'Comments Closed', 'lgx-event-point' )
                    ); ?> 
                    <a href="<?php the_permalink(); ?>"><?php lgx_event_point_setPostViews(get_the_ID()); echo lgx_event_point_getPostViews(get_the_ID()); ?></a>
                </span>
            </div>
        </div>
    </header>
    <section>
        <?php the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'lgx-event-point' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ) ); 

            global $numpages;
            if ( is_singular() && $numpages > 1 ) {
                  if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                      'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'lgx-event-point' ),
                    ) );
                  } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation( array(
                      'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'lgx-event-point' ) . '</span> ' .
                        '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'lgx-event-point' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                      'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'lgx-event-point' ) . '</span> ' .
                        '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'lgx-event-point' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    ) );
                  }
            }
         ?>
    </section>
    <footer>
        <h4 class="title"><?php esc_html_e('Share','lgx-event-point'); ?></h4>
        <div class="lgx-share">
            <ul class="list-inline ">
                <li><a href="<?php echo esc_url('http://twitter.com/home/?status='.get_the_title().' - '.get_the_permalink()); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> 
                <li><a href="<?php echo esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo esc_url('https://plus.google.com/share?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            </ul>
        </div>        
        <?php 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        ?>
    </footer>

</article>
