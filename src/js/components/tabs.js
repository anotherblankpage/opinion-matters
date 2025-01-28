// Tabs
(function($) {
   $(document).ready(function() {
      $('[data-bs-tabs]').on('click', function() {
         var tarParent = $(this).attr('data-bs-parent');
         $(tarParent).find('.collapse').removeClass('show');
         $(this).parent().siblings().find('[data-bs-tabs]').addClass('collapsed');
         if(window.innerWidth < 1280){
            $([document.documentElement, document.body]).animate({
               scrollTop: $(this).offset().top - 125
            }, 0);
         }
      });
   });
})(jQuery);