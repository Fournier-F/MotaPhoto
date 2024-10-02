<!-- Afficher la liste des photos -->
<div class="photos" id="photoscontainer">

    <?php 
    
		// Sélectionner les photos
		$args = array(
			'post_type' => 'photo',
			'posts_per_page' => 8,
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => 1
		);    
    
		$photos = new WP_Query( $args );

		// Sélectionner le nombre de pages
		$nbmaxpages = $photos->max_num_pages;

    
		// Afficher les photos
		if( $photos->have_posts() ) : while( $photos->have_posts() ) : $photos->the_post();

			// Afficher la photo
			get_template_part ( 'template-parts/photosdisplay' );

			endwhile;
		endif; 

		wp_reset_postdata();
    
	?>
	
</div>

<!-- Sauvegarder le nombre de pages -->
<input type="hidden" name="nbpages" value="<?php echo $nbmaxpages ?>">

<!-- Afficher le bouton pour afficher plus de photos -->
<div id="loadmore" class="center">
    <button class="btn btn-default" id="morephotos" title="Charger plus de photos">Charger plus</button>
</div>
