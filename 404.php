<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header('vetq', [
    'data' => [
        'page_name' => 'p404'
    ]
]); ?>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
        <main class="main main_flex"> 
            <div class="p404"> 
                <h1 class="p404__title">Страница не найдена</h1>
            </div>
        </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq', [
    'data' => [
        'page_name' => 'p404'
    ]
]);