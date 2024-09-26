<!-- affichage de la bannière avec une image aléatoire -->
<div class="banner">

    <?php 
	
	// Sélectionne une photo de façon aléatoire
		$args = array(
			'post_type' => 'photo',
			'posts_per_page' => 1,
			'orderby' => 'rand'
		);

		$my_query = new WP_Query( $args );

		if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    
	?>
			<!-- Affichage de la photo -->
			<img src="<?php echo get_field("photo"); ?>" alt="<?php echo the_title(); ?>">

	<?php
		endwhile;
		endif;

		wp_reset_postdata();
	?>

	<!-- Affichage du text sur la photo -->
    <div class="text">Photographe Event</div>

</div>