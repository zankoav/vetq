import './menu.scss'
import $ from 'jquery'

$('.menu-wrapp__button').on('click', function () {
    $('.menu').slideToggle(undefined, function(){
        this.classList.toggle('menu_mobile');
        $(this).removeAttr('style');
    })
})
