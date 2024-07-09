<?php
$default_settings = [
	'anchors' => [],
];

$settings = array_merge($default_settings, $settings);
extract($settings);
?>

<?php if (isset($anchors) && !empty($anchors) && count($anchors)): ?>
<div class="pxl-anchor-list layout-1">
	<?php foreach ($anchors as $key => $anchor): ?>
		<?php
		$template = (int)$anchor['template'];
		$widget->add_render_attribute('anchor'.$key, 'class', 'pxl-anchor side-panel');
		$target = '.pxl-hidden-template-'.$template;

		if ($template > 0 ){
			if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
				add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'basilico_hook_anchor_hidden_panel' );
			}
		} else {
			add_action( 'pxltheme_anchor_target', 'basilico_hook_anchor_custom' );
		}
		?>
		<div class="pxl-anchor-list-wrap d-inline-flex">
			<a href="#pxl-<?php echo esc_attr($template)?>" <?php pxl_print_html($widget->get_render_attribute_string( 'anchor'.$key )); ?> data-target="<?php echo esc_attr($target)?>">
				<?php
				echo '<div class="pxl-anchor-icon d-inline-flex align-items-center justify-content-center">';
				\Elementor\Icons_Manager::render_icon( $anchor['selected_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'span' );
				echo '</div>';
				?>
			</a>
		</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>