<?php
$default_settings = [
    'content_list' => [],
];

$settings = array_merge($default_settings, $settings);
extract($settings);

$arrows = $widget->get_setting('arrows', 'false');
$arrows_style = $widget->get_setting('arrows_style', 'style-1');
$dots = $widget->get_setting('dots', 'false');
$quote_icon_type = $widget->get_setting('quote_icon_type', 'text');

$pagination_style = basilico()->get_theme_opt('swiper_pagination_style', 'style-df');

$opts = [
    'slide_direction'               => 'vertical',
    'slide_mode'                    => 'slide',
    'slide_percolumn'               => 1,
    'slides_to_show_xxl'            => 1,
    'slides_to_show'                => 1, 
    'slides_to_show_lg'             => 1,
    'slides_to_show_md'             => 1,
    'slides_to_show_sm'             => 1,
    'slides_to_show_xs'             => 1,
    'slides_to_scroll'              => 1, 
    'slides_gutter'                 => 30,
    'arrow'                         => $arrows,
    'dots'                          => $dots,
    'dots_style'                    => 'bullets',
    'autoplay'                      => (booL)$widget->get_setting('autoplay', false),
    'pause_on_hover'                => (booL)$widget->get_setting('pause_on_hover', true),
    'pause_on_interaction'          => true,
    'delay'                         => (int)$widget->get_setting('autoplay_speed', 5000),
    'loop'                          => (bool)$widget->get_setting('infinite', false),
    'speed'                         => (int)$widget->get_setting('speed', 500),
    'auto_height'                   => true,
];


$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container overflow-hidden',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
?>
<?php if (isset($content_list) && !empty($content_list) && count($content_list)) : ?>
<div class="pxl-swiper-slider pxl-testimonial-carousel layout-<?php echo esc_attr($settings['layout']) ?>">
    <div class="pxl-swiper-slider-wrap pxl-carousel-inner relative">
        <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
            <div class="pxl-swiper-wrapper swiper-wrapper">
                <?php foreach ($content_list as $key => $value) :
                    $image       = isset($value['image']) ? $value['image'] : [];
                    $title       = isset($value['title']) ? $value['title'] : '';
                    $position    = isset($value['position']) ? $value['position'] : '';
                    $testimonial_title = isset($value['testimonial_title']) ? $value['testimonial_title'] : '';
                    $description = isset($value['description']) ? $value['description'] : '';
                    $thumbnail = '';
                    if (!empty($image['id'])) {
                        $img = pxl_get_image_by_size(array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => '250x250',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                    }
                    ?>
                    <div class="pxl-swiper-slide swiper-slide">
                        <div class="item-inner relative">
                            <?php if ($quote_icon_type == 'icon' && !empty($settings['selected_icon']['value'])) { ?>
                                <div class="icon-wrapper">
                                    <?php \Elementor\Icons_Manager::render_icon($settings['selected_icon'], ['aria-hidden' => 'true', 'class' => 'item-quote-icon pxl-icon'], 'i'); ?>
                                </div>
                            <?php } ?>
                            <?php if ($quote_icon_type == 'text') { ?>
                                <div class="item-quote-icon">“</div>
                            <?php } ?>
                            <?php if (!empty($testimonial_title)) { ?>
                                <h4 class="testimonial-title"><?php echo esc_html($testimonial_title); ?></h4>
                            <?php } ?>
                            <div class="item-desc"><?php echo pxl_print_html($description); ?></div>
                            <div class="item-wrap">
                                <?php if (!empty($value['rating']) && $value['rating'] != 'none') : ?>
                                    <div class="item-rating-star">
                                        <div class="item-rating <?php echo esc_attr($value['rating']); ?>">
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="item-info col-auto">
                                    <h4 class="item-title"><?php echo esc_html($title); ?></h4>
                                    <div class="item-position"><?php echo esc_html($position); ?></div>
                                    <?php if (!empty($thumbnail)) : ?>
                                        <div class="item-image col-auto">
                                            <span class="img-outer">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if ($arrows !== 'false') : ?>
            <div class="pxl-swiper-arrows nav-vertical-out <?php echo esc_attr($arrows_style);?>">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                    <?php
                    if ( $settings['arrow_icon_next']['value'] ) 
                        \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_next'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon'], 'span' );
                    else
                        echo '<span class="pxl-icon pxli-arrow-next"></span>';
                    ?>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                    <?php 
                    if ( $settings['arrow_icon_previous']['value'] ) 
                        \Elementor\Icons_Manager::render_icon( $settings['arrow_icon_previous'], [ 'aria-hidden' => 'true', 'class' => 'pxl-icon'], 'span' );
                    else
                        echo '<span class="pxl-icon pxli-arrow-prev"></span>';
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($dots !== 'false') : ?>
            <div class="pxl-swiper-dots <?php echo esc_attr($pagination_style); ?>"></div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>