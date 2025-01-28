// Video background stuff
(function($) {
    $(document).ready(function() {
        $('[data-vbg]').each(function() {
           $(this).youtube_background();
           let videoInstance = $(this).find('video');
           let startAt = $(this).attr('data-vbg-start-at') ? $(this).attr('data-vbg-start-at') : 0;
           let endAt = $(this).attr('data-vbg-end-at') * 1000; // Done in milliseconds

            // This is for html5 videos to loop properly
            if(videoInstance.length && startAt >= 0 && endAt > 0) {
                videoInstance.prop('currentTime', startAt);
                setInterval(function() {
                    videoInstance.prop('currentTime', startAt);
                }, endAt);
            }
            $(this).siblings('.video-background-popup').removeClass('hide');
        });
 
    });


})(jQuery);