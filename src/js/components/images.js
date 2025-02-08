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


        // Image shape wrapper fallback
        $('.img-shape-wrapper').each(function() {
            let imageEle = $(this).find('.img-shape-wrapper__image');
            imagesLoaded(imageEle, {background: true})
            .on('fail', function() {
                $(this).closest('.img-shape-wrapper').find('.img-shape-wrapper__fallback').removeClass('hide');
                console.info('SVG Image failed to load, using fallback');
            });
        });

    });
})(jQuery);