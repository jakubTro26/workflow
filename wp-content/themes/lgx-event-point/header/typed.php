<?php 
$lgx_event_point_opt = new LgxFrameworkOpt();
$lgx_event_point_bnr_ttl = $lgx_event_point_opt->lgx_event_point_typ_ttl(); 
$lgx_event_point_bnr_subttl = $lgx_event_point_opt->lgx_event_point_typ_subttl(); 
$lgx_event_point_bnr_date = $lgx_event_point_opt->lgx_event_point_typ_date(); 
?>
<!--BANNER-->
<section>
    <div class="lgx-banner lgx-banner-typed">
        <div class="lgx-banner-style">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="banner-info">
                                <div class="lgx-countdown-area">
                                    <!-- Date Format :"Y/m/d" || For Example: 1017/10/5  -->
                                    <div id="lgx-countdown" data-date="<?php echo esc_attr($lgx_event_point_bnr_date); ?>"></div>
                                </div>
                                <h2 class="title"><span id="lgx-typed-string"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_bnr_ttl); ?></span></h2>
                                <h3 class="date"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_bnr_subttl); ?></h3>
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
