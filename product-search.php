
 <?php get_header('shop') ?>

		<?php if ( have_posts() ) : ?>

			<ul class="products">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post(); ?>
				<?php $post_type = get_post_type();
				if ($post_type == 'product') { ?>

					<li class="product">
						<a href="<?php the_permalink()?>">
							<?php the_post_thumbnail() ?>
							<h2><?php the_title() ?></h2>
							<span class="price"><?php $product = new WC_Product( get_the_ID() );
								$price = $product->get_price_html(); echo $price ?></span>
						</a>
					</li>
					
				<?php } ?>
				<?php // End the loop.
				endwhile; ?>
			</ul>
		<?php else : ?>
			<h2>Sorry, no products were found matching that search!</h2>

		<?php endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->