jQuery(document).ready(function ($) {
    console.log('working', $('header').height());

    $.checkHeader = function () {
        let headerHeight = $('header').height();
        $('#network_nav').css({ top: $('header').height() });
    };

    $('.logo_container').click(function(e){
        e.preventDefault();
        $.checkHeader();
    });


});