<?php

/**
 *
 * Template Name: Главная
 *
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('vetq', [
    'data' => [
        'page_name' => 'index'
    ]
]); 

?>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
            <main class="main">Главная</main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq', [
    'data' => [
        'page_name' => 'index'
    ]
]);