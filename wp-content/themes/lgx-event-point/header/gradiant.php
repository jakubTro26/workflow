<?php 
$lgx_event_point_opt = new LgxFrameworkOpt();
$lgx_event_point_bnr_date = $lgx_event_point_opt->lgx_event_point_big_gradiant_date();
$lgx_event_point_bnr_title = $lgx_event_point_opt->lgx_event_point_big_gradiant_title();
$lgx_event_point_bnr_sbttl = $lgx_event_point_opt->lgx_event_point_big_gradiant_subtitle();
?>
<!--BANNER-->
<section>
    <div class="lgx-banner lgx-banner-gradient">
        <div class="lgx-banner-style">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="banner-info">
                                <div class="circular-countdown-area">
                                    <div id="circular-countdown" data-date="<?php printf(esc_attr('%s','lgx-event-point'),$lgx_event_point_bnr_date); ?>" ></div>
                                </div>
                                <h2 class="title"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_bnr_title); ?></h2>
                                <h3 class="date"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_bnr_sbttl); ?></h3>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER -->
        </div>
    </div>
</section>
<!--BANNER END-->
