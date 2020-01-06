jQuery(document).ready(function ($) {
    console.log('working', $('header').height());

    $('.logo_container').click(function(e){
        e.preventDefault();
        $('#network_nav').css({ top: $('header').height() });
    });


});