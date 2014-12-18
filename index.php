<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package JAWS Days 2015
 */

get_header(); ?>

	<main id="content" class="site-main" role="main">

		<header class="page-header">
			<h1 class="page-title"><?php jawsdays2015_page_title(); ?></h1>
			<?php if ( category_description() ) : ?>
				<h2 class="page-sub-title"><?php echo category_description(); ?></h2>
			<?php endif; ?>
		</header>
		<div id="main-content">
			<?php if ( have_posts() ) : ?>
		
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
		
				<?php endwhile; ?>
		
				<?php jawsdays2015_paging_nav(); ?>
		
			<?php else : ?>
		
				<?php get_template_part( 'content', 'none' ); ?>
		
			<?php endif; ?>
		</div>
	</main><!-- #content -->

<?php get_footer(); ?>
