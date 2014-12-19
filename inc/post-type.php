<?php
/**
 * Add Post yype
 *
 * @package JAWS Days 2015
 */

if ( ! function_exists('custom_post_type_speaker') ) {

// Register Custom Post Type
function custom_post_type_speaker() {

	$labels = array(
		'name'                => _x( 'Speakers', 'Post Type General Name', 'jawsdays2015' ),
		'singular_name'       => _x( 'Speaker', 'Post Type Singular Name', 'jawsdays2015' ),
		'menu_name'           => _x( 'Speakers', 'Post Type Menu Name', 'jawsdays2015' ),
		'parent_item_colon'   => __( 'Parent Item:', 'jawsdays2015' ),
		'all_items'           => __( 'All Items', 'jawsdays2015' ),
		'view_item'           => __( 'View Item', 'jawsdays2015' ),
		'add_new_item'        => __( 'Add New Item', 'jawsdays2015' ),
		'add_new'             => __( 'Add New', 'jawsdays2015' ),
		'edit_item'           => __( 'Edit Item', 'jawsdays2015' ),
		'update_item'         => __( 'Update Item', 'jawsdays2015' ),
		'search_items'        => __( 'Search Item', 'jawsdays2015' ),
		'not_found'           => __( 'Not found', 'jawsdays2015' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'jawsdays2015' ),
	);
	$args = array(
		'label'               => _x( 'Speakers', 'Post Type label', 'jawsdays2015' ),
		'description'         => _x( 'Speaker', 'Post Type description', 'jawsdays2015' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-megaphone',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'speaker', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_speaker', 0 );

}

if ( ! function_exists('custom_post_type_supporter') ) {

// Register Custom Post Type
function custom_post_type_supporter() {

	$labels = array(
		'name'                => _x( 'Supporters', 'Post Type General Name', 'jawsdays2015' ),
		'singular_name'       => _x( 'Supporter', 'Post Type Singular Name', 'jawsdays2015' ),
		'menu_name'           => _x( 'Supporters', 'Post Type Menu Name', 'jawsdays2015' ),
		'parent_item_colon'   => __( 'Parent Item:', 'jawsdays2015' ),
		'all_items'           => __( 'All Items', 'jawsdays2015' ),
		'view_item'           => __( 'View Item', 'jawsdays2015' ),
		'add_new_item'        => __( 'Add New Item', 'jawsdays2015' ),
		'add_new'             => __( 'Add New', 'jawsdays2015' ),
		'edit_item'           => __( 'Edit Item', 'jawsdays2015' ),
		'update_item'         => __( 'Update Item', 'jawsdays2015' ),
		'search_items'        => __( 'Search Item', 'jawsdays2015' ),
		'not_found'           => __( 'Not found', 'jawsdays2015' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'jawsdays2015' ),
	);
	$args = array(
		'label'               => _x( 'Supporters', 'Post Type label', 'jawsdays2015' ),
		'description'         => _x( 'Supporter', 'Post Type description', 'jawsdays2015' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-awards',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'supporter', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_supporter', 0 );

}