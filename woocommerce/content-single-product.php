<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10 - removed
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20 - removed
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40 - removed
			 * @hooked woocommerce_template_single_sharing - 50 - removed
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	<div class="social">
		<hr>
		<h3>SHARE</h3>	
		<a target=_blank href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
		<a target=_blank href="http://twitter.com/home/?status=Check out @EclecticCHS's<?php the_title(); ?>! <?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
		<a class="pinterest" target=_blank href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo urlencode(wp_get_attachment_url( get_post_thumbnail_id() ) )?>&description=<?php the_title(); ?> from Eclectic"><i class="fa fa-pinterest"></i></a>
		<a target=_blank href="mailto:?subject=A friend wants you to check out this product from Eclectic!&body=<?php the_title() ?><?php the_permalink() ?>"><i class="fa fa-envelope"></i></a>
		<hr>
	</div>


	<?php 
	if( have_rows('related_posts') ): ?>
	<div class="related-posts">
		<h3>Related Posts</h3>
		<?php while( have_rows('related_posts') ): the_row(); 
			$post = get_sub_field('related_post'); ?>
			<div class="related-post">
				<?php $post_name = $post->post_title;
				$post_url = get_permalink($post->ID) ?>
				<h2><?php echo $post_name ?></h2>
				<a href="<?php echo $post_url ?>"><div class="button">Read Post</div></a>			
			</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
