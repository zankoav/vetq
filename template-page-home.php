<?php

/**
 *
 * Template Name: Главная
 *
 */

if (!defined('ABSPATH')) {
    exit;
}

$home_settings = get_option('vetq_home_appearance_options');

$slider_items = $home_settings['home_slider_items'];
$slider_items_result = [];

if(!empty($slider_items)){
    foreach ( (array) $slider_items as $key => $entry ) {
        $slider_items_result [] = [
            'image' => $entry['image'],
            'title' => $entry['title'],
            'link' => $entry['link'],
            'description' => $entry['description']
        ];
    }
}


$more_items = $home_settings['home_more_items'];
$more_items_result = [];

if(!empty($more_items)){
    foreach ( (array) $more_items as $key => $entry ) {
        $more_items_result[] = [
            'icon' => $entry['icon'],
            'title' => $entry['title'],
            'link' => $entry['link'],
            'description' => $entry['description']
        ];
    }
}


$advantage = [
    'title' => $home_settings['home_advantages_title'] ?? '',
    'image' => $home_settings['home_advantages_banner'] ?? '',
    'description' => $home_settings['home_advantages_description'] ?? '',
    'benefits' => $home_settings['home_advantages_benefits'] ?? [],
    'button_title' => $home_settings['home_advantages_button_title'] ?? '',
    'button_link' => $home_settings['home_advantages_button_link'] ?? ''
];


get_header('vetq'); 

?>
    <div class="app">
        <?php get_template_part("backend/components/header"); ?>
            <main class="main">
                <div class="container container_hd">
                    <div class="swiper-banner">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php foreach($slider_items_result as $slide):?>
                                    <div class="swiper-slide">
                                        <img src="<?=$slide['image']?>" alt="<?=$slide['title']?>" />
                                        <div class="swiper-slide__container">
                                            <h2 class="swiper-slide__title"><?=$slide['title']?></h2>
                                            <p class="swiper-slide__description"><?=$slide['description']?></p>
                                            <a class="button" href="<?=$slide['link']?>">Подробнее</a>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <?php if(false):?>
                    <div class="container">
                        <ul class="find-out-more">
                            <?php foreach($more_items_result as $more_item):?>
                                <li class="find-out-more__item">
                                    <img
                                        class="find-out-more__item-icon"
                                        src="<?=$more_item['icon']?>"
                                        alt="<?=$more_item['title']?>" />
                                    <h4 class="find-out-more__item-title"><?=$more_item['title']?></h4>
                                    <p class="find-out-more__item-description"><?=$more_item['description']?></p>
                                    <a class="find-out-more__item-link" href="<?=$more_item['link']?>">подробнее</a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                        <div class="advantages">
                            <div class="advantages__col">
                                <img
                                    class="advantages__image"
                                    src="<?=$advantage['image']?>"
                                    alt="<?=$advantage['title']?>" />
                            </div>
                            <div class="advantages__col">
                                <div class="advantages__content">
                                    <div class="advantages__sub-title">приемущества</div>
                                    <div class="advantages__title"><?=$advantage['title']?></div>
                                    <p class="advantages__description"><?=$advantage['description']?></p>
                                    <ul class="advantages__list">
                                        <?php foreach($advantage['benefits'] as $benefit):?>
                                            <li class="advantages__list-item"><?=$benefit?></li>
                                        <?php endforeach;?>
                                    </ul>
                                    <a class="button" href="<?=$advantage['button_link'];?>"><?=$advantage['button_title'];?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <div style="padding:1rem 0;"></div>
            </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq');