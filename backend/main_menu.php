<?php

	add_action( 'after_setup_theme', 'vetq_register_main_menu' );
	function vetq_register_main_menu() {
		register_nav_menu( 'vetq_main', 'Главное меню в шапке' );
	}

	// И там, где нужно выводим меню так:
	function vetq_main_menu() {
		// main navigation menu
		$args = array(
			'theme_location'    => 'vetq_main',
		);

		// print menu
		wp_nav_menu( $args );
	}

	// Изменяет основные параметры меню
	add_filter( 'wp_nav_menu_args', function ( $args ) {
		if ( $args['theme_location'] === 'vetq_main' ) {
			$args['container']  = false;
			$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
			$args['menu_class'] = 'menu';
		}
		return $args;
	} );
	
    // Изменяем атрибут id у тега li
	add_filter( 'nav_menu_item_id', function ( $menu_id, $item, $args, $depth ) {
		return $args->theme_location === 'vetq_main' ? '' : $menu_id;
	}, 10, 4 );
	

    // Изменяем атрибут class у тега li
	add_filter( 'nav_menu_css_class', function ( $classes, $item, $args, $depth ) {
		if ( $args->theme_location === 'vetq_main' ) {
			$classes = [
				'menu__item'
			];

			if (in_array('menu-item-has-children', $item->classes)) {
				$classes[] = 'menu__item-sub-menu';
			}
		}
		return $classes;
	}, 10, 4 );
	

    add_filter( 'nav_menu_submenu_css_class', function ( $classes, $args, $depth ){
        return ['menu__sub-menu'];
    }, 10, 3 );
