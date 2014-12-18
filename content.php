<?php
/**
 * @package JAWS Days 2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php entry_thumbnail(); ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( is_category( 'event' ) ) : ?>
			<p class="event-date">
				<?php $post_date = get_field( 'event_date' );
					if ( !$post_date ) {
						$post_date = $post->post_date;
					}
					$post_date = esc_attr( date_i18n( get_option( 'date_format' ), strtotime($post_date) ) );
					$post_date_unix = esc_attr( date_i18n( 'c', strtotime($post_date) ) );
				?>
				<time datetime="<?php echo $post_date_unix; ?>"><?php echo $post_date; ?></time>
				<?php if ( get_field( 'event_venue' ) ) : ?>
					<span class="event-venue"><?php the_field( 'event_venue' ); ?></span>
				<?php endif ; ?>
			</p>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<?php entry_more_link(); ?>
	</div><!-- .entry-summary -->
</article><!-- #post-## -->