<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package JAWS Days 2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php do_action( 'jawsdays2015_before_entry_content' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>'
			) );
		?>
		<?php do_action( 'jawsdays2015_after_entry_content' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
