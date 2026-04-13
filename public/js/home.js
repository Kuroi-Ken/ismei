document.addEventListener("DOMContentLoaded", function () {
    const swiperEl = document.querySelector('.swiper');
    if (!swiperEl) return;

    const slideCount = swiperEl.querySelectorAll('.swiper-slide').length;

    const swiper = new Swiper('.swiper', {
        loop: slideCount > 1,
        autoplay: slideCount > 1 ? {
            delay: 3000,
            disableOnInteraction: false,
        } : false,

        slidesPerView: 1,
        spaceBetween: 0,

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: false,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        watchOverflow: true, 
        
        speed: 800,
    });
});