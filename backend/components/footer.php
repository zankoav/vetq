<?php if (!defined('ABSPATH')) {
    exit;
}

$common_options = get_option('vetq_theme_options');
$contactsSettings = get_option('vetq_contacts_appearance_options');

$telegram_link = $contactsSettings['contacts_telegram_link'];
$telegram_name = $contactsSettings['contacts_telegram_name'];

?>

<footer class="footer">
    <div class="container">
        <div class="footer__logo-wrapper">
            <a class="footer__logo-link" href="/"><img class="footer__logo-icon" src="/wp-content/themes/vetq/frontend/build/img/b785626c99d7562816a2.svg" alt="VetQ Logo"></a>
            <div class="footer__logo-text">Ветеринарные препараты</div>
        </div>
        <div class="footer__description"><?= $common_options['footer_description'] ?>
            <?php if (!empty($telegram_link)): ?>
                <div class="footer__description-telegram">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 32 32">
                        <path fill="#fff" d="M16 0.5c-8.563 0-15.5 6.938-15.5 15.5s6.938 15.5 15.5 15.5c8.563 0 15.5-6.938 15.5-15.5s-6.938-15.5-15.5-15.5zM23.613 11.119l-2.544 11.988c-0.188 0.85-0.694 1.056-1.4 0.656l-3.875-2.856-1.869 1.8c-0.206 0.206-0.381 0.381-0.781 0.381l0.275-3.944 7.181-6.488c0.313-0.275-0.069-0.431-0.482-0.156l-8.875 5.587-3.825-1.194c-0.831-0.262-0.85-0.831 0.175-1.231l14.944-5.763c0.694-0.25 1.3 0.169 1.075 1.219z" />
                    </svg>
                    <a href="<?= $telegram_link ?>" target="_blank"><?= $telegram_name ?></a>
                </div>
            <?php endif; ?>
        </div>
        <p class="footer__copyed">© Все права защищены <?= date('Y') ?></p>
    </div>
</footer>