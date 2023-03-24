<?php if (!defined('ABSPATH')) { exit; }
    $breadcrumbs = [
        [
            'title' => 'Главная',
            'link' => '/'
        ]
    ];

    if(is_singular( 'product' )){

        $breadcrumbs[] = [
            'title' => 'Каталог',
            'link' => get_permalink( get_page_by_path( 'catalog' ) )
        ];

        $taxonomies = wp_get_post_terms( get_the_ID(), 'veterinary' );


        if($taxonomies != null && count($taxonomies)){
            $tax = $taxonomies[0];
            $breadcrumbs[] = [
                'title' => $tax->name,
                'link' => get_term_link($tax->term_id)
            ];
        }

        $breadcrumbs[] = [
            'title' => get_the_title(),
            'link' => get_the_permalink()
        ];
    }else if(is_page('catalog')){
        $breadcrumbs[] = [
            'title' => 'Каталог',
            'link' => get_permalink( get_page_by_path( 'catalog' ) )
        ];
    }else if(is_tax('veterinary')){
        $breadcrumbs[] = [
            'title' => 'Каталог',
            'link' => get_permalink( get_page_by_path( 'catalog' ) )
        ];
        $breadcrumbs[] = [
            'title' => single_term_title('', 0),
            'link' => get_term_link(get_queried_object()->term_id)
        ];
        
    }else if(is_tax('animals')){
        $breadcrumbs[] = [
            'title' => 'Каталог',
            'link' => get_permalink( get_page_by_path( 'catalog' ) )
        ];

        $breadcrumbs[] = [
            'title' => 'Препараты для '.single_term_title('', 0),
            'link' => get_term_link(get_queried_object()->term_id)
        ];
    }
?>
<div class="breadcrumbs">
    <div class="container">
        <ul class="breadcrumbs__list" itemscope itemtype="https://schema.org/BreadcrumbList">
            <?php foreach($breadcrumbs as $index => $crumb): ?>
                <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a class="breadcrumbs__link" itemprop="item" title="Главная" href="<?=$crumb['link']?>">
                        <meta itemprop="position" content="<?=$index?>">
                        <span itemprop="name"><?=$crumb['title']?></span>
                    </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>