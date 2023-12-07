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
        if( $widget->get_setting('icon_type','none') == 'lib') : ?>
            <div class="pxl-cart-icon d-inline-flex">
                <?php \Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true', 'class' => 'pxli'], 'i');
                if(!is_admin()): ?>
                    <span class="pxl-cart-text"><?php echo esc_html($cart_text); ?></span>
                    <span class="pxl-cart-count cart_total"><?php echo esc_attr($count) ?></span>
                <?php endif; ?>
            </div>
        <?php endif;
        elseif ( $widget->get_setting('icon_type','none') == 'custom') : ?>
            <div class="custom-cart-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <path class="st0" d="M508.3,85.8c-3-3.6-7.6-5.8-12.3-5.8H107.5c-5,0-9.7,2.3-12.7,6.2c-3,4-4,9.1-2.8,13.9l51.2,191.4  c1.9,7,8.2,11.9,15.5,11.9c0.3,0,0.5,0,0.8,0L464.8,288c7.4-0.4,13.6-5.8,14.9-13.1l32-176C512.6,94.2,511.3,89.4,508.3,85.8z   M224,224c0,8.8-7.2,16-16,16s-16-7.2-16-16v-64c0-8.8,7.2-16,16-16s16,7.2,16,16V224z M320,224c0,8.8-7.2,16-16,16s-16-7.2-16-16  v-64c0-8.8,7.2-16,16-16s16,7.2,16,16V224z M416,224c0,8.8-7.2,16-16,16s-16-7.2-16-16v-64c0-8.8,7.2-16,16-16s16,7.2,16,16V224z"/>
                    <g>
                        <circle class="st1" cx="208" cy="448" r="48"/>
                        <circle class="st1" cx="400" cy="448" r="48"/>
                        <path class="st1" d="M432,368H176c-7.3,0-13.6-4.9-15.5-11.9L78.3,48H16C7.2,48,0,40.8,0,32s7.2-16,16-16h74.6   c7.3,0,13.6,4.9,15.5,11.9L188.3,336H432c8.8,0,16,7.2,16,16S440.8,368,432,368z"/>
                    </g>
                </svg>
            </div>
        <?php endif; ?>
    </div>
</div>