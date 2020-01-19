jQuery(document).ready(function ($) {

    var headTop = $('header').height() + $('#top-header').height();

    $.adjustHeader = function () {
        let headerPos = $('header').offset().top;

        if ($('.arrow').hasClass('upArrow')) {
            $('#network_nav').css({ top: $('header').height() + $('#top-header').height() - 1});
        } else {
            $('#network_nav').css({ top: '-60px' });
        }

        if(headerPos <= 60 && $('.arrow').hasClass('upArrow')) {
            $('#network_nav').css({ top: headTop - 1 });
        } else if(headerPos > 60 && $('.arrow').hasClass('upArrow')) {
            $('#network_nav').css({ top: headTop-21 });
        }

        if(headerPos <= 60){
            $('.arrow img').attr('width', 40);
            $('.arrow img').attr('height', 40);
        } else {
            $('.arrow img').attr('width', 30);
            $('.arrow img').attr('height', 30);
        }
    };

    $('.logo_container').click(function(e){
        e.preventDefault();
        $('.arrow').toggleClass("upArrow");
        $.adjustHeader();
    });

    var state = false;

    $('.logo_container').hover(() =>{
        if(!$('.arrow').hasClass("upArrow")) {
            $('.arrow').toggleClass("upArrow");
            $.adjustHeader();
        }
    }, () => {
        $.adjustHeader();
    });

    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function (event) {
        didScroll = true;
    });

    setInterval(function () {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        let st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta)
            return;


        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $('.arrow').removeClass("upArrow");
            $.adjustHeader();
        } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $.adjustHeader();
            }
        }

        lastScrollTop = st;
    }






});