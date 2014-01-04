			</div><!-- #main -->
			<footer id="footer">
				<ul>
					<?php if ( is_active_sidebar( 'footer' ) ) : ?>
						<?php dynamic_sidebar( 'footer' ); ?>
					<?php else : ?>
						<div class="alert alert-help">
							<p>Please activate some Widgets.</p>
						</div>
					<?php endif; ?>
				</ul>
			</footer>
			<div id="clearfix"></div>
		</div> <!-- close #container -->
		<section class="site-info">
			<p>Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.
			<br />
			Theme Designed By <a href="<?php echo esc_url( __( 'http://katskinner.com/') ); ?>" title="<?php esc_attr_e( 'Kat Skinner' ); ?>">Kat Skinner</a>
			<br />
			<span id="wordpress">
				Proudly powered by <a href="<?php echo esc_url( __( 'http://wordpress.org/') ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform' ); ?>"><?php printf( __( '%s'), 'WordPress' ); ?></a>
			</span>
			</p>
		</section><!-- .site-info -->

	</div><!-- #page -->
	<?php wp_footer(); ?>
	</body> <!-- close body tag -->
</html> <!-- close html tag -->