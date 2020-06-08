/************* Main Js File ************************
    Template Name: Tefa - Portfolio Template
    Author: Mustafa729
    Version: 1.0
    Copyright 2018
*************************************************************/


/*------------------------------------------------------------------------------------
    
JS INDEX
=============

01 - Fade Out preloader
02 - Scroll To Section 
03 - Auto Type Setup
04 - Change Navbar Background And Padding
05 - Int Mixitup  
06 - Customize Popup js
07 - Testimonials Slider
08 - Team Slider
-------------------------------------------------------------------------------------*/

$( document ).ready(function() {
   
    'use strict';
    
    
    
    // 01 - Fade Out preloader
    $('.preloader').delay(1000).fadeOut(500);
    
    
    
    
    // 02 -Scroll To Section 
    $('.navbar-nav li a').on('click', function (e) {
        
        e.preventDefault();
        
        $('.navbar-nav li a').removeClass('active');
        
        $(this).addClass('active');
        
        $('html, body').animate({
           
            scrollTop: $('.' + $(this).data('scroll')).offset().top + 20
            
        }, 1000);
        
    });
    
    $(window).on('scroll', function () {
       
        $('section').each(function () {
           
            if ($(window).scrollTop() > $(this).offset().top) {
                
                $('.navbar-nav li a').removeClass('active');
                
                var blockID = $(this).attr('class');
                
                $('.navbar-nav li a[data-scroll="' + blockID + '"]').addClass('active');
                
            }
            
        });
        
    });
    
    
    
    // 03 - Auto Type Setup
    $('.header-content .text-part p span').typed({
        strings: ["PHP.", "JQuery.", "Codeigniter.", "Mysql."],
        loop: true,
        startDelay: 1000,
        backDelay: 2000
    });
    
    
    
    
    // 04 - Change Navbar Background And Padding
    var top = jQuery(document).scrollTop(),
         batas = 20;

    if (top > batas) {

        $('.navbar-tefa').addClass('nav-sticy');

    } else {

        $('.navbar-tefa').removeClass('nav-sticy');

    }
	$(window).on('scroll', function () {

	    var top = jQuery(document).scrollTop(),

	        batas = 20;
	    
	    if (top > batas) {

	        $('.navbar-tefa').addClass('nav-sticy');

	    } else {

	        $('.navbar-tefa').removeClass('nav-sticy');

	    }

	});	
    
    
    
    
    // 05 - Owl Carousel "Testimonials"
    $('.grid').mixItUp();
    
    

    
    // 06 - Customize Popup js
     $(".popup").magnificPopup({
            type: "image",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: true,
            gallery: {
              enabled: true
            }
        });
        $('.video').magnificPopup({
              type: 'iframe',
              iframe: {
                patterns: {
                  dailymotion: {
                    index: 'dailymotion.com',
                    id: function(url) {        
                        var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
                        if (m !== null) {
                            if(m[4] !== undefined) {
                                return m[4];
                            }
                            return m[2];
                        }
                        return null;
                    },
                    src: 'https://www.dailymotion.com/embed/video/%id%'
                  }
                }
              }
        });
    
    
    
    
    // 07 - Testimonials Slider
    $('.testimonials-slider').owlCarousel({
            loop:true,
            margin:10,
            items:3,
            nav: true,
            dots: false,
            center: true,
            responsiveClass:true,
            navText:["<i class='fa fa-long-arrow-left'></i>",
                     "<i class='fa fa-long-arrow-right'></i>"],
            responsive:{
                0:{items:1},
                480:{items:1},
                992:{items:3},
                1200:{items:3}
            }
        });
    
    
    
    
    // 08 - Team Slider
    $('.team-slider').owlCarousel({
            loop:false,
            margin:10,
            items:3,
            nav: false,
            dots: true,
            responsiveClass:true,
            responsive:{
                0:{items:1},
                480:{items:1},
                992:{items:3},
                1200:{items:3}
            }
        })
    
    
    
});