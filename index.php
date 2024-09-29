<?php get_header(); ?>

<main id="primary" class="site-main home">

	<!-- Afficher la photo aléatoire de la bannière -->
	<?php get_template_part ( 'template-parts/banner' ); ?>

	<?php get_the_title(); ?>

	<?php
	
		// Afficher les filtres pour la sélection de la taxonomie
		get_template_part ( 'template-parts/filters' );
	
		// Afficher toutes les photos
		get_template_part ( 'template-parts/photoslist' );
	
		// Ouvrir les photos dans la visionneuse
		get_template_part ( 'template-parts/lightbox' );
		
	?>

</main>

<?php get_footer(); ?>