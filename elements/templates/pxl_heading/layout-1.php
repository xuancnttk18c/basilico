<?php
use Elementor\Utils;
$default_settings = [
    'title' => '',
    'title_tag' => 'h3',
    'sub_title' => '',
    'sub_title_style' => '',
    'text_align' => '',
    'pxl_icon' => '',
    'text_list' => '',
];
$settings = array_merge($default_settings, $settings);
$widget->add_render_attribute( 'wrap-heading', 'class', 'pxl-heading-layout-1 pxl-heading-wrap d-flex layout1');

$widget->add_render_attribute( 'large-title', 'class', 'heading-title');
if ( $settings['title_highlighted_line'] == "true") {
    $widget->add_render_attribute( 'large-title', 'class', 'highlighted');
    $widget->add_render_attribute( 'large-title', 'class', $settings['title_highlighted_style']);
}
if(!empty($settings['title_split_text_anm'])){
    $widget->add_render_attribute( 'large-title', 'class', 'pxl-split-text '.$settings['title_split_text_anm']);
}
if ( $settings['title_animation'] ) {
    $widget->add_render_attribute( 'large-title', 'class', 'pxl-animate pxl-invisible animated-'.$settings['title_animation_duration']);
    $widget->add_render_attribute( 'large-title', 'data-settings',
        json_encode([
            'animation'      => $settings['title_animation'],
            'animation_delay' => $settings['title_animation_delay']
        ])
    );
}

$widget->add_render_attribute( 'sub-title', 'class', 'heading-subtitle');
if ($settings['subtitle_highlighted_line'] == "true") {
    $widget->add_render_attribute( 'sub-title', 'class', 'highlighted');
    $widget->add_render_attribute( 'sub-title', 'class', $settings['subtitle_highlighted_style']);
}
if ( $settings['sub_title_animation'] ) {
    $widget->add_render_attribute( 'sub-title', 'class', 'pxl-animate pxl-invisible animated-'.$settings['sub_title_animation_duration']);
    $widget->add_render_attribute( 'sub-title', 'data-settings',
        json_encode([
            'animation'      => $settings['sub_title_animation'],
            'animation_delay' => $settings['sub_title_animation_delay']
        ])
    );
}

$widget->add_render_attribute( 'sub-title-text', 'class', 'subtitle-text ');
if(!empty($settings['subtitle_split_text_anm'])){
    $widget->add_render_attribute( 'sub-title-text', 'class', 'pxl-split-text '.$settings['subtitle_split_text_anm']);
}

$widget->add_render_attribute( 'description', 'class', 'heading-description');
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'pxl-animate pxl-invisible animated-'.$settings['description_animation_duration']);
    $widget->add_render_attribute( 'description', 'data-settings',
        json_encode([
            'animation'      => $settings['description_animation'],
            'animation_delay' => $settings['description_animation_delay']
        ])
    );
}
$inner_tag = 'span';
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );
    $inner_tag = 'a';
    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }

    if ( ! empty( $settings['link']['custom_attributes'] ) ) {
        // Custom URL attributes should come as a string of comma-delimited key|value pairs
        $custom_attributes = Utils::parse_custom_attributes( $settings['link']['custom_attributes'] );
        $widget->add_render_attribute( 'link', $custom_attributes);
    }
}

$link_attributes = $widget->get_render_attribute_string( 'link' );

extract($settings);

?>
<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrap-heading' )); ?>>
    <div class="pxl-heading-inner">
        <?php if(!empty($sub_title)) : ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'sub-title' )); ?>>
                <span <?php pxl_print_html($widget->get_render_attribute_string( 'sub-title-text' )); ?>><?php pxl_print_html(nl2br($sub_title)); ?></span>
            </div>
        <?php endif; ?>

        <<?php echo esc_attr($title_tag); ?> <?php pxl_print_html($widget->get_render_attribute_string( 'large-title' )); ?>>
        <<?php echo implode( ' ', [ $inner_tag, $link_attributes ] ); ?>>
        <?php pxl_print_html(nl2br($title)); ?>
        </<?php pxl_print_html($inner_tag); ?>>
        </<?php echo esc_attr($title_tag); ?>>
        <?php if(!empty($description)) : ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'description' )); ?>>
                <span><?php pxl_print_html(nl2br($description)); ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>