<?php

defined( 'ABSPATH' ) || exit;

?>
<div class="pxl-cart-empty">
	<?php do_action( 'woocommerce_cart_is_empty' ); ?>
	<?php
	if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
		<div class="return-to-shop">
			<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'basilico' ) ) ); ?>
			</a>
		</div>
	<?php endif; ?>
</div>