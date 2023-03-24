<?php if (!defined('ABSPATH')) { exit; }

function cmb2_contacts_page() {

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

}

add_action('cmb2_admin_init', 'cmb2_contacts_page');