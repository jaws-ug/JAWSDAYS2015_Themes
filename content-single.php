<?php
/**
 * @package JAWS Days 2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php entry_thumbnail(); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if ( get_field( 'sub_title' ) ) : ?>
			<h2 class="entry-sub-title"><?php esc_html( the_field( 'sub_title' ) ); ?></h2>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>'
			) );
		?>
	</div><!-- .entry-content -->
	<?php jawsdays2015_post_nav(); ?>
</article><!-- #post-## -->
