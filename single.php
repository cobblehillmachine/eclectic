<?php get_header(); ?>

<div class="blog table">
    <div class="sidebar table-cell">
        <?php get_sidebar('blog') ?>
    </div>
    <div class="main-cont pinterest table-cell">
        <div class="single blog-post">
          <?php while ( have_posts() ) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <h5><?php the_date(); ?></h5>
            <?php the_content(); ?>
            <hr class="desktop">
            <div class="shop-the-post">
                <?php if( have_rows('shop_the_post') ): ?>
                    <h2>Shop the Post</h2>
                    <div class="flexslider">
                        <ul class="slides">
                        <?php while( have_rows('shop_the_post') ): the_row(); 
                            $post_object = get_sub_field('product');
                            if( $post_object ): 
                                $post = $post_object;
                                setup_postdata( $post ); ?>
                                <li>
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail() ?>
                                        <h4><?php the_title(); ?></h4>
                                        <?php $product = new WC_Product( get_the_ID() ); ?>
                                        <?php $price = $product->get_price_html() ?>
                                        <h3><?php echo $price ?></h3>
                                    </a>
                                </li>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
             
          <?php endwhile; wp_reset_query(); ?>
        </div>  
      </div>
</div>
<?php get_footer(); ?>
