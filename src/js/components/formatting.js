// Overengineering image optimization
(function($) {
    $(document).ready(function() {
        $('p').each(function() {
            if($(this).text() == '\u00a0') {
                $(this).addClass('m-0');
            }
        });
    });
})(jQuery);