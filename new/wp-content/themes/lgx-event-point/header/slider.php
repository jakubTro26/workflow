    <!--SLIDER-->
    <section>
        <div class="lgx-slider">
            <div class="lgx-banner-style">
                <div class="lgx-inner">

                    <div id="lgx-main-slider" class="owl-carousel ">

                        <!--SLIDER ITEM 1-->
                        <?php 
                        $lgx_event_point_slider = new WP_Query(array('post_type'=>'slider','posts_per_page'=>-1));
                        while($lgx_event_point_slider->have_posts()): $lgx_event_point_slider->the_post();
                        $lgx_slider_pos = get_post_meta(get_the_ID(),'__lgx__sldr-pos',true); 
                        $lgx_subtitle = get_post_meta(get_the_ID(),'__lgx__sldr-sbttl',true); 
                        $lgx_subtitle_2 = get_post_meta(get_the_ID(),'__lgx__sldr-sbttl-2',true); ?>

                            <div class="lgx-item-common lgx-item-<?php echo esc_attr($lgx_slider_pos); ?>">

                                <div class="col-sm-12g">
                                    <div class="slider-text-single">
                                        <figure>
                                            <?php the_post_thumbnail(); ?>
                                            <figcaption>
                                                <div class="lgx-container">
                                                    <div class="lgx-hover-link">
                                                        <div class="lgx-vertical">
                                                            <h3 class="lgx-subtitle lgx-zoomIn-one"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_subtitle); ?></h3>
                                                            <h2 class="lgx-title lgx-zoomIn-two"><?php the_title(); ?></h2>
                                                            <h3 class="date lgx-zoomIn-three"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_subtitle_2); ?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div> <!--//.col-->
                            </div>

                        <?php
                        endwhile; wp_reset_postdata();
                        ?> 
                    </div> <!--//.lgx-main-slider-->


                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
    <!--SLIDER END-->
