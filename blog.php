<?php /*Template Name: Blog Home*/ ?>

<?php get_header(); ?><?php
include (TEMPLATEPATH . '/includes/_sides.php');?>
<div class="container"><?php 
	$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	$args = array(
	    'posts_per_page' => get_option('posts_per_page'), 
	    'paged'          => $current_page 
	);
	query_posts( $args );
	$wp_query->is_archive = true;
	$wp_query->is_home = false; ?>
	<div class="news-container twelve columns biggie"><?php 
		while(have_posts()): the_post(); ?>
			<div class="twelve columns single-blog"><?php 
				$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

				<div class="post-banner" style="background-image:url('<?php echo $backgroundImg[0]; ?>');">
				</div> 
			  	<div class="the-post ">
			  		<h5><a href="<?= get_permalink(); ?>"><?php the_title()  ?></a></h5>
				    <div class="postInfo">
						<div class="postDate">
							<span><?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?></span> / <span><?php	$categories = get_the_category();
							if ( ! empty( $categories ) ) {
							    echo esc_html( $categories[0]->name );   
							} 
						?></span>
						</div>
					</div>
					<div class="the-excerpt">
						<?php the_excerpt(); ?>
						<a class="classic-button" href="<?= get_permalink(); ?>">Read More ></a>
					</div>
					
			  	</div>
			</div><?php 
		endwhile; ?>
		<!-- <div class="clearfix"></div>
		<div class="two columns blog-sidebar">
			<?php dynamic_sidebar( 'blog_sidebar' ); ?>


		</div> -->

		<?php wp_pagenavi(); ?>
	</div>

</div>

<?php get_footer(); ?>
