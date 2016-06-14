<?php get_header(); ?>
<div class="full-width desktop">
	<?php the_post_thumbnail('full'); ?>
</div>
<div class="toolbar blog filter mobile">
	<li class="mobile-nav-header">Categories</li>
	<ul>
		<?php wp_list_categories( array('hide_empty' => 0, 'child_of' => 65, 'title_li' => '') ); ?>
	</ul>
</div>
<div class="offset-cont blog">
	<div class="title">Blog</div>
	<div class="sidebar">
		<div class="categories">
			<?php wp_list_categories( array('hide_empty' => 0, 'child_of' => 65) ); ?>
		</div>
		<div class="instagram">
			<h6>Instagram</h6>
			<div id="instafeed"></div>
		</div>
	</div>
	<div class="main-cont pinterest">
		<ul>
			<?php $blog_posts = new WP_Query( array( 'order' => 'DESC', 'posts_per_page' => 3, 'category_name' => 'Blog', "paged" => get_query_var( 'paged' ) ) ); ?>
			<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post();?>
		    	<li class=" feed blog-post">
					<a href="<?php the_permalink(); ?>" >
			    		<h2><?php the_title(); ?></h2>
			    		<h5><?php echo get_the_date(); ?></h5>
				    	<?php the_post_thumbnail('full'); ?>
				    </a>
				    <?php the_excerpt(); ?>
				    <a href="<?php the_permalink(); ?>"><div class="button">Read More</div></a>
			    </li>	
			<?php endwhile; ?>
		</ul>
		<div class="pagination"><?php wp_pagenavi(array('query' => $blog_posts));wp_reset_query();  ?></div>
	</div>
</div>



<?php get_footer(); ?>