<?php
add_filter('woocommerce_product_data_tabs', 'pxl_nutrition_tab');
function pxl_nutrition_tab($tabs) {
    $tabs['pxl_nutrition'] = array(
        'label' => 'PXL Nutrition',
        'target' => 'pxl_nitrition_opts',
        'priority' => 10,
    );
    return $tabs;
}

add_action( 'woocommerce_product_data_panels', 'pxl_nutrition_tab_content' );
function pxl_nutrition_tab_content() {
    global $woocommerce, $post;
    $opts = get_nutrition_opt();
    ?>
    <div id="pxl_nitrition_opts" class="panel woocommerce_options_panel">
        <?php foreach($opts as $opt => $data ): ?>
            <p class="form-field">
                <label for="_<?php echo esc_attr( $opt ); ?>"><?php echo esc_html( $data['label'] ); ?></label>
                <input type="text" name="_<?php echo esc_attr( $opt ); ?>" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>"
                id="_<?php echo esc_attr( $opt ); ?>" value="<?php echo esc_attr( ${$opt} ); ?>">
            </p>
        <?php endforeach; ?>
    </div>
    <?php
}

function get_nutrition_opt() {
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