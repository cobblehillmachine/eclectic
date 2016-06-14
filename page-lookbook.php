<?php get_header(); ?>
<div class="lookbook toolbar">
	<li class="page-title"><?php the_title() ?></li>
</div>
<div class="portfolio lookbook masonry pinterest">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	<?php 
	if( have_rows('lookbook_images') ):
		while( have_rows('lookbook_images') ): the_row(); 
			$image = get_sub_field('lookbook_image');?>
			<div class="masonry-object">
				<a href="<?php echo $image ?>" class="fancybox" rel="lookbook"><img src="<?php echo $image ?>"></a>
			</div>
			
		<?php endwhile;
	endif; ?>
</div>
<?php get_footer(); ?>