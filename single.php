<?php
/**
 * The template for displaying all single posts.
 *
 * @package JAWS Days 2015
 */

get_header(); ?>

	<main id="content" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>
		<?php content_social_button(); ?>

	<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>
