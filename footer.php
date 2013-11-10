<footer id="footer">
	<ul>
	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<?php dynamic_sidebar( 'footer' ); ?>
	<?php else : ?>
		<!-- This content shows up if there are no widgets defined in the backend. -->
		<div class="alert alert-help">
			<p>Please activate some Widgets.</p>
		</div>
		<?php endif; ?>
	</ul>
<section id="copyatt">
	<p id="copyright">Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.</p>

	<p id="attribution">Theme <?php bloginfo('name'); ?> Designed By <a href="http://www.katskinner.com" rel="designer"> Kat Skinner</a></p>

	<p id="site-generator">Proudly powered by <a href="http://wordpress.org/" rel="generator" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></p>

</section>
</footer>
<?php wp_footer(); ?>

</div>  <!-- close #container -->

</body>
</html>