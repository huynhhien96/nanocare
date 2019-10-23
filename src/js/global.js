import validate from 'jquery.validation'
import Swiper from 'swiper'

export default () => {
    console.log('global');
    new Swiper('.product__summary--img-list', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    new Swiper('.footer-img__top', {
        spaceBetween: 150,
        loop: true,
        clickable: false,
        touchRatio: 0.,
        draggable: false,
        preventClicks: true,
        noSwiping: true,
        speed: 25000,
        autoplay: {
          delay: 0,
        },
    });
    new Swiper('.about__slide_img_container', {
        slidesPerView: 2,
        spaceBetween: 16,
        preloadImages: true,
    });

    $('.hamburger-button').click(function() {
      $('.header-bottom').slideToggle(500);
      $(this).toggleClass('active');
      $('.menu-open').toggle();
      $('.menu-close').toggle();
    });
    $('.toggle-popup').click(function() {
      $('.address-popup').toggleClass('is-active');
    })
    $('.frm_add_cart').submit(function () {
      const self = $(this)
      $.ajax({
        url: self.attr('action'),
        method: 'POST',
        dataType: 'json',
        data: self.serialize(),
        beforeSend: function () {
          $('input, button', self).attr('disabled','disabled')
        },
        success: function (data) {
          $('input, button', self).removeAttr('disabled')
          openSuccess();
          $(".woocommerce-cart-form-modal").load(location.href + " .woocommerce-cart-form-modal");
          $("#cart-count").load(location.href + " #cart-count");
        }
      })
      return false;
    })

    function openSuccess() {
      $('.add-to-cart-success').show();
      $("html, body").animate({ scrollTop: 0 }, 400);
    }

    if ( !$('.cart-popup-content').children().length > 0 ) {
      $('.shop_table').hide();
      $('.button-cart-popup-checkout').hide();
      $('.cart-popup').addClass('empty-active');
    }

    if (jQuery(window).width() < 767) {
      $('.open-text').click(function() {
        $(this).hide();
        $('.category--filter').addClass('active');
        $('.close-text').show();
      });
      $('.close-text').click(function() {
        $(this).hide();
        $('.category--filter').removeClass('active');
        $('.open-text').show();
      });
      $(document).ready(function() {
        $('.listing-cate').addClass('swiper-container');
        $('.listing-cate-wrapper').addClass('swiper-wrapper');
        new Swiper('.listing-cate', {
          slidesPerView: 1,
          spaceBetween: 16,
          navigation: {
            nextEl: '.c-button-next',
            prevEl: '.c-button-prev',
          },
        });
      });
    }
    else {
      $('.cart-open').click(function(event) {
        $('.cart-popup').toggle();
      })
      $('.close-popup').click(function(event) {
        $('.cart-popup').hide();
      })

    }
}