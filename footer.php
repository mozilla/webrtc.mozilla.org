						<!-- Secondary zones -->
						<!-- =================================== -->
						<?php if ( !is_page('contact-us') ) : ?>
							<?php get_template_part( 'includes/secondary-zones' ); ?>
						<?php endif; ?>

						<footer class="site-footer" role="contentinfo">
							<div class="container">
								<div class="row">
									<div class="col-sm-12 col-md-2">
										<a class="footer-logo" target="_blank" href="http://www.mozilla.org">mozilla</a>
									</div>
									<div class="col-sm-6">
										<!-- copyright -->
										<p class="copyright">
											Except where otherwise noted, content on this site is licensed under the <a target="_blank" href="https://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution Share-Alike License v3.0</a> or any later version. &nbsp;<br>
											<a target="_blank" href="https://www.mozilla.org/en-US/about/legal/">Legal</a> &nbsp; <a target="_blank" href="https://www.mozilla.org/en-US/about/legal/terms/mozilla/">Terms &amp; Conditions</a>
										</p>
									</div>
									<div class="col-sm-6 col-md-4">
										<?php footer_menu(); ?>
									</div>
								</div>
							</div>
						</footer>

					</div>
				</div>
			</div>
		</div>

		<?php wp_footer(); ?>

	</body>
</html>
