<?php if (!defined('ABSPATH')) {
    exit;
}

function cmb2_contacts_page()
{

    $cmb_options = new_cmb2_box(array(
        'id'           => 'vetq_contacts_page',
        'title'        => 'Настройки страницы контакты',
        'object_types' => array('options-page'),
        'option_key'   => 'vetq_contacts_appearance_options',
        'parent_slug'  => 'edit.php?post_type=page'
    ));

    $cmb_options->add_field(array(
        'name' => __('Картинка в шапке', 'vetq'),
        'desc' => __('Картинка в шапке (2736 x 710)', 'vetq'),
        'id'   => 'contacts_banner',
        'type' => 'file',
    ));

    $cmb_options->add_field(array(
        'name' => __('Подзаголовок', 'vetq'),
        'id'   => 'contacts_subtitle',
        'type' => 'text',
    ));

    $cmb_options->add_field(array(
        'name' => __('Основной текст', 'vetq'),
        'id'   => 'contacts_content',
        'type' => 'wysiwyg',
    ));

    $cmb_options->add_field(array(
        'name' => __('Адрес', 'vetq'),
        'id'   => 'contacts_address',
        'type' => 'text',
    ));

    $cmb_options->add_field(array(
        'name' => __('Телефон', 'vetq'),
        'id'   => 'contacts_phone',
        'type' => 'text',
    ));

    $cmb_options->add_field(array(
        'name' => __('Email', 'vetq'),
        'id'   => 'contacts_email',
        'type' => 'text',
    ));

    $cmb_options->add_field(array(
        'name' => __('Telegram Name', 'vetq'),
        'id'   => 'contacts_telegram_name',
        'type' => 'text',
    ));

    $cmb_options->add_field(array(
        'name' => __('Telegram Link', 'vetq'),
        'id'   => 'contacts_telegram_link',
        'type' => 'url',
    ));
}

add_action('cmb2_admin_init', 'cmb2_contacts_page');
