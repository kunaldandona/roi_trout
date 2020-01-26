jQuery(document).ready(function ($) {

    var headTop = $('header').height() + $('#top-header').height();

    $.adjustHeader = function () {
        let headerPos = $('header').offset().top;

        if ($('.arrow').hasClass('upArrow')) {
            $('#network_nav').css({ top: $('header').outerHeight() + $('#top-header').outerHeight() });
            console.log('condition 1');
        } else {
            $('#network_nav').css({ top: '-60px' });
            console.log('condition 2');
        }

        if(headerPos <= 60 && $('.arrow').hasClass('upArrow')) {
            $('#network_nav').css({ top: headTop  });
        } else if(headerPos > 60 && $('.arrow').hasClass('upArrow')) {

            if($('body').hasClass('home')){
                $('#network_nav').css({ top: headTop-21 });
            } else {
                $('#network_nav').css({ top: $('header').height() + $('#top-header').height() });
            }
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
    var delta = 3;
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

    var checkExist = setInterval(function() {
        if ($(".et_mobile_menu" ).length === 1) {
            $('.et_mobile_menu .single-menu, .et_mobile_menu .mega-menu').wrapAll('<div class="primary-mob">','</div>');
            $('.et_mobile_menu .second').wrapAll('<div class="second-mob">','</div>');
            $( "#mobile_menu .menu-item-has-children > a" ).unbind();
            $(".menu-item-has-children > a").each(function(i) {
                var $content = $('.primary-mob .sub-menu').eq(i);
                $(this).clone().prependTo($content);
            });
            $(".primary-mob .sub-menu").prepend("<li class='back-menu'><a>Go Back</a></li>");
            $('.primary-mob .menu-item-has-children > a').click((e) => {
                e.preventDefault();
                var value = $(e.target).next();
                value.addClass("active-sub-menu");
            });

            $('.mobile_menu_bar').click(() => {
                $('.active-sub-menu').removeClass('active-sub-menu');
            });

            $('.back-menu a').click((e) => {
                $(e.target).closest(".active-sub-menu").removeClass('active-sub-menu');
            });

            clearInterval(checkExist);
        }
    }, 500);
});