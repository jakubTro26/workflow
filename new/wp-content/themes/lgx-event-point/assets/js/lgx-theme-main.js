(function($) {
    "use strict";
    


    $(document).ready(function() {
            // gallery slider
        $(".slider-container").ikSlider({
          speed: 500
        });

        // responsive menu 
        if($(window).width() < 767){ 
            $('#lgx-mn li a.dropdown-toggle').attr('data-toggle','dropdown');
        }

        // mailchimp script
        $('.lgx-subscriber form.mc4wp-form').addClass('subscribe-form lgx-subscribe-form');

        /*=========================================================================
         ===  MENU SCROLL FIXED
         ========================================================================== */
        var s = $(".lgx-header");
        var pos = s.position();

        $(window).on('scroll', function () {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top) {
                s.addClass("menu-onscroll");
            } else {
                s.removeClass("menu-onscroll");
            }
        });
        /*=========================================================================
         ===  MENU SCROLL FIXED END
         ========================================================================== */


        /*=========================================================================
         ===  Circular CountDown
         ========================================================================== */
        if ( $('#circular-countdown').length ) {
            var gday = lgxScript.grdnt_day;
            var hour = lgxScript.grdnt_hour;
            var min = lgxScript.grdnt_min;
            var sec = lgxScript.grdnt_sec;
            $("#circular-countdown").TimeCircles({
                "animation": "smooth",
                "bg_width": 1.0,
                "fg_width": 0.1,
                "circle_bg_color": "#ddd",
                "time": {
                    "Days": {
                        "text": "Days",
                        "color": gday,
                        "show": true
                    },
                    "Hours": {
                        "text": "Hours",
                        "color": hour,
                        "show": true
                    },
                    "Minutes": {
                        "text": "Minutes",
                        "color": min,
                        "show": true
                    },
                    "Seconds": {
                        "text": "Seconds",
                        "color": sec,
                        "show": true
                    }
                }
            });
        }
        /*=========================================================================
         ===  Circular CountDown End
         ========================================================================== */

 
        /*=========================================================================
         ===  countdown
         ========================================================================== */
        if ( $('#lgx-countdown').length ) {

            var dataTime = $('#lgx-countdown').data('date'); // Date Format : Y/m/d
            var day = lgxScript.days;
            var hour = lgxScript.hours;
            var minute = lgxScript.minutes;
            var sec = lgxScript.secs;

            $('#lgx-countdown').countdown(dataTime, function(event) {
                var $this = $(this).html(event.strftime(''
                        /*+ '<span class="lgx-weecks">%w <i> weeks </i></span> '*/
                    + '<span class="lgx-days">%D <i> '+ day +' </i></span> '
                    + '<span class="lgx-hr">%H <i> '+ hour +' </i></span> '
                    + '<span class="lgx-min">%M <i> '+ minute +' </i></span> '
                    + '<span class="lgx-sec">%S <i> '+ sec +' </i></span>'
                ));
            });
        }

        /*=========================================================================
         ===  countdown END
         ========================================================================== */


        /*=========================================================================
         ===  SMOOTH SCROLL - REQUIRES JQUERY EASING PLUGIN
         ========================================================================== */

        $( 'a.lgx-scroll' ).on( 'click', function(event) {
            var $anchor = $(this);
            var topTo   = $( $anchor.attr('href') ).offset().top;

            if ( window.innerWidth < 768 ) {
                topTo = ( topTo - 90 );
            }

            $( 'html, body' ).stop().animate({
                scrollTop: topTo
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
            return false;
        } );

        /*=========================================================================
         ===  SMOOTH SCROLL END
         ========================================================================== */

        /*=========================================================================
         ===  HOME PAGE Slider
         ========================================================================== */
        if ($("#lgx-main-slider").length) {
            $("#lgx-main-slider").owlCarousel({
                margin: 0,
                items: 1,
                loop: true,
                rtl: true,
                autoplay:true,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplayTimeout: 5000,
                autoplaySpeed: 500,
                nav: true,
                addClassActive : true
            });
        }
        /*=========================================================================
         ===  HOME PAGE Slider END
         ========================================================================== */

        /*=========================================================================
         ===  Content SLIDER
         ========================================================================== */
        if ($('#lgx-owlcontslider').length) {
            $("#lgx-owlcontslider").owlCarousel({
                margin: 0,
                items: 1,
                rtl: true,
                loop: true,
                autoplay:true,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplayTimeout: 4000,
                autoplaySpeed: 500,
                nav: true,
                addClassActive : true
            });
        }
        /*=========================================================================
         ===  Content SLIDER END
         ========================================================================== */


        /*=========================================================================
         ===  Typed Animation START
         ========================================================================== */
       var type = lgxScript.typed_string;  
        if($('#lgx-typed-string').length){ 
          
            $('#lgx-typed-string').typed({
                strings: type,
                // typing speed
                typeSpeed: 10,
                // time before typing starts
                startDelay: 0,
                // backspacing speed
                backSpeed: 0,
                // shuffle the strings
                shuffle: false,
                // time before backspacing
                backDelay: 500,
                // loop
                loop: true,
                // false = infinite
                loopCount: false,
                // show cursor
                showCursor: true,
                // character for cursor
                cursorChar: "|",
                // either html or text
                contentType: 'html'
            });
        }

        /*=========================================================================
         ===  Typed Animation END
         ========================================================================== */

 

    });//DOM READY

})(jQuery);




