<?php

if (!defined('ABSPATH')) {
	exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <meta charset="<?php bloginfo('charset'); ?>" />
     
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            .app{display:none;}
        </style> 
        <?php wp_head(); ?>
    </head>

    <body <?php body_class();?>>
