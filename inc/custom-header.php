<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package JAWS Days 2015
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses jawsdays2015_header_style()
 * @uses jawsdays2015_admin_header_style()
 * @uses jawsdays2015_admin_header_image()
 */
function jawsdays2015_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jawsdays2015_custom_header_args', array(
		'default-image' => get_template_directory_uri() . '/images/headers/main_image.png',
		'width'         => apply_filters( 'jawsdays2015_header_image_width', 950 ),
		'height'        => apply_filters( 'jawsdays2015_header_image_height', 340 ),
		'header-text'   => false,
	) ) );
}
add_action( 'after_setup_theme', 'jawsdays2015_custom_header_setup' );

if ( ! function_exists( 'jawsdays2015_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see jawsdays2015_custom_header_setup().
 */
function jawsdays2015_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // jawsdays2015_header_style

if ( ! function_exists( 'jawsdays2015_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see jawsdays2015_custom_header_setup().
 */
function jawsdays2015_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // jawsdays2015_admin_header_style

if ( ! function_exists( 'jawsdays2015_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see jawsdays2015_custom_header_setup().
 */
function jawsdays2015_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // jawsdays2015_admin_header_image