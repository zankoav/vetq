<?php if (!defined('ABSPATH')) { exit; }


add_action('cmb2_admin_init', function () {

    $cmb_options = new_cmb2_box(array(
        'id'           => 'vetq_theme_options_page',
        'title'        => __('Настройки темы VetQ'),
        'object_types' => array('options-page'),
        'option_key' => 'vetq_theme_options',
        'icon_url'   =>  'dashicons-palmtree',
        'menu_title'      => 'Настройки VetQ'
    ));

    $cmb_options->add_field(array(
        'name' => __('Подвал Сайта'),
        'id'   => 'footer_title',
        'type' => 'title'
    ));


    $cmb_options->add_field(array(
        'name' => __('Краткое описание'),
        'id'   => 'footer_description',
        'type' => 'textarea'
    ));
});