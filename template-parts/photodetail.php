	<!-- Afficher le détail d'une photo -->
	<?php 
	$ID = get_the_ID();
	?>

	<div class="post">
		
		<!-- Contenir le détail de la photo et la photo sélectionnée -->
		<div class="detailphotocontainer">
		
			<!-- Afficher le détail de la photo sélectionnée -->
			<div class="detailcontainer">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<p>Référence : <?php echo get_field("reference"); ?></p>
				<p>Catégorie : <?php $terms = get_categories_by_post(get_the_ID(), 'categorie'); echo implode(", ", $terms);?></p>
				<p>Format : <?php $terms = get_categories_by_post(get_the_ID(), 'format'); echo implode(", ", $terms); ?></p>
				<p>Type : <?php echo get_field("type"); ?></p>
				<p>Année : <?php echo get_field("annee"); ?></p>
			</div>

			<!-- Afficher la photo sélectionnée -->
			<div class="photocontainer">
				<img src="<?php echo get_field('photo'); ?>" alt="<?php the_title(); ?>">
			</div>
			
		</div>

		<!-- Contenir la partie contact et visionneuse -->
		<div class="contactlightboxcontainer">
		
			<!-- Contenir la partie contact -->
			<div class="contactcontainer">
				<div>
					Cette photo vous intéresse ?                
				</div>
				<div>
					<div class="contact-button photoreference" data-photoreference="<?php echo(get_field("reference")); ?>">
						<button class="btn btn-default" title="Contact">Contact</button>
					</div>
				</div>
			</div>
			
			<!-- Contenir la partie visionneuse -->
			<div class="lightboxcontainer">
			
				<div class="minilightbox">
				
					<!-- Afficher la prévisualisation de la photo précédente et la photo suivante -->
					<div class="preview">                    
						<?php 
						$previous_post = get_previous_post();
						if($previous_post) {
							echo '<div class="previous-photo"><img src="' . get_field("photo", $previous_post->ID) .'" alt="Photo précédente"></div>';
						}
						$next_post = get_next_post();
						if($next_post) {
							echo '<div class="next-photo"><img src="' . get_field("photo", $next_post->ID) .'" alt="Photo suivante"></div>';
						}
						?>          
					</div>
					
					<!-- Afficher les flèches de navigation entre la photo précédente et la photo suivante -->
					<div class="previousnextarrows">
						<div>
							<?php 
							if (!empty($previous_post)) {
								echo '<a href="' . get_permalink($previous_post) . '" class="previous-arrow" title="Afficher la photo précédente"><-</a>';
							}
							?>
						</div>
						<div>
							<?php
							if (!empty($next_post)) { 
								echo '<a href="' . get_permalink($next_post) . '" class="next-arrow" title="Afficher la photo suivante">-></a>';
							}
							?>
						</div>
					</div>  
					
				</div>
				
			</div>
			
		</div>
		
	</div>



	<?php 
	// Récupérer la catégorie pour l'Id sélectionné
	$terms = get_the_terms( $post->ID, 'categorie' );

	if ( !empty( $terms ) ){
		$term = array_shift( $terms );
		$slug = $term->slug;
	}

	// Sélectionner 2 photos pour la catégorie de la photo sélectionnée
	$args = array(
		'post_type' => 'photo',
		'posts_per_page' => 2,
		'post__not_in' => array( $post->ID ),
		'tax_query' => array(             
			array(
				'taxonomy' => 'categorie',
				'field' => 'slug',
				'terms' => $slug              
			),
		)
	);
				
	$my_query = new WP_Query( $args );

	// Afficher les photos si elles existent pour la catégorie de la photo sélectionnée
	if( $my_query->have_posts())
	{
		echo "<div class='youmightalsolike'><p>Vous aimerez aussi</p></div>";

		// Afficher la liste des photos
		echo "<div class='photos' id='photosContainer'>";
		
		while( $my_query->have_posts() ) : $my_query->the_post();

			// Afficher la photo
			get_template_part ( 'template-parts/photosdisplay' );
		   
		endwhile;

		wp_reset_postdata();
				
		echo "</div>";	
	}
    ?>
	
	