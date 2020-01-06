jQuery(document).ready(function ($) {
    console.log('working', $('header').height());

    $.adjustHeader = function () {
        let headerHeight = $('header').height();
        $('#network_nav').css({ top: headerHeight });
    };
    $.toggleArrow = function () {
        if ( $('#network_nav').css('top') > 0 ) {
            $('.logo_container .arrow img').css({ transform: 'rotate(180deg)' });
        } else {
            $('.logo_container .arrow img').css({ transform: 'rotate(0deg)' });

        }
    };

    $('.logo_container').click(function(e){
        e.preventDefault();
        $.adjustHeader();
        $.toggleArrow();
    });


});