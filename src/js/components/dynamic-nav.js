// Logo changes between light and dark depending on the background it's over
(function($) {
    if($('.dynamic-nav').length) {
        updateLogoColor();
        $(window).on('scroll', function() {
            updateLogoColor();
        });
    }

    function updateLogoColor() {
        let triggerLight = false;
        $('.background--dark').each(function() {
            let brandPos = $('.navbar-brand').offset().top;
            let eleTopPos = $(this).offset().top;
            let eleBottomPos = eleTopPos + $(this).outerHeight();
            if(brandPos >= eleTopPos && brandPos <= eleBottomPos) {
                triggerLight = true;
            }
        });
        if(triggerLight) {
            $('.navbar-brand').addClass('lighten');
        } 
        else {
            $('.navbar-brand').removeClass('lighten');
        }
    }
})(jQuery);


