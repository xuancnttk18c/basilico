<?php
	$style = $widget->get_setting('style', 'style-1');
	$draw = $widget->get_setting('draw', '');
	extract($settings);
?>

<div class="pxl-widget-divider <?php echo esc_attr($settings['alignment']); ?>">
	<div class="pxl-divider <?php echo esc_attr($style); ?><?php echo esc_attr($draw) == 'true' ? ' pxl-scroll' : ''; ?>">
		<?php if ($style == 'style-2') : ?>
			<div class="diamond-icon"></div>
		<?php endif; ?>
	</div>
</div>