<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LGX_Event_Point
 */
$lgx_event_point_opt = new LgxFrameworkOpt();
$lgx_event_point_fttl = $lgx_event_point_opt->lgx_event_point_footer_title();
$lgx_event_point_ft_fb = $lgx_event_point_opt->lgx_event_point_footer_fb();
$lgx_event_point_ft_tw = $lgx_event_point_opt->lgx_event_point_footer_tw();
$lgx_event_point_ft_ld = $lgx_event_point_opt->lgx_event_point_footer_ld();
$lgx_event_point_ft_gp = $lgx_event_point_opt->lgx_event_point_footer_gp();
$lgx_event_point_ft_sc = $lgx_event_point_opt->lgx_event_point_footer_sc();
$lgx_event_point_ft_yt = $lgx_event_point_opt->lgx_event_point_footer_yt();
$lgx_event_point_ft_inst = $lgx_event_point_opt->lgx_event_point_footer_inst();
$lgx_event_point_ft_pin = $lgx_event_point_opt->lgx_event_point_footer_pin();
$lgx_event_point_ft_flk = $lgx_event_point_opt->lgx_event_point_footer_flk();
$lgx_event_point_ft_tumb = $lgx_event_point_opt->lgx_event_point_footer_tumb();
$lgx_event_point_ft_copy = $lgx_event_point_opt->lgx_event_point_footer_copy();
$lgx_event_point_ft_logo = $lgx_event_point_opt->lgx_event_point_footer_logo();
$lgx_event_point_ft_subscribe = $lgx_event_point_opt->lgx_event_point_footer_subscribe();
$lgx_event_point_ft_col = $lgx_event_point_opt->lgx_event_point_footer_col();
?>

	</div><!-- #content -->

<footer>

<?php if($lgx_event_point_ft_col==1): ?> 
    <div class="container"> 
        <div class="row">
            <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div>
    </div>  
<?php else: ?>

    <div id="lgx-footer" class="lgx-footer">
        <div class="lgx-footer-bg">
            <div class="lgx-inner">
                <div class="container">  
                    <div class="lgx-subscriber-area">
                        <div class="lgx-testi-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-offset-2 col-xs-8">
                                        <?php if($lgx_event_point_fttl != ''): ?>
                                            <h3 class="title"><?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_fttl); ?></h3>
                                        <?php endif; ?>
                                        <div class="lgx-subscriber">
                                            <?php echo do_shortcode($lgx_event_point_ft_subscribe); ?>
                                        </div> <!--//.SUBSCRIBE-->
                                    </div>
                                </div> <!--//ROW-->
                            </div> <!--//container-->
                        </div> <!--//lgx-inner-->
                    </div>
                    <?php if(!empty($lgx_event_point_ft_logo)): ?>
                        <div class="lgx-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="lgx-scroll">
                                <img src="<?php echo esc_url($lgx_event_point_ft_logo); ?>" alt="Event Point"/>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="footer-social">
                        <ul class="list-inline">
                            <?php if($lgx_event_point_ft_fb): ?>
                                <li><a class="sp-fb" href="<?php echo esc_url($lgx_event_point_ft_fb); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_tw): ?>
                                <li><a class="sp-tw" href="<?php echo esc_url($lgx_event_point_ft_tw); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_gp): ?>
                                <li><a class="sp-google" href="<?php echo esc_url($lgx_event_point_ft_gp); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_ld): ?>
                                <li><a class="sp-in" href="<?php echo esc_url($lgx_event_point_ft_ld); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_sc): ?>
                                <li><a class="sp-" href="<?php echo esc_url($lgx_event_point_ft_sc); ?>"><i class="fa fa-soundcloud"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_yt): ?>
                                <li><a class="sp-" href="<?php echo esc_url($lgx_event_point_ft_yt); ?>"><i class="fa fa-video-camera"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_inst): ?>
                                <li><a class="sp-" href="<?php echo esc_url($lgx_event_point_ft_inst); ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_pin): ?>
                                <li><a class="sp-" href="<?php echo esc_url($lgx_event_point_ft_pin); ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_flk): ?>
                                <li><a class="sp-" href="<?php echo esc_url($lgx_event_point_ft_flk); ?>"><i class="fa fa-flickr"></i></a></li>
                            <?php endif; ?>
                            <?php if($lgx_event_point_ft_tumb): ?>
                                <li><a class="sp-" href="<?php echo esc_url($lgx_event_point_ft_tumb); ?>"><i class="fa fa-tumblr"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <p class="lgx-copyright">
                        <?php if(!empty($lgx_event_point_ft_copy)): ?>
                            <?php printf(esc_html__('%s','lgx-event-point'),$lgx_event_point_ft_copy); ?>
                        <?php endif; ?>
                    </p>
                </div>
                <!-- //.CONTAINER -->
            </div>
        </div>
        <!-- //.INNER-->
    </div>
<?php endif; ?>
</footer>

</div><!-- #page -->
  
<?php wp_footer(); ?>

</body>
</html>
