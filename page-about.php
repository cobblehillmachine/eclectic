<?php
/**
 * Template Name: Template - New About Page
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
<div class="full-width ">
	<?php the_post_thumbnail('full'); ?>
</div>
<div class="about">
    <div class="designer sidney table">
      <div class="headshot table-cell">
	      <img src="<?php the_field('sidney_headshot'); ?>">
	      <?php the_field('sidney_quote') ?>
	  </div>
      <div class="cont table-cell">
	      <?php the_field('sidney_bio'); ?>
	  </div>
    </div>
	
</div>
<?php get_footer(); ?>