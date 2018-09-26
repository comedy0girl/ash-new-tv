<?php /*Template Name: 404*/ 
get_header(); ?><?php
include (TEMPLATEPATH . '/includes/_sides.php'); ?>

<div class="container">
    <div class="error-container twelve columns">
    	<canvas id="canvas" style="width: 100%;"></canvas>
	        <div class="error-inner">
	        	<h1 class="page-title"><?php _e( 'Not Found', 'ash' ); ?></h1> 
	            <h2><?php _e( 'What didya dooooo?', 'ash' ); ?></h2>
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ash' ); ?></p>
	        </div>
        
    </div>
</div>

<?php get_footer(); ?>