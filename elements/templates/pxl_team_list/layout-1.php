<?php
use Elementor\Icons_Manager;
use Elementor\Utils;
Icons_Manager::enqueue_shim();
$default_settings = [
    'col_xxl' => '3',
    'col_xl' => '3',
    'col_lg' => '2',
    'col_md' => '2',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list' => []
];
$settings = array_merge($default_settings, $settings);
extract($settings);

$animate_cls = '';
if ( !empty( $item_animation ) ) {
    $animate_cls = ' pxl-animate pxl-invisible animated-'.$item_animation_duration;
} 
$item_animation_delay = !empty($item_animation_delay) ? $item_animation_delay : '200';

$img_size = !empty( $img_size ) ? $img_size : '570x630';

?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
<div class="pxl-team-list layout-1">
    <?php foreach ($content_list as $key => $value):
        $title    = isset($value['title']) ? $value['title'] : '';
        $position = isset($value['position']) ? $value['position'] : '';
        $description = isset($value['description']) ? $value['description'] : '';
        $image    = isset($value['image']) ? $value['image'] : [];
        $link     = isset($value['link']) ? $value['link'] : '';  
        $thumbnail = '';
        if(!empty($image)) {
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $image['id'],
                'thumb_size' => $img_size,
                'class' => 'no-lazyload',
            ));
            $thumbnail = $img['thumbnail'];
        }

        $social = isset($value['social']) ? $value['social'] : '';
        $link_key = $widget->get_repeater_setting_key( 'link', 'content_list', $key );
        if ( ! empty( $link['url'] ) ) {
            $widget->add_render_attribute( $link_key, 'href', $link['url'] );

            if ( $link['is_external'] ) {
                $widget->add_render_attribute( $link_key, 'target', '_blank' );
            }

            if ( $link['nofollow'] ) {
                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
            }
            if ( ! empty( $link['custom_attributes'] ) ) {
                        // Custom URL attributes should come as a string of comma-delimited key|value pairs
                $custom_attributes = Utils::parse_custom_attributes( $link['custom_attributes'] );
                $widget->add_render_attribute( $link_key, $custom_attributes);
            }
        }
        $link_attributes = $widget->get_render_attribute_string( $link_key );
        $increase = $key + 1; 
        $data_settings = '';
        if ( !empty( $item_animation ) ) {
            $data_animation =  json_encode([
                'animation'      => $item_animation,
                'animation_delay' => ((float)$item_animation_delay * $increase)
            ]);
            $data_settings = 'data-settings="'.esc_attr($data_animation).'"';
        }
        ?>
        <div class="<?php echo esc_attr($animate_cls); ?>" <?php pxl_print_html($data_settings); ?>>
            <div class="item-inner">
                <?php if(!empty($thumbnail)) { ?>
                    <div class="item-image">
                        <div class="image-wrap scale-hover-x">
                            <?php if ( ! empty( $link['url'] ) ): ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php endif; ?>
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ( ! empty( $link['url'] ) ): ?></a><?php endif; ?>
                        </div>
                        <?php if(!empty($social)): ?>
                            <div class="item-social">
                                <?php 
                                $team_social = json_decode($social, true);
                                foreach ($team_social as $value): ?>
                                    <a href="<?php echo esc_url($value['url']); ?>" target="_blank">
                                        <i class="pxli <?php echo esc_attr($value['icon']); ?>"></i>
                                    </a>
                                <?php endforeach;?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>
                <div class="item-content">
                    <h3 class="item-title">
                        <?php if ( ! empty( $link['url'] ) ): ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php endif; ?>
                        <?php echo pxl_print_html($title); ?>
                        <?php if ( ! empty( $link['url'] ) ): ?></a><?php endif; ?>
                    </h3>
                    <div class="item-position"><?php echo pxl_print_html($position); ?></div>
                    <?php if(!empty($description)) { ?>
                        <div class="item-description"><?php echo pxl_print_html($description); ?></div>
                    <?php } ?>
                </div>
            </div> 
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
