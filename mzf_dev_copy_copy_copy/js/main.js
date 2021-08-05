

document.addEventListener('DOMContentLoaded', function(){

  const galleryThumbs = new Swiper('.swiper-adittional', {
    grabCursor: true,
    spaceBetween: 24,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });

  const galleryTop = new Swiper(".swiper-preview", {
    effect: "fade",
    watchOverflow: true,
    breakpoints: {
      320: {
        allowTouchMove: true,
        grabCursor: true,
        pagination: {
          el: '.swiper-pagination',
        }
      },
      768: {
        allowTouchMove: false,
        grabCursor: false,
        pagination: false
      }
    },
    fadeEffect: {
      crossFade: true,
    },
    thumbs: {
      swiper: galleryThumbs,
    },
  });

  let moreorder = document.querySelector(".show-order");

  if(moreorder) {
    moreorder.addEventListener("click", () => {
      let text = document.querySelector(".show-order");

      if (text.innerHTML === "Скрыть <i class=\"fas fa-arrow-up\"></i>") {
        text.innerHTML = "Показать все <i class=\"fas fa-arrow-down\"></i>";
      } else {
        text.innerHTML = "Скрыть <i class=\"fas fa-arrow-up\"></i>";
      }
    });
  }

  let moreorderend = document.querySelector(".show-order-end");

  if(moreorderend) {
    moreorderend.addEventListener("click", () => {
      let text = document.querySelector(".show-order-end");

      if (text.innerHTML === "Скрыть <i class=\"fas fa-arrow-up\"></i>") {
        text.innerHTML = "Показать все <i class=\"fas fa-arrow-down\"></i>";
      } else {
        text.innerHTML = "Скрыть <i class=\"fas fa-arrow-up\"></i>";
      }
    });
  }

  const person = new Swiper('.swiper-person', {
    slidesPerView: 6,
    spaceBetween: 30,
    observer: true,
    observeParents: true,
    navigation: {
      nextEl: '.swiper-person-next',
      prevEl: '.swiper-person-prev',
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 4,
        spaceBetween: 40
      }
    }
  });


  const star = new Swiper('.swiper-star', {
    slidesPerView: 6,
    spaceBetween: 30,
    observer: true,
    observeParents: true,
    navigation: {
      nextEl: '.swiper-person-next',
      prevEl: '.swiper-person-prev',
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      // when window width is >= 480px
      600: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      // when window width is >= 640px
      1000: {
        slidesPerView: 4,
        spaceBetween: 40
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 40
      }
    }
  });



  const product = document.querySelectorAll('.swiper-product');

  for( i=0; i< product.length; i++ ) {
    product[i].classList.add('swiper-product-' + i);

    let slider = new Swiper('.swiper-product-' + i, {
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        992: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 30,
        }
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

  }
});


// Filter

const body = document.body,
    filter = document.querySelector('.filter');

if(filter) {
  const btnOpen = document.querySelector('.btn-filter'),
      btnClose = filter.querySelector('.btn-close'),
      overflow = document.createElement('div');

  btnOpen.addEventListener('click', function(e){
    e.preventDefault();

    body.classList.add('overflow-hidden');
    filter.classList.add('active');

    overflow.classList.add('modal-backdrop', 'fade', 'show');
    document.body.appendChild(overflow);
  });

  btnClose.addEventListener('click', function(){
    body.classList.remove('overflow-hidden');
    filter.classList.remove('active');
    overflow.remove();
  });
}

$(document).on('click', '.load_more', function(){

  var url =  $('.load_more').attr('data-url');
  var page = $('.load_more').attr('data-page');

  if (url !== undefined) {
    $.ajax({
      type: 'GET',
      url: url,
      dataType: 'html',
      success: function(data){
        $('.load_more').remove();
        var elements = $(data).find('.product__item'),
            pagination = $(data).find('.load_more');
        $('.block-product').append(elements);
        $('.block-product').append(pagination);
        $('.bx-pagination-container ul li').removeClass('active');
        $('.bx-pagination-container ul li[data-page='+page+']').addClass('active');
        if(!$('.bx-pagination-container ul li[data-page='+page+']').hasClass('active')){
          console.log('false');
          $('<li  data-page='+page+' class="page-item active"><a class="page-link" href='+url+'>'+page+'</a></li>').insertAfter('.bx-pagination-container ul li[data-page='+(page-1)+']');
        }
      }
    })
  }

});

/* Избранное */
function addFavorite(id, action)
{
  var param = 'id='+id+"&action="+action;
  $.ajax({
    url:     '/local/ajax/favorites.php', // URL отправки запроса
    type:     "GET",
    dataType: "html",
    data: param,
    success: function(response) { // Если Данные отправлены успешно
      var result = $.parseJSON(response);
      if(result == 1){ // Если всё чётко, то выполняем действия, которые показывают, что данные отправлены
        $('.favor[data-item="'+id+'"]').addClass('active');
        var wishCount = parseInt($('#want .col').html()) + 1;
        console.log('Количество='+wishCount);
        $('#want .col').html(wishCount); // Визуально меняем количество у иконки
      }
      if(result == 2){
        $('.favor[data-item="'+id+'"]').removeClass('active');
        var wishCount = parseInt($('#want .col').html()) - 1;
        $('#want .col').html(wishCount); // Визуально меняем количество у иконки
      }
    },
    error: function(jqXHR, textStatus, errorThrown){ // Ошибка
      console.log('Error: '+ errorThrown);
    }
  });
}
/* Избранное */

$(document).ready(function() {
  var width = $(window).width();

  $("input[name=PHONE]").inputmask("+7 (999)-999-99-99");
  var clickHandler = ("ontouchstart" in window ? "touchend" : "click");
  $('.navbar-toggler').on(clickHandler, function () {
    if($('.navbar-collapse').hasClass('show')){
      $('body').css('overflow','auto');
    } else {
      $('body').css('overflow','hidden');
    }
  });

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

  //обработка форм оставить отзыв
  $('.form-zayavka__input-submit').click(function(){
    console.log('4555');
    var flag = true;

    if($(".callback_form input[name=NAME]").val().length < 3){
      $(".callback_form input[name=NAME]").addClass('form-zayavka__error');
      $(".callback_form input[name=NAME]").removeClass('form-zayavka__correctly');
      $("#name").focus();
      flag = false;
    }
    else{
      $(".callback_form input[name=NAME]").removeClass('form-zayavka__error');
      $(".callback_form input[name=NAME]").addClass('form-zayavka__correctly');
    }

    if(/\+\d{1} \(\d{3}\)-\d{3}-\d{2}-\d{2}/g.test($(".callback_form input[name=PHONE]").val())){
      $(".callback_form input[name=PHONE]").removeClass('form-zayavka__error');
      $(".callback_form input[name=PHONE]").addClass('form-zayavka__correctly');
    } else {
      $(".callback_form input[name=PHONE]").addClass('form-zayavka__error');
      $(".callback_form input[name=PHONE]").removeClass('form-zayavka__correctly');
      $("#phone").focus()
      flag = false;
    }

    if ($('#checkbox').is(':checked')){
      console.log('Включен');
      $('.form-check-input').removeClass('form-zayavka__error');
    } else {
      $('.form-check-input').addClass('form-zayavka__error');
      flag = false;
      console.log('Выключен');
    }

    if(flag){
        console.log('4444');
        $('.callback_form').prepend('<input type="hidden" name="ajax" value="Y">');
        var formData = new FormData($('form.callback_form')[0]);

        $.ajax({
          type: 'POST',
          url: $('.callback_form').attr('action'),
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            $('.callback_form input').val('');
            $('.callback_form textarea').val('');
            $('.zayavka-suc').addClass('show');
            $('.zayavka-suc').removeClass('fade');
            return false;

          },
          error:  function(xhr, str){
            alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
    }
  });

  //обработка форм оставить отзыв
  $('.form-contact__input-submit').click(function(){
    console.log('777');
    var flag = true;

    if($(".contact_form input[name=NAME]").val().length < 3){
      $(".contact_form input[name=NAME]").addClass('form-zayavka__error');
      $(".contact_form input[name=NAME]").removeClass('form-zayavka__correctly');
      $("#name").focus();
      flag = false;
    }
    else{
      $(".contact_form input[name=NAME]").removeClass('form-zayavka__error');
      $(".contact_form input[name=NAME]").addClass('form-zayavka__correctly');
    }

    if(/\+\d{1} \(\d{3}\)-\d{3}-\d{2}-\d{2}/g.test($(".contact_form input[name=PHONE]").val())){
      $(".contact_form input[name=PHONE]").removeClass('form-zayavka__error');
      $(".contact_form input[name=PHONE]").addClass('form-zayavka__correctly');
    } else {
      $(".contact_form input[name=PHONE]").addClass('form-zayavka__error');
      $(".contact_form input[name=PHONE]").removeClass('form-zayavka__correctly');
      $("#phone").focus()
      flag = false;
    }

    if ($('#checkbox_contact').is(':checked')){
      console.log('Включен');
      $('.form-check-input').removeClass('form-zayavka__error');
    } else {
      $('.form-check-input').addClass('form-zayavka__error');
      flag = false;
      console.log('Выключен');
    }

    if(flag){
      console.log('4444');
      $('.contact_form').prepend('<input type="hidden" name="ajax" value="Y">');
      var formData = new FormData($('form.contact_form')[0]);

      $.ajax({
        type: 'POST',
        url: $('.contact_form').attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          $('.contact_form input').val('');
          $('.contact_form textarea').val('');
          $('.zayavka-suc_contact').addClass('show');
          $('.zayavka-suc_contact').removeClass('fade');
          return false;

        },
        error:  function(xhr, str){
          alert('Возникла ошибка: ' + xhr.responseCode);
        }
      });
    }
  });

  $('.form-modal__button-close').click(function(){
    $('.zayavka-suc').removeClass('show');
    $('.zayavka-suc').addClass('fade');
  });

  $('.form-modal__contact-close').click(function(){
    $('.zayavka-suc_contact').removeClass('show');
    $('.zayavka-suc_contact').addClass('fade');
  });

  if(width < 992){
    $('.product__options .collapse').removeClass('show');
  }

  /* Favorites */
  $('.favor').on('click', function(e) {
    e.preventDefault();
    var favorID = $(this).attr('data-item');
    if($(this).hasClass('active'))
      var doAction = 'delete';
    else
      var doAction = 'add';

    addFavorite(favorID, doAction);
  });
  /* Favorites */



});
