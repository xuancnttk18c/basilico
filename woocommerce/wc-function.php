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

// Products Loop: Display the checkbox field on products that have Ajax add to cart enabled
add_action( "woocommerce_after_shop_loop_item", 'product_loop_display_certificate_field' );
function product_loop_display_certificate_field() {
    global $product;

    if ( $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ) {
        echo '</a><div class="sark-custom-fields-wrapper"><input type="checkbox" id="name_on_certificate-' .
        $product->get_id() . '" value="required" /></div>';
    }
}

// Products Loop: Handle Ajax add to cart for the checkbox
add_action( "init", 'certificate_field_loop_jquery_script', 1 );
function certificate_field_loop_jquery_script() {
    wc_enqueue_js("jQuery( function($){
        $(document.body).on('adding_to_cart', function( e, btn, data ){
            var checkbox = $('#name_on_certificate-'+data.product_id);
            if( checkbox.is(':checked') ) {
                data['name_on_certificate'] = checkbox.val();
                return data['name_on_certificate'];
            }
        });
    });");
}

// Single products: Display the checkbox field
add_action( 'woocommerce_before_add_to_cart_button', 'single_product_display_certificate_field');
function single_product_display_certificate_field() {
    echo '<table class="certificate" cellspacing="0"><tbody><tr>
        <td class="value">' . __("Certificate:", "woocommerce") .
        ' <input type="checkbox" name="name_on_certificate" value="required" "/>
        </td>
    </tr></tbody></table>';
}

// Add checked checkbox value as custom cart item data
add_action( 'woocommerce_add_cart_item_data', 'add_cart_item_certificate_field_value', 10, 2 );
function add_cart_item_certificate_field_value( $cart_item_data, $product_id ) {
    if( isset( $_REQUEST['name_on_certificate'] ) ) {
       $cart_item_data[ 'name_on_certificate' ] = $_REQUEST['name_on_certificate'];
       $cart_item_data['unique_key'] = md5( microtime().rand() );
    }
    return $cart_item_data;
}

// Display required certificate in minicart, cart and checkou
add_filter( 'woocommerce_get_item_data', 'display_cart_item_certificate_field_value', 10, 2 );
function display_cart_item_certificate_field_value( $cart_data, $cart_item ) {
    if( isset( $cart_item['name_on_certificate'] ) ) {
        $cart_data[] = array( "name" => 'Certificate', "value" => $cart_item['name_on_certificate']);
    }
    return $cart_data;
}

// Save required certificate as custon order item data and display it on orders and emails
add_action( 'woocommerce_checkout_create_order_line_item', 'add_order_item_certificate_field_value', 10, 4 );
function add_order_item_certificate_field_value( $item, $cart_item_key, $values, $order ) {
    if( isset( $values['name_on_certificate'] ) ) {
        $item->update_meta_data( 'name_on_certificate', esc_attr($values['name_on_certificate']) );
    }
}

// Change required certificate displayed meta key label to something readable
add_filter('woocommerce_order_item_display_meta_key', 'filter_order_item_displayed_meta_key', 20, 3 );
function filter_order_item_displayed_meta_key( $displayed_key, $meta, $item ) {
    // Change displayed meta key label for specific order item meta key
    if( $item->get_type() === 'line_item' && $meta->key === 'name_on_certificate' ) {
        $displayed_key = __("Certificate", "woocommerce");
    }
    return $displayed_key;
}