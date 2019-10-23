import Swiper from 'swiper'

export default () => {
  console.log('product')
  if (jQuery(window).width() > 768) {
    $('a[href^="#"]').click(function (event) {
      event.preventDefault();
      $("html, body").animate({scrollTop: $($(this).attr("href")).offset().top}, 500);
    });
    $(function () {
      HandleChangeColor();
    })

    $(window).scroll(function () {
      HandleChangeColor();
    });

    function HandleChangeColor() {
      var scroll = $(window).scrollTop();
      $('.scrollLink:first-child').addClass('actived');
      $('.js-image').each(function (index, el) {
        var _this = $(this);
        var dataOffset = _this.offset().top;
        if (scroll >= dataOffset) {
          $('.scrollLink').removeClass('actived');
          $('.scrollLink[href="#' + _this.attr('id') + '"]').addClass('actived');
        }
      });
    }
  }


  new Swiper('.list-product-recent', {
    slidesPerView: 'auto',
    spaceBetween: 16,
    initialSlide: 0,
    navigation: {
      nextEl: '.c-button-next',
      prevEl: '.c-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
    }
  });
  new Swiper('.recent-viewed-list', {
    slidesPerView: 'auto',
    spaceBetween: 16,
    initialSlide: 0,
    navigation: {
      nextEl: '.c-button-next-right',
      prevEl: '.c-button-prev-left',
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
    }
  });

  var count = 1
  var countEl = document.getElementById("count")

  $('#minus').click(() => {
    if (count > 1) {
      count--
      countEl.value = count
    }
  })

  $('#plus').click(() => {
    count++
    countEl.value = count
  })

  $('.close-success').click(function () {
    $('.add-to-cart-success').hide();
  });

  $('.title__toggle').click(function () {
    $('.selector__toggle').removeClass('active')
    $(this).parent().addClass('active')
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
        // openSuccess();
      }
    })
    return false;
  })

  //Responsive
  if (jQuery(window).width() < 767) {
    new Swiper('.product-list-image', {
      slidesPerView: 'auto',
      pagination: {
        el: '.pagination-mobile',
        clickable: true,
      },
    });
  }
}