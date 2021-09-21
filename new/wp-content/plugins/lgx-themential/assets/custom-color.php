<?php

add_action ('wp_head','lgx_hook_inHeader');
function lgx_hook_inHeader() {
    global $lgx_event_point;

    $brand_color = (!empty($lgx_event_point['color-opt'])) ? $lgx_event_point['color-opt'] : '#dc4e41' ;
    $btn_color   = (!empty($lgx_event_point['btncolor-opt'])) ? $lgx_event_point['btncolor-opt'] : '#42bd41' ;

    // default banner countdown color
    $dflt_bnr_day   = (!empty($lgx_event_point['dflt-date-day-clr'])) ? $lgx_event_point['dflt-date-day-clr'] : '#fff200';
    $dflt_bnr_hour   = (!empty($lgx_event_point['dflt-date-hour-clr'])) ? $lgx_event_point['dflt-date-hour-clr'] : '#ff8a00';
    $dflt_bnr_min  = (!empty($lgx_event_point['dflt-date-min-clr'])) ? $lgx_event_point['dflt-date-min-clr'] : '#00b9ff';
    $dflt_bnr_sec  = (!empty($lgx_event_point['dflt-date-sec-clr'])) ? $lgx_event_point['dflt-date-sec-clr'] : '#8dc63f';

    // big default banner countdown color
    $big_bnr_day   = (!empty($lgx_event_point['bnr-date-day-clr'])) ? $lgx_event_point['bnr-date-day-clr'] : '#fff200';
    $big_bnr_hour   = (!empty($lgx_event_point['bnr-date-hour-clr'])) ? $lgx_event_point['bnr-date-hour-clr'] : '#ff8a00';
    $big_bnr_min  = (!empty($lgx_event_point['bnr-date-min-clr'])) ? $lgx_event_point['bnr-date-min-clr'] : '#00b9ff';
    $big_bnr_sec  = (!empty($lgx_event_point['bnr-date-sec-clr'])) ? $lgx_event_point['bnr-date-sec-clr'] : '#8dc63f';

    // Slider default banner countdown color
    $sldr_bnr_day   = (!empty($lgx_event_point['cntnt-date-day-clr'])) ? $lgx_event_point['cntnt-date-day-clr'] : '#fff200';
    $sldr_bnr_hour   = (!empty($lgx_event_point['cntnt-date-hour-clr'])) ? $lgx_event_point['cntnt-date-hour-clr'] : '#ff8a00';
    $sldr_bnr_min  = (!empty($lgx_event_point['cntnt-date-min-clr'])) ? $lgx_event_point['cntnt-date-min-clr'] : '#00b9ff';
    $sldr_bnr_sec  = (!empty($lgx_event_point['cntnt-date-sec-clr'])) ? $lgx_event_point['cntnt-date-sec-clr'] : '#8dc63f';

    // Typed default banner countdown color
    $typd_bnr_day   = (!empty($lgx_event_point['typ-date-day-clr'])) ? $lgx_event_point['typ-date-day-clr'] : '#fff200';
    $typd_bnr_hour   = (!empty($lgx_event_point['typ-date-hour-clr'])) ? $lgx_event_point['typ-date-hour-clr'] : '#ff8a00';
    $typd_bnr_min  = (!empty($lgx_event_point['typ-date-min-clr'])) ? $lgx_event_point['typ-date-min-clr'] : '#00b9ff';
    $typd_bnr_sec  = (!empty($lgx_event_point['typ-date-sec-clr'])) ? $lgx_event_point['typ-date-sec-clr'] : '#8dc63f';

    $brand_rgb  = lgxl_themential_point_hex2rgb($brand_color);
    $btn_rgb  = lgxl_themential_point_hex2rgb($btn_color);
    ?>
    <style>

        /* Default Banner Countdown Color */
        .lgx-banner.default .lgx-countdown-area #lgx-countdown .lgx-days {
            color: <?php echo $dflt_bnr_day; ?>;
        }
        .lgx-banner.default .lgx-countdown-area #lgx-countdown .lgx-hr {
            color: <?php echo $dflt_bnr_hour; ?>;
        }
        .lgx-banner.default .lgx-countdown-area #lgx-countdown .lgx-min {
            color: <?php echo $dflt_bnr_min; ?>;
        }
        .lgx-banner.default .lgx-countdown-area #lgx-countdown .lgx-sec {
            color: <?php echo $dflt_bnr_sec; ?>;
        }

        /* Big Banner Countdown Color */
        .lgx-banner.lgx-banneranother .lgx-countdown-area #lgx-countdown .lgx-days {
            color: <?php echo $big_bnr_day; ?>;
        }
        .lgx-banner.lgx-banneranother .lgx-countdown-area #lgx-countdown .lgx-hr {
            color: <?php echo $big_bnr_hour; ?>;
        }
        .lgx-banner.lgx-banneranother .lgx-countdown-area #lgx-countdown .lgx-min {
            color: <?php echo $big_bnr_min; ?>;
        }
        .lgx-banner.lgx-banneranother .lgx-countdown-area #lgx-countdown .lgx-sec {
            color: <?php echo $big_bnr_sec; ?>;
        }
        /* Slider Banner Countdown Color */
        .lgx-banner.lgx-contentslider .lgx-countdown-area #lgx-countdown .lgx-days {
            color: <?php echo $sldr_bnr_day; ?>;
        }
        .lgx-banner.lgx-contentslider .lgx-countdown-area #lgx-countdown .lgx-hr {
            color: <?php echo $sldr_bnr_hour; ?>;
        }
        .lgx-banner.lgx-contentslider .lgx-countdown-area #lgx-countdown .lgx-min {
            color: <?php echo $sldr_bnr_min; ?>;
        }
        .lgx-banner.lgx-contentslider .lgx-countdown-area #lgx-countdown .lgx-sec {
            color: <?php echo $sldr_bnr_sec; ?>;
        }

        /* Typed Banner Countdown Color */
        .lgx-banner.lgx-banner-typed .lgx-countdown-area #lgx-countdown .lgx-days {
            color: <?php echo $typd_bnr_day; ?>;
        }
        .lgx-banner.lgx-banner-typed .lgx-countdown-area #lgx-countdown .lgx-hr {
            color: <?php echo $typd_bnr_hour; ?>;
        }
        .lgx-banner.lgx-banner-typed .lgx-countdown-area #lgx-countdown .lgx-min {
            color: <?php echo $typd_bnr_min; ?>;
        }
        .lgx-banner.lgx-banner-typed .lgx-countdown-area #lgx-countdown .lgx-sec {
            color: <?php echo $typd_bnr_sec; ?>;
        }

        a {
            color: <?php echo $brand_color; ?>;
        }
        a:focus,
        a:hover,
        a.active {
            color: <?php echo $brand_color; ?>;
        }

        blockquote {
            border-left: 5px solid <?php echo $brand_color; ?>;
        }

        blockquote {
            background: rgba(<?php echo $brand_rgb; ?>,.1);
        }

        blockquote footer {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-heading .back-heading {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-heading-brand .back-heading {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-btn {
            background: <?php echo $btn_color; ?>;
        }
        .lgx-btn:hover {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-btn-brand {
            background: <?php echo $brand_color; ?>;
        }
        .lgx-btn-brand:hover {
            background: <?php echo $btn_color; ?>;
        }

        .lgx-header .navbar-default .navbar-nav > .open > a,
        .lgx-header .navbar-default .navbar-nav > .open > a:focus,
        .lgx-header .navbar-default .navbar-nav > .open > a:hover {
            color: <?php echo $brand_color; ?>;
        }


        .lgx-header .lgx-navbar .lgx-nav li a:hover {
            color: <?php echo $brand_color; ?> !important;
        }

        .lgx-header .lgx-navbar .lgx-nav .active a {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-header .lgx-navbar .lgx-nav .dropdown-menu li a b {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-header .lgx-navbar .lgx-nav .dropdown-menu li a:hover {
            background: transparent;
            color: <?php echo $brand_color; ?> !important;
            opacity: 1;
        }

        .single .lgx-header .lgx-navbar .lgx-nav .dropdown-menu li a b,
        .single-post .lgx-header .lgx-navbar .lgx-nav .dropdown-menu li a b,
        .page .lgx-header .lgx-navbar .lgx-nav .dropdown-menu li a b,
        .page-template .lgx-header .lgx-navbar .lgx-nav .dropdown-menu li a b {
            color: <?php echo $brand_color; ?>;
        }

        .menu-onscroll .lgx-toggle {
            color: <?php echo $brand_color; ?>;
        }

        .menu-onscroll .lgx-navbar .lgx-nav li a:hover {
            color: <?php echo $brand_color; ?>;
        }

        .menu-onscroll .lgx-navbar .lgx-nav .active a {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-header-white .lgx-toggle {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-header-white .lgx-navbar .lgx-nav li a:hover {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-header-white .lgx-navbar .lgx-nav .active a {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-banner .subtitle span {
            color: <?php echo $btn_color; ?>;
        }

        .lgx-banner .date span {
            color: <?php echo $brand_color; ?>;
        }


        .lgx-banneranother .date {
            color: <?php echo $btn_color; ?>;
        }

        .lgx-slider .owl-controls .owl-nav [class*=owl-] {
            background: <?php echo $brand_color; ?>;
        }
        .lgx-slider .owl-controls .owl-nav [class*=owl-]:hover {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-slider .slider-text-single figure figcaption .lgx-container .lgx-hover-link .lgx-vertical .lgx-subtitle span {
            color: <?php echo $btn_color; ?>;
        }


        .lgx-contentslider .lgx-owlcontslider .owl-controls .owl-nav [class*=owl-] {
            color: <?php echo $btn_color; ?>;
        }
        .lgx-contentslider .lgx-owlcontslider .owl-controls .owl-nav [class*=owl-]:hover {
            background: <?php echo $btn_color; ?>;
        }

        .lgx-speaker-single .speakers-content .subtitle {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-speaker-single .social ul li:hover {
            background: <?php echo $brand_color; ?>;
        }
        .lgx-speaker-single .social ul li:hover a {
            color: <?php echo $btn_color; ?>;
        }

        .lgx-single-speaker figure figcaption a {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-single-speaker .speaker-info .subtitle {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-single-speaker:hover {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-video .video-icon a {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-schedule .lgx-tab .nav-pills li a h3 span {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-schedule .lgx-tab .nav-pills li a p span {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-schedule .lgx-tab .nav-pills .active {
            background: <?php echo $brand_color; ?>;
        }
        .lgx-schedule .lgx-tab .nav-pills .active:before {
            border-top: 60px solid <?php echo $brand_color; ?>;
        }

        .lgx-schedule .lgx-tab .lgx-single-tab .time-area .time span {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-schedule .lgx-tab .lgx-single-tab .author .author-info .author-title {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-schedule .lgx-tab .lgx-single-tab:hover {
            background: <?php echo $brand_color; ?>;
        }

        .schedule header .text-area .hits-area .date {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-sponsored-title .sponsored-heading {
            color: <?php echo $brand_color; ?>;
        }

        .sponsors-area .lgx-single-sponsor:hover {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-register .single .single-top .price span {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-register .single .single-bottom ul li i {
            color: <?php echo $btn_color; ?>;
        }
        .lgx-register .single .single-bottom ul li .fa-times {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-register .single:hover {
            background: <?php echo $btn_color; ?>;
        }

        .lgx-register .active {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-register .active:hover {
            background: <?php echo $btn_color; ?>;
        }

        .lgx-photo-gallery .lgx-single {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-photo-gallery .lgx-single figure figcaption .lgx-hover-link .lgx-vertical a:hover {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-photo-gallery .lgx-single:hover figure figcaption .lgx-hover-link .lgx-vertical a:hover {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-blog .lgx-card-single .content .cat-icon span, .lgx-blog-single .lgx-card-single header .author .follow-btn {
            background:  rgba(<?php echo $brand_rgb; ?>,.1);
            border-left: 2px solid <?php echo $brand_color; ?>;
        }
        .lgx-blog .lgx-card-single .content .cat-icon span i {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-blog .lgx-card-single .content .text-area .title:hover {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-blog .lgx-blog-loop:hover {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-blog .lgx-card-single:hover section .cat-icon span {
            background:  rgba(<?php echo $brand_rgb; ?>,.5);
        }

        .lgx-testimonials .lgx-owltestimonial .item .lgx-client-image img {
            border: 4px solid <?php echo $brand_color; ?>;
        }
        .lgx-testimonials .lgx-owltestimonial .item .lgx-client-image figcaption {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-testimonials .lgx-owltestimonial .item .lgx-client-image figcaption i {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-testimonials .lgx-owltestimonial .item .lgx-client-image:hover figcaption i {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-testimonials .lgx-owltestimonial .item .lgx-client-name span {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav [class*=owl-] i {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav [class*=owl-]:hover {
            background-color: <?php echo $brand_color; ?>;
        }

        .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav .owl-prev,
        .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav .owl-next {
            color: <?php echo $brand_color; ?>;;
        }

        .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav .owl-prev:hover,
        .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav .owl-next:hover {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-contact .help-block {
            color: <?php echo $brand_color; ?>;
        }

        .lgxmapcanvas .gm-style .gm-style-iw h1 {
            color: <?php echo $btn_color; ?>;
        }


        .wpcf7-submit {
            background: <?php echo $btn_color; ?>;
        }
        .wpcf7-submit:hover {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-contact-box .address .title {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-footer .lgx-subscriber-area .subscribe-form .the-submit-btn {
            background: <?php echo $btn_color; ?>;
        }
        .lgx-footer .lgx-subscriber-area .subscribe-form .the-submit-btn:hover {
            background: <?php echo $brand_color; ?>;
        }

        .lgx-footer .footer-social ul li:hover {
            background: <?php echo $brand_color; ?>;
        }
        .lgx-footer .footer-social ul li:hover a {
            color: <?php echo $btn_color; ?>;
        }

        .lgx-footer .lgx-copyright .themename {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-footer .lgx-copyright a {
            color: <?php echo $btn_color; ?>;
        }

        .lgx-about-video .video-icon a {
            color: <?php echo $brand_color; ?>;
        }

        .single .breadcrumb .active,
        .single-post .breadcrumb .active,
        .page .breadcrumb .active,
        .page-template .breadcrumb .active,
        .error404 .breadcrumb .active,
        .search-no-results .breadcrumb .active {
            color: <?php echo $brand_color; ?>;
        }
        .single .breadcrumb > li + li:before,
        .single-post .breadcrumb > li + li:before,
        .page .breadcrumb > li + li:before,
        .page-template .breadcrumb > li + li:before,
        .error404 .breadcrumb > li + li:before,
        .search-no-results .breadcrumb > li + li:before {
            color: <?php echo $btn_color; ?>;
        }

        .lgx-blog-single .lgx-card-single header .author .comtitle {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-blog-single .lgx-card-single header .text-area .hits-area .date {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-blog-single .lgx-card-single header .text-area .hits-area .date:hover {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-blog-single .lgx-card-single footer .title {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-blog-single .lgx-card-single footer .lgx-share ul li:hover {
            background: <?php echo $brand_color; ?>;
        }
        .lgx-blog-single .lgx-card-single footer .lgx-share ul li:hover a {
            color: <?php echo $btn_color; ?>;
        }

        .lgx-blog-single .lgx-card-single footer .lgx-sharess li a {
            color: <?php echo $brand_color; ?>;
        }

        .lgx-blog-single .lgx-card-single footer .lgx-sharess li a:hover {
            background: <?php echo $brand_color; ?>;
        }


        .lgx-blog ul.page-numbers li .current {
            color: <?php echo $brand_color; ?>;
        }
        .lgx-blog ul.page-numbers li:hover {
            background: <?php echo $brand_color; ?>;
        }
        .lgx-blog ul.page-numbers li:hover a,
        .lgx-blog ul.page-numbers li:hover span {
            color: <?php echo $btn_color; ?>;
        }

        .widget_calendar table td#today {
            color: <?php echo $brand_color; ?>;
        }

        .error404 .search-form .search-submit,
        .search-no-results .search-form .search-submit {
            background: <?php echo $btn_color; ?>;
        }
        .error404 .search-form .search-submit:hover,
        .search-no-results .search-form .search-submit:hover {
            background: <?php echo $brand_color; ?>;
        }

        article footer #comments .comment-reply-link {
            border: 1px solid <?php echo $btn_color; ?>;
            color: <?php echo $btn_color; ?>;
        }
        article footer #comments .comment-reply-link:hover {
            background: <?php echo $brand_color; ?>;
            border: 1px solid <?php echo $brand_color; ?>;
        }
        article footer #comments .edit-link {
            color: <?php echo $brand_color; ?>;
        }

        article footer #comments .edit-link:hover a {
            background: <?php echo $brand_color; ?>;
        }

        article footer #comments #respond .comment-notes .required {
            color: <?php echo $brand_color; ?>;
        }

        article footer #comments #respond form label .required {
            color: <?php echo $brand_color; ?>;
        }

        article footer #comments input:hover,
        article footer #comments textarea:hover,
        article footer #comments input:active,
        article footer #comments textarea:active,
        article footer #comments input:focus,
        article footer #comments textarea:focus {
            border: 1px solid <?php echo $brand_color; ?> !important;
        }
        article footer #comments .form-submit {
            background: <?php echo $btn_color; ?>;
        }

        article footer #comments .form-submit:hover {
            background: <?php echo $btn_color; ?>;
        }

        .post-password-form input[type=submit] {
            background: <?php echo $btn_color; ?>;
        }
        .post-password-form input[type=submit]:hover {
            background: <?php echo $brand_color; ?>;
        }

        aside .widget .widget-title {
            color: <?php echo $brand_color; ?>;
        }

        aside .widget ul li a:hover {
            color: <?php echo $brand_color; ?>;
        }

        aside .widget_search .search-submit {
            background: <?php echo $btn_color; ?>;
        }
        aside .widget_search .search-submit:hover {
            background: <?php echo $brand_color; ?>;
        }

        .woocommerce ul.products li.product .price {
            color: <?php echo $btn_color; ?>;
        }

        .logged-in .woocommerce-MyAccount-navigation {
            background: rgba(<?php echo $btn_rgb; ?>, 0.9);
        }


        .logged-in .woocommerce-MyAccount-navigation ul li:hover {
            background: <?php echo $btn_color; ?>;
        }
        .woocommerce #respond input#submit,
        .woocommerce a.button,
        .woocommerce button.button,
        .woocommerce input.button {
            background: <?php echo $brand_color; ?> !important;
        }
        .woocommerce #respond input#submit:hover,
        .woocommerce a.button:hover,
        .woocommerce button.button:hover,
        .woocommerce input.button:hover {
            background: <?php echo $btn_color; ?> !important;
        }
        .woocommerce div.product p.price,
        .woocommerce div.product span.price {
            color: <?php echo $brand_color; ?>;
        }
        .woocommerce span.onsale {
            background-color: <?php echo $btn_color; ?>;
        }


        .woocommerce .woocommerce-Reviews input#submit {
            background: <?php echo $btn_color; ?> !important;
        }
        .woocommerce .woocommerce-Reviews input#submit:hover {
            background: <?php echo $brand_color; ?> !important;
        }

        .woocommerce .woocommerce-info,
        .woocommerce .woocommerce-message {
            border-top-color: <?php echo $btn_color; ?>;
            background: rgba(<?php echo $btn_rgb; ?>, 0.5);
        }


        .woocommerce a.checkout-button,
        .woocommerce #payment #place_order {
            background: <?php echo $btn_color; ?> !important;
        }
        .woocommerce a.checkout-button:hover,
        .woocommerce #payment #place_order:hover {
            background: <?php echo $brand_color; ?> !important;
        }


        .woocommerce form.checkout_coupon,
        .woocommerce form.login,
        .woocommerce form.register {
            background: rgba(<?php echo $btn_rgb; ?>, 0.2);
        }

        .woocommerce nav.woocommerce-pagination ul.page-numbers li .current {
            color: <?php echo $brand_color; ?>;
        }
        .woocommerce nav.woocommerce-pagination ul.page-numbers li:hover {
            background: <?php echo $brand_color; ?>;
        }
        .woocommerce nav.woocommerce-pagination ul.page-numbers li:hover a,
        .woocommerce nav.woocommerce-pagination ul.page-numbers li:hover span {
            color: <?php echo $btn_color; ?>;
        }

        .woocommerce ul.products li.product .button {
            background: <?php echo $brand_color; ?>;
        }
        .woocommerce ul.products li.product .button:hover {
            background: <?php echo $btn_color; ?>;
        }


        @media (max-width: 991px) {
            .lgx-schedule .lgx-tab .nav-pills .active::before {
                border-top: 50px solid <?php echo $brand_color; ?>;
            }
        }

        @media (max-width: 767px) {
            .navbar-default .navbar-toggle {
                border-color: <?php echo $brand_color; ?>;
            }
            .navbar-default .navbar-toggle .icon-bar {
                background-color: <?php echo $brand_color; ?>;
            }
            .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav .owl-next:hover,
            .lgx-testimonials .lgx-owltestimonial .owl-controls .owl-nav .owl-prev:hover {
                color: <?php echo $btn_color; ?>;
            }
        }

        @media (max-width: 480px) {
            .lgx-testimonials .lgx-owltestimonial .item .lgx-client-image figcaption {
                border: 2px solid <?php echo $brand_color; ?>;
            }
        }
        .lgx-blog-single .lgx-card-single header .author .comtitle {
            margin:-10px 0 15px;
        }

        .lgx-register .active .single-top .price span {
            color: #343d47 !important;
        }
    </style>
<?php }