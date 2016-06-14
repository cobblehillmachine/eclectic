<?php get_header(); ?>
<div class="lookbook toolbar">
	<li class="page-title"><?php the_title(); ?></li>
</div>
<div class="press-container">
<?php query_posts( array( 'post_type' => 'Press Posts', 'order' => 'DESC') ); ?>
  <?php while ( have_posts() ) : the_post();?>
    <a href="<?php the_field('external_link') ?>" class="press-post" target=_blank>
    	<div>
    		<h3><?php the_title(); ?></h3>
    		<p><?php the_field('source'); ?></p>
    	</div>
    </a>
  <?php endwhile; wp_reset_query(); ?>
  <h5>Press Inquiries: <a href="mailto:<?php the_field('press_email', 'user_2') ?>"><?php the_field('press_email', 'user_2') ?></a></h5>
</div>
<?php get_footer(); ?>