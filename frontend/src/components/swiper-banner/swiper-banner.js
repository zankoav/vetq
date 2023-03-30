import './swiper-banner.scss'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'

new Swiper('.swiper', {
    spaceBetween: 30,
    effect: 'fade',
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return `<span class="${className}">0${index + 1}</span>`
        }
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    }
})
