<?php

/**
 *
 * Template Name: Каталог
 *
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header('vetq');

$veterinaries = get_terms(['taxonomy' => 'veterinary']);
$animals = get_terms(['taxonomy' => 'animals']);
$makers = get_terms(['taxonomy' => 'maker']);
$countries = get_terms(['taxonomy' => 'country']);

$query = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => -1,
]);

?>
<div class="app">
    <?php get_template_part("backend/components/header"); ?>
    <main class="main">
        <?php get_template_part("backend/components/breadcrumbs"); ?>
        <div class="container">
            <div class="catalog">
                <aside class="catalog__aside">
                    <?php if (isset($veterinaries) && count($veterinaries) > 0): ?>
                        <div class="catalog__aside-block">
                            <h4 class="catalog__aside-title">Тип препарата</h4>
                            <ul class="catalog__aside-list">
                                <?php foreach ($veterinaries as $veterinary):
                                    $veterinary_icon = get_term_meta($veterinary->term_id, 'veterinary_image', 1);
                                    $veterinary_color = get_term_meta($veterinary->term_id, 'veterinary_icon_color', 1);
                                ?>
                                    <li class="catalog__aside-list-item">
                                        <a class="catalog__aside-list-item-link" href="<?= get_term_link($veterinary->term_id) ?>">
                                            <?php if ($veterinary_color != null): ?>
                                                <svg
                                                    class="catalog__aside-list-item-icon catalog__aside-list-item-icon_small"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="25"
                                                    height="25"
                                                    viewBox="0 0 25 25"
                                                    fill="none">
                                                    <circle cx="12.5" cy="12.5" r="12" stroke="<?= $veterinary_color ?>"></circle>
                                                    <line x1="12.7917" y1="5" x2="12.7917" y2="20.625" stroke="<?= $veterinary_color ?>"></line>
                                                    <line x1="5" y1="12.8333" x2="20.625" y2="12.8333" stroke="<?= $veterinary_color ?>"></line>
                                                </svg>
                                            <?php else: ?>
                                                <img class="catalog__aside-list-item-icon catalog__aside-list-item-icon_small" src="<?= $veterinary_icon ?>" alt="<?= $veterinary->name ?>" />
                                            <?php endif; ?>
                                            <span class="catalog__aside-list-item-link-title"><?= $veterinary->name ?> ( <?= $veterinary->count ?> )</span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($animals) && count($animals) > 0): ?>
                        <div class="catalog__aside-block">
                            <h4 class="catalog__aside-title">Вид животных</h4>
                            <ul class="catalog__aside-list">
                                <?php foreach ($animals as $animal):
                                    $animal_icon = get_term_meta($animal->term_id, 'animal_image', 1);
                                ?>
                                    <li class="catalog__aside-list-item">
                                        <a class="catalog__aside-list-item-link catalog__aside-list-item-link_animal" href="<?= get_term_link($animal->term_id) ?>">
                                            <img class="catalog__aside-list-item-icon" src="<?= $animal_icon ?>" alt="<?= $animal->name ?>">
                                            <span class="catalog__aside-list-item-link-title"><?= $animal->name ?> ( <?= $animal->count ?> )</span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($makers) && count($makers) > 0): ?>
                        <div class="catalog__aside-block">
                            <h4 class="catalog__aside-title">Производители</h4>
                            <ul class="catalog__aside-list">
                                <?php foreach ($makers as $maker): ?>
                                    <li class="catalog__aside-list-item">
                                        <a class="catalog__aside-list-item-link catalog__aside-list-item-link_animal" href="<?= get_term_link($maker->term_id) ?>">
                                            <span class="catalog__aside-list-item-link-title"><?= $maker->name ?> ( <?= $maker->count ?> )</span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($countries) && count($countries) > 0): ?>
                        <div class="catalog__aside-block">
                            <h4 class="catalog__aside-title">Страны</h4>
                            <ul class="catalog__aside-list">
                                <?php foreach ($countries as $country): ?>
                                    <li class="catalog__aside-list-item">
                                        <a class="catalog__aside-list-item-link catalog__aside-list-item-link_animal" href="<?= get_term_link($country->term_id) ?>">
                                            <span class="catalog__aside-list-item-link-title"><?= $country->name ?> ( <?= $country->count ?> )</span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </aside>
                <div class="catalog__main">
                    <div class="catalog__search">
                        <h1 class="catalog__title"><?= get_the_title() ?></h1>
                        <div class="catalog__search-block">
                            <svg class="catalog__search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L15 15L21 21ZM17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#9b9b9b" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input class="catalog__search-input" placeholder="Поиск препарата">
                        </div>
                    </div>
                    <div class="catalog__products">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $productImage = wp_get_attachment_image_url(get_post_meta(get_the_ID(), 'product_image_id', 1), 'product');
                            $productSmall =  get_post_meta(get_the_ID(), 'product_smalldescription', 1);
                            $taxonomiesAnimals = wp_get_post_terms(get_the_ID(), 'animals');
                            $animalsTax = false;

                            if ($taxonomiesAnimals != null && count($taxonomiesAnimals)) {
                                $animalsTax = $taxonomiesAnimals;
                            }

                        ?>
                            <div class="catalog__product">
                                <div class="product">
                                    <div class="product__image-wrapper">
                                        <img class="product__image" src="<?= $productImage ?>" alt="<?= get_the_title() ?>">
                                        <div class="product__image-glass">
                                            <div class="product__image-glass-content">
                                                <a class="button" href="<?= get_the_permalink() ?>" target="_blank">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h4 class="product__title"><?= get_the_title() ?></h4>
                                        <p class="product__description"><?= $productSmall ?></p>
                                        <?php if ($animalsTax != false): ?>
                                            <ul class="product__animals">
                                                <?php foreach ($animalsTax as $animalTax):
                                                    $product_animal_icon = get_term_meta($animalTax->term_id, 'animal_image', 1);
                                                ?>
                                                    <li class="product__animal">
                                                        <a class="product__animal-link" href="<?= get_term_link($animalTax->term_id) ?>">
                                                            <img class="product__animal-icon" src="<?= $product_animal_icon ?>" alt="<?= $animalTax->name ?>">
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php get_template_part("backend/components/footer"); ?>
</div>
<?php
get_footer('vetq');
