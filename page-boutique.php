<?php get_header(); ?>
<div class="full-width">
	<?php the_post_thumbnail('full'); ?>
</div>
<div class="offset-cont boutique">
	<div class="main-cont">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; wp_reset_query(); ?>
	</div>
	<div class="side-cont">
		<?php the_field('boutique_details') ?>
	</div>
	<hr class="border">
	<div class="southern-spotlight-features pinterest">
		<?php
		$cat_id = 12;
		$cat_name = get_cat_name($cat_id);
		query_posts( array( 'order' => 'DESC', 'posts_per_page' => 3, 'category_name' => $cat_name) ); ?>
		<h2><?php echo $cat_name ?></h2>
		<p><?php echo category_description($cat_id) ?></p>
		<?php while ( have_posts() ) : the_post();?>
		    <a href="<?php the_permalink(); ?>"  class="featured-post">
		    	<div>
			    	<?php the_post_thumbnail('full'); ?>
			    	<h4><?php the_title(); ?></h4>
			    </div>
			</a>
		<?php endwhile; wp_reset_query(); ?>
		<div class="buttons">
		  	<a href="<?php echo get_category_link($cat_id); ?>"><div class="button">View All</div></a>
			<a href="/product-category/collections/southern-spotlight/"><div class="button">Shop</div></a>
		</div>
	</div>
</div>
<?php get_footer(); ?>