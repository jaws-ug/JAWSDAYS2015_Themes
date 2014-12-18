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
				<div id="jawsdays2015-new-post-box">
					<?php jawsdays2015_new_post(); ?>
					<div class="new-post-content" id="twitter-content">
						<h2 class="new-post-title"><?php esc_html_e( 'Twitter', 'jawsdays2015' ); ?></h2>
						<a class="twitter-timeline" height="552" href="https://twitter.com/jawsdays" data-widget-id="545477791668375552">@jawsdaysさんのツイート</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
					<div class="new-post-content" id="facebook-content">
						<h2 class="new-post-title"><?php esc_html_e( 'Facebook', 'jawsdays2015' ); ?></h2>
						<div class="fb-like-box" data-href="https://www.facebook.com/jawsdays" data-height="552" data-show-faces="true" data-stream="true" data-show-border="true" data-header="false"></div>
					</div>
				</div>
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
