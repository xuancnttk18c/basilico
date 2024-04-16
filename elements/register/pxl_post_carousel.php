<?php
$pt_supports = ['post', 'pxl-portfolio', 'pxl-service'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('PXL Post Carousel', 'basilico' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'basilico-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'basilico' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'basilico' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => basilico_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            )
                        ),
                        basilico_get_post_carousel_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'basilico' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'basilico' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'basilico' ),
                                ],
                                'default'  => 'term_selected'
                            )
                        ),
                        basilico_get_carousel_term_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        basilico_get_carousel_ids_by_posttype($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'basilico' ),
                                    'ID' => esc_html__('ID', 'basilico' ),
                                    'author' => esc_html__('Author', 'basilico' ),
                                    'title' => esc_html__('Title', 'basilico' ),
                                    'rand' => esc_html__('Random', 'basilico' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'basilico' ),
                                    'asc' => esc_html__('Ascending', 'basilico' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'general_section',
                    'label' => esc_html__('General Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'img_size',
                                'label'       => esc_html__('Image Size', 'basilico' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'description' =>  esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'basilico')
                            ),
                            array(
                                'name'    => 'filter',
                                'label'   => esc_html__('Term Filter', 'basilico' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'true'  => esc_html__('Enable', 'basilico' ),
                                    'false' => esc_html__('Disable', 'basilico' ),
                                ],
                                'condition' => [
                                    'select_post_by' => 'term_selected',
                                ],
                            ),
                            array(
                                'name'      => 'filter_default_title',
                                'label'     => esc_html__('Filter Default Title', 'basilico' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('All', 'basilico' ),
                                'condition' => [
                                    'select_post_by' => 'term_selected',
                                    'filter'         => 'true',
                                ],
                            ),
                            array(
                                'name'         => 'filter_alignment',
                                'label'        => esc_html__( 'Filter Alignment', 'basilico' ),
                                'type'         => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'basilico' ),
                                        'icon'  => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'basilico' ),
                                        'icon'  => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'basilico' ),
                                        'icon'  => 'eicon-text-align-right',
                                    ]
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .swiper-filter-wrap' => 'justify-content: {{VALUE}};'
                                ],
                                'default'      => 'center',
                                'condition' => [
                                    'select_post_by' => 'term_selected',
                                    'filter'         => 'true',
                                ],
                            ),
                        ),
                        basilico_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item Content', 'basilico'),
                        ])
                    )
                ),
                array(
                    'name' => 'carousel_setting',
                    'label' => esc_html__('Carousel Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        basilico_carousel_column_settings(),
                        array(
                            array(
                                'name' => 'slides_to_scroll',
                                'label' => esc_html__('Slides to scroll', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => '1',
                                'options' => [
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ],
                            ),
                            array(
                                'name' => 'arrows',
                                'label' => esc_html__('Show Arrows', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'arrow_prev_position',
                                'label' => esc_html__('Arrow Previous Position', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'default',
                                'label_block' => true,
                                'options' => [
                                    'default' => esc_html('Default', 'basilico'),
                                    'absolute' => esc_html('Custom', 'basilico'),
                                ],
                                'condition' => [
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'arrow_prev_offset_orientation_h',
                                'label' => esc_html__('Horizontal Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'left',
                                'options' => [
                                    'left' => [
                                        'title' => 'Start',
                                        'icon' => 'eicon-h-align-left',
                                    ],
                                    'right' => [
                                        'title' => 'End',
                                        'icon' => 'eicon-h-align-right',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_prev_offset_x',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; left: {{SIZE}}{{UNIT}}; right: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_h!' => 'right',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_x_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; right: {{SIZE}}{{UNIT}}; left: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_h' => 'right',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_orientation_v',
                                'label' => esc_html__('Vertical Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'top',
                                'options' => [
                                    'top' => [
                                        'title' => 'Top',
                                        'icon' => 'eicon-v-align-top',
                                    ],
                                    'bottom' => [
                                        'title' => 'Bottom',
                                        'icon' => 'eicon-v-align-bottom',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_prev_offset_y',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; top: {{SIZE}}{{UNIT}}; bottom: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_v!' => 'bottom',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_y_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-prev' => 'position: absolute !important; bottom: {{SIZE}}{{UNIT}}; top: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_prev_offset_orientation_v' => 'bottom',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_position',
                                'label' => esc_html__('Arrow Next Position', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'default',
                                'label_block' => true,
                                'options' => [
                                    'default' => esc_html('Default', 'basilico'),
                                    'absolute' => esc_html('Custom', 'basilico'),
                                ],
                                'condition' => [
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'arrow_next_offset_orientation_h',
                                'label' => esc_html__('Horizontal Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'left',
                                'options' => [
                                    'left' => [
                                        'title' => 'Start',
                                        'icon' => 'eicon-h-align-left',
                                    ],
                                    'right' => [
                                        'title' => 'End',
                                        'icon' => 'eicon-h-align-right',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_next_offset_x',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; left: {{SIZE}}{{UNIT}}; right: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_h!' => 'right',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_x_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; right: {{SIZE}}{{UNIT}}; left: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_h' => 'right',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_orientation_v',
                                'label' => esc_html__('Vertical Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'top',
                                'options' => [
                                    'top' => [
                                        'title' => 'Top',
                                        'icon' => 'eicon-v-align-top',
                                    ],
                                    'bottom' => [
                                        'title' => 'Bottom',
                                        'icon' => 'eicon-v-align-bottom',
                                    ],
                                ],
                                'render_type' => 'ui',
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_position' => 'absolute'
                                ]
                            ),
                            array(
                                'name' => 'arrow_next_offset_y',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; top: {{SIZE}}{{UNIT}}; bottom: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_v!' => 'bottom',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_y_end',
                                'label' => esc_html__('Offset', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => -1000,
                                        'max' => 1000,
                                        'step' => 1,
                                    ],
                                    '%' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vw' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                    'vh' => [
                                        'min' => -200,
                                        'max' => 200,
                                    ],
                                ],
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh', 'custom'],
                                'default' => [
                                    'size' => 0,
                                    'unit' => 'px'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-arrows .pxl-swiper-arrow-next' => 'position: absolute !important; bottom: {{SIZE}}{{UNIT}}; top: auto;',
                                ],
                                'condition' => [
                                    'arrows' => 'true',
                                    'arrow_next_offset_orientation_v' => 'bottom',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrows_on_hover',
                                'label' => esc_html__('Show Arrows on Hover', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'false',
                                'condition' => [
                                    'post_type' => 'post',
                                    'layout_post' => ['post-1'],
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'dots',
                                'label' => esc_html__('Show Dots', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'dots_color',
                                'label' => esc_html__('Dots Color', 'basilico'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'dots' => "true",
                                ],
                            ),
                            array(
                                'name' => 'dots_color_active',
                                'label' => esc_html__('Active Color', 'basilico'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-dots .pxl-swiper-pagination-bullet.swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'dots' => "true",
                                ],
                            ),
                            array(
                                'name' => 'pause_on_hover',
                                'label' => esc_html__('Pause on Hover', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay',
                                'label' => esc_html__('Autoplay', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'autoplay_speed',
                                'label' => esc_html__('Autoplay Speed', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 5000,
                                'condition' => [
                                    'autoplay' => 'true'
                                ]
                            ),
                            array(
                                'name'         => 'gutter',
                                'label'        => esc_html__('Gutter', 'basilico' ),
                                'type'         => 'number',
                                'control_type' => 'responsive',
                                'default'      => 30
                            ),
                            array(
                                'name' => 'center_slide',
                                'label' => esc_html__('Center Slider', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                                'default' => false
                            ),
                            array(
                                'name' => 'infinite',
                                'label' => esc_html__('Infinite Loop', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'speed',
                                'label' => esc_html__('Animation Speed', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 400,
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'display_section',
                    'label' => esc_html__('Display Items Options', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'show_date',
                            'label'     => esc_html__('Show Date', 'basilico' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name'      => 'show_category',
                            'label'     => esc_html__('Show Category', 'basilico' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'show_divider',
                            'label'     => esc_html__('Show Divider', 'basilico' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'show_author',
                            'label'     => esc_html__('Show Author', 'basilico' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name'      => 'show_comment',
                            'label'     => esc_html__('Show Comment', 'basilico' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '',
                            'condition' => [
                                'show_excerpt' => 'true',
                            ],
                        ),
                        array(
                            'name'      => 'show_button',
                            'label'     => esc_html__('Show Button Readmore', 'basilico' ),
                            'type'      => \Elementor\Controls_Manager::SWITCHER,
                            'default'   => 'true',
                        ),
                        array(
                            'name'      => 'button_text',
                            'label'     => esc_html__('Button Text', 'basilico' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button'      => 'true',
                            ],
                        ),
                    ),
                ),

            ),
        ),
    ),
    basilico_get_class_widget_path()
);