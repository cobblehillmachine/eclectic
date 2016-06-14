<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<!-- <h2><?php _e( 'Cart Totals', 'woocommerce' ); ?></h2> -->

	<!-- <table cellspacing="0"> -->

		<div class="cart-subtotal">
			<h3><?php _e( 'Cart Subtotal', 'woocommerce' ); ?></h3>
			<h3><?php wc_cart_totals_subtotal_html(); ?></h3>
		</div>

		<?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
				<h3><?php wc_cart_totals_coupon_label( $coupon ); ?></h3>
				<h3><?php wc_cart_totals_coupon_html( $coupon ); ?></h3>
			</div>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->tax_display_cart == 'excl' ) : ?>
			<?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<div class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<h3><?php echo esc_html( $tax->label ); ?></h3>
						<h3><?php echo wp_kses_post( $tax->formatted_amount ); ?></h3>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="tax-total">
					<h3><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></h3>
					<h3><?php echo wc_cart_totals_taxes_total_html(); ?></h3>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
			<div class="order-discount coupon-<?php echo esc_attr( $code ); ?>">
				<h3><?php wc_cart_totals_coupon_label( $coupon ); ?></h3>
				<h3><?php wc_cart_totals_coupon_html( $coupon ); ?></h3>
			</div>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?> 

		<div class="order-total">
			<h3><?php _e( 'Total Price', 'woocommerce' ); ?></h3>
			<h3><?php wc_cart_totals_order_total_html(); ?></h3>
		</div>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	<!-- </table> -->

	<?php if ( WC()->cart->get_cart_tax() ) : ?>
		<!--
<p><small><?php

			$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
				? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
				: '';

			printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

		?></small></p>
-->
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>