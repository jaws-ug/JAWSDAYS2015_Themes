<?php
/**
 * JAWS Days 2015 functions and definitions
 *
 * @package JAWS Days 2015
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 744; /* pixels */
}

if ( ! function_exists( 'jawsdays2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jawsdays2015_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jawsdays2015, use a find and replace
	 * to change 'jawsdays2015' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jawsdays2015', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	// add_editor_style();

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Other
	add_theme_support( 'menus' );
	add_post_type_support( 'page', 'excerpt' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'slide-thumb', 218, 99999 );
	add_image_size( 'slide-crop-thumb', 218, 100, true );
	add_image_size( 'archive-thumb', 148, 99999 );
	add_image_size( 'archive-crop-thumb', 148, 148, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main_menu'   => __( 'Main Menu', 'jawsdays2015' ),
		'footer_menu' => __( 'Footer Menu', 'jawsdays2015' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

/*
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jawsdays2015_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
*/
}
endif; // jawsdays2015_setup
add_action( 'after_setup_theme', 'jawsdays2015_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jawsdays2015_widgets_init() {
	register_sidebar( array(
		'name'          => 'フッターウィジェットエリア',
		'id'            => 'footer-widgets-area',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'jawsdays2015_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jawsdays2015_scripts() {

	// TouchSwipe
	// http://labs.rampinteractive.co.uk/touchSwipe/demos/
	wp_enqueue_script(
		'jquery-touchSwipe',
		get_template_directory_uri() . '/lib/jquery.touchSwipe.min.js',
		array( 'jquery' ),
		'1.6.6',
		true
	);

	// carouFredSel
	// http://docs.dev7studios.com/jquery-plugins/caroufredsel
	wp_enqueue_script(
		'jquery-carouFredSel',
		get_template_directory_uri() . '/lib/jquery.carouFredSel-6.2.1-packed.js',
		array( 'jquery' ),
		'6.2.1',
		true
	);

	// equalize.js
	// http://tsvensen.github.io/equalize.js/
	wp_enqueue_script(
		'equalize-script',
		get_template_directory_uri() . '/lib/equalize.min.js',
		array( 'jquery' ),
		'1.0.1',
		true
	);

	// FitText.js
	// https://github.com/davatron5000/FitText.js
	wp_enqueue_script(
		'jquery-fittext',
		get_template_directory_uri() . '/lib/jquery.fittext.js',
		array( 'jquery' ),
		'1.2.0',
		true
	);

	$jawsdays2015_theme_data = wp_get_theme();
	$jawsdays2015_theme_ver  = $jawsdays2015_theme_data->get( 'Version' );

	$jawsdays2015_stylesheet = get_stylesheet_uri();

	if ( defined( 'WP_DEBUG' ) && ( WP_DEBUG == true ) ) { // WP_DEBUG = ture
		$jawsdays2015_stylesheet = get_template_directory_uri() . '/css/style.css';
	}

	wp_enqueue_style( 'open-sans' );

	wp_enqueue_style(
		'normalize-.css',
		get_template_directory_uri() . '/css/normalize.min.css',
		array(),
		'v2.0.1'
	);

	wp_enqueue_style(
		'jawsdays2015-style',
		$jawsdays2015_stylesheet,
		array(),
		$jawsdays2015_theme_ver
	);

	wp_enqueue_script(
		'jawsdays2015-script',
		get_stylesheet_directory_uri() . '/js/jaws-days-2015.js',
		array('jquery'),
		$jawsdays2015_theme_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'jawsdays2015_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add post_type.
 */
require get_template_directory() . '/inc/post-type.php';

/**
 * Add widget.
 */
require get_template_directory() . '/inc/widget.php';
