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
		'footer'		=> 'page',
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

add_action( 'wp_head', 'my_favicon' );
function my_favicon() {
	echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/images/other/favicon.png" />' . "\n";
	echo '<link rel="apple-touch-icon-precomposed" href="' . get_stylesheet_directory_uri() . '/images/other/favicon.png">' . "\n";
}

/*
 * パブリサイズ共有でサフィックス追加
 * original
 * $this->default_prefix = Publicize_Util::build_sprintf( array(
 * 	apply_filters( 'wpas_default_prefix', $this->default_prefix ),
 * 	'url',
 * ) );
 */

add_filter( 'wpas_default_suffix', 'my_wpas_default_suffix' );
function my_wpas_default_suffix( $suffix ) {
	$suffix = $suffix . " #jawsdays #jawsug";
	return $suffix;
}

add_action( 'publicize_save_meta', 'my_publicize_save_meta', 10, 4 );
function my_publicize_save_meta( $submit_post, $post_id, $service_name, $connection ) {
	$suffix = " #jawsdays #jawsug";
	$title  = get_the_title( $post_id );
	$link   = wp_get_shortlink( $post_id );
	$publicize_custom_message = get_post_meta( $post_id, '_wpas_mess', true );
	if ( empty( $publicize_custom_message ) ) {
		$publicize_custom_message = sprintf(
			"%s %s %s",
			$title,
			$link,
			$suffix
		);
	} else {
		if ( strpos( $publicize_custom_message, $title ) === false ) {
			$publicize_custom_message = $publicize_custom_message . $title;
		}
		if ( strpos( $publicize_custom_message, $link ) === false ) {
			$publicize_custom_message = $publicize_custom_message . $link;
		}
		if ( strpos( $publicize_custom_message, $suffix ) === false ) {
			$publicize_custom_message = $publicize_custom_message . $suffix;
		}
	}
	update_post_meta($post_id, '_wpas_mess', $publicize_custom_message);
}

add_filter( 'jetpack_open_graph_image_width', 'my_jetpack_open_graph_image_width' );
function my_jetpack_open_graph_image_width() {
	$width = 96;
	return $width;
}
add_filter( 'jetpack_open_graph_image_height', 'my_jetpack_open_graph_image_height' );
function my_jetpack_open_graph_image_height() {
	$height = 96;
	return $height;
}
