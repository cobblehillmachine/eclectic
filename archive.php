<?php get_header(); ?>
<div class="full-width desktop">
  <?php echo get_the_post_thumbnail(11,'full'); ?>
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
    <?php printf( __( '%s', 'themename' ), '<h6>' . single_cat_title( '', false ) . '</h6>' );?>
    
    <hr>

    <?php while ( have_posts() ) : the_post();?>
        <div class="archive feed blog-post">
			<a href="<?php the_permalink(); ?>" >
	    		<h2><?php the_title(); ?></h2>
	    		<h5><?php echo get_the_date(); ?></h5>
		    	<?php the_post_thumbnail('full'); ?>
		    </a>
		    <?php the_excerpt(); ?>
		    <a href="<?php the_permalink(); ?>"><div class="button">Read More</div></a>
        </div>  
    <?php endwhile; ?>
    <div class="pagination"><?php wp_pagenavi();wp_reset_query();  ?></div>
  </div>
</div>
