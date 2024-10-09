// jquery wrapper   
jQuery(document).ready(function($) {

    if (document.querySelector('.sliderTop')) {
        var mobile_breakpoint = 1200;
        setTimeout(() => {
            var swiper = new Swiper('.sliderTop', {
                autoHeight: true,
                slidesPerView: 1,
                spaceBetween: 0,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
                    direction: 'left',
                },
                observer: true,
                observeParents: true,
                observeSlideChildren: true,
                autoplay: {
                    delay: 5000,
                },
                navigation: {
                    nextEl: '.sliderTop .swiper-button-next',
                    prevEl: '.sliderTop .swiper-button-prev',
                },
                pagination: {
                    el: '.sliderTop .swiper-pagination',
                    type: 'fraction',
                    clickable: true,
                    renderFraction: function(currentClass, totalClass) {
                        return '<span class="' + currentClass + '"></span>' +
                            '<span class="fraction-divider"></span>' +
                            '<span class="' + totalClass + '"></span>';
                    },
                },
                on: {
                    init: function() {
                        if ($(window).width() > mobile_breakpoint) {
                            load_home_banner();
                        }
                    },
                    transitionEnd: function() {
                        if ($(window).width() > mobile_breakpoint) {
                            load_home_banner();
                        }
                    },
                },
            });
        }, "100");
    
        function load_home_banner() {
            var
                active_banner_slide = (".sliderTop .swiper-slide.swiper-slide-active"),
                active_banner_heading = (".sliderTop .swiper-slide.swiper-slide-active .sliderTop_title > div"),
                active_banner_logo = (".sliderTop .swiper-slide.swiper-slide-active .sliderTop_logo > img"),
                active_banner_location = (".sliderTop .swiper-slide.swiper-slide-active .sliderTop_center"),
                active_banner_description = (".sliderTop .swiper-slide.swiper-slide-active .sliderTop_description"),
                active_banner_img = (".sliderTop .swiper-slide.swiper-slide-active .sliderTop_img-bg"),
                non_active_banner_img = (".sliderTop .swiper-slide:not(.swiper-slide-active) .sliderTop_img-bg"),
                active_banner_button = (".sliderTop .swiper-slide.swiper-slide-active .sliderTop_button"),
                active_banner_button_text = (".sliderTop .swiper-slide.swiper-slide-active .sliderTop_button > span");
    
            tl = new TimelineLite({});
            $(active_banner_button).removeClass("active_animation");
            $(active_banner_slide).removeClass("active_animation");
            tl
                .fromTo(active_banner_logo, 1, { y: 100, opacity: 0 }, { y: 0, opacity: 1 })
                .fromTo(active_banner_location, 1, { y: 10, opacity: 0 }, { y: 0, opacity: 1, onComplete: function() { $(active_banner_slide).addClass('active_animation') } }, "-=0.5")
                .fromTo(active_banner_description, 1, { y: 10, opacity: 0 }, { y: 0, opacity: 1, onComplete: add_active_banner_button }, "-=0.5")
                .staggerFromTo(active_banner_button_text, 1, { y: 10, opacity: 0 }, { y: 0, opacity: 1 }, "-=0.5")
        }
    
        function add_active_banner_button() {
            $('.swiper-slide.swiper-slide-active .sliderTop_button').addClass('active_animation');
        }
    }
    

});