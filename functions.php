<?php

// Utiliser tous les fichiers scss
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
	wp_enqueue_style( 'photosdisplay-style', get_template_directory_uri() . '/assets/css/photosdisplay.scss' );
		
	// Photo Detail Style
	wp_enqueue_style( 'photodetail-style', get_template_directory_uri() . '/assets/css/photodetail.scss' );
	
	// Lightbox Style
	wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/assets/css/lightbox.scss' );
	
	// Footer Style
	wp_enqueue_style( 'footer-style', get_template_directory_uri() . '/assets/css/footer.scss' );

	// Footer Modal Style
	wp_enqueue_style( 'modal-style', get_template_directory_uri() . '/assets/css/modal.scss' );

	// Media Queries Style
	wp_enqueue_style( 'media-queries-style', get_template_directory_uri() . '/assets/css/media-queries.scss' );
}

// Utiliser tous les fichiers javascript
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
	
	// Global Scripts
	//wp_enqueue_script( 'global-script', get_theme_file_uri( '/assets/javascript/global.js' ), array() );
	
	// Header Scripts
	wp_enqueue_script( 'header-script', get_theme_file_uri( '/assets/javascript/header.js' ), array('jquery'), '1.0.0', true );
	
	// Photo Detail Scripts
	wp_enqueue_script( 'photodetail-script', get_theme_file_uri( '/assets/javascript/photodetail.js' ), array('jquery'), '1.0.0', true );
	
	// Lightbox Scripts
	wp_enqueue_script( 'lightbox-script', get_theme_file_uri( '/assets/javascript/lightbox.js' ), array('jquery'), '1.0.0', true );
	wp_localize_script('lightbox-script', 'ajax_call', array('ajaxurl' => admin_url('admin-ajax.php')));
	
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

// Retourner les taxonomies pour les filtres
function returnTaxonomies($taxonomy) {
    $values = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false
    ));        
    foreach ( $values as $value ) {
        echo '<option value=' . $value->slug .'>' . $value->name . '</option>';
    }
}

// Retourner une liste pour un id et une taxonomie
function get_categories_by_post($id, $taxonomy) {
    $values = get_the_terms($id, $taxonomy);
    foreach($values as $value) {
        $return[] = $value->name;
    }
    return $return;
}

// Définir la fonction ajax
add_action('wp_ajax_refresh_photos_ajax', 'refresh_photos_ajax_router');
add_action('wp_ajax_nopriv_refresh_photos_ajax', 'refresh_photos_ajax_router');

// Sécuriser l'utilisation d'ajax
function refresh_photos_ajax_router(): string
{	
    // Vérifer la sécurité pour la fonction Javascript
    if (!in_array($_POST['function'], ["refresh_photos_ajax"]))
    {
        die();
    }
	$_POST['function']($_POST['data']); 
}


// Fonction ajax pour le rafraichissement des photos
function refresh_photos_ajax($args): string {
    $json_returned = [
        "html_content"=>"",
        "has_more_pictures"=>1
    ];
	
	// Convertir en tableau 
    $args = parse_str($args, $params);
	
	// Récupérer les infos par défaut
    $query_args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'tax_query' => [],
        'orderby' => "date",
        'order' => "desc",
        'paged' => 1
    );

	// Récupérer la catégorie du javascript
    if(!empty($params['category'])) { 
        $query_args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'terms' => $params['category'],
            'field' => 'slug',
            'operator' => 'IN',                
        );   
    }

	// Récupérer le format du javascript
    if(!empty($params['format'])) { 
        $query_args["tax_query"][] = array(
            'taxonomy' => 'format',
            'terms' => $params['format'],
            'field' => 'slug',
            'operator' => 'IN',                
        );        
    }

    // Récupérer le tri du javascript
    if(!empty($params['sort'])) { 
        $query_args["order"] = $params['sort'];        
    }

	// Récupérer la page du javascript
    if(!empty($params['page'])){
        $query_args["paged"] = $params['page'];
    }

    $my_query = new WP_Query( $query_args );   

    $nbmaxpages = $my_query->max_num_pages;

    // Vérifier si c'est la dernière page
    if($nbmaxpages == $params["page"] || !$my_query->have_posts()) {
        $json_returned["has_more_pictures"] = 0;        
    }   

	// Mettre en mémoire tampon
    ob_start();
	
	// 
    if( $my_query->have_posts())
    {
        while( $my_query->have_posts() ) : $my_query->the_post();
			 get_template_part ( 'template-parts/photosdisplay' );
         endwhile;
    }
	// Retourne le contenu de la mémoire tampon
    $json_returned["html_content"] = ob_get_contents();
	
	// Supprimer la mémoire tampon
    ob_end_clean();
	
	// réinitialiser la mémoire tampon
    ob_end_flush();
    
	wp_send_json($json_returned);
    
    wp_reset_postdata();  
    exit;
}


