<footer >
	<div class="container">
		<div class="biggie">
			<div class="twelve columns the-footer">
				<div class="three columns">
					<div class="footer-inner">
						<?php dynamic_sidebar( 'footer_sidebar' ); ?>
					</div>
				</div>
				<div class="three columns">
					<div class="footer-inner">
						<h5>Ash Loves TV</h5>
						
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
					</div>
				</div>
				<div class="three columns">
					<div class="footer-inner">
						<h5>Let's Chat</h5>
						<?php wp_nav_menu( array( 'theme_location' => 'social-menu' ) ); ?>
					</div>
				</div>
				<div class="three columns">
					<div class="footer-inner">
						<h5>Fun Things</h5>
						<?php wp_nav_menu( array( 'theme_location' => 'additional-menu' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>