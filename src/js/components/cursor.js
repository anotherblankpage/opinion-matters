// Cursor stuff
(function($) {
    $(document).ready(function() {
        var cursorTop;
        var cursorLeft;

        $(document).mousemove(function(e) {
            updateCursor(e);
        });

        function updateCursor(e) {
            if(e.pageX) {
                cursorLeft = e.pageX
            }
            if(e.pageY) {
                cursorTop = e.pageY - $(window).scrollTop()
            }
            $('.cursor').css({
            "left": cursorLeft,
            "top": cursorTop
          });
        }
        

        // Links
        $("a, button").mouseenter(function(){
            $('.cursor').addClass('hover');
        })
        .mouseleave(function(){
            $('.cursor').removeClass('hover');
        });

        // Dark backgrounds
        $('.bg-mono-900, .bg-mono-800, .navbar, .bg-mono-700, .background--dark, .img-wrapper, .badge').mouseenter(function(){
            $('.cursor').addClass('light');
        })
        .mouseleave(function(){
            $('.cursor').removeClass('light');
        });

        // Light backgrounds
        $('.heading-block__foreground-wrapper').mouseenter(function(){
            $('.cursor').addClass('dark');
        })
        .mouseleave(function(){
            $('.cursor').removeClass('dark');
        });

    });
})(jQuery);