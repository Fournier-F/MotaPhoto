<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	
	</head>

	<body <?php body_class('my-body-class'); ?>>

	<?php wp_body_open(); ?>

	<div id="page" class="site">

		<header id="masthead" class="site-header">

			<div class="menu-header">
			
				<!-- Afficher le logo du site de Nathalie Mota -->
				<div class="logo-header">
					<a href="/MotaPhoto" title="Accueil du site de Nathalie Mota">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/Logo_Nathalie_Mota.webp'; ?> " alt="Logo Nathalie Mota" />
					</a>
				</div>

				<!-- Afficher le menu burger -->
				<div class="menu-burger">
					<div id="menu-links">
						<!-- Insérer le menu header -->
						<?php wp_nav_menu( array( 'theme_location' => 'menu-header', 'container_class' => 'header' ) ); ?>
					</div>

					<!-- Afficher les icônes du menu burger pour le téléphone -->
					<div class="menu-burger-icons">
						<div class="menu-burger-icon-open">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/Burger_open.webp'; ?> " alt="Icone pour ouvrir le memu burger" />
						</div>
						<div class="menu-burger-icon-close">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/Cross_Close.webp'; ?> " alt="Icone pour fermer le menu burger" />
						</div>
					</div>
				</div>

			</div>		
		  
		</header><!-- #masthead -->
