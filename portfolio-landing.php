<?php /*Template Name: Portfolio Landing Page*/ ?>

<?php get_header(); ?><?php
include (TEMPLATEPATH . '/includes/_sides.php'); ?>

<div class="container">
    <div class="news-container twelve columns">
        <div class="twelve columns biggie"><?php
			$args = array(
			    'post_type'      => 'page',
			    'posts_per_page' => -1,
			    'post_parent'    => $post->ID,
			    'order'          => 'ASC',
			    'orderby'        => 'menu_order'
			);
			$parent = new WP_Query( $args );
			if ( $parent->have_posts() ) : 
			 	while ( $parent->have_posts() ) : $parent->the_post(); ?>
			        <div id="parent-<?php the_ID(); ?>" class="parent-page"><?php
			        	$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
			        	<a href="<?php the_permalink(); ?>">
						<div class="one-half column portfolio-banner" style="background-image:url('<?php echo $backgroundImg[0]; ?>');">
							<h3><?php the_title(); ?></h3>
						</div> 
						</a>
			        </div>
			    <?php endwhile; ?>
			<?php endif; wp_reset_postdata(); ?>
		</div>
    </div>
</div>

<?php get_footer(); ?>






