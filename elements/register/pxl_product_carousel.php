<?php
$pt_supports = ['post', 'portfolio'];
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_product_carousel',
        'title'      => esc_html__('PXL Product Carousel', 'basilico'),
        'icon' => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'swiper',
            'basilico-swiper',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__('Layout', 'basilico'),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__('Templates', 'basilico'),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'basilico'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_product_carousel-1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-product-carousel-layout-'
                        )
                    )
                ),

                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__('Select Query Type', 'basilico'),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__('Recent Products', 'basilico'),
                                'best_selling'     => esc_html__('Best Selling', 'basilico'),
                                'featured_product' => esc_html__('Featured Products', 'basilico'),
                                'top_rate'         => esc_html__('High Rate', 'basilico'),
                                'on_sale'          => esc_html__('On Sale', 'basilico'),
                                'recent_review'    => esc_html__('Recent Review', 'basilico'),
                                'deals'            => esc_html__('Product Deals', 'basilico'),
                                'separate'         => esc_html__('Product separate', 'basilico'),
                            ]
                        ),
                        array(
                            'name'     => 'taxonomies',
                            'label'    => esc_html__('Select Term of Product', 'basilico'),
                            'type'     => 'select2',
                            'multiple' => true,
                            'options'  => pxl_get_product_grid_term_options()
                        ),
                        array(
                            'name'     => 'product_ids',
                            'label'    => esc_html__('Products id (123,124,135...)', 'basilico'),
                            'type'     => 'text',
                            'default'  => '',
                            'condition' => array('query_type' => 'separate')
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__('Post per page', 'basilico'),
                            'type'     => 'text',
                            'default'  => '10'
                        )
                    ),
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
                                'options' => [
                                    'default' => esc_html('Default', 'basilico'),
                                    'absolute' => esc_html('Custom', 'basilico'),
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_orientation_h',
                                'label' => esc_html__('Horizontal Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'left',
                                'control_type' => 'responsive',
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-prev' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
                                ],
                                'condition' => [
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-prev' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                                ],
                                'condition' => [
                                    'arrow_prev_offset_orientation_h' => 'right',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_prev_offset_orientation_v',
                                'label' => esc_html__('Vertical Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'top',
                                'control_type' => 'responsive',
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-prev' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
                                ],
                                'condition' => [
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-prev' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
                                ],
                                'condition' => [
                                    'arrow_prev_offset_orientation_v' => 'bottom',
                                    'arrow_prev_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_position',
                                'label' => esc_html__('Arrow Next Position', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'default',
                                'options' => [
                                    'default' => esc_html('Default', 'basilico'),
                                    'absolute' => esc_html('Custom', 'basilico'),
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_orientation_h',
                                'label' => esc_html__('Horizontal Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'left',
                                'control_type' => 'responsive',
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-next' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
                                ],
                                'condition' => [
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-next' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                                ],
                                'condition' => [
                                    'arrow_next_offset_orientation_h' => 'right',
                                    'arrow_next_position' => 'absolute',
                                ],
                            ),
                            array(
                                'name' => 'arrow_next_offset_orientation_v',
                                'label' => esc_html__('Vertical Orientation', 'basilico'),
                                'type' => \Elementor\Controls_Manager::CHOOSE,
                                'default' => 'top',
                                'control_type' => 'responsive',
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-next' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
                                ],
                                'condition' => [
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
                                    '{{WRAPPER}} .nav-out-vertical .pxl-swiper-arrow-next' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
                                ],
                                'condition' => [
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
                                    'arrows' => 'true'
                                ]
                            ),
                            array(
                                'name' => 'dots',
                                'label' => esc_html__('Show Dots', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
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
                                'name' => 'infinite',
                                'label' => esc_html__('Infinite Loop', 'basilico'),
                                'type' => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name' => 'speed',
                                'label' => esc_html__('Animation Speed', 'basilico'),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => 500,
                            ),
                        ),
                        basilico_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item', 'basilico'),
                        ])
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);
