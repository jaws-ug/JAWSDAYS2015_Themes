<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package JAWS Days 2015
 */

get_header(); ?>

		<main id="content" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Found article you are looking for.', 'jawsdays2015' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'The requchefed content was not found. You may find if you search for relevant posts.', 'jawsdays2015' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #content -->

<?php get_footer(); ?>
