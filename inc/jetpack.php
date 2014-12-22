<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package JAWS Days 2015
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function jawsdays2015_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'jawsdays2015_jetpack_setup' );


/*
 * original
 * $image[] = apply_filters( 'jetpack_open_graph_image_default', "http://wordpress.com/i/blank.jpg" );
 * テーマに /images/my_open_graph_image_default.png を用意しておく
 */

add_filter( 'jetpack_open_graph_image_default', 'my_open_graph_image_default' );

function my_open_graph_image_default( $image ) {
	$image = get_stylesheet_directory_uri() . '/images/other/ogp-main.jpg';
	return $image;
}