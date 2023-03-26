<?php

if (!defined('ABSPATH')) {
    exit;
}

$image = wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'product_image_id', 1 ), 'product' );
$description = get_post_meta( get_the_ID(), 'product_description', 1 );

$taxonomies = wp_get_post_terms( get_the_ID(), 'veterinary' );
$mainTax = false;

if($taxonomies != null && count($taxonomies)){
    $mainTax = $taxonomies[0];
    $mainTax = [
        'title' => $mainTax->name,
        'link' => get_term_link($mainTax->term_id)
    ];
}

$taxonomiesAnimals = wp_get_post_terms( get_the_ID(), 'animals' );
$animalsTax = false;

if($taxonomiesAnimals != null && count($taxonomiesAnimals)){
    $animalsTax = $taxonomiesAnimals;
}

$instractions = get_post_meta( get_the_ID(), 'product_instractions', true );
$instractionsResult = [];
foreach ( (array) $instractions as $key => $entry ) {
    if ( isset( $entry['title'], $entry['pdf'] ) ) {
        $instractionsResult[] = [
            'title' => $entry['title'],
            'pdf' => $entry['pdf']
        ];
    }
}

$tabs = get_post_meta( get_the_ID(), 'product_tabs', true );
$tabsResult = [];
foreach ( (array) $tabs as $key => $entry ) {
    if ( isset( $entry['title'], $entry['content'] ) ) {
        $tabsResult[] = [
            'title' => $entry['title'],
            'content' => wpautop($entry['content'])
        ];
    }
}

get_header('vetq', [
    'data' => [
        'page_name' => 'product'
    ]
]); 
?>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
        <main class="main"> 
            <?php get_template_part("backend/components/breadcrumbs"); ?>
            <div class="container">
                <div class="product-main">
                    <img
                        class="product-main__image"
                        src="<?=$image?>"
                        alt="<?= get_the_title()?>" />
                    <div class="product-main__content">
                        <h4 class="product-main__title"><?= get_the_title()?></h4>
                        <div class="product-main__description"><?=wpautop($description)?></div>
                        <?php if($mainTax != false): ?>
                            <div class="product-main__line">
                                <span class="product-main__line-label">Тип препарата:</span>
                                <a class="product-main__line-link" href="<?=$mainTax['link']?>"><?=$mainTax['title']?></a>
                            </div>
                        <?php endif;?>
                        <?php if($animalsTax != false):?>
                            <div class="product-main__line">
                                <span class="product-main__line-label">Тип животного:</span>
                                <ul class="product-main__animals">
                                    <?php foreach($animalsTax as $animalTax):?>
                                        <li class="product-main__animal"> 
                                            <a class="product-main__line-link" href="<?=get_term_link($animalTax->term_id)?>"><?=$animalTax->name?></a>
                                        </li>
                                    <?php endforeach?>
                                </ul>
                            </div>
                        <?php endif;?>
                        <?php if(count($instractionsResult) > 0):?>
                            <div class="product-main__line product-main__line_column">
                                <ul class="product-main__instractions">
                                    <?php foreach($instractionsResult as $instraction):?>
                                        <li class="product-main__instraction">
                                            <img class="product-main__instraction-img" src="/wp-content/themes/vetq/frontend/build/img/book-open.75d1d7.svg" alt="document">
                                            <a class="product-main__line-link" href="<?=$instraction['pdf']?>"><?=$instraction['title']?></a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php if(count($tabsResult) > 0):?>
                    <div class="accordion-mixed">
                        <div class="accordion-mixed__line">
                            <div class="accordion-mixed__line-item"></div>
                        </div>
                        <?php for( $i = 0; $i < count($tabsResult); $i++):
                                $tab = $tabsResult[$i];
                        ?>
                            <div class="accordion-mixed__tab <?= $i == 0 ? 'accordion-mixed__tab_active' : ''?>"
                                data-mixed-tab="<?=$i?>">
                                <span class="accordion-mixed__tab-label"><?=$tab['title']?></span>
                                <img
                                    class="accordion-mixed__tab-icon"
                                    src="/wp-content/themes/vetq/frontend/build/img/chevron-down.e81209.svg"
                                    alt="arrow" />
                            </div>
                            <div class="accordion-mixed__content <?= $i == 0 ? 'accordion-mixed__content_active' : ''?>" data-mixed-tab="<?=$i?>">
                                <?=$tab['content']?>
                            </div>
                        <?php endfor;?>
                    </div>
                <?php endif;?>
            </div>
        </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq', [
    'data' => [
        'page_name' => 'product'
    ]
]);