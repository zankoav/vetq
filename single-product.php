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
                        <p class="product-main__description"><?=$description?></p>
                        <?php if($mainTax != false): ?>
                            <a class="product-main__line product-main__line_link" href="<?=$mainTax['link']?>">
                                <svg
                                    class="product-main__line-icon"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 19 22"
                                    id="farm-group2">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M9.5 1.432l4.143 2.392 4.143 2.392v9.568l-4.143 2.392L9.5 20.568l-4.143-2.392-4.143-2.392V6.216l4.143-2.392L9.5 1.432z"
                                        fill="#FEFEFE"
                                        stroke="#bc2232"
                                        stroke-width=".5"
                                        stroke-miterlimit="22.926"></path>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M4.546 10.435c.394-.012.731.463.75 1.055l.078 2.534c.019.593-.288 1.088-.681 1.1-.394.012-.732-.463-.75-1.055l-.079-2.534c-.019-.592.289-1.088.682-1.1zm4.947 2.219c.302.307.173.93-.286 1.385l-1.964 1.944c-.46.454-1.082.575-1.384.268-.302-.308-.173-.931.286-1.386l1.963-1.944c.46-.454 1.083-.574 1.385-.267zM6.447 9.045c.293-.098.654.182.8.623l.63 1.886c.148.441.029.883-.265.982-.292.098-.653-.182-.8-.623l-.63-1.886c-.147-.442-.028-.883.265-.982zm4.633.735c.27-.333.896-.274 1.393.13l2.126 1.73c.497.404.684 1.008.416 1.34-.269.333-.896.274-1.393-.13l-2.126-1.73c-.497-.404-.684-1.007-.415-1.34zm.087 1.874c.443-.041.852.534.908 1.28l.24 3.186c.056.746-.261 1.39-.704 1.432-.444.042-.852-.534-.908-1.28l-.24-3.186c-.055-.745.261-1.39.704-1.432zm-.678-3.884c.268.156.297.612.066 1.015l-.99 1.724c-.231.403-.64.606-.908.451-.267-.155-.297-.612-.066-1.015l.99-1.723c.232-.403.64-.606.908-.451zm2.093-2.506c.366-.123.816.227 1 .778l.786 2.354c.184.551.035 1.102-.331 1.225-.366.124-.815-.226-1-.777l-.785-2.355c-.184-.55-.036-1.102.33-1.225zm-6.135.254c.34.192.384.768.097 1.28L5.32 8.988c-.287.512-.8.775-1.14.583-.34-.192-.384-.768-.097-1.28L5.307 6.1c.287-.512.8-.774 1.14-.583zm4.765-.794c.1.263-.141.602-.535.753l-1.685.644c-.394.15-.798.057-.898-.206-.1-.264.14-.603.535-.754l1.684-.643c.394-.15.799-.058.899.206z"
                                        fill="#bc2232"></path>
                                </svg>
                                <span class="product-main__line-title"><?=$mainTax['title']?></span>
                            </a>
                        <?php endif;?>
                        <?php if($animalsTax != false):?>
                            <div class="product-main__line">
                                <ul class="product-main__animals">
                                    <?php foreach($animalsTax as $animalTax):?>
                                        <li class="product-main__animal">
                                            <a class="product-main__animal-link" target="_blank" href="<?=get_term_link($animalTax->term_id)?>">
                                                <svg
                                                    class="product-main__animal-icon"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    id="type-animal5">
                                                    <path
                                                        d="M5.932 4.805c.12-.112.148-.296.207-.45a.05.05 0 01.067.026c.038.162-.013.336.11.459.135-.093.224-.28.322-.4.036-.024.066.022.086.037.06.155-.14.347.044.433a.53.53 0 00.49-.292c.054-.028.062.04.088.062.037.262-.016.539-.241.701-.262.17-.544.019-.807.067.76.246 1.11.994 1.502 1.595.229.377.347.815.539 1.212.13.224.354.425.615.468.586.06 1.285-.059 1.687-.505.264-.367.459-.8.799-1.11l.374-.39c.414-.199.851-.5 1.351-.43.63-.033 1.26.421 1.556.951.223.414.392.936.363 1.436.047.454-.093.863-.122 1.297-.146.421-.234.854-.494 1.247-.17.318-.278.678-.564.939-.023.015-.042.014-.063-.004.077-.325.197-.635.24-.965-.108.055-.178.25-.33.22.052-.199.155-.392.216-.59.151-.499.323-1.045.086-1.581a3.467 3.467 0 01-.562 1.995c-.108-.007-.002-.098-.026-.153.002-.29.062-.608-.081-.893-.01.094.018.196.005.29.011.35-.103.674-.198 1.002-.02.032-.045.103-.092.085a3.159 3.159 0 00-.095-.608c-.08.223-.137.449-.247.666l-.061.01c-.03-.263-.051-.564-.133-.832-.247.364-.544.65-.956.752-.559.164-1.053.434-1.52.752-.083.029-.183.046-.255-.012.098.167.337.28.365.492-.077.41-.193.83-.069 1.263.091.062.19.13.308.106.028.017.05.039.049.072-.072.053-.22.023-.272.127-.05.078-.05.166-.06.256.168.1.43.217.409.441-.089.019-.155-.113-.257-.107-.325-.015-.37.415-.687.406-.161.09-.46.04-.464.298-.048.016-.066-.044-.089-.073-.034-.093-.055-.214.03-.283-.229.082-.588-.048-.713.215-.088.022-.058-.107-.07-.157.004-.298.358-.247.548-.357a.178.178 0 01.102-.182c.222-.096.457.033.653-.084l.027-.1-.015-1.047c-.035-.295-.414-.385-.634-.517-.17.194-.256.421-.37.635-.052.189.068.377.117.542-.08.068-.272-.002-.285.136-.152.271.217.392.208.643-.074.02-.11-.087-.185-.093l-.167-.06c-.038.124-.062.264-.168.355-.292.141-.677.074-.924.263-.078.042.039.165-.096.13-.06-.05-.07-.139-.07-.216l.104-.168a1.055 1.055 0 00-.449.057c-.055.043-.066.129-.124.153-.066-.062-.047-.19-.009-.27.061-.138.21-.19.343-.208a.424.424 0 01.167-.204c.277-.055.513.104.792-.002.172-.135.16-.354.23-.53.054-.377.3-.726.124-1.133-.14-.24-.316-.46-.486-.685l-.015-.042c-.67-.147-1.303-.7-1.721-1.22-.62-.864-.409-2.049-.385-3.017 0-.147.04-.282.03-.431-.226-.12-.43-.287-.47-.544.039-.293.308-.544.234-.85a.564.564 0 00-.426.082.076.076 0 01-.073-.017c-.014-.192.17-.326.286-.46-.104-.073-.285-.123-.296-.276-.011-.218.016-.424.043-.634.007-.024.038-.033.064-.037.074.094.07.238.154.326.033.046.06.012.085-.014l.03-.082a4.634 4.634 0 01.002-.514c.16-.002.105.254.256.32.125-.19.1-.431.162-.644.21.064.116.314.227.453z"
                                                        fill="#9b9b9b"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    <?php endforeach?>
                                </ul>
                            </div>
                        <?php endif;?>
                        <?php if(count($instractionsResult) > 0):?>
                            <div class="product-main__line">
                                <ul class="product-main__instractions">
                                    <?php foreach($instractionsResult as $instraction):?>
                                        <li class="product-main__instraction">
                                            <a class="product-main__instraction-link" target="_blank" href="<?=$instraction['pdf']?>">
                                                <img
                                                    class="product-main__instraction-img"
                                                    src="/wp-content/themes/vetq/frontend/build/img/pdf-file.e12718.svg"
                                                    alt="pdf file" />
                                                <span class="product-main__instraction-label"><?=$instraction['title']?></span>
                                            </a>
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