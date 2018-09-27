<?php /* Template Name: portfolio single */ ?>
<?php get_header(); 

include (TEMPLATEPATH . '/includes/_sides.php'); 
	$port_banner = get_field('portfolio_header');
	$blurb_title = get_field('about_title');
	$blurb = get_field('about_project');
	$image1 = get_field('section_1_image');
	$image2 = get_field('section_2_image');
?>

<div class="port-banner" style="background-image:url('<?php echo $port_banner ?>');">
</div>

<div class="twelve columns biggie">			
	<div class=" the-portfolio">		
		<div class="about-port ">
			<div class="port-inner">
				<h3><?php echo $blurb_title ?></h3>
				<p><?php echo $blurb ?></p>
			</div>
		</div>
	<div class="twelve columns images container">
		<div class="six columns portfolio-images" style="background-image:url('<?php echo $image1 ?>');"></div>
		<div class="six columns portfolio-images" style="background-image:url('<?php echo $image2 ?>');"></div>
	</div>

		<div class="quote brighter">
			<?php if( get_field('project_quote') ): ?>
				<p><?php the_field('project_quote'); ?></p>
				<h5><?php the_field('quote_person'); ?></h5>
			<?php endif; ?>
		</div>

		

		<div class="twelve columns gallery">
			<h3>Full Gallery</h3>
			<div class="gallery-inner">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(__('(more...)')); ?>
				
				<?php endwhile; else: ?>
				<?php _e('Sorry, we couldn’t find the post you are looking for.'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="u-cf"></div>
<div class="row twelve columns details">
		<div class="container">
			<div class="inner-details biggie">
				<div class="three columns">
					<?php if( get_field('date') ): ?>
						<span class="info">Date</span><br/>
						<p><?php the_field('date'); ?></p>
					<?php endif; ?>
				</div>
				<div class="three columns">
					<?php if( get_field('client') ): ?>
						<span class="info">Client</span>
						<br/><p><?php the_field('client'); ?></p>
					<?php endif; ?>
				
				</div>
				<div class="three columns">
					<?php if( get_field('website') ): ?>
						<span class="info">Website</span>
						<br/><p><a href="http://<?php the_field('website'); ?>" target="_blank"><?php the_field('website'); ?></a></p>
					<?php endif; ?>
					
				</div>
				<div class="three columns">
					<?php if( get_field('software_used') ): ?>
						<span class="info">Technologies</span><br/>
						<p><?php the_field('software_used'); ?></p>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>