jQuery(document).ready(function ($) {
    console.log('working', $('header').height());

    $.adjustHeader = function () {
        let headerHeight = $('header').height();
        console.log('1');
        if ($('.arrow').hasClass('downArrow')){
            console.log('2');
            $('#network_nav').css({ top: headerHeight });
        } else {
            console.log('3');
            $('#network_nav').css({ top: -headerHeight });
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
        $.toggleArrow(function () {
            console.log('toggle done');
            $.adjustHeader();
        });
    });


});