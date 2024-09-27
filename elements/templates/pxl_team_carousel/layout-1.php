<?php
use Elementor\Icons_Manager;
Icons_Manager::enqueue_shim();
$default_settings = [
    'content_list' => [],
];
$settings = array_merge($default_settings, $settings);
extract($settings);

$img_size = !empty( $img_size ) ? $img_size : '555x600'; 

$arrows = $widget->get_setting('arrows','false');  
$dots = $widget->get_setting('dots','false');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show_xxl'            => (float)$widget->get_setting('col_xxl', 4), 
    'slides_to_show'                => (float)$widget->get_setting('col_xl', 4), 
    'slides_to_show_lg'             => (float)$widget->get_setting('col_lg', 3), 
    'slides_to_show_md'             => (float)$widget->get_setting('col_md', 3), 
    'slides_to_show_sm'             => (float)$widget->get_setting('col_sm', 2), 
    'slides_to_show_xs'             => (float)$widget->get_setting('col_xs', 1), 
    'slides_to_scroll'              => (int)$widget->get_setting('slides_to_scroll', 1), 
    'slides_gutter'                 => (int)$widget->get_setting('space_between', 30), 
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => (bool)$widget->get_setting('autoplay', false),
    'pause_on_hover'                => (bool)$widget->get_setting('pause_on_hover', true),
    'pause_on_interaction'          => true,
    'delay'                         => (int)$widget->get_setting('autoplay_speed', 5000),
    'loop'                          => (bool)$widget->get_setting('infinite', false),
    'speed'                         => (int)$widget->get_setting('speed', 500)
];
  

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container overflow-hidden',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);

?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="pxl-swiper-slider pxl-team pxl-team-carousel layout-<?php echo esc_attr($settings['layout'])?>">
        <div class="pxl-swiper-slider-wrap pxl-carousel-inner relative">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper swiper-wrapper">
                    <?php foreach ($content_list as $key => $value):
                        $title    = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $description = isset($value['description']) ? $value['description'] : '';
                        $phone = isset($value['phone']) ? $value['phone'] : '';
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
                        ?>
                        <div class="pxl-swiper-slide swiper-slide">
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
                                        <?php if(!empty($phone)) { ?>
                                            <div class="say-hi" style="background-image: url(<?php echo esc_url($settings['item_background']['url']); ?>);">
                                                <h4><?php echo esc_html($phone); ?></h4>
                                            </div>
                                        <?php } ?>
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
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrows nav-vertical-out style-default">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><span class="pxli-arrow-left"></span></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><span class="pxli-arrow-right"></span></div>
                </div>
            <?php endif; ?>
            <?php if($dots !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>