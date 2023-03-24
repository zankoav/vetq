<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header('vetq'); ?>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
        <main class="main">
            <?php get_template_part("backend/components/breadcrumbs"); ?>
            <?php while (have_posts()) : the_post();
                get_the_title();
            endwhile; ?>
        </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq', [
    'data' => [
        'page_name' => 'product'
    ]
]);