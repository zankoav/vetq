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

get_header('vetq', [
    'data' => [
        'page_name' => 'contacts'
    ]
]); 

?>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
        <main class="main"> 
            <div class="banner"> <img class="banner__icon" src="<?=$bannerImage?>" alt="Контакты">
                <div class="container banner__content">
                    <h1 class="banner__title"><?=get_the_title()?></h1>
                    <div class="hh"></div>
                </div>
            </div>
            <div class="container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quos quo ipsam laborum rerum, culpa tempora labore dicta molestiae voluptate in id impedit atque non natus nihil. Molestiae error facere, doloribus labore obcaecati iure iusto. Perspiciatis ipsam unde voluptatem amet tempore ea assumenda, et voluptates nesciunt quaerat fugiat omnis necessitatibus incidunt iure cupiditate voluptas beatae corporis. Assumenda quia earum facilis voluptate recusandae excepturi explicabo sit nulla incidunt! Magni fugiat enim provident est rerum harum corrupti nemo, voluptas aperiam autem officiis quod. Nesciunt dignissimos odio, magni ipsam incidunt quidem eum, quam consequuntur harum, expedita placeat magnam sapiente voluptates facere facilis doloremque!</div>
        </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq', [
    'data' => [
        'page_name' => 'contacts'
    ]
]);