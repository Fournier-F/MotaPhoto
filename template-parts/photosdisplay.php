<!-- Afficher une photo de la list -->
<div class="photo">

    <?php
		
		// Sélectionner la taxonomie catégorie pour l'id
        $categories = get_categories_by_post(get_the_ID(), 'categorie');
    
	?>

    <div class="square">
		<!-- Afficher l'image du carré pour ouvrir la visionneuse -->
        <img src="<?php echo get_template_directory_uri() . '/assets/images/square.png'; ?>" class="squarephoto" alt="Voir la photo dans la visionneuse"
            data-category="<?php echo implode(" , ", $categories); ?>"
            data-image="<?php echo get_field("photo"); ?>" 
            data-reference="<?php echo get_field("reference"); ?>" 
            data-title="<?php the_title(); ?>"
        />      

    </div>
	
	<!-- Afficher la photo de la liste -->
	<a href="<?php echo get_field("photo"); ?>" title="Photo '<?php the_title(); ?>'">
 		<img src="<?php echo get_field("photo");?>" alt="<?php the_title(); ?>">
    </a>	

	<!-- Afficher l'oeil pour un lien vers la page détail de la photo -->
    <a href="<?php the_permalink(); ?>" title="Détail de la photo - <?php the_title(); ?>">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/eye.png'; ?>" class="eye" alt="Détail de la photo">
	</a>
    
	<!-- Afficher les informations sur la photo -->
	<div class="refandcateg">
        <div><?php the_title(); ?></div>
        <div>
            <?php    
                echo implode(", ", $categories);               
            ?>               
        </div>
    </div>
</div>