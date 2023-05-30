import './contact-form.scss'
import $ from 'jquery'

//  обязательное только ФИО, телефон, email, название предприятия

let error

$('.contact-form__submit_main').on('click', function () {
    let data = {
        action: 'post_message'
    }
    error = false
    $('.contact-form__input, .contact-form__select').each(function () {
        hideError(this)
    })
    $('.contact-form__input').each(function () {
        data[this.name] = this.value
        if ($(this).parent().hasClass('contact-form__group_required') && !data[this.name]) {
            showError(this)
            return
        }
    })

    $('.contact-form__select').each(function () {
        data[this.name] = $(this).val()
        if ($(this).parent().hasClass('contact-form__group_required') && !data[this.name]) {
            showError(this)
            return
        }
    })

    if (!error) {
        $('.contact-form__submit_main').hide()
        $('.contact-form__submit_process').show().attr('style', 'display: inline-block')
        $.ajax({
            type: 'POST',
            url: landing_ajax,
            data: data,
            success: (response) => {
                console.log('response', response)
                $('.contact-form__group.contact-form__group_submit').hide()
                $('.contact-form__group_success').show().attr('style', 'display: block')
            },
            error: (x, y, z) => {
                console.log('x', x)
            },
            dataType: 'json'
        })
    }
})

$('.contact-form__submit-again').on('click', function () {
    $('.contact-form__group.contact-form__group_submit').show().attr('style', 'display: block')
    $('.contact-form__submit_main').show().attr('style', 'display: inline-block')
    $('.contact-form__submit_process').hide()
    $('.contact-form__group_success').hide()

    $('.contact-form__input').each(function () {
        this.value = ''
    })

    $('.contact-form__select').each(function () {
        $(this).val('')
    })
})

function showError(element) {
    error = true
    $(element).parent().find('.contact-form__error-message').css('visibility', 'visible')
}

function hideError(element) {
    $(element).parent().find('.contact-form__error-message').css('visibility', 'hidden')
}
