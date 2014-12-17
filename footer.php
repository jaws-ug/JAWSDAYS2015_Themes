				<div id="footer-content">
					<?php jawsdays2014_slide(); ?>
					<?php if ( is_front_page() ) : ?>
						<div id="jawsdays2014-new-post-box">
							<?php jawsdays2014_new_post(); ?>
							<div class="new-post-content" id="twitter-content">
								<h2 class="new-post-title"><?php esc_html_e( 'Twitter', 'jawsdays2014' ); ?></h2>
								<a class="twitter-timeline" height="552" data-dnt=true href="https://twitter.com/JAWS_FES_KANSAI" data-widget-id="354424797167505408">#jawsug に関するツイート</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</div>
							<div class="new-post-content" id="facebook-content">
								<h2 class="new-post-title"><?php esc_html_e( 'Facebook', 'jawsdays2014' ); ?></h2>
								<div class="fb-like-box" data-href="https://www.facebook.com/JawsFestaKansai2013" data-height="552" data-show-faces="true" data-stream="true" data-show-border="true" data-header="false"></div>
							</div>
						</div>
					<?php endif; ?>
					<div id="jawsdays2014-contact-box">
						<p class="text"><?php esc_html_e( 'To participate in the JAWS DAYS 2014', 'jawsdays2014' ); ?></p>
						<p class="contact-button"><a href="<?php echo home_url('/tickets'); ?>"><?php esc_html_e( 'Tickets', 'jawsdays2014' ); ?></a></p>
					</div>
				</div>
			</div><!-- #main -->
			<footer id="colophon" role="contentinfo">
				<?php jawsdays2014_footer_nav(); ?>
				<p id="copyright"><small>Copyright &copy; AWS User Group Japan. All rights reserved.</small></p>
				<?php jawsdays2014_social_button(); ?>
			</footer><!-- #colophon -->
		</div><!-- #page -->
		<?php wp_footer(); ?>
	</body>
</html>