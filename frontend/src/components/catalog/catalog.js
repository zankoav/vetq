import './catalog.scss'
import $ from 'jquery'

$('.catalog__search-input').on('input', function () {
    const value = $(this).val().toLowerCase()

    $('.catalog__product').each(function () {
        const text = $(this).find('.product__title').text().toLowerCase()
        const description = $(this).find('.product__description').text().toLowerCase()
        $(this).removeClass('catalog__product_hide')

        if (value && !(text.indexOf(value) > -1 || description.indexOf(value) > -1)) {
            $(this).addClass('catalog__product_hide')
        }
    })
})
