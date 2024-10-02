<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package motaphoto
 */

get_header();
?>

<div class="main single-photo">
	
	<?php
	
	// Afficher le détail d'une photo
	get_template_part ( 'template-parts/photodetail' );
	
	// Ouvrir les photos dans la visionneuse
	get_template_part ( 'template-parts/lightbox' );
	
	?>
	
</div>

		

<?php
get_footer();
