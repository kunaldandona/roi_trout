jQuery(document).ready(function ($) {
    console.log('working', $('header').height());

    $.adjustHeader = function () {
        let headerHeight = $('header').height();
        let headerPos = $('header').offset().top;

        if ($('.arrow').hasClass('downArrow') && headerPos > 60) {
            $('#network_nav').css({ top: -headerHeight });
        } else {
            $('#network_nav').css({ top: headerHeight });
        }
    };

    $.toggleArrow = function () {
        if ($('.arrow').hasClass('downArrow')) {
            $('.arrow').removeClass('downArrow');
            $('.arrow').addClass('upArrow');
        } else {
            $('.arrow').removeClass('upArrow');
            $('.arrow').addClass('downArrow');
        }
    };

    $('.logo_container').click(function(e){
        e.preventDefault();
        $.toggleArrow($.adjustHeader());
    });

    $(window).scroll(function(){
        $.adjustHeader();
    });

});