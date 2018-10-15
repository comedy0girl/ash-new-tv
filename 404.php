<?php /*Template Name: 404*/ 
get_header(); ?><?php
include (TEMPLATEPATH . '/includes/_sides.php'); ?>



<div class="container">
    <div class="news-container twelve columns">  
    	<h2><?php _e( 'What dya dooooo?', 'ash' ); ?></h2>
    	<canvas id="canvas" style="width: 100%;"></canvas>
        <div class="twelve columns biggie">
	      
			<p><?php _e( 'I think you are lost friend. Try going back to the home page', 'ash' ); ?></p>
        </div>
    </div>
</div>
<?php get_footer(); ?>