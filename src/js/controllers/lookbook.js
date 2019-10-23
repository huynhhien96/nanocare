import Swiper from 'swiper'

export default () => {
    console.log('lookbook');
    new Swiper('.lookbook__other-list', {
        slidesPerView: 'auto',
        spaceBetween: 16,
        navigation: {
            nextEl: '.c-button-next',
            prevEl: '.c-button-prev',
        },
    });
}