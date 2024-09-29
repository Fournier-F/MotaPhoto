<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 */

?>
	
		</div><!-- #page -->

		<footer class="site-footer">
		
			<!-- Insérer le menu footer -->
			<div>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-footer', 'container_class' => 'footer' ) ); ?>                  
			</div>
			
		</footer>
		<?php wp_footer(); ?>
	</body>

	<!-- Insérer la modale qui sera accessible sur tout le site -->
	<?php get_template_part ( 'template-parts/modal' ); ?>

</html>
