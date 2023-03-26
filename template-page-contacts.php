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

get_header('vetq', [
    'data' => [
        'page_name' => 'contacts'
    ]
]); 

?>
    <script type="text/javascript">
        const landing_ajax = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
        <main class="main"> 
            <div class="banner"> <img class="banner__icon" src="<?=$bannerImage?>" alt="Контакты">
                <div class="container banner__content">
                    <h1 class="banner__title"><?=get_the_title()?></h1>
                </div>
            </div>
            <div class="container">
                <div class="contact-form"> 
                    <div class="contact-form__col">
                    <h2 class="contact-form__title"><?=$subtitle?></h2>
                    <div class="contact-form__description"><?=wpautop($content)?></div>
                    <div class="contact-form__info-block">
                        <div class="contact-form__info-title">Офис</div>
                        <address class="contact-form__info-addres"><?=$address?><br><a href="tel:<?=$phone?>"><?=$phone?></a><br><a href="mailto:<?=$email?>"><?=$email?></a></address>
                    </div>
                    </div>
                    <div class="contact-form__col">
                    <div class="contact-form__group">
                        <input class="contact-form__input" name="name" placeholder="Имя">
                        <p class="contact-form__error-message">Введите свое имя !</p>
                    </div>
                    <div class="contact-form__grid"> 
                        <div class="contact-form__group-col">
                        <div class="contact-form__group">
                            <input class="contact-form__input" name="phone" placeholder="Телефон">
                            <p class="contact-form__error-message">Введите свой телефон !</p>
                        </div>
                        </div>
                        <div class="contact-form__group-col">
                        <div class="contact-form__group">
                            <input class="contact-form__input" name="email" placeholder="Email">
                            <p class="contact-form__error-message">Введите свой email !</p>
                        </div>
                        </div>
                    </div>
                    <div class="contact-form__group">
                        <textarea class="contact-form__input" name="message" placeholder="Сообщение ..." rows="6"></textarea>
                        <p class="contact-form__error-message">Введите свое сообщение !</p>
                    </div>
                    <div class="contact-form__group contact-form__group_submit"><a class="contact-form__submit contact-form__submit_main" href="javascript:void(0)">Отправить</a><a class="contact-form__submit contact-form__submit_process" href="javascript:void(0)">Отправка ...</a></div>
                    <div class="contact-form__group contact-form__group_success">
                        <div class="contact-form__submit-succesful">Ваше сообщение успешно отпралено!</div><a class="contact-form__submit contact-form__submit-again" href="javascript:void(0)">Отправить еще</a>
                    </div>
                    </div>
                </div>
            </div>
        </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq', [
    'data' => [
        'page_name' => 'contacts'
    ]
]);