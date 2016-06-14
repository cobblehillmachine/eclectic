<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
			else
				_e( 'Please attempt your purchase again.', 'woocommerce' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>
		<div class="thank-you-message">
			<h2>Thank You For Your Order</h2>
			<p>Your purchase is pending. You will be sent an email once the order clears.</p>
			<p>Thank you for purchasing with Eclectic, any items to be shipped will be processed as soon as possible. All prices include tax and postage and packaging where applicable. You ordered these items:</p>
		</div>

		<ul class="order_details">
			<h3 class="order">
				<?php _e( 'Order: ', 'woocommerce' ); ?><?php echo $order->get_order_number(); ?>
			</h3>
			<h3 class="date">
				<?php _e( 'Date: ', 'woocommerce' ); ?><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?>
			</h3>
			<h3 class="total">
				<?php _e( 'Total: ', 'woocommerce' ); ?><?php echo $order->get_formatted_order_total(); ?>
			</h3>
			<?php if ( $order->payment_method_title ) : ?>
			<h3 class="method">
				<?php _e( 'Payment method: ', 'woocommerce' ); ?><?php echo $order->payment_method_title; ?>
			</h3>
			<?php endif; ?>
		</ul>

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>