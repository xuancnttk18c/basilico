<?php
extract($settings);
$html_id = pxl_get_element_id($settings);
$query_type = $widget->get_setting('query_type', 'recent_product');
$post_per_page = $widget->get_setting('post_per_page', 8);
$product_ids = $widget->get_setting('product_ids', '');
$categories = $widget->get_setting('taxonomies', '');
$categories_exclude = $widget->get_setting('taxonomies_exclude', '');
$param_args = [];

$loop = basilico_woocommerce_query($query_type, $post_per_page, $product_ids, $categories, $param_args);
extract($loop);

if ($total <= 0) {
    echo '<div class="pxl-no-post-grid">' . esc_html__('No Product Found', 'basilico') . '</div>';
    return;
}
?>

<div class="pxl-product-list layout-1">
    <div class="pxl-product-list-inner">
        <?php
        $d = 0;
        while ($posts->have_posts()) {
            $posts->the_post();
            global $product;
            $d++;
            $term_list = array();
            $term_of_post = wp_get_post_terms($product->get_ID(), 'product_cat');
            foreach ($term_of_post as $term) {
                $term_list[] = $term->slug;
            }
            $filter_class = implode(' ', $term_list);
        ?>
            <div class="pxl-product-item">
                <?php
                do_action('woocommerce_before_shop_loop_item');
                do_action('woocommerce_before_shop_loop_item_title');
                do_action('woocommerce_shop_loop_item_title');
                do_action('woocommerce_after_shop_loop_item_title');
                do_action('woocommerce_after_shop_loop_item');
                ?>
            </div>
        <?php
        }
        ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>