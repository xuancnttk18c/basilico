<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
if( ! is_a( $product, 'WC_Product' ) ){
    $product = wc_get_product(get_the_id());
}

woocommerce_related_products( array(
    'posts_per_page' => 4,
    'columns'        => 4,
    'orderby'        => 'rand'
) );

if ( $related_products ) : ?>
	<section class="related products">
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );
		$relate_title = basilico()->get_theme_opt('related_title', '');
		if (!empty($relate_title)){
			$heading = $relate_title;
		}
		$relate_sub_title = basilico()->get_theme_opt('related_sub_title', '');
		if ( $heading ) :
			?>
			<div class="related_subtitle"><span><?php echo esc_html( $relate_sub_title ); ?></span></div>
			<h2 class="related_title"><?php echo esc_html( $heading ); ?></h2>
			<div class="pxl-divider"></div>
		<?php endif; ?>
		<?php woocommerce_product_loop_start(); ?>
		<?php foreach ( $related_products as $related_product ) : ?>
			<?php
			$post_object = get_post( $related_product->get_id() );
			setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
			wc_get_template_part( 'pxl-content', 'product-df' );
			?>
		<?php endforeach; ?>
		<?php woocommerce_product_loop_end(); ?>
			</section>
			<?php
		endif;
		wp_reset_postdata();
