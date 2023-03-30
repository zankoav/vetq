<?php

if (!defined('ABSPATH')) { exit; }

function register_product_type() {
    register_post_type('product', array(
        'labels'             => array(
            'name'               => 'Каталог', // Основное название типа записи
            'singular_name'      => __('Продукт'), // отдельное название записи типа Book
            'add_new'            => __('Добавить продукт'),
            'add_new_item'       => __('Добавить новый продукт'),
            'edit_item'          => __('Редактировать продукт'),
            'new_item'           => __('Новый продукт'),
            'view_item'          => __('Посмотреть продукт'),
            'search_items'       => __('Найти продукт'),
            'not_found'          => __('Продукт не найден'),
            'not_found_in_trash' => __('В корзине продуктов не найден'),
            'items_archive'      => 'Продукты архив',
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'сatalog/%veterinary%', 'with_front' => true),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-products',
        'supports'           => array('title')
    ));

    register_taxonomy('veterinary', array('product'), array(
        'hierarchical' => true,
        'labels' => [
            'name' => __('Тип препарата'),
            'singular_name' => __( 'Препарат' ),
            'search_items' =>  __( 'Поиск препарата' ),
            'popular_items' => __( 'Популярные препараты' ),
            'all_items' => __( 'Все препараты' ),
            'parent_item' => __( 'Родительский препарат' ),
            'parent_item_colon' => __( 'Родительский айтем:' ),
            'edit_item' => __( 'Редактировать Препарат' ),
            'update_item' => __( 'Обновить Препарат' ),
            'add_new_item' => __( 'Добавить новый Препарат' ),
            'new_item_name' => __( 'Имя нового препарата' ),
        ],
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'catalog' ),
    ));

    register_taxonomy('animals',array('product'), array(
        'hierarchical' => true,
        'labels' => [
            'name' => __('Животные'),
            'singular_name' => __( 'Животное' ),
            'search_items' =>  __( 'Поиск животных' ),
            'popular_items' => __( 'Популярные животные' ),
            'all_items' => __( 'Все животные' ),
            'parent_item' => __( 'Родительский айтем' ),
            'parent_item_colon' => __( 'Родительский айтем:' ),
            'edit_item' => __( 'Редактировать Животное' ),
            'update_item' => __( 'Обновить Животное' ),
            'add_new_item' => __( 'Добавить новое Животное' ),
            'new_item_name' => __( 'Имя нового животного' ),
        ],
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => false,
    ));
}

add_action('init', 'register_product_type');

function my_commmunity_post_link( $post_link, $id = 0 ){
    $post = get_post($id);
    if ( is_object( $post ) && $post->post_type == 'product' ){
        $terms = wp_get_object_terms( $post->ID, 'veterinary' );
        if( !empty($terms) ){
            return str_replace( '%veterinary%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'my_commmunity_post_link', 1, 3 );

add_action('cmb2_admin_init', 'cmb2_product');

function cmb2_product(){
    
    $cmb = new_cmb2_box(array(
        'id'           => 'product_settings_id',
        'title'        => 'Настройки продукта',
        'object_types' => array('product'),
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true,
    ));

    $cmb->add_field(array(
        'name' => __('Краткое описание', 'vetq'),
        'desc' => __('Краткое описание', 'vetq'),
        'id'   => 'product_description',
        'type' => 'wysiwyg',
    ));

    $cmb->add_field(array(
        'name' => __('Мини описание', 'vetq'),
        'desc' => __('Мини описание', 'vetq'),
        'id'   => 'product_smalldescription',
        'type' => 'textarea_small',
    ));

   $cmb->add_field( array(
		'name' => esc_html__( 'Картинка', 'vetq' ),
		'desc' => esc_html__( 'Рекомендуемы размер 560 x 640', 'vetq' ),
		'id'   => 'product_image',
		'type' => 'file',
        'preview_size' => array( 560, 640 ),
        'options' => array(
            'url' => false
        ),
	) );

    $group_instractions = $cmb->add_field(array(
        'id'          => 'product_instractions',
        'type'        => 'group',
        'description' => __('Документы', 'vetq'),
        'options'     => array(
            'group_title'   => __('Документ {#}', 'vetq'),
            'add_button'    => __('Добавить Документ', 'vetq'),
            'remove_button' => __('Удалить Документ', 'vetq'),
            'sortable'      => true,
            'closed'        => true,
        ),
    ));

    $cmb->add_group_field($group_instractions, array(
        'name' => 'Название документа',
        'id'   => 'title',
        'type' => 'text',
    ));

    $cmb->add_group_field($group_instractions, array(
        'name'         => 'Файл',
        'id'           => 'pdf',
        'type'         => 'file'
    ));

    $group_tabs = $cmb->add_field(array(
        'id'          => 'product_tabs',
        'type'        => 'group',
        'description' => __('Табы', 'vetq'),
        'options'     => array(
            'group_title'   => __('Таб {#}', 'vetq'),
            'add_button'    => __('Добавить Таб', 'vetq'),
            'remove_button' => __('Удалить Таб', 'vetq'),
            'sortable'      => true,
            'closed'        => true,
        ),
    ));

    $cmb->add_group_field($group_tabs, array(
        'name' => 'Название Таба',
        'id'   => 'title',
        'type' => 'text',
    ));

    $cmb->add_group_field($group_tabs, array(
        'name'         => 'Содержание',
        'id'           => 'content',
        'type'         => 'wysiwyg'
    ));

}

add_action('cmb2_admin_init', 'animals_cmb2');

function animals_cmb2(){
    $cmb = new_cmb2_box(array(
        'id'           => 'animal_settings_id',
        'title'        => 'Настройки категории',
        'object_types' => array('term'),
        'taxonomies' => array('animals'),
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true,
    ));

    $cmb->add_field( array(
		'name' => esc_html__( 'Картинка', 'vetq' ),
		'desc' => esc_html__( 'Будьте внимательны, формат картинки очень важен', 'vetq' ),
		'id'   => 'animal_image',
		'type' => 'file',
        'preview_size' => array( 100, 100 ),
        'options' => array(
            'url' => false
        ),
	) );
}