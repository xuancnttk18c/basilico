<?php
$default_settings = [
	'anchors' => [],
];

$settings = array_merge($default_settings, $settings);
extract($settings);
?>

<?php if (isset($anchors) && !empty($anchors) && count($anchors)): ?>
<div class="pxl-anchor-list layout-1">
	<div class="pxl-anchor-list-wrap d-inline-flex relative">
		<?php foreach ($anchors as $key => $anchor): ?>
			<?php
			if (esc_attr($anchor['template']) == 'cart-dropdown') {
				$target = '.pxl-cart-dropdown';
				$template = '0';
			}
			else {
				$template = (int)$anchor['template'];
				$target = '.pxl-hidden-template-'.$template;
			}

			if (esc_attr($anchor['template']) == 'cart-dropdown')
				$widget->add_render_attribute('anchor'.$key, 'class', 'cart-anchor side-panel');
			else
				$widget->add_render_attribute('anchor'.$key, 'class', 'pxl-anchor side-panel');
			if ($template > 0 ){
				if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
					add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'basilico_hook_anchor_hidden_panel' );
				}
			} else {
				add_action( 'pxltheme_anchor_target', 'basilico_hook_anchor_custom' );
			}
			?>
			<a href="#pxl-<?php echo esc_attr($template)?>" <?php pxl_print_html($widget->get_render_attribute_string( 'anchor'.$key )); ?> data-target="<?php echo esc_attr($target)?>">
				<?php
				echo '<div class="pxl-anchor-icon d-inline-flex align-items-center justify-content-center">';
				\Elementor\Icons_Manager::render_icon( $anchor['selected_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'span' );
				echo '</div>';
				?>
			</a>
		<?php endforeach; ?>
		<?php if ($link_target == 'cart-dropdown' && !\Elementor\Plugin::$instance->editor->is_edit_mode()): ?>
			<div class="pxl-cart-dropdown">
				<div class="pxl-cart-dropdown-inner relative">
					<div class="cart-content-body widget_shopping_cart">
						<div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
					</div>
					<div class="cart-content-footer"><div class="cart-footer-wrap"><?php wc_get_template( 'cart/mini-cart-totals.php' ); ?></div></div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>