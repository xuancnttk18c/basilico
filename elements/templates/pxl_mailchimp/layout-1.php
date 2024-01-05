<?php if(class_exists('MC4WP_Container')) : ?>
	<?php var_dump($settings['hide_icon']); ?>
	<div class="pxl-mailchimp d-flex layout-1 <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['hide_icon']) ? 'hide_icon' : ''; ?>">
		<div class="col">
		<?php echo do_shortcode('[mc4wp_form]'); ?>
		</div>
	</div>
<?php endif; ?>
