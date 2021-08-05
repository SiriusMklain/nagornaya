const swiper = new Swiper('.swiper-star', {
	slidesPerView: 6,
	spaceBetween: 30,
	breakpoints: {
		320: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
			spaceBetween: 15,
		},
		992: {
			slidesPerView: 4,
			spaceBetween: 30,
		},
		1200: {
			slidesPerView: 5,
			spaceBetween: 30,
		}
	},
	navigation: {
        nextEl: '.swiper-person-next',
        prevEl: '.swiper-person-prev',
	},
});

$(document).ready(function() {
	var $videoSrc = '';

	$('.video-btn').click(function() {
		$videoSrc = $(this).data( "src" );
	});

	$('#person').on('shown.bs.modal', function (e) {
		$("#person-video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
	});

	$('#person').on('hide.bs.modal', function (e) {
		$("#person-video").attr('src', '');
	});
});
