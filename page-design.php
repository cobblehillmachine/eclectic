<?php get_header(); ?>
<div class="full-width desktop">
	<?php the_post_thumbnail('full'); ?>
</div>
<div class="offset-cont design">
	    <div class="designer sidney table">
	      <div class="headshot table-cell">
		      <img src="<?php the_field('sidney_headshot'); ?>">
		      <?php the_field('sidney_quote') ?>
		  </div>
	      <div class="cont table-cell">
		      <?php the_field('sidney_bio'); ?>
		  </div>
	    </div>
	<div class="services">
	  <?php query_posts( array( 'post_type' => 'services', 'order' => 'DESC') ); ?>
	  <?php while ( have_posts() ) : the_post();
	  $title = get_the_title();
	  $title = explode(' ',trim($title) );?>
	    <div class="service <?php  echo strtolower($title[0]) ?>">
	    	<div class="cont">
		    	<h3><?php the_title(); ?></h3>
		    	<?php the_content(); ?>
			</div>
			<div class='buttons'>
				<a href="<?php the_field('cta_1_link'); ?>"><div class="button"><?php the_field('cta_1_text'); ?></div></a>
<!-- 				<a href="<?php the_field('cta_2_link'); ?>"><div class="button"><?php the_field('cta_2_text'); ?></div></a> -->
			</div>
	    </div>
	  <?php endwhile; wp_reset_query(); ?>
	</div>
	
</div>
<div class="full-width form-wrapper clickable" id="design-request-form">
	<div class="cont">
		<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; wp_reset_query(); ?>
		<?php echo do_shortcode("[contact-form-7 id='91' title='Contact form 1']"); ?>
	</div>
</div>
<?php get_footer(); ?>