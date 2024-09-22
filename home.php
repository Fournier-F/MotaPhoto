<?php get_header(); ?>

<main id="primary" class="site-main home">

	<!-- Affichage de la photo aléatoire du hero -->
	<?php get_template_part ( 'template-parts/banner' ); ?>

	<?php get_the_title(); ?>

	<?php
	// Affichage du catalogue de photos qui contient le CPT "photos"
	get_template_part ( 'template-parts/filters' );
	
	get_template_part ( 'template-parts/photoslist' );
	?>

</main>

<?php get_footer(); ?>