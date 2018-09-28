<?php get_header(); ?>
<?php
	include (TEMPLATEPATH . '/includes/_sides.php'); ?>

<div class="twelve columns site-container">
	<div class="twelve columns hello-banner biggie no-mobile">
		<div class="container">
			<div class="twelve columns hello-wrapper">
				<div class="one-half column left">
					<h2>TV<br/>
					Junkie</h2>
				</div>
				<div class="one-half column right">
					<h2>Very<br/>
					Geeky</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="animated fadeInRigthBig twelve columns quote biggie bright">
		<p>I just love <br/>television so much.</p>
		<h5>Kenneth Parcell (30 Rock)</h5>
	</div>



	<div class="twelve columns about-me biggie">
		<h3>Who Dis?</h3>
		<?php dynamic_sidebar( 'hello_sidebar' ); ?>
	</div>

	<div class="twelve columns my-work biggie">
		<h3>Some work...</h3>
		<div class="featured-slider"><?php 
		echo do_shortcode( ' [slide-anything id='2046']' ); ?>
		
		</div>
				  
		
	</div>

	<div class="twelve columns the-blog biggie">
		<h3>Inspired by television</h3>
		<?php query_posts( array(
   		'posts_per_page' => 3 )); ?>
		<div class="container"><?php 
			if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<div class="four columns latest-news">
					<h5><a href="<?= get_permalink(); ?>"><?php the_title()  ?></a></h5><?php 
				  		$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

						<div class="post-banner" style="background-image:url('<?php echo $backgroundImg[0]; ?>');">
							<a class="classic-button" href="<?= get_permalink(); ?>">Read More ></a>
						</div> 
					
	   				
	   				
	  			</div><?php 
			endwhile; ?>
		</div><?php 
		else : ?>

   			<p><?php __('No News'); ?></p><?php 
   		endif; ?>


	</div>

	
</div>

<?php get_footer(); ?>