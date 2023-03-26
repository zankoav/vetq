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
    $form_name       = empty( $_POST['name'] ) ? '' : esc_attr( $_POST['name'] );
    $form_email       = empty( $_POST['email'] ) ? '' : esc_attr( $_POST['email'] );
    $form_message       = empty( $_POST['message'] ) ? '' : esc_attr( $_POST['message'] );

    if ( empty($form_phone) ) {

        $response['message']    = 'Phone empty';
        echo json_encode( $response );
        wp_die();
    }


    $msg = "<p><strong>Имя: </strong><span>" . $form_name . "</span></p>";
    $msg .= "<p><strong>Телефон: </strong><span>" . $form_phone . "</span></p>";
    $msg .= "<p><strong>Email : </strong><span>" . $form_email  . "</span></p>";
    $msg .= "<p><strong>Сообщение : </strong><span>" . $form_message  . "</span></p>";


    if ( wp_mail( $mail_to, $subject, $msg, $headers ) ) {
        $response['status'] = 1;
    }

    echo json_encode( $response );
    wp_die();
}

add_action( 'wp_ajax_post_message', 'post_message' );
add_action( 'wp_ajax_nopriv_post_message', 'post_message' );