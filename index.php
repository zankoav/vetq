<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header('vetq'); ?>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
        <main class="main">
            <div class="container">
                <h1><?= get_the_title()?></h1>
            </div>
        </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq');