<?php 

$widget->add_render_attribute( 'pxl_img_wrap', 'id', pxl_get_element_id($settings));
$widget->add_render_attribute( 'pxl_img_wrap', 'class', 'pxl-image-wg');

if(!empty($settings['custom_style']))
	$widget->add_render_attribute( 'pxl_img_wrap', 'class', $settings['custom_style']);

if(!empty($settings['pxl_parallax'])){
    $parallax_settings = json_encode([
        $settings['pxl_parallax'] => $settings['parallax_value'],
    ]);
    $widget->add_render_attribute( 'pxl_img_wrap', 'data-parallax', $parallax_settings );
}
if(!empty($settings['pxl_bg_parallax'])){
    $widget->add_render_attribute( 'pxl_img_wrap', 'class', 'pxl-bg-parallax pxl-pll-'.$settings['pxl_bg_parallax']); 
}
if(!empty($settings['img_animation'])){
    $widget->add_render_attribute( 'pxl_img_wrap', 'class', $settings['img_animation']); 
}


$link = basilico_get_img_link_url( $settings );
 
if ( $link ) {
	$widget->add_link_attributes( 'link', $link );

	if ( \Elementor\Plugin::instance()->editor->is_edit_mode() ) {
		$widget->add_render_attribute( 'link', [
			'class' => 'elementor-clickable',
		] );
	}
	if ( 'file' === $settings['link_to'] ) {
		$widget->add_lightbox_data_attributes( 'link', $settings['image']['id'], $settings['open_lightbox'] );
	}
}	
 
?> 
<div <?php pxl_print_html($widget->get_render_attribute_string( 'pxl_img_wrap' )); ?>>
	<?php if ( $settings['show_caption'] == 'true' ) : ?>
		<figure class="wp-caption">
	<?php endif; ?>
	<?php if ( $link ) : ?><a <?php $widget->print_render_attribute_string( 'link' ); ?>><?php endif; ?>
		<?php \Elementor\Group_Control_Image_Size::print_attachment_image_html( $settings ); ?>
		<?php 
		if(!empty($settings['pxl_bg_parallax'])): 
			$image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $settings['image']['id'], 'image', $settings );
		?>
			<div class="parallax-inner" style="background-image: url(<?php echo esc_url($image_src) ?>)"></div>
		<?php endif; ?>
	<?php if ( $link ) : ?></a><?php endif; ?>
	<?php if ( $settings['show_caption'] == 'true' ) : ?>
			<figcaption class="widget-image-caption wp-caption-text"><?php
				$caption = wp_get_attachment_caption( $settings['image']['id'] );
				echo wp_kses_post( $caption );
			?></figcaption>
	<?php endif; ?>
	<?php if ( $settings['show_caption'] == 'true' ) : ?>
		</figure>
	<?php endif; ?>
</div>
