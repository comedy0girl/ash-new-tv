<?php /*Template Name: Single PAge*/ ?>


<?php get_header(); ?><?php
include (TEMPLATEPATH . '/includes/_sides.php'); ?>

<div class="container">
    <div class="news-container twelve columns">
        <div class="nine columns biggie"><?php 
            if (have_posts()) : while (have_posts()) : the_post(); the_content(__('(more...)')); 
                endwhile; else: 
                 _e('Sorry, we couldn’t find the post you are looking for.'); 
                endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>