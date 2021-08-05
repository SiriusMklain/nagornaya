// (function ($) {
//
//     $('.owl-carousel').owlCarousel({
//         items: 1,
//         lazyLoad: true,
//         loop: false,
//         margin: 35,
//         nav: false,
//         rewind: false,
//         dots: false,
//         touchDrag: true,
//         mouseDrag: true,
//         autoplay: false
//     });
//     $('#partners').owlCarousel({
//         margin: 10,
//         nav: true,
//         dots: false,
//         lazyLoad: true,
//         responsive: {
//             0: {
//                 items: 1
//             },
//             600: {
//                 items: 3
//             },
//             1000: {
//                 items: 6
//             }
//         }
//     });
//     $('#stars').owlCarousel({
//         margin: 10,
//         nav: true,
//         dots: false,
//         lazyLoad: true,
//         responsive: {
//             0: {
//                 items: 1
//             },
//             600: {
//                 items: 3
//             },
//             1000: {
//                 items: 6
//             }
//         }
//     });
//     $(function () {
//         $('ul.tabs__caption').each(function () {
//             $(this).find('li').each(function (i) {
//                 $(this).click(function () {
//                     $(this).addClass('active').siblings().removeClass('active')
//                             .closest('div.tabs').find('div.tabs__content').removeClass('active').eq(i).addClass('active');
//                 });
//             });
//         });
//     });
//
//     $('.size-form input').on('input', function () {
//         if ($(this).val() > 0) {
//             $('.product-item-detail-price-current').hide();
//             $('.product-item-amount-field-container').hide();
//             $('.product-item-detail-buy-button').hide();
//             $('.one-click').show();
//             $('.one-click > .product-item-detail-buy-button').show();
//         } else {
//             $('.product-item-detail-price-current').show();
//             $('.product-item-amount-field-container').show();
//             $('.product-item-detail-buy-button').show();
//             $('.one-click').hide();
//             $('.one-click > .product-item-detail-buy-button').hide();
//             $('.cant_buy').hide();
//         }
//     });
//     $('.owl-carousel .owl-dots').each(function () {
//         $(this).children('.owl-dot').css('width', 100 / $(this).children('.owl-dot').length + '%');
//     });
//     $('.tabs__content').hide();
//
//     $(".catalog-section .owl-stage-outer, .catalog-products-viewed .owl-stage-outer, .product-gallery > .owl-stage-outer").mCustomScrollbar({
//         axis: "x", // horizontal scrollbar
//         theme: "dark",
//         moveDragger: true,
//         mouseDragger: true,
//         scrollButtons: {enable: true},
//         autoExpandScrollbar: true,
//         mouseWheel: {
//             enable: false
//         }
//
//     });
//
//
//     $(".mCSB_dragger").on("click", function () {
//         $('.owl-stage-outer').mCustomScrollbar('scrollTo', '-=350');
//     });
//
//     if ($(window).width() < 768) {
//         $('.bx-inclinksfooter-container').hide();
//         $('.bx-footer-section .bx-block-title').on('click', function () {
//             $(this).next(".bx-inclinksfooter-container").toggle();
//         });
//     }
//     ;
//     $(function () {
//         $.fn.scrollToTop = function () {
//             $(this).hide().removeAttr("href");
//             if ($(window).scrollTop() >= "250")
//                 $(this).fadeIn("slow");
//             var scrollDiv = $(this);
//             $(window).scroll(function () {
//                 if ($(window).scrollTop() <= "250")
//                     $(scrollDiv).fadeOut("slow");
//                 else
//                     $(scrollDiv).fadeIn("slow");
//             });
//             $(this).click(function () {
//                 $("html, body").animate({scrollTop: 0}, "slow");
//             });
//         };
//     });
//     $(function () {
//         $("#go_top").scrollToTop();
//     });
//
//     $(document).ready(function () {
//         var date = new Date(new Date().getTime() + 600 * 1000);
//         $('#line_display').click(function () {
//             $(this).addClass('use_display');
//             document.cookie = "type_display=line; path=/; expires=" + date.toUTCString();
//             location.reload();
//         });
//
//         $('#table_display').click(function () {
//             $(this).addClass('use_display');
//             document.cookie = "type_display=table; path=/; expires=" + date.toUTCString();
//             location.reload();
//         });
//
//
//     });
//
// 	var cl_counter = 0;
// 	$('input[name="form_text_12"]').mask('+7 (999) 999-99-99');
//
//     $('[name="SIMPLE_FORM_3"]').submit(function (e) {
// 		cl_counter++;
// 		if(cl_counter > 1) {
// 			$('div[id*="wait_comp_"]').fadeOut();
// 			return false;
// 		} else {
//            ym(31938491,'reachGoal','callback');
//            ym(49127092,'reachGoal','callback');
//            ga('md.send', 'event', 'Form', 'Callback', 'h-Send');
// 		   $('[name="web_form_submit"]').css('background', '#a7a7a7');
// 		   $('[name="web_form_submit"]').val('Подождите...');
// 		}
//     });
//
//     $('[name="SIMPLE_FORM_7"]').submit(function (e) {
// 			cl_counter++;
// 			if(cl_counter > 1) {
// 				$('div[id*="wait_comp_"]').fadeOut();
// 				return false;
// 			} else {
// 				ym(49127092,'reachGoal','callback-right');
// 				ym($(".yandex-calc").attr("data-id"),'reachGoal','callback-right');
//
// 				ga('md.send', 'event', 'Form', 'Callback', 'h-Send');
// 				fbq('track', 'Contact');
// 				$('[name="web_form_submit"]').css('background', '#a7a7a7');
// 				$('[name="web_form_submit"]').val('Подождите...');
// 			}
//         });
//
//
//         $('[name="SIMPLE_FORM_8"]').submit(function (e) {
// 			cl_counter++;
// 			if(cl_counter > 1) {
// 				$('div[id*="wait_comp_"]').fadeOut();
// 				return false;
// 			} else {
// 				ym(49127092,'reachGoal','callback-btn');
// 				ym($(".yandex-calc").attr("data-id"),'reachGoal','callback-btn');
//
// 				ga('md.send', 'event', 'Form', 'Callback', 'h-Send');
// 				fbq('track', 'Contact');
// 				$('[name="web_form_submit"]').css('background', '#a7a7a7');
// 				$('[name="web_form_submit"]').val('Подождите...');
// 			}
//         });
//
//         $('[name="SIMPLE_FORM_2"]').submit(function (e) {
// 			ym(49127092,'reachGoal','callback-btn');
// 				ym($(".yandex-calc").attr("data-id"),'reachGoal','callback-btn');
//
// 				ga('md.send', 'event', 'Form', 'Callback', 'h-Send');
// 				fbq('track', 'Contact');
//         });
//
//     $(".work-time__mail").bind('click', function (e) {
//
// 			ga('md.send', 'event', 'mail_click', 'click', 'h-success');
// 			ga('send', 'event', 'mail_click', 'click', 'success');
//
// 			// yaCounter23290744.reachGoal('mail_click');
//
// 			dataLayer.push({
// 				'event': 'email copy'});
//
// 			$(".work-time__mail").off('click');
//
// 			ym(49127092,'reachGoal','mail_click');
// 			ym(31938491,'reachGoal','mail_click');
// 		});
//
// 	 $(".product-item-button-container>a.btn").bind('click', function (e) {
//
//
//
// 			dataLayer.push({
// 				'event': 'cart_add'});
//
// 			$(".product-item-button-container>a.btn").off('click');
//
// 			ym(49127092,'reachGoal','cart_add');
// 			ym(31938491,'reachGoal','cart_add');
// 		});
//
// 	$(".bx_subscribe_submit_container>button.btn-subscribe").bind('click', function (e) {
//
// 			dataLayer.push({
// 				'event': 'subscribe'});
//
// 			$(".bx_subscribe_submit_container>button.btn-subscribe").off('click');
//
// 			ym(31938491,'reachGoal','subscribe');
// 		});
//
// 	$(".work-time__mail").bind('copy', function (e) {
//
// 			ga('md.send', 'event', 'mail_copy', 'copy', 'h-success');
// 			ga('send', 'event', 'mail_copy', 'copy', 'success');
//
// 			//yaCounter23290744.reachGoal('mail_copy');
// 			ym(49127092,'reachGoal','mail_copy');
// 			ym(31938491,'reachGoal','mail_copy');
//
// 			$(".work-time__mail").off('copy');
//
// 		});
//
// 	$(".header-contact__phone").bind('click', function (e) {
//
// 			ga('md.send', 'event', 'mail_click', 'click', 'h-success', 'tel-click');
// 			ga('send', 'event', 'mail_click', 'click', 'success', 'tel-click');
//
// 			// yaCounter23290744.reachGoal('mail_click');
//
// 			dataLayer.push({
// 				'event': 'tel-click'});
//
// 			$(".header-contact__phone").off('click');
//
// 			ym(49127092,'reachGoal','tel-click');
// 			ym(31938491,'reachGoal','tel-click');
//
// 			//yaCounter49127092.reachGoal('vse');
//
// 		});
//
//
//
// })(jQuery);
