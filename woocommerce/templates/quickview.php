<?php
// quickview.php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$product = wc_get_product($product_id);

if ($product) :
?>
<div class="quickview-content">
    <h1><?php echo esc_html($product->get_name()); ?></h1>
    <div><?php echo $product->get_image(); ?></div>
    <div><?php echo $product->get_description(); ?></div>
    <div><?php echo $product->get_price_html(); ?></div>
    <?php woocommerce_template_single_add_to_cart(); ?>
</div>
<?php
endif;
?>