<?php 
add_filter( 'woocommerce_enqueue_styles', 'basilico_remove_wc_styles' );
function basilico_remove_wc_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

/* Product Search form */
add_filter( 'get_product_search_form', 'basilico_product_search_form', 10, 1 );
function basilico_product_search_form($form){
    ob_start();
    ?>
    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'basilico' ); ?></label>
        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search Product&hellip;', 'basilico' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'basilico' ); ?>"><?php echo esc_html_x( 'Search', 'submit button', 'basilico' ); ?></button>
        <input type="hidden" name="post_type" value="product" />
    </form>
    <?php 
    $form = ob_get_clean();
    return $form;
}
add_filter( 'wc_get_template', 'basilico_wc_update_get_template', 10, 5 );
function basilico_wc_update_get_template($template, $template_name, $args, $template_path, $default_path){

    switch ($template_name) {
        case 'loop/loop-start.php':
            $template = get_template_directory().'/'.WC()->template_path().'loop/pxl-loop-start.php';
            break;
        case 'loop/loop-end.php':
            $template = get_template_directory().'/'.WC()->template_path().'loop/pxl-loop-end.php';
            break;
        case 'single-product/related.php':
            $template = get_template_directory().'/'.WC()->template_path().'single-product/pxl-related.php';
            break;
        case 'cart/mini-cart.php':
            $template = get_template_directory().'/'.WC()->template_path().'cart/pxl-mini-cart.php';
            break;
        case 'content-widget-product.php':
            $template = get_template_directory().'/'.WC()->template_path().'pxl-content-widget-product.php';
            break;
        case 'content-widget-price-filter.php':
            $template = get_template_directory().'/'.WC()->template_path().'pxl-content-widget-price-filter.php';
            break;
    }

    return $template;
}