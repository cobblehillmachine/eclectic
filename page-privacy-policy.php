<?php get_header(); ?>
<div class="privacy">
<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; wp_reset_query(); ?>
</div>
<?php get_footer(); ?>