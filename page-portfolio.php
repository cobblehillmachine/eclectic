<?php get_header(); ?>
<div class="portfolio filter toolbar">
	<ul>
		<li class="residential filter"><span>Design Projects</span></li>
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
<div class="portfolio masonry">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	<?php query_posts( array( 'post_type' => 'Portfolio Projects', 'order' => 'ASC', 'posts_per_page' => 20) ); ?>
	  <?php while ( have_posts() ) : the_post();?>
	    <a href="<?php the_permalink(); ?>">
	    	<div class="masonry-object">
	    		<div class="thumbnail">
		    		<?php if (has_post_thumbnail()) {
			    		the_post_thumbnail('full'); ?>
			    		<div class="color-overlay"></div>
			    		<div class="cont">
							<h2><?php the_title(); ?></h2>
						</div>
		    		<?php } else { ?>
			    		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" />
			    		<div class="no-photo cont">
							<h2><?php the_title(); ?></h2>
							<p>Coming Soon</p>
						</div>
		    		<?php } ?>
	    				
	    		</div>
	    	</div>
	    </a>
	  <?php endwhile; wp_reset_query(); ?>

	
</div>

<?php get_footer(); ?>