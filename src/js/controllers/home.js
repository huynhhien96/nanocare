import Swiper from 'swiper'

const homeSlider = () =>{
  console.log('slider')
}

export default () => {
  console.log('home - index')
  homeSlider()
  new Swiper('.home__slider-post', {
    spaceBetween: 120,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  new Swiper('.img-bottom', {
    spaceBetween: 150,
    loop: true,
    clickable: false,
    draggable: false,
    autoplay: {
      delay: 0,
    },
    speed: 25000,
  });

  new Swiper('.product__summary--img-list', {
    spaceBetween: 120,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  if ($(window).width() < 767) {
    $('.customer-preview--list').addClass('swiper-wrapper')
    $('.customer-preview--item').addClass('swiper-slide')
  }
  else {
    $('.customer-preview--container').removeClass('swiper-container')
    $('.customer-preview--list').removeClass('swiper-wrapper')
    $('.customer-preview--item').removeClass('swiper-slide')
  }

  new Swiper('.customer-preview--container', {
    draggable: true,
  });
}