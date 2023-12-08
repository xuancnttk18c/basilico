<?php
// Register PXL Widget
$theme_style = basilico()->get_theme_opt('theme_style', 'default');
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_button',
        'title'      => esc_html__( 'PXL Button', 'basilico' ),
        'icon'       => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params'     => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Button Styles', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'basilico' ),
                                'btn-gradient' => esc_html__('Gradient', 'basilico' ),
                                'btn-white' => esc_html__('White', 'basilico' ),
                                'btn-fullwidth' => esc_html__('Full Width', 'basilico' ),
                                'btn-outline' => esc_html__('Out Line', 'basilico' ),
                                'btn-outline-secondary' => esc_html__('Out Line Secondary', 'basilico' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Button Text', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click here', 'basilico'),
                            'placeholder' => esc_html__('Click here', 'basilico'),
                        ),
                        array(
                            'name' => 'button_url_type',
                            'label' => esc_html__('Link Type', 'basilico'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options'       => [
                                'url'   => esc_html__('URL', 'basilico'),
                                'page'  => esc_html__('Existing Page', 'basilico'),
                            ],
                            'default'       => 'url',
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'basilico'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'basilico' ),
                            'condition'     => [
                                'button_url_type'     => 'url',
                            ],
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'page_link',
                            'label' => esc_html__('Existing Page', 'basilico'),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'options'       => pxl_get_all_page(),
                            'condition'     => [
                                'button_url_type'     => 'page',
                            ],
                            'multiple'      => false,
                            'label_block'   => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'icon_section',
                    'label' => esc_html__('Icon Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'basilico' ),
                            'type' => 'icons',
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'right',
                            'options' => [
                                'right' => esc_html__('After', 'basilico' ),
                                'left' => esc_html__('Before', 'basilico' ),
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Space Left', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-wrapper .icon-ps-right .pxl-button-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Space Right', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-wrapper .icon-ps-left .pxl-button-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-wrapper .pxl-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'text_align',
                                'label' => esc_html__('Alignment', 'basilico' ),
                                'type' => 'choose',
                                'control_type' => 'responsive',
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Start', 'basilico' ),
                                        'icon' => 'eicon-text-align-left',
                                    ],
                                    'center' => [
                                        'title' => esc_html__( 'Center', 'basilico' ),
                                        'icon' => 'eicon-text-align-center',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'End', 'basilico' ),
                                        'icon' => 'eicon-text-align-right',
                                    ]
                                ],
                                'prefix_class' => 'elementor-align-',
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper' => 'justify-content: {{VALUE}};'
                                ],
                            ),
                            array(
                                'name' => 'btn_padding',
                                'label' => esc_html__('Padding', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'typography',
                                'label' => esc_html__('Typography', 'basilico' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-button-wrapper .btn',
                            ),
                            array(
                                'name' => 'btn_color',
                                'label' => esc_html__('Text Color', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_color_hover',
                                'label' => esc_html__('Text Color Hover', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_color_icon',
                                'label' => esc_html__('Icon Color', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn .pxl-button-icon' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_color_icon_hover',
                                'label' => esc_html__('Icon Color Hover', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn:hover .pxl-button-icon' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color',
                                'label' => esc_html__('Background Color', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'background-image: none; background-color: {{VALUE}}; border-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-button-wrapper .btn::after' => 'background-image: none; background-color: {{VALUE}};'
                                ],
                                'condition' => [
                                    'style!' => ['btn-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color_2',
                                'label' => esc_html__('Background Color 2', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'background-image: none; background-color: {{VALUE}}; border-color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-button-wrapper .btn::after' => 'background-image: none; background-color: {{VALUE}};'
                                ],
                                'condition' => [
                                    $theme_style => 'pxl-pizza',
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color_hover',
                                'label' => esc_html__('Background Color Hover', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn:hover' => 'border-color: {{VALUE}};',
                                    'body:not(.pxl-pizza) {{WRAPPER}} .pxl-button-wrapper .btn:hover:before' => 'background-color: {{VALUE}};',
                                    'body.pxl-pizza {{WRAPPER}} .pxl-button-wrapper .btn:hover' => 'background-color: {{VALUE}};'
                                ],
                                'condition' => [
                                    'style!' => ['btn-gradient'],
                                ],
                            ),
                        ),
                        basilico_gradient_option( [
                            'prefix' => 'background',
                            'selectors_class' => '.pxl-button-wrapper .btn',
                            'return_value' => 'gradient01',
                            'condition' => ['style' => 'btn-gradient']
                        ]),
                        array(
                            array(
                                'name' => 'border_type',
                                'label' => esc_html__( 'Border Type', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'basilico' ),
                                    'solid' => esc_html__( 'Solid', 'basilico' ),
                                    'double' => esc_html__( 'Double', 'basilico' ),
                                    'dotted' => esc_html__( 'Dotted', 'basilico' ),
                                    'dashed' => esc_html__( 'Dashed', 'basilico' ),
                                    'groove' => esc_html__( 'Groove', 'basilico' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'border-style: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color',
                                'label' => esc_html__( 'Border Color', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'border-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                            array(
                                'name' => 'btn_border_radius',
                                'label' => esc_html__('Border Radius', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button-wrapper .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        )
                    ),
                ),
            ),
        )
    ),
    basilico_get_class_widget_path()
);