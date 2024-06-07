<?php
add_filter('woocommerce_product_data_tabs', 'add_ppwp_access_link_tab');
function add_ppwp_access_link_tab($tabs) {
    $tabs['ppwp_woo'] = array(
        'label' => 'PPWP Access Link',
        'target' => 'ppwp_woo_options',
        'class' => array( 'show_if_virtual' ),
        'priority' => 65,
    );
    return $tabs;
}