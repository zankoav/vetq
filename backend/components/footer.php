<?php if (!defined('ABSPATH')) { exit; }

$common_options = get_option('vetq_theme_options');
?>

<footer class="footer"> 
    <div class="container"> 
        <div class="footer__logo-wrapper">
            <a class="footer__logo-link" href="/"><img class="footer__logo-icon" src="/wp-content/themes/vetq/frontend/build/img/main-logo-white.b78562.svg" alt="VetQ Logo"></a>
            <div class="footer__logo-text">Ветеринарные препараты</div>
        </div>
        <p class="footer__description"><?=$common_options['footer_description']?></p>
        <p class="footer__copyed">© Все права защищены <?=date('Y')?></p>
    </div>
</footer>