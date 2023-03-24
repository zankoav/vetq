<?php
if (!defined('ABSPATH')) { exit; }

require __DIR__ . '/backend/Assets.php';
require __DIR__ . '/backend/CMB2/index.php';
require __DIR__ . '/backend/main_menu.php';

$assets = new Assets();

add_action( 'after_setup_theme', function(){
    add_image_size( 'product', 560, 640,  array( 'center', 'center' ) );
} );

