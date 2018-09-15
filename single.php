<?php /*Template Name: Single Blog Post*/ ?>


<?php get_header(); ?><?php
include (TEMPLATEPATH . '/includes/_sides.php');
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

<div class="post-banner" style="background-image:url('<?php echo $backgroundImg[0]; ?>');">
</div> 

<div class="container">
    <div class="news-container twelve columns">
        <div class="nine columns biggie">
            <h1><strong><?php the_title(); ?></strong></h1>
            <div class="post-info">
                <div class="post-date">
                    <?php the_time('F') ?> <?php the_time('j') ?> <?php the_time('Y')?>
                </div>
                <div class="cats"><?php $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo esc_html( $categories[0]->name );   
                        } ?>       
                </div>
            </div><?php 
            if (have_posts()) : while (have_posts()) : the_post(); the_content(__('(more...)')); 
                endwhile; else: 
                 _e('Sorry, we couldn’t find the post you are looking for.'); 
                endif; ?>
        </div>
    </div>
        <div class="row ten posts-more biggie"><?php
            $prevPost = get_previous_post(true);
            $nextPost = get_next_post(true); ?>

            <div class="one-half column left"><?php 
            $prevPost = get_previous_post(true);
            if($prevPost) {
                $args = array(
                    'posts_per_page' => 1,
                    'include' => $prevPost->ID
                );
                $prevPost = get_posts($args);
                foreach ($prevPost as $post) {
                    setup_postdata($post); ?>
                <div class="post-previous">
                    <div class="prev-img">
                        <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?></a>
                    </div>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                </div>

            </div><?php
                wp_reset_postdata();
                } //end foreach
            } // end if
         
            if($nextPost) {
                $args = array(
                    'posts_per_page' => 1,
                    'include' => $nextPost->ID
                );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post); ?>
            <div class="one-half column right">
                <div class="post-next">
                    <div class="prev-img">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?></a>
                    </div>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                </div>
            </div><?php
                wp_reset_postdata();
            } 
            } ?>
        </div>
</div>







	
<?php get_footer(); ?>