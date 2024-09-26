<!-- Afficher la liste des photos -->
<div class="photos" id="photocontainer">

    <?php 
    
	// Selectionner 8 photos par page
		$args = array(
			'post_type' => 'photo',
			'posts_per_page' => 8,
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => 1
		);    
    
		$photos = new WP_Query( $args ); // Exécution appel WP Query

		$nbpages = $photos->nbpages;

		$position = 1;
    
		// Boucle pour l'affichage des 8 photos
		if( $photos->have_posts() ) : while( $photos->have_posts() ) : $photos->the_post();

			// Affichage d'une photo
			get_template_part ( 'template-parts/displayphotos' );

			$position ++;
			endwhile;
		endif; 

		wp_reset_postdata();
    
	?>
</div>

<!-- Pour connaitre le nombre de pages -->
<input type="hidden" name="nbpages" value="<?php echo $nbpages ?>">

<!-- Affichage ou suppression du bouton Charger plus -->
<div id="loadmore" class="center">
    <button class="btn btn-default" id="morephotos" title="Charger plus de photos">
        Charger plus
    </button>
</div>

<?php 
	get_template_part ( 'template-parts/lightbox' );
?>