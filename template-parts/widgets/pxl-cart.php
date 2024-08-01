<?php
defined( 'ABSPATH' ) || exit;
if (!class_exists('Woocommerce')) return;

if (!function_exists('pxl_register_wp_widget')) return;
add_action('widgets_init', function () {
	pxl_register_wp_widget('PXL_Cart_Widget');
});

class PXL_Cart_Widget extends WC_Widget {

	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description = __( 'Display the customer shopping cart.', 'basilico' );
		$this->widget_id          = 'pxl_cart_widget';
		$this->widget_name        = __( '* PXL Cart', 'basilico' );
		$this->settings           = array(
			'title'         => array(
				'type'  => 'text',
				'std'   => __( 'Cart', 'basilico' ),
				'label' => __( 'Title', 'basilico' ),
			),
			'layout'        => array(
				'type'    => 'select',
				'std'     => '',
				'label'   => __( 'Layout', 'basilico' ),
				'options' => array(
					''         => __( 'Layout 1', 'basilico' ),
					'layout-2' => __( 'Layout 2', 'basilico' ),
					'layout-3'   => __( 'Layout 3', 'basilico' ),
				),
			),
		);

		if ( is_customize_preview() ) {
			wp_enqueue_script( 'wc-cart-fragments' );
		}

		parent::__construct();
	}

	public function widget( $args, $instance ) {
		if ( apply_filters( 'woocommerce_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
			return;
		}

		wp_enqueue_script( 'wc-cart-fragments' );

		if ( ! isset( $instance['title'] ) ) {
			$instance['title'] = __( 'Cart', 'basilico' );
		}

		// Add custom class to widget container
        $args['before_widget'] = str_replace('class="', 'class="'.$instance['title'].' ', $args['before_widget']);

        // Call the parent widget method
        parent::widget($args, $instance);

		$this->widget_start( $args, $instance );
	
		if ( !\Elementor\Plugin::$instance->editor->is_edit_mode()) :
			woocommerce_mini_cart();
			wc_get_template( 'cart/mini-cart-totals.php' );
		else :
			echo esc_html('Can not show this content in Elementor Edit Mode. You can check this content in frontend shop page.', 'basilico');
		endif;

		$this->widget_end( $args );
	}
}