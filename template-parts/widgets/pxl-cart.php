<?php
defined( 'ABSPATH' ) || exit;
if (!class_exists('basilico')) return;

if (!function_exists('pxl_register_wp_widget')) return;
add_action('widgets_init', function () {
	pxl_register_wp_widget('PXL_Widget_Cart');
});

class PXL_Widget_Cart extends WC_Widget {

	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description = __( 'Display the customer shopping cart.', 'basilico' );
		$this->widget_id          = 'pxl_widget_cart';
		$this->widget_name        = __( '* PXL Cart', 'basilico' );
		$this->settings           = array(
			'title'         => array(
				'type'  => 'text',
				'std'   => __( 'Cart', 'basilico' ),
				'label' => __( 'Title', 'basilico' ),
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide if cart is empty', 'basilico' ),
			),
		);

		if ( is_customize_preview() ) {
			wp_enqueue_script( 'wc-cart-fragments' );
		}

		parent::__construct();
	}

	public function widget( $args, $instance ) {
		if ( apply_filters( 'basilico_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
			return;
		}

		wp_enqueue_script( 'wc-cart-fragments' );

		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;

		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = __( 'Cart', 'basilico' );
		}

		$this->widget_start( $args, $instance );

		if ( $hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		echo '<div class="pxl-widget-cart-content">';
		basilico_mini_cart();
		echo '</div>';

		wc_get_template( 'cart/mini-cart-totals.php' );

		if ( $hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $args );
	}
}