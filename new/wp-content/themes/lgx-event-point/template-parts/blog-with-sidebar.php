<?php
/**
 * Template Name: Blog With Sidebar
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LGX_Event_Point
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" >

            <section>
                <div class="lgx-blog lgx-blog-list">
                    <div class="lgx-inner">
                        <div class="container">


                            <div class="blog-area">
                                <div class="row">
                                    <div class="col-sm-12 col-md-8">
                                        <div class="row">
                                            <?php
                                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                            query_posts(array( 'post_type'=> 'post','paged' => $paged ));
                                            if ( have_posts() ) :
                                                /* Start the Loop */
                                                while ( have_posts() ) : the_post();
                                                    /*
                                                     * Include the Post-Format-specific template for the content.
                                                     * If you want to override this in a child theme, then include a file
                                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                                     */
                                                    get_template_part( 'template-parts/content', get_post_format() );
                                                endwhile;
                                                lgx_event_point_pagination();
                                            else :
                                                get_template_part( 'template-parts/content', 'none' );
                                            endif; wp_reset_query(); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <?php get_sidebar(); ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- //.CONTAINER -->

                    </div><!-- //.INNER -->

                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();
