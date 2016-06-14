<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>


		<?php if ( have_posts() ) : ?>


			<?php woocommerce_product_loop_start(); ?>
			

				<?php woocommerce_product_subcategories(); ?>
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>
					

				<?php endwhile; // end of the loop. ?>
				<!--
<?php if (is_shop()) {
					echo do_shortcode('[ajax_load_more post_type="product" taxonomy="product_cat" taxonomy_terms="designers-picks" orderby="title" order="ASC" offset="12" posts_per_page="12" scroll="false" button_label="Load More" pause="true"]');
				} else if ( is_product_category()) {
					$cat = single_term_title('', false);
					echo do_shortcode('[ajax_load_more post_type="product" taxonomy="product_cat" taxonomy_terms="'.$cat.'" orderby="title" order="ASC" offset="12" posts_per_page="12" scroll="false" button_label="Load More" pause="true"]');
					
				} ?>
-->
				
			<?php woocommerce_product_loop_end(); ?>
			
			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
			

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		// do_action( 'woocommerce_after_main_content' );
	?>


<?php get_footer( 'shop' ); ?>