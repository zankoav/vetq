<?php

/**
 *
 * Template Name: Контакты
 *
 */

if (!defined('ABSPATH')) {
    exit;
}

$contactsSettings = get_option('vetq_contacts_appearance_options');
$bannerImage = $contactsSettings['contacts_banner'];

$subtitle = $contactsSettings['contacts_subtitle'];
$content = $contactsSettings['contacts_content'];
$address = $contactsSettings['contacts_address'];
$phone = $contactsSettings['contacts_phone'];
$email = $contactsSettings['contacts_email'];
$telegram_link = $contactsSettings['contacts_telegram_link'];
$telegram_name = $contactsSettings['contacts_telegram_name'];

get_header('vetq');

?>
<script type="text/javascript">
    const landing_ajax = "<?= admin_url('admin-ajax.php'); ?>";
</script>
<div class="app">
    <?php get_template_part("backend/components/header"); ?>
    <main class="main">
        <div class="banner"> <img class="banner__icon" src="<?= $bannerImage ?>" alt="Контакты">
            <div class="container banner__content">
                <h1 class="banner__title"><?= get_the_title() ?></h1>
            </div>
        </div>
        <div class="container">
            <div class="contact-form">
                <div class="contact-form__col">
                    <h2 class="contact-form__title"><?= $subtitle ?></h2>
                    <div class="contact-form__description"><?= wpautop($content) ?></div>
                    <div class="contact-form__info-block">
                        <div class="contact-form__info-title">Офис</div>
                        <address class="contact-form__info-addres">
                            <?= $address ?>
                            <br>
                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                            <br>
                            <a href="mailto:<?= $email ?>"><?= $email ?></a>
                            <?php if (!empty($telegram_link)): ?>
                                <br>
                                <div style="display:flex;align-items:center;gap:12px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                        <path d="M16 0.5c-8.563 0-15.5 6.938-15.5 15.5s6.938 15.5 15.5 15.5c8.563 0 15.5-6.938 15.5-15.5s-6.938-15.5-15.5-15.5zM23.613 11.119l-2.544 11.988c-0.188 0.85-0.694 1.056-1.4 0.656l-3.875-2.856-1.869 1.8c-0.206 0.206-0.381 0.381-0.781 0.381l0.275-3.944 7.181-6.488c0.313-0.275-0.069-0.431-0.482-0.156l-8.875 5.587-3.825-1.194c-0.831-0.262-0.85-0.831 0.175-1.231l14.944-5.763c0.694-0.25 1.3 0.169 1.075 1.219z" />
                                    </svg>
                                    <a href="<?= $telegram_link ?>" target="_blank"><?= $telegram_name ?></a>
                                </div>
                            <?php endif; ?>
                        </address>
                    </div>
                </div>
                <div class="contact-form__col">
                    <div class="contact-form__group contact-form__group_required">
                        <input class="contact-form__input" name="fio" placeholder="ФИО" />
                        <p class="contact-form__error-message">Введите ФИО !</p>
                    </div>
                    <div class="contact-form__grid">
                        <div class="contact-form__group-col">
                            <div class="contact-form__group contact-form__group_required">
                                <input
                                    class="contact-form__input"
                                    name="phone"
                                    placeholder="Телефон" />
                                <p class="contact-form__error-message">
                                    Введите свой телефон !
                                </p>
                            </div>
                        </div>
                        <div class="contact-form__group-col">
                            <div class="contact-form__group contact-form__group_required">
                                <input
                                    class="contact-form__input"
                                    name="email"
                                    placeholder="Email" />
                                <p class="contact-form__error-message">
                                    Введите свой email !
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form__grid">
                        <div class="contact-form__group-col">
                            <div class="contact-form__group">
                                <input
                                    class="contact-form__input"
                                    name="country"
                                    placeholder="Страна" />
                                <p class="contact-form__error-message">
                                    Введите название страны !
                                </p>
                            </div>
                        </div>
                        <div class="contact-form__group-col">
                            <div class="contact-form__group">
                                <input
                                    class="contact-form__input"
                                    name="city"
                                    placeholder="Город" />
                                <p class="contact-form__error-message">
                                    Введите название города !
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-form__group contact-form__group_required">
                        <input
                            class="contact-form__input"
                            name="organization"
                            placeholder="Название предприятия" />
                        <p class="contact-form__error-message">
                            Введите название предприятия !
                        </p>
                    </div>
                    <div class="contact-form__group">
                        <select class="contact-form__select" name="direction">
                            <option value="" disabled selected>
                                Направление Деятельности
                            </option>
                            <option value="opt">Оптовая торговля</option>
                            <option value="roznica">Розничная торговля</option>
                            <option value="proizvodstvo">Производство</option>
                            <option value="prochее">Прочее</option>
                        </select>
                        <p class="contact-form__error-message">
                            Выберите направление деятельности !
                        </p>
                    </div>
                    <div class="contact-form__group">
                        <textarea
                            class="contact-form__input"
                            name="message"
                            placeholder="Сообщение ..."
                            rows="6"></textarea>
                        <p class="contact-form__error-message">Введите свое сообщение !</p>
                    </div>
                    <div class="contact-form__group contact-form__group_submit">
                        <a
                            class="contact-form__submit contact-form__submit_main"
                            href="javascript:void(0)">Отправить</a>
                        <a class="contact-form__submit contact-form__submit_process"
                            href="javascript:void(0)">Отправка ...</a>
                    </div>
                    <div class="contact-form__group contact-form__group_success">
                        <div class="contact-form__submit-succesful">
                            Ваше сообщение успешно отпралено!
                        </div>
                        <a
                            class="contact-form__submit contact-form__submit-again"
                            href="javascript:void(0)">Отправить еще</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php get_template_part("backend/components/footer"); ?>
</div>
<?php
get_footer('vetq');
