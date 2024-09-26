<?php

// Utilisation de tous les fichiers scss
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' ); // Ajoute les scripts et les styles
function theme_enqueue_styles() {
	
	// Parent Style
	//wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	// Global Style
	wp_enqueue_style( 'global-style', get_template_directory_uri() . '/assets/css/global.scss' );

	// Header Style
	wp_enqueue_style( 'header-style', get_template_directory_uri() . '/assets/css/header.scss' );
	
	// Banner Style
	wp_enqueue_style( 'banner-style', get_template_directory_uri() . '/assets/css/banner.scss' );
	
	// Filters Style
	wp_enqueue_style( 'filter-style', get_template_directory_uri() . '/assets/css/filters.scss' );
	
	// Photos List Style
	wp_enqueue_style( 'photoslist-style', get_template_directory_uri() . '/assets/css/photoslist.scss' );
	
	// Display Photos Style
	wp_enqueue_style( 'displayphotos-style', get_template_directory_uri() . '/assets/css/displayphotos.scss' );
	
	// Lightbox Style
	wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/assets/css/lightbox.scss' );
	
	// Footer Style
	wp_enqueue_style( 'footer-style', get_template_directory_uri() . '/assets/css/footer.scss' );

	// Footer Modal Style
	wp_enqueue_style( 'modal-style', get_template_directory_uri() . '/assets/css/modal.scss' );

	// Media Queries Style
	wp_enqueue_style( 'media-queries-style', get_template_directory_uri() . '/assets/css/media-queries.scss' );
}

// Utilisation de tous les fichiers javascript
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
	// Global Scripts
	//wp_enqueue_script( 'global-script', get_theme_file_uri( '/assets/javascript/global.js' ), array() );
		
	// Header Scripts
	wp_enqueue_script( 'header-script', get_theme_file_uri( '/assets/javascript/header.js' ), array('jquery'), '1.0.0', true );

	// Lightbox Scripts
	wp_enqueue_script( 'lightbox-script', get_theme_file_uri( '/assets/javascript/lightbox.js' ), array('jquery'), '1.0.0', true );
	
	// Modal Scripts
	wp_enqueue_script( 'modal-script', get_theme_file_uri( '/assets/javascript/modal.js' ), array('jquery'), '1.0.0', true );		
} 

// Enregistrer les menus pour leur utilisation
add_action( 'init', 'register_menus' );
function register_menus() {
	register_nav_menus(
		array(
			'menu-header' => __( 'Menu Header' ),
			'menu-footer' => __( 'Menu Footer' )
		)
	);
}

// fonction qui retourne les taxonomies pour les filtres
function returnTaxonomies($taxonomy) {
    $values = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false
    ));        
    foreach ( $values as $value ) {
        echo '<option value=' . $value->slug .'>' . $value->name . '</option>';
    }
}

// fonction qui retourne pour un postid et une taxonomie une liste de valeur
function get_categ_by_posts($id, $taxonomy) {
    $values = get_the_terms($id, $taxonomy);
    foreach($values as $value) {
        $return[] = $value->name;
    }
    return $return;
}