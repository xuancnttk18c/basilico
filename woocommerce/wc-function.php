<?php
function basilico_get_shop_loop_row_column_class($args = []){

    $col_xxl = isset($_GET['col_xxl']) ? $_GET['col_xxl'] : ( !empty($args['col_xxl']) ? $args['col_xxl'] : basilico()->get_theme_opt('products_col_xxl', 4) );
    $col_xl  = isset($_GET['col_xl']) ? $_GET['col_xl'] : ( !empty($args['col_xl']) ? $args['col_xl'] : basilico()->get_theme_opt('products_col_xl', 3) );
    $col_lg  = isset($_GET['col_lg']) ? $_GET['col_lg'] : ( !empty($args['col_lg']) ? $args['col_lg'] : basilico()->get_theme_opt('products_col_lg', 3) );
    $col_md  = isset($_GET['col_md']) ? $_GET['col_md'] : ( !empty($args['col_md']) ? $args['col_md'] : basilico()->get_theme_opt('products_col_md', 3) );
    $col_sm  = isset($_GET['col_sm']) ? $_GET['col_sm'] : ( !empty($args['col_sm']) ? $args['col_sm'] : basilico()->get_theme_opt('products_col_sm', 2) );
    $col_xs  = isset($_GET['col_xs']) ? $_GET['col_xs'] : ( !empty($args['col_xs']) ? $args['col_xs'] : basilico()->get_theme_opt('products_col_xs', 2) );


    $col_xxl = 'row-cols-xxl-'.$col_xxl;
    $col_xl  = 'row-cols-xl-'.$col_xl;
    $col_lg  = 'row-cols-lg-'.$col_lg;
    $col_md  = 'row-cols-md-'.$col_md;
    $col_sm  = 'row-cols-sm-'.$col_sm;
    $col_xs  = 'row-cols-xs-'.$col_xs;

    return [$col_xs, $col_sm, $col_md, $col_lg, $col_xl, $col_xxl];
}

function basilico_get_grid_gutter_x_class($option_name, $is_single = false){
    $gutter_x_theme_opt = basilico()->get_theme_opt($option_name, []);
    $g_x_cls = $g_x = $gxi = [];
    for($i = 0; $i <= 6; $i++){
        if( !empty($gutter_x_theme_opt[$i]) )
            $gxi[$i] = $gutter_x_theme_opt[$i];
    }
    if( $is_single ){
        $gutter_x = basilico()->get_page_opt($option_name, []);
        if( empty($gutter_x) || ( !empty($gutter_x) && count($gutter_x) == 1 && empty($gutter_x[0]) ) ){
            $g_x = $gxi;
        }else{
            $g_x = $gutter_x;
        }
    }else{
        $g_x = $gxi;
    }

    foreach ($g_x as $key => $value) {
        switch ($key) {
            case 0:
                $breakpoint = '';
                break;
            case 1:
                $breakpoint = 'xs-';
                break;
            case 2:
                $breakpoint = 'sm-';
                break;
            case 3:
                $breakpoint = 'md-';
                break;
            case 4:
                $breakpoint = 'lg-';
                break;
            case 5:
                $breakpoint = 'xl-';
                break;
            case 6:
                $breakpoint = 'xxl-';
                break;
            default:
                $breakpoint = '';
                break;
        }
        if(!empty($value))
            $g_x_cls[$key] = 'gx-'.$breakpoint.$value;
    }
    return $g_x_cls;
}

function basilico_get_grid_gutter_y_class($option_name, $is_single = false){
    $gutter_y_theme_opt = basilico()->get_theme_opt($option_name, []);
    $g_y_cls = $g_y = $gyi = [];
    for($i = 0; $i <= 6; $i++){
        if( !empty($gutter_y_theme_opt[$i]) )
            $gyi[$i] = $gutter_y_theme_opt[$i];
    }
    if( $is_single ){
        $gutter_y = basilico()->get_page_opt($option_name, []);
        if( empty($gutter_y) || ( !empty($gutter_y) && count($gutter_y) == 1 && empty($gutter_y[0]) ) ){
            $g_y = $gyi;
        }else{
            $g_y = $gutter_y;
        }
    }else{
        $g_y = $gyi;
    }

    foreach ($g_y as $key => $value) {
        switch ($key) {
            case 0:
                $breakpoint = '';
                break;
            case 1:
                $breakpoint = 'xs-';
                break;
            case 2:
                $breakpoint = 'sm-';
                break;
            case 3:
                $breakpoint = 'md-';
                break;
            case 4:
                $breakpoint = 'lg-';
                break;
            case 5:
                $breakpoint = 'xl-';
                break;
            case 6:
                $breakpoint = 'xxl-';
                break;
            default:
                $breakpoint = '';
                break;
        }
        if(!empty($value))
            $g_y_cls[$key] = 'gy-'.$breakpoint.$value;
    }
    return $g_y_cls;
}

//jkfasdjfksdjfk

// Add custom field to the product edit page
add_action('woocommerce_product_options_general_product_data', 'add_custom_fields_to_products');

function add_custom_fields_to_products() {
    woocommerce_wp_text_input( array(
        'id'          => '_custom_product_addon',
        'label'       => __( 'Product Addon', 'woocommerce' ),
        'desc_tip'    => 'true',
        'description' => __( 'Enter a custom addon for this product.', 'woocommerce' ),
        'type'        => 'text',
    ));
}

// Save the custom field value
add_action('woocommerce_process_product_meta', 'save_custom_fields_to_products');

function save_custom_fields_to_products($post_id) {
    $custom_field_value = isset($_POST['_custom_product_addon']) ? sanitize_text_field($_POST['_custom_product_addon']) : '';
    update_post_meta($post_id, '_custom_product_addon', $custom_field_value);
}

// Display the custom field on the product page
add_action('woocommerce_before_add_to_cart_button', 'display_custom_fields_on_product_page');

function display_custom_fields_on_product_page() {
    global $post;
    $custom_field_value = get_post_meta($post->ID, '_custom_product_addon', true);
    
    if($custom_field_value) {
        echo '<div class="product-addon"><label for="product-addon">' . __('Product Addon:', 'woocommerce') . '</label><input type="text" id="product-addon" name="product-addon" value="' . esc_attr($custom_field_value) . '"></div>';
    }
}

// Add custom field data to the cart item
add_filter('woocommerce_add_cart_item_data', 'add_custom_field_to_cart_item', 10, 2);

function add_custom_field_to_cart_item($cart_item_data, $product_id) {
    if (isset($_POST['product-addon'])) {
        $cart_item_data['product_addon'] = sanitize_text_field($_POST['product-addon']);
    }
    return $cart_item_data;
}

// Display custom field data in the cart and checkout
add_filter('woocommerce_get_item_data', 'display_custom_field_in_cart', 10, 2);

function display_custom_field_in_cart($item_data, $cart_item) {
    if (isset($cart_item['product_addon'])) {
        $item_data[] = array(
            'name' => __('Product Addon', 'woocommerce'),
            'value' => sanitize_text_field($cart_item['product_addon'])
        );
    }
    return $item_data;
}

// Save custom field data to the order
add_action('woocommerce_checkout_create_order_line_item', 'save_custom_field_to_order', 10, 4);

function save_custom_field_to_order($item, $cart_item_key, $values, $order) {
    if (isset($values['product_addon'])) {
        $item->add_meta_data(__('Product Addon', 'woocommerce'), $values['product_addon']);
    }
}