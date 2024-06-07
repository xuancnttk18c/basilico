<?php
add_filter('woocommerce_product_data_tabs', 'add_ppwp_access_link_tab');
function add_ppwp_access_link_tab($tabs) {
    $tabs['ppwp_woo'] = array(
        'label' => 'PPWP Access Link',
        'target' => 'ppwp_woo_options',
        'priority' => 65,
    );
    return $tabs;
}

add_action( 'woocommerce_product_data_panels' ,'show_ppwp_access_link_tab_content' );
function show_ppwp_access_link_tab_content() {
    global $woocommerce, $post;
    ?>
    <div id="ppwp_woo_options" class="panel woocommerce_options_panel">
        <?php
        woocommerce_wp_select(
            array(
                'id'      => '_ppwp_woo_protected_post',
                'label'   => __( 'Protected post', 'woocommerce' ),
                'options' => array(
                    '0' => '-- Select a password protected page --',
                ),
            )
        );
        woocommerce_wp_text_input(
            array(
                'id'                => '_ppwp_woo_usage_limit',
                'label'             => __( 'Usage limit', 'woocommerce' ),
                'desc_tip'          => 'true',
                'description'       => __( 'Enter the number of times user can access the link.', 'woocommerce' ),
                'type'              => 'number',
                'custom_attributes' => array(
                    'min'  => '1',
                    'step' => '1',
                ),
            )
        );
        woocommerce_wp_text_input(
            array(
                'id'                => '_ppwp_woo_expiration',
                'label'             => __( 'Expiration (minutes)', 'woocommerce' ),
                'desc_tip'          => 'true',
                'description'       => __( 'Enter the number of minutes the link is valid for.', 'woocommerce' ),
                'type'              => 'number',
                'custom_attributes' => array(
                    'min'  => '1',
                    'step' => '1',
                ),
            )
        );
        woocommerce_wp_textarea_input(
            array(
                'id'          => '_ppwp_woo_custom_text',
                'label'       => __( 'Custom text', 'woocommerce' ),
                'desc_tip'    => 'true',
                'description' => __( 'Insert any text that you want to include in the order product details. The text within the percent sign % %  will become Bypass URL. Use {usage_limit} to display password usage limit and {expiration} to display expiry date.', 'woocommerce' ),
            )
        );
        ?>
    </div>
    <?php
}