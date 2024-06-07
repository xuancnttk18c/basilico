<?php
add_filter('woocommerce_product_data_tabs', 'pxl_nutrition_tab');
function pxl_nutrition_tab($tabs) {
    $tabs['pxl_nutrition'] = array(
        'label' => 'PXL Nutrition',
        'target' => 'pxl_nutrition_opts',
        'priority' => 65,
    );
    return $tabs;
}

add_action( 'woocommerce_product_data_panels', 'pxl_nutrition_tab_content' );
function pxl_nutrition_tab_content() {
    ?>
    <div id="pxl_nutrition_opts" class="panel woocommerce_options_panel">
        <?php foreach(get_nutrition_opts() as $opt => $data ): ?>
            <p class="form-field">
                <label for="_<?php echo esc_attr( $opt ); ?>"><?php echo esc_html( $data['label'] ); ?></label>
                <input type="text" name="_<?php echo esc_attr( $opt ); ?>" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>"
                id="_<?php echo esc_attr( $opt ); ?>" value="<?php echo esc_attr( ${$opt} ); ?>">
            </p>
        <?php endforeach; ?>
    </div>
    <?php
}

add_action( 'woocommerce_process_product_meta', 'save_meta_box', 1);
public function save_meta_box($post_id ) {
    $product = wc_get_product($post_id );
    foreach ( get_nutrition_opts() as $opt => $data ) {
        if ( isset( $_POST[ '_' . $opt ] ) ) {
            $product->update_meta_data( '_' . $opt, $_POST[ '_' . $opt ] );
        } else {
            $product->update_meta_data( '_' . $opt, '' );
        }
    }
    $product->save();
}

function get_nutrition_opts() {
    $opts = array(
        'pxl_nutrition_calories'  => array(
            'label'                 => esc_html__( 'Calories', 'basilico' ),
            'placeholder'           => esc_html('550kcal', 'basilico'),
        ),
        'lafka_nutrition_carbohydrates' => array(
            'label'                 => esc_html__( 'Carbohydrates', 'basilico' ),
            'placeholder'           => esc_html('50G', 'basilico'),
        ),
        'lafka_nutrition_squirrels' => array(
            'label'                 => esc_html__( 'Squirrels', 'basilico' ),
            'placeholder'           => esc_html('50G', 'basilico'),
        ),
        'lafka_nutrition_fats' => array(
            'label'                 => esc_html__( 'Fats', 'basilico' ),
            'placeholder'           => esc_html('20G', 'basilico'),
        ),
    );
    return $opts;
}