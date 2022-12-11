;(function($){
    'use strict';
    //MENU ONEPAGE
    $(".site-navigation ul a,.main-header .logo a, .header-text-content a").on( "click", function(e) {
        var url     = $(this).attr("href"),
            target  = $(url).offset().top;
        $('html,body').animate({scrollTop:target -60 }, 'slow');
        return false;
    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if($(window).width()>1024){
            if (scroll >= 350) {
                $('.header-sticky').addClass('sticky-menu');
            } else {
                $('.header-sticky').removeClass('sticky-menu');
            }
            if (scroll >= 150) {
                $('.header-sticky').addClass('sticky-icon-action');
            } else {
                $('.header-sticky').removeClass('sticky-icon-action');
            }
            if (scroll >= 10) {
                $('.header-sticky').addClass('sticky-menu-transform');
            } else {
                $('.header-sticky').removeClass('sticky-menu-transform');
            }
        }
        if( scroll > 180) {
            $('.backtotop').show(300);
        } else {
            $('.backtotop').hide(300);
        }
    });
    //BACK TO TOP

    $('.backtotop').on( "click", function(e) {
        $('html,body').animate({scrollTop : 0},800);
        return false;
    });

    /* ---------------------------------------------
     Height Full
     --------------------------------------------- */

    function kt_height_full(){
        var height = $(window).outerHeight();
        $(".full-height").css("height",height);
    }
    function kt_width_full(){
        var width = $(window).outerWidth();
        $(".full-width").css("width",width);
    }

    function header_content_height(){
        var height = $(window).outerHeight(),
            window_width = $(window).outerWidth(),
            them  = 150,
            top = height;
        if( window_width < 768){
            them = 50;
        }
        height = height + them;

        $(".header-content").css("height",height);
        $(".header-content").css("margin-top",'-'+top+'px');
    }
    //Owl carousel
    function init_carousel(){
        $(".owl-carousel").each(function(index, el) {
            var owl     = $(this),
                config  = owl.data(),
                animateOut = owl.data('animateout'),
                animateIn  = owl.data('animatein'),
                slidespeed = owl.data('slidespeed');

            config.navText = ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'];
            if(typeof animateOut != 'undefined' ){
                config.animateOut = animateOut;
            }
            if(typeof animateIn != 'undefined' ){
                config.animateIn = animateIn;
            }
            if(typeof (slidespeed) != 'undefined' ){
                config.smartSpeed = slidespeed;
            }
            owl.owlCarousel(config);
        });
    }

    /* ---------------------------------------------
     Scripts initialization
     --------------------------------------------- */
    $(window).load(function() {
        kt_height_full();
        kt_width_full();
        header_content_height();
        init_carousel();

    });
    /* ---------------------------------------------
     Scripts resize
     --------------------------------------------- */
    $(window).on("resize", function() {
        kt_height_full();
        kt_width_full();
        header_content_height();
    });

    new WOW().init();
})(jQuery);
