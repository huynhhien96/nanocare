import Swiper from 'swiper'

export default () => {
  new Swiper('.product__summary--img-list', {
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  new Swiper('.home__slider-post', {
    spaceBetween: 120,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  $('.hamburger-button').click(function() {
    $('.nav-content').slideToggle(500);
    $(this).toggleClass('active');
  });

  $('.login-success').click(function() {
    $(this).children('.sub-menu').slideToggle();
  });

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
        $('input, button', self).attr('disabled', false)
        openSuccess();
      }
    })
    return false;
  })

  function openSuccess() {
    $('.add-to-cart-success').show();
    $(window).scrollTop(0);
  }
}