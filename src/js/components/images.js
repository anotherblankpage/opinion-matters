// Overengineering image optimization
(function($) {
    $(document).ready(function() {
        $('.img-wrapper').each(function() {
            let image = $(this);
            $(this).imagesLoaded().done( function() {
                let height = parseInt(image.attr('data-height'));
                let width =  parseInt(image.attr('data-width'));
                let paddingTop = $.isNumeric(height / width) ? height / width : 1; 
                if($.isNumeric(paddingTop)) {
                    image.css({
                        'padding-top': 'calc(' + paddingTop + ' * 100%)'
                    });
                }
            });
        });
    });
})(jQuery);