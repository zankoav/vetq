<?php if (!defined('ABSPATH')) { exit; }

function set_html_content_type() {
    return "text/html";
}

add_filter( 'wp_mail_content_type', 'set_html_content_type' );

function post_message() {

    $contactsSettings = get_option('vetq_contacts_appearance_options');
    $mail_to = $contactsSettings['contacts_email'];
    
    $subject = 'Сообщение из VetQ!';
    $headers = 'From: VetQ.BY <'.$mail_to.'>' . "\r\n";

    $response           = array();
    $response['status'] = 0;
    $form_phone         = empty( $_POST['phone'] ) ? '' : esc_attr( $_POST['phone'] );
    $form_fio       = empty( $_POST['fio'] ) ? '' : esc_attr( $_POST['fio'] );
    $form_email       = empty( $_POST['email'] ) ? '' : esc_attr( $_POST['email'] );
    $form_message       = empty( $_POST['message'] ) ? '' : esc_attr( $_POST['message'] );
    $form_city      = empty( $_POST['city'] ) ? '' : esc_attr( $_POST['city'] );
    $form_country      = empty( $_POST['country'] ) ? '' : esc_attr( $_POST['country'] );
    $form_organization   = empty( $_POST['organization'] ) ? '' : esc_attr( $_POST['organization'] );
    $form_direction   = empty( $_POST['direction'] ) ? '' : esc_attr( $_POST['direction'] );

    if ( empty($form_phone) ) {

        $response['message']    = 'Phone empty';
        echo json_encode( $response );
        wp_die();
    }


    $msg = "<p><strong>ФИО: </strong><span>" . $form_fio . "</span></p>";
    $msg .= "<p><strong>Телефон: </strong><span>" . $form_phone . "</span></p>";
    $msg .= "<p><strong>Email: </strong><span>" . $form_email  . "</span></p>";
    $msg .= "<p><strong>Город: </strong><span>" . $form_city  . "</span></p>";
    $msg .= "<p><strong>Страна: </strong><span>" . $form_country  . "</span></p>";
    $msg .= "<p><strong>Название предприятия: </strong><span>" . $form_organization  . "</span></p>";
    $msg .= "<p><strong>Направление деятельности: </strong><span>" . $form_direction   . "</span></p>";
    $msg .= "<p><strong>Сообщение: </strong><span>" . $form_message  . "</span></p>";


    if ( wp_mail( $mail_to, $subject, $msg, $headers ) ) {
        $response['status'] = 1;
    }

    echo json_encode( $response );
    wp_die();
}

add_action( 'wp_ajax_post_message', 'post_message' );
add_action( 'wp_ajax_nopriv_post_message', 'post_message' );