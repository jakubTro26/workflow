<?php 
$lgx_event_point_opt = new LgxFrameworkOpt();
$lgx_event_point_cntnsldr_date = $lgx_event_point_opt->lgx_event_point_cntnt_sldr_date(); 
?>
<!--SLIDER-->
<section>
    <div class="lgx-banner lgx-contentslider">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="banner-info">

                            <div class="lgx-countdown-area">
                                <!-- Date Format :"Y/m/d" || For Example: 1017/10/5  -->
                                <div id="lgx-countdown" data-date="<?php echo esc_attr($lgx_event_point_cntnsldr_date); ?>"></div>
                            </div>

                            <div id="lgx-owlcontslider" class="owl-carousel lgx-owlcontslider">
                            <?php 
                                global $lgx_event_point;
                                $val = $lgx_event_point['cntnt-sldr-ttl'];
                                $ke = $lgx_event_point['cntnt-sldr-sbttl'];
                                $contnt_sldr = array_combine($ke, $val); 
                                foreach ($contnt_sldr as $k => $v) { ?>
                                    <div class="item">
                                        <h2 class="title lgx-fadeInLeft-one"><?php printf(esc_html__('%s','lgx-event-point'),$v); ?></h2>
                                        <h3 class="date lgx-fadeInLeft-two"><?php printf(esc_html__('%s','lgx-event-point'),$k); ?></h3>
                                    </div> <!--//.Item--> 
                                <?php } 
                            ?> 
                            </div><!--l//owlcontslider-->

                        </div>
                    </div>
                </div>
                <!--//.ROW-->
            </div>
            <!-- //.CONTAINER -->
        </div>
    </div>
</section>
<!--SLIDER END-->
