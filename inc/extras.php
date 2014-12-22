<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package JAWS Days 2015
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function jawsdays2015_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'jawsdays2015_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function jawsdays2015_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'jawsdays2015_body_classes' );

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function jawsdays2015_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = $site_description . $sep . $title;
		}

		// news
		if ( get_query_var( 'news' ) && is_archive() ) {
			$label_name = __( 'What\'s new', 'jawsdays2015' );
			$title = $label_name . $sep . $title;
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title = sprintf( __( 'Page %s', 'jawsdays2015' ), max( $paged, $page ) ) . $sep . $title;
		}

		return $title;
	}
	add_filter( 'wp_title', 'jawsdays2015_wp_title', 10, 2 );
endif;

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function jawsdays2015_render_title() {
		echo '<title>' . wp_title( ' | ', false, 'right' ) . "</title>\n";
	}
	add_action( 'wp_head', 'jawsdays2015_render_title' );
endif;

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function jawsdays2015_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'jawsdays2015_setup_author' );

/**
 * excerpt_more
 */
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
	return '...';
}

/**
 * Query pre_get_posts
 * http://notnil-creative.com/blog/archives/1996
 */
add_action( 'pre_get_posts', 'jaws_modify_main_query' );
function jaws_modify_main_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
		return;

	if ( $query->is_post_type_archive( 'supporter' ) ) {
		$query->set( 'posts_per_archive_page', -1 );
		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'menu_order' );
		return;
	}

	if ( $query->is_post_type_archive( 'speaker' ) ) {
		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'menu_order' );
		return;
	}
}

/**
 * SNS scripts
 */
add_action( 'jawsdays2015_before_body', 'add_fb_root' );
function add_fb_root() {
$output = <<< EOT
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
EOT;
echo $output;
}

add_action( 'wp_footer', 'jawsdays2015_footer_script', 99 );
function jawsdays2015_footer_script() {
	echo <<< EOT
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
	window.___gcfg = {lang: "ja"};
	(function() {
	var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
	po.src = "https://apis.google.com/js/plusone.js";
	var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
	})();
</script>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
EOT;
}