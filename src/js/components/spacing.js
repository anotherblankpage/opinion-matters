// Dynamic padding spacing for blocks cause why not
(function($) {
    $(document).ready(function() {
        grabPaddingData();
    });

    $(window).on('resize', function() {
        grabPaddingData();
    });

    function grabPaddingData() {
        $('[data-padding-top], [data-padding-bottom], [data-padding-left], [data-padding-right], [data-padding]').each(function() {
            if($(this).attr('data-padding-top')) {
                doPadding($(this), 'top', $(this).attr('data-padding-top'));
            }
            if($(this).attr('data-padding-bottom')) {
                doPadding($(this), 'bottom', $(this).attr('data-padding-bottom'));
            }
            if($(this).attr('data-padding-left')) {
                doPadding($(this), 'left', $(this).attr('data-padding-left'));
            }
            if($(this).attr('data-padding-right')) {
                doPadding($(this), 'right', $(this).attr('data-padding-right'));
            }
            if($(this).attr('data-padding')) {
                doPadding($(this), 'top', $(this).attr('data-padding'));
                doPadding($(this), 'bottom', $(this).attr('data-padding'));
                doPadding($(this), 'left', $(this).attr('data-padding'));
                doPadding($(this), 'right', $(this).attr('data-padding'));
            }
        });
    }

    function doPadding(ele, direction, amount) {
        var threshold = {
            lg: 24,
            md: 16
        };
        if($.isNumeric(amount)) {
            if($(window).width() >= 1680) {
                var newAmount = amount + 'px';
            }
            else if($(window).width() <= 768) {
                var newAmount = (amount/3 > threshold.md ? amount/3 : threshold.md) + 'px';
            }
            else {
                var newAmount = (amount / 180) * 10 + '%';
            }
        }
        else {
            var newAmount = amount;
        }
        ele.css('padding-' + direction, newAmount);
    }
})(jQuery);