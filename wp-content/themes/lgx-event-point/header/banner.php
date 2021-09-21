<?php 
$lgx_event_point_opt = new LgxFrameworkOpt();
$lgx_event_point_bnr_date = $lgx_event_point_opt->lgx_event_point_big_banner_date();
$lgx_event_point_bnr_title = $lgx_event_point_opt->lgx_event_point_big_banner_title();
$lgx_event_point_bnr_sbttl = $lgx_event_point_opt->lgx_event_point_big_banner_subtitle();
?>
<!--BANNER-->
<section>
    <div class="lgx-banner lgx-banneranother">
        <div class="lgx-banner-style">
            <div class="lgx-inneranother">
                <div class="lgx-inner-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="banner-info">
                                    <h3 class="date"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_bnr_sbttl); ?></h3>
                                    <h2 class="title"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_bnr_title); ?></h2>
                                    <div class="lgx-countdown-area">
                                        <!-- Date Format :"Y/m/d" || For Example: 1017/10/5  -->
                                        <div id="lgx-countdown" data-date="<?php printf(esc_attr('%s','lgx-event-point'),$lgx_event_point_bnr_date); ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                    </div>
                    <!-- //.CONTAINER -->
                </div>
            </div>
            <!-- //.INNER -->
        </div>
    </div>
</section>
<!--BANNER END-->
