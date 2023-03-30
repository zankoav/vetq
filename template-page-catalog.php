<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header('vetq', [
    'data' => [
        'page_name' => 'catalog'
    ]
]); 
 
$veterinaries = get_terms( ['taxonomy' => 'veterinary' ] );
$animals = get_terms( ['taxonomy' => 'animals' ] );

$query = new WP_Query( [
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
                    <div class="catalog__main">
                        <div class="catalog__search"> 
                            <h1 class="catalog__title"><?=get_the_title()?></h1>
                            <div class="catalog__search-block">
                                <svg class="catalog__search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21L15 15L21 21ZM17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="#9b9b9b" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <input class="catalog__search-input" placeholder="Поиск препарата">
                            </div>
                        </div>
                        <div class="catalog__products"> 
                            <?php while ($query->have_posts()) : $query->the_post();
                                $productImage = wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'product_image_id', 1 ), 'product' );
                                $productSmall =  get_post_meta( get_the_ID(),'product_smalldescription', 1);
                                $taxonomiesAnimals = wp_get_post_terms( get_the_ID(), 'animals' );
                                $animalsTax = false;

                                if($taxonomiesAnimals != null && count($taxonomiesAnimals)){
                                    $animalsTax = $taxonomiesAnimals;
                                }

                            ?>
                                <div class="catalog__product"> 
                                    <div class="product">
                                        <div class="product__image-wrapper">
                                            <img class="product__image" src="<?=$productImage?>" alt="<?=get_the_title()?>">
                                            <div class="product__image-glass"> 
                                                <div class="product__image-glass-content">
                                                    <a class="product__link" target="_blank" href="<?=get_the_permalink()?>">Подробнее</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__content">
                                            <h4 class="product__title"><?=get_the_title()?></h4>
                                            <p class="product__description"><?=$productSmall?></p>
                                            <?php if($animalsTax != false):?>
                                                <ul class="product__animals">
                                                    <?php foreach($animalsTax as $animalTax):
                                                        $product_animal_icon = get_term_meta($animalTax->term_id, 'animal_image', 1);
                                                        ?>
                                                        <li class="product__animal">
                                                            <a class="product__animal-link" href="<?=get_term_link($animalTax->term_id)?>">
                                                                <img class="product__animal-icon" src="<?=$product_animal_icon?>" alt="<?=$animalTax->name?>">
                                                            </a>
                                                        </li>
                                                    <?php endforeach?>
                                                </ul>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <aside class="catalog__aside"> 
                        <?php if(isset($veterinaries) && count($veterinaries) > 0):?>
                            <div class="catalog__aside-block">
                                <h4 class="catalog__aside-title">По типу препарата</h4>
                                <ul class="catalog__aside-list">
                                    <?php foreach($veterinaries as $veterinary):?>
                                        <li class="catalog__aside-list-item"> 
                                            <a class="catalog__aside-list-item-link" href="<?=get_term_link($veterinary->term_id)?>">
                                                <svg class="catalog__aside-list-item-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 22" id="farm-group2">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 1.432l4.143 2.392 4.143 2.392v9.568l-4.143 2.392L9.5 20.568l-4.143-2.392-4.143-2.392V6.216l4.143-2.392L9.5 1.432z" fill="#FEFEFE" stroke="#bc2232" stroke-width=".5" stroke-miterlimit="22.926"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.546 10.435c.394-.012.731.463.75 1.055l.078 2.534c.019.593-.288 1.088-.681 1.1-.394.012-.732-.463-.75-1.055l-.079-2.534c-.019-.592.289-1.088.682-1.1zm4.947 2.219c.302.307.173.93-.286 1.385l-1.964 1.944c-.46.454-1.082.575-1.384.268-.302-.308-.173-.931.286-1.386l1.963-1.944c.46-.454 1.083-.574 1.385-.267zM6.447 9.045c.293-.098.654.182.8.623l.63 1.886c.148.441.029.883-.265.982-.292.098-.653-.182-.8-.623l-.63-1.886c-.147-.442-.028-.883.265-.982zm4.633.735c.27-.333.896-.274 1.393.13l2.126 1.73c.497.404.684 1.008.416 1.34-.269.333-.896.274-1.393-.13l-2.126-1.73c-.497-.404-.684-1.007-.415-1.34zm.087 1.874c.443-.041.852.534.908 1.28l.24 3.186c.056.746-.261 1.39-.704 1.432-.444.042-.852-.534-.908-1.28l-.24-3.186c-.055-.745.261-1.39.704-1.432zm-.678-3.884c.268.156.297.612.066 1.015l-.99 1.724c-.231.403-.64.606-.908.451-.267-.155-.297-.612-.066-1.015l.99-1.723c.232-.403.64-.606.908-.451zm2.093-2.506c.366-.123.816.227 1 .778l.786 2.354c.184.551.035 1.102-.331 1.225-.366.124-.815-.226-1-.777l-.785-2.355c-.184-.55-.036-1.102.33-1.225zm-6.135.254c.34.192.384.768.097 1.28L5.32 8.988c-.287.512-.8.775-1.14.583-.34-.192-.384-.768-.097-1.28L5.307 6.1c.287-.512.8-.774 1.14-.583zm4.765-.794c.1.263-.141.602-.535.753l-1.685.644c-.394.15-.798.057-.898-.206-.1-.264.14-.603.535-.754l1.684-.643c.394-.15.799-.058.899.206z" fill="#bc2232"></path>
                                                </svg>
                                                <span class="catalog__aside-list-item-link-title"><?=$veterinary->name?></span>
                                            </a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        <?php endif;?>
                        <?php if(isset($animals) && count($animals) > 0):?>
                            <div class="catalog__aside-block">
                                <h4 class="catalog__aside-title">Вид животных</h4>
                                <ul class="catalog__aside-list">
                                    <?php foreach($animals as $animal):
                                            $animal_icon = get_term_meta($animal->term_id, 'animal_image', 1);
                                    ?>
                                        <li class="catalog__aside-list-item">
                                            <a class="catalog__aside-list-item-link catalog__aside-list-item-link_animal" href="<?=get_term_link($animal->term_id)?>">
                                                <img class="catalog__aside-list-item-icon" src="<?=$animal_icon?>" alt="<?=$animal->name?>">    
                                                <span class="catalog__aside-list-item-link-title"><?=$animal->name?> ( <?=$animal->count?> )</span>
                                            </a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        <?php endif;?>
                    </aside>
                </div>
            </div>
        </main>
        <?php get_template_part("backend/components/footer");?>
    </div>
<?php 
get_footer('vetq', [
    'data' => [
        'page_name' => 'catalog'
    ]
]);