<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package JAWS Days 2015
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'jawsdays2015_before_body' ); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'jawsdays2015' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php do_action( 'jawsdays2015_before_header' ); ?>

		<div class="site-branding">
			<h1 id="site-title" class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .site-branding -->

		<nav id="main-nav" class="header-navigation" role="navigation">
			<h3 class="menu-title"><span><?php _e( 'Main menu', 'jawsdays2015' ); ?></span></h3>
			<button id="menu-toggle"><span><?php esc_html_e( 'Open MENU' , 'jawsdays2015' ); ?></span></button>
			<?php wp_nav_menu( array(
				'theme_location' => 'main_menu',
				 'container_id'  => 'main-nav-box',
				 'fallback_cb'   => ''
			) ); ?>
		</nav><!-- #site-navigation -->

		<?php do_action( 'jawsdays2015_after_header' ); ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
		<?php do_action( 'jawsdays2015_before_content' ); ?>
