<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package JAWS Days 2015
 */
?>

		<div id="footer-content">
			<?php jawsdays2015_slide(); ?>
			<?php if ( is_front_page() ) : ?>
				<?php if ( is_active_sidebar( 'footer-widgets-area' ) ) : ?>
				<div id="jawsdays2015-new-post-box">
					<?php dynamic_sidebar( 'footer-widgets-area' ); ?>
				</div><!-- #jawsdays2015-new-post-box -->
				<?php endif; ?>
			<?php endif; ?>
			<div id="jawsdays2015-contact-box">
				<p class="text"><?php esc_html_e( 'To participate in the JAWS DAYS 2015', 'jawsdays2015' ); ?></p>
				<p class="contact-button"><a href="<?php echo home_url('/tickets'); ?>"><?php esc_html_e( 'Tickets', 'jawsdays2015' ); ?></a></p>
			</div>
		</div>
		<?php do_action( 'jawsdays2015_after_content' ); ?>
	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
		<?php do_action( 'jawsdays2015_before_footer' ); ?>
		<?php wp_nav_menu( array(
			'theme_location' => 'footer_menu',
			 'container_id'  => 'footer-nav-box',
			 'fallback_cb'   => ''
		) ); ?>
		<p id="copyright"><small>Copyright &copy; AWS User Group Japan. All rights reserved.</small></p>
		<?php jawsdays2015_social_button(); ?>
		<?php do_action( 'jawsdays2015_after_footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php do_action( 'jawsdays2015_after_body' ); ?>

<?php wp_footer(); ?>

</body>
</html>
