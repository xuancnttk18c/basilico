<?php
$widget->add_render_attribute('cart', 'class', 'pxl-cart side-panel d-flex align-items-center');
$target = '.pxl-side-cart';

$cart_text = $widget->get_setting('cart_text', 'Your Cart');

?>
<div class="pxl-cart-wrap layout-2 d-flex align-items-center align-content-center">
    <div <?php pxl_print_html($widget->get_render_attribute_string( 'cart' )); ?> data-target="<?php echo esc_attr($target)?>">
        <?php
        if(!is_admin())
            $count = WC()->cart->get_cart_contents_count();
        if( $widget->get_setting('icon_type','none') == 'lib'){
            echo '<div class="pxl-cart-icon d-inline-flex">';
                \Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true', 'class' => 'pxli'], 'i');
                if(!is_admin()): ?>
                    <span class="pxl-cart-text"><?php echo esc_html($cart_text); ?></span>
                    <span class="pxl-cart-count cart_total"><?php echo esc_attr($count) ?></span>
                <?php endif;
            echo '</div>';
        }
        else if ( $widget->get_setting('icon_type','none') == 'custom') {
            echo '<div class="pxl-cart-icon d-inline-flex align-items-center">';
                echo '<i class="custom-cart-icon"></i>';
                if(!is_admin()): ?>
                    <div class="pxl-cart-text">
                        <?php echo esc_html($cart_text); ?>
                        <span class="pxl-cart-count cart_total"><?php echo esc_attr($count) ?></span>
                    </div>
                <?php endif;
            echo '</div>';
        }
        ?>
    </div>
</div>
 