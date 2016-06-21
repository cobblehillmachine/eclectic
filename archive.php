<?php get_header(); ?>

<div class="toolbar blog filter mobile">
  <li class="mobile-nav-header">Categories</li>
  <ul>
    <?php wp_list_categories( array('hide_empty' => 0, 'child_of' => 65, 'title_li' => '') ); ?>
  </ul>
</div>
<div class="blog table">
    <div class="sidebar table-cell">
        <?php get_sidebar('blog') ?>
    </div>
    <div class="main-cont pinterest table-cell">
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
