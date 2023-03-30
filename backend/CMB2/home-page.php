<?php if (!defined('ABSPATH')) { exit; }

/**
 * Slider sections
 */
add_action('cmb2_admin_init', function (){
    $cmb = new_cmb2_box(array(
        'id'           => 'vetq_home_more_page',
        'title'        => 'Настройки страницы домашняя',
        'object_types' => array('options-page'),
        'option_key'   => 'vetq_home_appearance_options',
        'parent_slug'  => 'edit.php?post_type=page'
    ));

    $cmb->add_field(array(
        'name' => __('Слайдер', 'vetq'),
        'id'   => 'home_slider_title',
        'type' => 'title'
    ));

    $cmb_group = $cmb->add_field(array(
        'id'          => 'home_slider_items',
        'type'        => 'group',
        'description' => __('Слайды', 'vetq'),
        'options'     => array(
            'group_title'   => __('Слайд {#}', 'vetq'),
            'add_button'    => __('Добавить Слайд', 'vetq'),
            'remove_button' => __('Удалить Слайд', 'vetq'),
            'sortable'      => true,
            'closed'        => true,
        ),
    ));

    $cmb->add_group_field($cmb_group, array(
        'name' => 'Заголовок',
        'id'   => 'title',
        'type' => 'text',
    ));

    $cmb->add_group_field($cmb_group, array(
        'name' => 'Подзаголовок',
        'id'   => 'description',
        'type' => 'text',
    ));

    $cmb->add_group_field($cmb_group, array(
        'name' => 'Ссылка',
        'id'   => 'link',
        'type' => 'text_url',
    ));

    $cmb->add_group_field($cmb_group,array(
		'name' => esc_html__( 'Картинка', 'vetq' ),
        'desc' => __('Рекомендуемый размер (1920 x 800)', 'vetq'),
		'id'   => 'image',
		'type' => 'file'
	));
});

/**
 * More sections
 */
add_action('cmb2_admin_init', function (){
    $cmb_more = new_cmb2_box(array(
        'id'           => 'vetq_home_more_page',
        'title'        => 'Настройки страницы домашняя',
        'object_types' => array('options-page'),
        'option_key'   => 'vetq_home_appearance_options',
        'parent_slug'  => 'edit.php?post_type=page'
    ));

    $cmb_more->add_field(array(
        'name' => __('Секция Направления', 'vetq'),
        'id'   => 'home_more_title',
        'type' => 'title'
    ));

    $cmb_more_group = $cmb_more->add_field(array(
        'id'          => 'home_more_items',
        'type'        => 'group',
        'description' => __('Направления', 'vetq'),
        'options'     => array(
            'group_title'   => __('Направление {#}', 'vetq'),
            'add_button'    => __('Добавить Направление', 'vetq'),
            'remove_button' => __('Удалить Направление', 'vetq'),
            'sortable'      => true,
            'closed'        => true,
        ),
    ));

    $cmb_more->add_group_field($cmb_more_group, array(
        'name' => 'Заголовок',
        'id'   => 'title',
        'type' => 'text',
    ));

    $cmb_more->add_group_field($cmb_more_group, array(
        'name' => 'Подзаголовок',
        'id'   => 'description',
        'type' => 'textarea_small',
    ));

    $cmb_more->add_group_field($cmb_more_group, array(
        'name' => 'Ссылка',
        'id'   => 'link',
        'type' => 'text_url',
    ));

    $cmb_more->add_group_field($cmb_more_group,array(
		'name' => esc_html__( 'Иконка', 'vetq' ),
		'desc' => esc_html__( 'Будьте внимательны, формат картинки очень важен', 'vetq' ),
		'id'   => 'icon',
		'type' => 'file',
        'preview_size' => array( 100, 100 ),
        'options' => array(
            'url' => false
        ),
	));
});

/**
 * Advantages sections
 */
add_action('cmb2_admin_init', function(){
    $cmb_advantages = new_cmb2_box(array(
        'id'           => 'vetq_home_more_page',
        'title'        => 'Настройки страницы домашняя',
        'object_types' => array('options-page'),
        'option_key'   => 'vetq_home_appearance_options',
        'parent_slug'  => 'edit.php?post_type=page'
    ));

    $cmb_advantages->add_field(array(
        'name' => __('Секция Приемущество', 'vetq'),
        'id'   => 'home_advantages_title_id',
        'type' => 'title'
    ));

    $cmb_advantages->add_field(array(
        'name' => __('Заголовок', 'vetq'),
        'id'   => 'home_advantages_title',
        'type' => 'text',
    ));

    $cmb_advantages->add_field(array(
        'name' => __('Картинка', 'vetq'),
        'desc' => __('Рекомендуемый размер (800 x 800)', 'vetq'),
        'id'   => 'home_advantages_banner',
        'type' => 'file',
    ));

    $cmb_advantages->add_field(array(
        'name' => __('Описание', 'vetq'),
        'id'   => 'home_advantages_description',
        'type' => 'textarea_small',
    ));

    $cmb_advantages->add_field(array(
        'name' => __('Возможности', 'vetq'),
        'id'   => 'home_advantages_benefits',
        'type' => 'text',
        'repeatable' => true
    ));
});