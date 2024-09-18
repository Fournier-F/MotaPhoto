<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' ); // Ajoute les scripts et les styles
function theme_enqueue_styles() {
	// Parent Style
	//wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// Global Style
	wp_enqueue_style( 'global-style', get_template_directory_uri() . '/assets/css/global.scss' );

	// Header Style
	wp_enqueue_style( 'header-style', get_template_directory_uri() . '/assets/css/header.scss' );
	
	// Footer Style
	wp_enqueue_style( 'footer-style', get_template_directory_uri() . '/assets/css/footer.scss' );

	// Footer Modal Style
	wp_enqueue_style( 'modal-style', get_template_directory_uri() . '/assets/css/modal.scss' );

	// Media Queries Style
	wp_enqueue_style( 'media-queries-style', get_template_directory_uri() . '/assets/css/media-queries.scss' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
	// Global Scripts
	//wp_enqueue_script( 'global-script', get_theme_file_uri( '/assets/javascript/global.js' ), array() );
		
	// Header Scripts
	wp_enqueue_script( 'header-script', get_theme_file_uri( '/assets/javascript/header.js' ), array('jquery'), '1.0.0', true );
	
	// Footer Modal Scripts
		wp_enqueue_script( 'footer-modal-script', get_theme_file_uri( '/assets/javascript/modal.js' ), array('jquery'), '1.0.0', true );
} 

 add_action( 'init', 'register_menus' );
function register_menus() {
	register_nav_menus(
		array(
			'menu-header' => __( 'Menu Header' ),
			'menu-footer' => __( 'Menu Footer' )
		)
	);
}

