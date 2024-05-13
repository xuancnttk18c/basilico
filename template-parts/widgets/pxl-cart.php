<?php
/**
 * Shopping Cart Widget.
 *
 * Displays shopping cart widget.
 *
 * @package WooCommerce\Widgets
 * @version 2.3.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Widget cart class.
 */

if (!class_exists('WooCommerce')) return;

if (!function_exists('pxl_register_wp_widget')) return;
add_action('widgets_init', function () {
	pxl_register_wp_widget('PXL_Widget_Cart');
});

class PXL_Widget_Cart extends WC_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description = __( 'Display the customer shopping cart.', 'woocommerce' );
		$this->widget_id          = 'woocommerce_widget_cart';
		$this->widget_name        = __( '* PXL Cart', 'woocommerce' );
		$this->settings           = array(
			'title'         => array(
				'type'  => 'text',
				'std'   => __( 'Cart', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' ),
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide if cart is empty', 'woocommerce' ),
			),
		);

		if ( is_customize_preview() ) {
			wp_enqueue_script( 'wc-cart-fragments' );
		}

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args     Arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( apply_filters( 'woocommerce_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
			return;
		}

		wp_enqueue_script( 'wc-cart-fragments' );

		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;

		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = __( 'Cart', 'woocommerce' );
		}

		$this->widget_start( $args, $instance );

		if ( $hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		// Insert cart widget placeholder - code in woocommerce.js will update this on page load.

		if (WC()->cart->cart_contents_count > 0) {
			echo '<div class="widget_shopping_cart_content"></div>';
			echo '<p class="woocommerce-mini-cart__total total">';
			do_action( 'woocommerce_widget_shopping_cart_total' );
			echo '</p>';
			do_action( 'woocommerce_widget_shopping_cart_before_buttons' );
			echo '<p class="woocommerce-mini-cart__buttons buttons">';
			do_action( 'woocommerce_widget_shopping_cart_buttons' );
			echo '</p>';
			do_action( 'woocommerce_widget_shopping_cart_after_buttons' );
		}
		else {
			wc_get_template( 'cart/cart-empty.php' );
		}

		if ( $hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $args );
	}
}