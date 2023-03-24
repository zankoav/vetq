import './accordion-mixed.scss'
import $ from 'jquery'

const $activeTab = $('.accordion-mixed__tab_active')
if ($activeTab.length) {
    $('.accordion-mixed__line-item')
        .css('width', `${$activeTab[0].offsetWidth}px`)
        .css('left', `${$activeTab[0].offsetLeft}px`)
}

$('.accordion-mixed__tab').on('click', function () {
    const dataIndex = $(this).attr('data-mixed-tab')

    if ($(this).hasClass('accordion-mixed__tab_active') && window.screen.width < 1024) {
        $(this).removeClass('accordion-mixed__tab_active')
        $(this)
            .parent()
            .find(`.accordion-mixed__content[data-mixed-tab=${dataIndex}]`)
            .removeClass('accordion-mixed__content_active')
    } else {
        $(this).parent().find('.accordion-mixed__tab').removeClass('accordion-mixed__tab_active')

        $(this)
            .parent()
            .find('.accordion-mixed__content')
            .removeClass('accordion-mixed__content_active')

        $(this).addClass('accordion-mixed__tab_active')
        $(this)
            .parent()
            .find(`.accordion-mixed__content[data-mixed-tab=${dataIndex}]`)
            .addClass('accordion-mixed__content_active')

        $('.accordion-mixed__line-item')
            .css('width', `${this.offsetWidth}px`)
            .css('left', `${this.offsetLeft}px`)
    }
})
