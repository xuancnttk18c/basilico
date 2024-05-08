<?php
/* Number of products per page (shop page) */
add_filter( 'loop_shop_per_page', 'basilico_loop_shop_per_page', 20 );
function basilico_loop_shop_per_page( $limit ) {
    $limit = basilico()->get_theme_opt('shop_archive_product_per_page', 9);
    return $limit;
}

function basilico_wc_shortcode_products_has_paginate(){
    return wc_get_loop_prop( 'is_shortcode' ) && wc_get_loop_prop( 'is_paginated' );
}

/* Remove page title on archive page */
add_filter('woocommerce_show_page_title', function(){ return false;});

/* Replace text On-sale */
add_filter('woocommerce_sale_flash', 'basilico_custom_sale_text', 10, 3);
function basilico_custom_sale_text($text, $post, $_product)
{
    return '<span class="onsale">'.esc_html__('sale off', 'basilico').'</span>';
}

/* Add and Remove function hook in woocommerce/templates/content-product.php */
function basilico_woocommerce_remove_loop_function() {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
}
add_action( 'init', 'basilico_woocommerce_remove_loop_function' );

/* Custom Top table: catalog order and result count */
if(!function_exists('basilico_woocommerce_catalog_result')){
    // remove
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    // add back
    add_action('woocommerce_before_shop_loop','basilico_woocommerce_catalog_result', 20);
    add_action('basilico_woocommerce_catalog_ordering', 'woocommerce_catalog_ordering');
    add_action('basilico_woocommerce_result_count', 'woocommerce_result_count');
    function basilico_woocommerce_catalog_result(){
        $columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : basilico()->get_theme_opt('products_columns', '2');
        $display_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : basilico()->get_theme_opt('shop_display_type', 'grid');
        $active_grid = 'active';
        $active_list = '';
        if( $display_type == 'list' ){
            $active_list = $display_type == 'list' ? 'active' : '';
            $active_grid = '';
        }
        $row_cols_class = basilico_get_shop_loop_row_column_class();
        ?>
        <div class="pxl-shop-topbar-wrap row justify-content-between align-items-center g-30">
            <div class="pxl-view-layout-wrap col-12 col-sm-auto order-md-3">
                <ul class="pxl-view-layout d-flex align-items-center">
                    <li class="lbl"><?php echo esc_html__( 'View','basilico' ) ?></li>
                    <li class="view-icon view-grid <?php echo esc_attr($active_grid) ?>"><a href="javascript:void(0);" class="pxl-ttip tt-top-left" data-cls="products <?php echo implode(' ', $row_cols_class);?>" data-col="grid"><span class="tt-txt"><?php echo esc_html__('View Grid','basilico') ?></span><span class="pxli-grid"></span></a></li>
                    <li class="view-icon view-list <?php echo esc_attr($active_list) ?>"><a href="javascript:void(0);" class="pxl-ttip tt-top-left" data-cls="products shop-view-list" data-col="list"><span class="tt-txt"><?php echo esc_html__('View List','basilico') ?></span><span class="pxli-list"></span></a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-auto order-md-2">
                <?php do_action('basilico_woocommerce_catalog_ordering'); ?>
            </div>
            <div class="col text-heading number-result">
                <?php do_action('basilico_woocommerce_result_count'); ?>
            </div>
        </div>
        <?php
    }
}

/* Cart Button */
add_filter('woocommerce_loop_add_to_cart_link', 'basilico_woocommerce_loop_add_to_cart_link', 10, 3);
function basilico_woocommerce_loop_add_to_cart_link($button, $product, $args){
    $product_layout = basilico()->get_theme_opt('product_layout', 'layout-1');
    $btn_icon = '<span class="pxl-icon pxli-shopping-bag-2"></span>';
    if ($product_layout == 'layout-5') {
        $btn_icon = '<span class="pxl-icon pxli pxli-shopping-cart-plus"></span>';
    }
    return sprintf(
        '<a href="%s" data-quantity="%s" class="pxl-btn %s" %s><span class="pxl-btn-text">%s</span>%s</a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
        esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
        isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
        esc_html( $product->add_to_cart_text() ),
        $btn_icon
    );
}

/* Paginate links */
add_filter('woocommerce_pagination_args', 'basilico_woocommerce_pagination_args');
function basilico_woocommerce_pagination_args($default){
    $default = array_merge($default, [
        'prev_text' => '<span class="pxli-angle-double-left"></span>',
        'next_text' => '<span class="pxli-angle-double-right"></span>',
        'type'      => 'plain',
    ]);
    return $default;
}

