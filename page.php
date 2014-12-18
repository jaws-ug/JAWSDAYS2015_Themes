<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package JAWS Days 2015
 */

get_header(); ?>

	<main id="content" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php if ( get_field( 'sub_title' ) ) : ?>
					<h2 class="entry-sub-title"><?php esc_html( the_field( 'sub_title' ) ); ?></h2>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>
