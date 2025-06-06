<?php

if (!defined('ABSPATH')) {
    exit;
}

$image = wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'product_image_id', 1 ), 'product' );
$description = get_post_meta( get_the_ID(), 'product_description', 1 );

$taxonomies = wp_get_post_terms( get_the_ID(), 'veterinary' );
$mainTax = $taxonomies;

$taxonomiesAnimals = wp_get_post_terms( get_the_ID(), 'animals' );
$animalsTax = false;

if($taxonomiesAnimals != null && count($taxonomiesAnimals)){
    $animalsTax = $taxonomiesAnimals;
}

$taxonomiesMakers = wp_get_post_terms( get_the_ID(), 'maker' );
$taxonomiesCountries = wp_get_post_terms( get_the_ID(), 'country' );

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

get_header('vetq'); 
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
                                <ul class="product-main__animals">
                                    <?php foreach($mainTax as $mainTaxItem):?>
                                        <li class="product-main__animal"> 
                                            <a class="product-main__line-link" href="<?=get_term_link($mainTaxItem->term_id)?>"><?=$mainTaxItem->name?></a>
                                        </li>
                                    <?php endforeach?>
                                </ul>
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
                        <?php if($taxonomiesMakers != null):?>
                            <div class="product-main__line">
                                <span class="product-main__line-label">Производитель:</span>
                                <ul class="product-main__animals">
                                    <?php foreach($taxonomiesMakers as $makerTax):?>
                                        <li class="product-main__animal"> 
                                            <a class="product-main__line-link" href="<?=get_term_link($makerTax->term_id)?>"><?=$makerTax->name?></a>
                                        </li>
                                    <?php endforeach?>
                                </ul>
                            </div>
                        <?php endif;?>
                        <?php if($taxonomiesCountries != null):?>
                            <div class="product-main__line">
                                <span class="product-main__line-label">Страна:</span>
                                <ul class="product-main__animals">
                                    <?php foreach($taxonomiesCountries as $countryTax):?>
                                        <li class="product-main__animal"> 
                                            <a class="product-main__line-link" href="<?=get_term_link($countryTax->term_id)?>"><?=$countryTax->name?></a>
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
                                            <a class="product-main__line-link" href="<?=$instraction['pdf']?>" target="_blank"><?=$instraction['title']?></a>
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
                                    src="/wp-content/themes/vetq/frontend/build/img/e812095e36191b8d141d.svg"
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
get_footer('vetq');