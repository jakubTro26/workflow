(function($) {
    "use strict";
    $(document).ready(function() {

        /*=========================================================================
         ===  TESTIMONIAL SLIDER
         ========================================================================== */
        if ($('.lgx-owltestimonial').length) {
            $(".lgx-owltestimonial").owlCarousel({
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
         ===  TESTIMONIAL SLIDER END
         ========================================================================== */


        /*=========================================================================
         ===  Modal Video
         ========================================================================== */
        /* Get iframe src attribute value i.e. YouTube video url
         and store it in a variable */
        var url = $("#modalvideo").attr('src');

        /* Remove iframe src attribute on page load to
         prevent autoplay in background */
        $("#modalvideo").attr('src', '');

        /* Assign the initially stored url back to the iframe src
         attribute when modal is displayed */
        $("#lgx-modal").on('shown.bs.modal', function(){
            $("#modalvideo").attr('src', url);
        });

        /* Assign empty url value to the iframe src attribute when
         modal hide, which stop the video playing */
        $("#lgx-modal").on('hide.bs.modal', function(){
            $("#modalvideo").attr('src', '');
        });
        /*=========================================================================
         ===  Modal Video END
         ======
         ==================================================================== */

        /*=========================================================================
         ===  magnific popup
         ========================================================================== */
        $('.lgx-photo-gallery').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {
                enabled: true
            },
            image: {
                titleSrc: 'title'
            }
            // other options
        });
        /*=========================================================================
         ===  magnific popup END
         ========================================================================== */


    });//DOM READY

})(jQuery);




