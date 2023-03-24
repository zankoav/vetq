<?php if (!defined('ABSPATH')) { exit; }?>

<header class="header">
    <div class="container">
        <div class="header__container">
            <div class="header__logo-wrapper">
                <a class="header__logo-link" href="/"><img class="header__logo-icon" src="/wp-content/themes/vetq/frontend/build/img/main-logo.9ff9b4.svg" alt="VetQ Logo"></a>
                <div class="header__logo-text">Ветеринарные препараты</div>
            </div>
            <nav class="header__menu">
                <div class="menu-wrapp"> 
                    <?php vetq_main_menu()?>
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