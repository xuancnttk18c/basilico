<?php
defined( 'ABSPATH' ) || exit;

global $product;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<div <?php wc_product_class( '', $product ); ?>>
    <div class="pxl-shop-item-wrap">
        <div class="pxl-products-thumb relative">
            <div class="image-wrap">
                <?php
                woocommerce_template_loop_product_thumbnail();
                ?>
            </div>
            <div class="hot-sale">
                <?php
                if ( $product->is_featured() ) {
                    $feature_text = get_post_meta($product->get_id(),'product_feature_text', true);
                    if (empty($feature_text)){
                        $feature_text = "HOT";
                    }
                    ?>
                    <span class="pxl-featured"><?php echo esc_html($feature_text); ?></span>
                    <?php
                }
                woocommerce_show_product_loop_sale_flash();
                ?>
            </div>
            <div class="cal-price-wrap d-flex">
                <?php
                $additional_text = get_post_meta($product->get_id(), 'product_loop_additional_text1', '');
                if (!empty($additional_text)) : ?>
                    <div class="d-inline-flex">
                        <?php echo esc_html($additional_text[0]); ?>
                    </div>
                <?php endif; ?>
                <?php woocommerce_template_loop_price(); ?>
            </div>
        </div>
        <div class="pxl-products-content">
            <div class="pxl-products-content-wrap">
                <div class="pxl-products-content-inner">
                    <?php
                    /**
                     * Hook: woocommerce_before_shop_loop_item_title.
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action( 'woocommerce_before_shop_loop_item_title' );

                    /**
                     * Hook: woocommerce_shop_loop_item_title.
                     *
                     * @hooked woocommerce_template_loop_product_title - 10
                     */
                    do_action( 'woocommerce_shop_loop_item_title' );
                    ?>
                    <h3 class="pxl-product-title">
                        <a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
                    </h3>
                    <?php
                    /**
                     * Hook: woocommerce_after_shop_loop_item_title.
                     *
                     * @hooked woocommerce_template_loop_rating - 5
                     * @hooked woocommerce_template_loop_price - 10
                     */
                    do_action( 'woocommerce_after_shop_loop_item_title' );
                    ?>
                    <div class="pxl-divider"></div>
                    <div class="pxl-loop-product-excerpt">
                        <?php
                        $excerpt = get_the_excerpt();
                        if (!empty($excerpt)) {
                            echo wp_trim_words($excerpt, 17, '...');
                        }
                        ?>
                    </div>
                    <div class="btn-wrapper">
                        <div class="pxl-add-to-cart">
                            <div class="wrap-btn for-cart">
                                <?php woocommerce_template_loop_add_to_cart(); ?>
                            </div>
                        </div>
                        <?php
                        $product_wishlist = basilico()->get_theme_opt('product_wishlist', '0');
                        if ($product_wishlist == '1') : ?>
                            <div class="stock-wishlist">
                                <div class="pxl-shop-woosmart-wrap">
                                    <?php do_action( 'woosw_button_position_single_woosmart' ); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    do_action( 'woocommerce_after_shop_loop_item' );
    ?>
</div>