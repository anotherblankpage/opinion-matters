const { auto } = require("@popperjs/core");

// swiper stuff
(function($) {
  $(document).ready(function() {

    $('.slick').each(function() {
      var slidesToShow = $(this).attr('data-num-slides') ? parseInt($(this).attr('data-num-slides')) : 3;
      var autoplaySpeed  = $(this).attr('data-autoplayspeed') ? parseInt($(this).attr('data-autoplayspeed')) : 1500;
      var haveArrows = $(this).attr('data-arrows') ? true : false;
      var arrowContainer = $(this).attr('data-arrow-ele');
      var prevArrow = $(arrowContainer).find('.slick-prev');
      var nextArrow = $(arrowContainer).find('.slick-next');
      let options = {
            lazyLoad: 'ondemand',
            autoplaySpeed: autoplaySpeed,
            centerPadding: '92px',
            centerMode: true,
            slidesToShow: slidesToShow,
            loop: true,
            autoplay: true,
            appendArrows: arrowContainer,
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            arrows: haveArrows,
            responsive: [
                {
                    breakpoint: 1920,
                    settings: {
                      slidesToShow: slidesToShow
                    }
                },
                {
                    breakpoint: 1680,
                    settings: {
                      slidesToShow: slidesToShow
                    }
                },
                {
                  breakpoint: 1300,
                  settings: {
                    slidesToShow: slidesToShow - 1
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    centerPadding: '0',
                    slidesToShow: 1
                  }
                }
            ]
        }
        const slider = $(this).slick(options);
    });

    $('.timezone').each(function() {
      let options =  {
        slidesToShow: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 1500,
        fade: true,
      };
      const slider = $(this).slick(options);
    });

    // $('.column-wrapper').each(function() {
    //   var imgArr = $(this).children('.component-wrapper').filter(function() {
    //     return $(this).has('.img-wrapper').length > 0;
    //   }).map(function() {
    //     return $('<div class="w-100"></div>').append($(this).clone())[0];
    //   }).toArray();
    //   if(imgArr.length > 1) {
    //     var newDiv = $('<div></div>').addClass('slick w-100 d-block d-lg-none');
    //     newDiv.append(imgArr);
    //     $(this).append(newDiv);
    //     newDiv.slick({
    //       // Add your Slick slider options here
    //       slidesToShow: 1,
    //       slidesToScroll: 1,
    //       dots: false,
    //       arrows: false,
    //       infinite: true
    //     });
    //   }
    // });

  });
})(jQuery);

