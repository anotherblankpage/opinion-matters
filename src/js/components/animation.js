import Textify from "textify.js";
import gsap from "gsap";
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Animation
(function($) {
    function isMobile() {
        return window.innerWidth <= 767;
    }
    $(window).load(function() {
        // Scroll Animation
        $('.block-animation').each(function() {
            $(this).attr('data-aos','fade-up');

        });
        AOS.init({
            once: true
        });

        $('.split-type').each(function() {
            splitType($(this));
        });


        function splitType(tar) {
            const layoutText = new SplitType(tar.find('.split-type__inner'), { types: "words" });
            const layoutTL = gsap.timeline();

            // Define different start and end values for mobile devices
            let startValue = isMobile() ? "top 65%" : "top 75%";
            let endValue = isMobile() ? "bottom 90%" : "bottom 80%";

            layoutTL.from(layoutText.words,{
            // Initial opacity for each word
            opacity: 0.25,
            // Stagger animation of each word
            stagger: 0.1,
            scrollTrigger: { 
                trigger: tar,
                // Trigger animation when .section_layout484 reaches certain part of the viewport
                start: startValue,
                // End animation when .section_layout484 reaches certain part of the viewport
                end: endValue,
                // Smooth transition based on scroll position
                scrub: 2 
            }
            });
        }

        // // Text Animation
        // if($(window).width() > 560) {
        //     var headingAnimation = new Textify({
        //         el: '.heading-animation',
        //         animation: {
        //         stagger: 0.05,
        //         duration: 1,
        //         delay: 0.5,
        //         ease: 'expo.inOut',
        //         animateProps: {"opacity":0,"y":"50"}
        //         }
        //     },gsap);

        //     var leftHeroAnimation = new Textify({
        //         el: '.hero-left-animation',
        //         animation: {
        //         stagger: 0.05,
        //         duration: 1,
        //         delay: 0.5,
        //         ease: 'expo.inOut',
        //         animateProps: {"opacity":0,"x":"50"}
        //         }
        //     },gsap);

        //     var rightHeroAnimation = new Textify({
        //         el: '.hero-right-animation',
        //         animation: {
        //         stagger: 0.05,
        //         duration: 1,
        //         delay: 0.5,
        //         ease: 'expo.inOut',
        //         animateProps: {"opacity":0,"x":"-50"}
        //         }
        //     },gsap);
            
            
        //     var paragraphAnimation = new Textify({
        //         el: '.paragraph-animation',
        //         splitType: 'lines',
        //         largeText: true,
        //         animation: {
        //         by: 'lines',
        //         delay: 0.3,
        //         stagger: 0.1,
        //         duration: 1.25,
        //         ease: 'expo.inOut',
        //         transformOrigin: 'left top',
        //         animateProps: {"y":"50","opacity":0}
        //         }
        //     }, gsap);
        // }

        // Background parallax
        var scroll;
        var $el = $('.parallax-background');

        $(window).on('scroll', function () {
            scroll = $(document).scrollTop();
            moveBackground();
        });

        function moveBackground() {
            $el.css({
                'background-position':'50%' + 'calc(30% + ' + (-.7*scroll) +'px)'
            });
        }
   
    });
})(jQuery);