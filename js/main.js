jQuery(document).ready(function ($) {
    console.log('working', $('header').outerHeight());

    $.adjustHeader = function () {
        let headerHeight = $('header').height();
        let headerPos = $('header').offset().top;

        if ($('.arrow').hasClass('upArrow')) {
            $('#network_nav').css({ top: headerHeight });
        } else {
            $('#network_nav').css({ top: '-60px' });
        }
    };

    $('.logo_container').click(function(e){
        e.preventDefault();
        $('.arrow').toggleClass("upArrow");
        $.adjustHeader();
    });

    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function (event) {
        didScroll = true;
        console.log($('header').offset().top);
    });

    setInterval(function () {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        let st = $(this).scrollTop();
        let headerHeight = $('header').outerHeight();


        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        $.adjustHeader();
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down


        } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up');
            }
        }

        lastScrollTop = st;
    }


});