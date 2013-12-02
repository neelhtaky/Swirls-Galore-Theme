			<aside id="sidebar" role="complementary">
				<ul>
					<?php if ( is_active_sidebar( 'primary' ) ) { ?>
					 	<?php dynamic_sidebar( 'primary' ); ?>
					<?php } ?>
				</ul>
			</aside>