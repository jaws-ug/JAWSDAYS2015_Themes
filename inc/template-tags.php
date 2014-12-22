<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package JAWS Days 2015
 */

if ( ! function_exists( 'jawsdays2015_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Change this function when WordPress 4.3 is released.
 */
function jawsdays2015_paging_nav() {
	if ( function_exists( 'the_posts_pagination' ) ) {
		the_posts_pagination( array(
			'end_size'  => false,
			'prev_text' => __( '&lt;', 'jawsdays2015' ),
			'next_text' => __( '&gt;', 'jawsdays2015' ),
		) );
	} else {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation posts-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'jawsdays2015' ); ?></h1>
			<div class="nav-links">
	
				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'jawsdays2015' ) ); ?></div>
				<?php endif; ?>
	
				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'jawsdays2015' ) ); ?></div>
				<?php endif; ?>
	
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
	<?php
	}
}
endif;

if ( ! function_exists( 'jawsdays2015_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function jawsdays2015_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" id="single-nav" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'jawsdays2015' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'jawsdays2015' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'jawsdays2015' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/* Header
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* jawsdays2015_main_img */
function jawsdays2015_main_img() {
	echo get_jawsdays2015_main_img();
}

/* get_jawsdays2015_main_img */
function get_jawsdays2015_main_img() {
	$header_image = get_header_image();
	if ( $header_image && (is_home() || is_front_page()) ) {
		$output = '<p id="main-img"><img src="' . esc_url( $header_image ) . '" alt="' . esc_attr( get_bloginfo( 'description', 'display' ) ) . '"></p>';
		return $output;
	}
}

/* Common
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
function entry_thumbnail( $args = array() ) {
	echo get_entry_thumbnail( $args );
}

function get_entry_thumbnail( $args = array() ) {
	$defaults = array(
		'id'       => get_the_ID(),
		'size'     => 'archive-crop-thumb',
		'width'    => 148,
		'height'   => 148,
		'class'    => '',
	);
	$r       = wp_parse_args( $args, $defaults );
	extract($r);
	$class = $class ? ' ' . $class : '';
	$output = '<p class="thumb' . $class . '">' . "\n";
	if ( !is_single() )
		$output .= '<a href="' . get_permalink( $id ) . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'est' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark">' . "\n";
	if ( has_post_thumbnail( $id ) ) {
		$output .= get_the_post_thumbnail( $id, $size ) . "\n";
	} else {
		$src = apply_filters('est_no-image', get_template_directory_uri() . '/images/other/no-image.png', $width, $height);
		$output .= '<img src="' . $src . '" alt="' . the_title_attribute( 'echo=0' ) . '" width="' . $width . '" height="' . $height . '">' . "\n";
	}
	if ( !is_single() )
		$output .= '</a>' . "\n";
	$output .= '</p>' . "\n";
	return apply_filters( 'entry_thumbnail', $output, $size, $width, $height );
}
function entry_data() {
	echo get_entry_data();
}
function get_entry_data() {
	$output = '<p class="entry-date"><time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></p>';
	return apply_filters( 'entry_date', $output );
}

function entry_more_link( $post_id = null ) {
	echo get_entry_more_link( $post_id );
}

function get_entry_more_link( $post_id = null ) {
	if ( ! $post_id )
		$post_id = get_the_ID();

	return '<p class="entry-more"><a href="'. get_permalink( $post_id ) . '">' . __( 'Read more &raquo;', 'jawsdays2015' ) . '</a></p>';
}

function content_social_button() {
	echo get_content_social_button();
}
function get_content_social_button() {
	$id = get_the_ID();
	$url = esc_url( get_permalink( $id ) );
	$text = esc_html( get_the_title( $id ) );
	$via = esc_attr( 'jawsdays' );
	$output = '<div class="social-button">' . "\n";
	$output .= '<p class="twitter-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="' . $url . '" data-text="' . $text . '" data-lang="ja" data-via="' . $via . '">ツイート</a></p>' . "\n";
	$output .= '<p class="fb-like" data-href="' . $url . '" data-send="false" data-layout="button_count" data-width="70" data-show-faces="false"></p>' . "\n";
	$output .= '<p class="g-plusone" data-size="medium" data-href="' . $url . '"></p>' . "\n";
	$output .= '<p class="hatena"><a href="http://b.hatena.ne.jp/entry/' . $url . '" class="hatena-bookmark-button" data-hatena-bookmark-title="' . $text . '" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></p>' . "\n";
	$output .= '</div>' . "\n";
	return $output;
}

/* Archive
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* jawsdays2015_page_title */
function jawsdays2015_page_title() {
	echo get_jawsdays2015_page_title();
}

/* get_jawsdays2015_page_title */
function get_jawsdays2015_page_title() {
	global $wp_query;
	$output = '';
	if ( !is_home() || !is_front_page() ) {
		if ( is_category() ) :
			$output .= single_cat_title( '', false );
		elseif ( is_tag() ) :
			$output .= single_tag_title( '', false );
		elseif ( is_tax() ) :
			$output .= single_term_title( '', false );
		elseif ( is_post_type_archive() ) :
			$output .= post_type_archive_title( '', false );
		else :
			$output .= __( 'Archives', 'jawsdays2015' );
		endif;
	}
	return $output;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function jawsdays2015_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'jawsdays2015_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'jawsdays2015_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so jawsdays2015_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so jawsdays2015_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in jawsdays2015_categorized_blog
 */
function jawsdays2015_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'jawsdays2015_categories' );
}
add_action( 'edit_category', 'jawsdays2015_category_transient_flusher' );
add_action( 'save_post',     'jawsdays2015_category_transient_flusher' );

/* HOME
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
function jawsdays2015_slide( $limit = -1 ) {
	echo get_jawsdays2015_slide( $limit );
}
function get_jawsdays2015_slide( $limit = -1 ) {
	$output = '';
	$posts_array = array();
	$args = array(
		'post_type'      => 'supporter',
		'posts_per_page' => $limit,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	);
	$posts_array = get_posts( $args );
	$post_count = count($posts_array);
	if ( $posts_array ) {
		$output .= '<div id="slide">' . "\n";
		$output .= '<ul id="carousel">' . "\n";
		foreach ( $posts_array as $post ) {
			setup_postdata( $post );
			$id = $post->ID;
			$link = esc_url( get_field( '_supporter_url', $id ) );
			$blank = get_field( '_supporter_target', $id );
			if ( $blank ) {
				$target = ' target="_blank"';
			} else {
				$target = '';
			}
			$img = get_the_post_thumbnail( $id, 'slide-thumb' );
			if ( $link ) {
				$output .= '<li><a href="' . $link . '"' . $target . '>' . $img . '</a></li>';
			} else {
				$output .= '<li>' . $img . '</li>';
			}
		}
		$output .= '</ul>' . "\n";
		$output .= '</div>' . "\n";
	}
	return $output;
}
function jawsdays2015_new_post( $args = array() ) {
	echo get_jawsdays2015_new_post( $args );
}
function get_jawsdays2015_new_post( $args = array() ) {
	$output = '';
	$posts_array = array();
	$defaults = array(
		'posts_per_page' => 3,
	);
	$args = wp_parse_args( $args, $defaults );
	extract($args);
	$posts_array = get_posts( $args );
	if ( ! $posts_array )
		return;

	$output .= '<div class="new-post-content" id="new-post">' . "\n";
	$output .= '<h2 class="new-post-title">' . esc_html__( 'News', 'jawsdays2015' ) . '</h2>' . "\n";
	foreach ( $posts_array as $post ) {
		setup_postdata($post);
		$id = $post->ID;
		$title = esc_html( get_the_title( $id ) );
		$link = esc_url( get_permalink( $id ) );
		$post_date = $post->post_date;
		$post_date = esc_attr( date_i18n( get_option( 'date_format' ), strtotime($post_date) ) );
		$post_date_unix = esc_attr( date_i18n( 'c', strtotime($post_date) ) );
		$event_venue = '';
		$output .= '<article id="post-' . $id . '" class="' . implode( ' ', get_post_class( '', $id ) ) . '">' . "\n";
		$output .= '<header class="new-post-header">' . "\n";
		$output .= '<p class="post-date">';
		$output .= '<time datetime="' . $post_date_unix . '">' . $post_date . '</time>';
		if ( $event_venue )
			$output .= '<span class="event-venue">' . $event_venue . '</span>';
		$output .= '</p>';
		$output .= '<h1 class="post-title"><a href="' . $link . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'athlete' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark">' . $title . '</a></h1>' . "\n";
		$output .= '</header>' . "\n";
		$output .= get_entry_more_link( $id );
		$output .= '</article>' . "\n";
	}
	$output .= '<p class="more-archive-list"><a href="' . esc_url( home_url('news/') ) . '">' . esc_html__( 'Archive list &gt;', 'jawsdays2015' ) . '</a></p>' . "\n";
	$output .= '</div>' . "\n";
	return $output;
}

/* Footer
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
function jawsdays2015_social_button() {
	echo get_jawsdays2015_social_button();
}
function get_jawsdays2015_social_button() {
	$url = esc_url( home_url( '/' ) );
	$text = esc_attr( get_bloginfo( 'name', 'display' ) );
	$via = esc_attr( 'jawsdays' );
	$output = '<div class="social-button">' . "\n";
	$output .= '<p class="twitter-button"><a href="https://twitter.com/share" class="twitter-share-button" data-url="' . $url . '" data-text="' . $text . '" data-lang="ja" data-via="' . $via . '">ツイート</a></p>' . "\n";
	$output .= '<p class="fb-like" data-href="' . $url . '" data-send="false" data-layout="button_count" data-width="70" data-show-faces="false"></p>' . "\n";
	$output .= '<p class="g-plusone" data-size="medium" data-href="' . $url . '"></p>' . "\n";
	$output .= '<p class="hatena"><a href="http://b.hatena.ne.jp/entry/' . $url . '" class="hatena-bookmark-button" data-hatena-bookmark-title="' . $text . '" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></p>' . "\n";
	$output .= '</div>' . "\n";
	return $output;
}
