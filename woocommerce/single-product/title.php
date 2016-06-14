<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product;
?>
<h3><?php
 $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
 if ($product_cats) {
	 $single_cat = array_shift( $product_cats );
 echo $single_cat->name;
 } ?></h3>
<h2 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h2>
<h5><?php echo $product->get_sku(); ?></h5>