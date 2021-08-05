(function ($) {

    $('.owl-carousel').owlCarousel({
        items: 1,
        lazyLoad: true,
        loop: true,
        margin: 35,
        nav: false,
        rewind: false,
        dots: false,
        touchDrag: true,
        mouseDrag: true,
        autoplay: false
    });
    $('#partners').owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });
    $('#gallery').owlCarousel({
        margin: 10,
        nav: true,
        dots: false,

        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    $('#stars').owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });
    $(function () {
        $('ul.tabs__caption').each(function () {
            $(this).find('li').each(function (i) {
                $(this).click(function () {
                    $(this).addClass('active').siblings().removeClass('active')
                            .closest('div.tabs').find('div.tabs__content').removeClass('active').eq(i).addClass('active');
                });
            });
        });
    });

    $('.size-form input').on('input', function () {
        if ($(this).val() > 0) {
            $('.product-item-detail-price-current').hide();
            $('.product-item-amount-field-container').hide();
            $('.product-item-detail-buy-button').hide();
            $('.one-click').show();
            $('.one-click > .product-item-detail-buy-button').show();
        } else {
            $('.product-item-detail-price-current').show();
            $('.product-item-amount-field-container').show();
            $('.product-item-detail-buy-button').show();
            $('.one-click').hide();
            $('.one-click > .product-item-detail-buy-button').hide();
            $('.cant_buy').hide();
        }
    });
    $('.owl-carousel .owl-dots').each(function () {
        $(this).children('.owl-dot').css('width', 100 / $(this).children('.owl-dot').length + '%');
    });
    $('.tabs__content').hide();



    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }

    });

    if ($(window).width() < 768) {
        $('.bx-inclinksfooter-container').hide();
        $('.bx-footer-section .bx-block-title').on('click', function () {
            $(this).next(".bx-inclinksfooter-container").toggle();
        });
    }
    ;
    $(function () {
        $.fn.scrollToTop = function () {
            $(this).hide().removeAttr("href");
            if ($(window).scrollTop() >= "250")
                $(this).fadeIn("slow");
            var scrollDiv = $(this);
            $(window).scroll(function () {
                if ($(window).scrollTop() <= "250")
                    $(scrollDiv).fadeOut("slow");
                else
                    $(scrollDiv).fadeIn("slow");
            });
            $(this).click(function () {
                $("html, body").animate({scrollTop: 0}, "slow");
            });
        };
    });
    $(function () {
        $("#go_top").scrollToTop();
    });

    $(document).ready(function () {
        var date = new Date(new Date().getTime() + 600 * 1000);
        $('#line_display').click(function () {
            $(this).addClass('use_display');
            document.cookie = "type_display=line; path=/; expires=" + date.toUTCString();
            location.reload();
        });
        $('#table_display').click(function () {
            $(this).addClass('use_display');
            document.cookie = "type_display=table; path=/; expires=" + date.toUTCString();
            location.reload();
        });
    });

    $(document).ready(function () {
        $('.magnificPopup').magnificPopup({type: 'image', mainClass: 'mfp-img-mobile', gallery: {enabled: true, navigateByImgClick: true, preload: [0, 1]}});
    });

    $(document).ready(function () {
        

        $('[name="SIMPLE_FORM_3"]').submit(function (e) {
            yaCounter49127092.reachGoal('callback');
            ga('md.send', 'event', 'Form', 'Callback', 'h-Send');
        });
        $('[name="SIMPLE_FORM_4"]').submit(function (e) {
            yaCounter49127092.reachGoal('callback');
            ga('md.send', 'event', 'Form', 'Callback', 'h-Send');
        });
    });

})(jQuery);

