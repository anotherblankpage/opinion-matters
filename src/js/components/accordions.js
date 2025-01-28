
(function($) {
    $(document).ready(function() {
        $('.accordion-trigger').on('click', function() {
            $(this).parent().addClass('expand');
            $(this).parent().siblings().removeClass('expand');
        });
    });
})(jQuery);