<?php if (!defined('ABSPATH')) {
    exit;
}
$header_class = 'container';
if (is_page_template('template-page-home.php')) {
    $header_class .= ' container_hd';
}

$contactsSettings = get_option('vetq_contacts_appearance_options');

$telegram_link = $contactsSettings['contacts_telegram_link'];
$telegram_name = $contactsSettings['contacts_telegram_name'];

?>

<header class="header">
    <div class="<?= $header_class ?>">
        <div class="header__container">
            <div class="header__logo-wrapper">
                <a class="header__logo-link" href="/"><img class="header__logo-icon" src="/wp-content/themes/vetq/frontend/build/img/9ff9b4adb4b02f29b759.svg" alt="VetQ Logo"></a>
                <div class="header__logo-text">Ветеринарные препараты</div>
            </div>
            <nav class="header__menu">
                <div class="menu-wrapp">
                    <?php vetq_main_menu() ?>
                    <?php if (!empty($telegram_link)): ?>
                        <a href="<?= $telegram_link ?>" class="header__telegram" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 32 32">
                                <path fill="#161616" d="M16 0.5c-8.563 0-15.5 6.938-15.5 15.5s6.938 15.5 15.5 15.5c8.563 0 15.5-6.938 15.5-15.5s-6.938-15.5-15.5-15.5zM23.613 11.119l-2.544 11.988c-0.188 0.85-0.694 1.056-1.4 0.656l-3.875-2.856-1.869 1.8c-0.206 0.206-0.381 0.381-0.781 0.381l0.275-3.944 7.181-6.488c0.313-0.275-0.069-0.431-0.482-0.156l-8.875 5.587-3.825-1.194c-0.831-0.262-0.85-0.831 0.175-1.231l14.944-5.763c0.694-0.25 1.3 0.169 1.075 1.219z" />
                            </svg>
                            <?= $telegram_name ?>
                        </a>
                    <?php endif; ?>
                    <a class="menu-wrapp__button" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 32.021 32.021">
                            <g data-name="Group 128" transform="translate(0.042 0.041)">
                                <circle data-name="Ellipse 4" cx="2.998" cy="2.998" r="2.998" transform="translate(0 12.992)" fill="#161616"></circle>
                                <circle data-name="Ellipse 5" cx="2.998" cy="2.998" r="2.998" transform="translate(12.992 12.992)" fill="#161616"></circle>
                                <circle data-name="Ellipse 6" cx="2.998" cy="2.998" r="2.998" transform="translate(25.984 12.992)" fill="#161616"></circle>
                            </g>
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>