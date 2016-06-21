<?php
/**
 * Template Name: Template - Design/Styling
 * Description: Generic Sub Page Template
 *
 * @package WordPress
 * @subpackage themename
 */

get_header(); the_post(); ?>
<div class="full-width">
	<?php the_post_thumbnail('full'); ?>
</div>
<div class="design-styling">
	<div class="skinny-cont">
		<?php the_content() ?>
	</div>
	
    <div class="table">
    	<div class="table-cell"><?php the_field('column_1') ?></div>
    	<div class="table-cell"><?php the_field('column_2') ?></div>
    </div>
</div>
<div class="full-width form-wrapper clickable" id="design-request-form">
	<div class="cont">
		<h2>Submit a Design Request</h2>
		<p>If you are interested in learning more about our interior design services and/or receiving our interior design information packet, please submit the following information and we will get back to you as soon as possible.</p>
		<?php echo do_shortcode("[contact-form-7 id='91' title='Contact form 1']"); ?>
	</div>
</div>
<?php get_footer(); ?>