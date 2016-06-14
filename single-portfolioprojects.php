<?php get_header(); ?>
<div class="portfolio filter toolbar">
	<ul>
		<li class="residential filter">
			<span>Design Projects</span>
			<ul class="dropdown">
				<?php query_posts( array( 'post_type' => 'Portfolio Projects', 'order' => 'ASC') ); ?>
	  			<?php while ( have_posts() ) : the_post();?>
			    	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			  	<?php endwhile; wp_reset_query(); ?>
			</ul>

		</li>
<!--
		<li class="residential filter">
			<span>Residential</span>
			<ul class="dropdown">
				<?php query_posts( array( 'post_type' => 'Portfolio Projects', 'order' => 'ASC', 'category_name' => 'Residential') ); ?>
	  			<?php while ( have_posts() ) : the_post();?>
			    	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			  	<?php endwhile; wp_reset_query(); ?>
			</ul>
		</li>
		<li class="commercial filter">
			<span>Commercial</span>
			<ul class="dropdown">
				<?php query_posts( array( 'post_type' => 'Portfolio Projects', 'order' => 'ASC', 'category_name' => 'Commercial' ) ); ?>
	  			<?php while ( have_posts() ) : the_post();?>
			    	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			  	<?php endwhile; wp_reset_query(); ?>
			</ul>
		</li>
-->
	</ul>
</div>

<div class="masonry pinterest">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	<div class="single-project cont masonry-object">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
	<?php 
	if( have_rows('project_gallery_images') ):
		while( have_rows('project_gallery_images') ): the_row(); 
			$image = get_sub_field('lightbox_image');?>
			<div class="masonry-object">
				<a href="<?php echo $image ?>" class="fancybox" rel=<?php the_title(); ?>><img src="<?php echo $image ?>"></a>
			</div>
			
		<?php endwhile;
	endif; ?>
</div>

<?php get_footer(); ?>