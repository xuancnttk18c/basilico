<?php
// Register Fancy Box Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_fancy_box',
        'title'      => esc_html__( 'PXL Fancy Box', 'basilico' ),
        'icon'       => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'basilico' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'basilico' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-1.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-1.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_fancy_box-1.jpg'
                                ],
                            ],
                        )
                    )
                ),
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content', 'basilico' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'             => 'selected_icon',
                            'label'            => esc_html__( 'Icon', 'basilico' ),
                            'type'             => 'icons',
                            'default'          => [
                                'library' => 'flaticon',
                                'value'   => 'flaticon-calling'
                            ],
                        ),
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-fancy-box .box-icon > svg' => 'width: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Icon Margin', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-fancy-box .box-icon svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name'  => 'content_max_width',
                            'label' => esc_html__( 'Max Width', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 150,
                                    'max' => 1200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'     => 'title',
                            'label'    => esc_html__('Title', 'basilico'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Your Title', 'basilico')
                        ),
                        array(
                            'name'     => 'description',
                            'label'    => esc_html__('Description', 'basilico'),
                            'type'     => 'textarea',
                            'default'  => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'basilico'),
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'basilico'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout'    => ['2']
                            ]
                        ),
                        array(
                            'name'        => 'link',
                            'label'       => esc_html__( 'Custom Link', 'basilico' ),
                            'type'        => 'url',
                            'placeholder' => esc_html__( 'https://your-link.com', 'basilico' ),
                            'default'     => [
                                'url'         => '#',
                                'is_external' => 'on'
                            ],
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_background',
                            'label' => esc_html__('Icon Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-icon' => 'background-color: {{VALUE}};'
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__( 'Icon Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-icon i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-fancy-box .box-icon svg' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-fancy-box .box-title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-fancy-box .box-title',
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__( 'Description Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'label' => esc_html__('Description Typography', 'basilico' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-fancy-box .box-description',
                        ),
                        array(
                            'name' => 'box_background',
                            'label' => esc_html__('Box Background', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .box-inner' => 'background-color: {{VALUE}};'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'btn_style',
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
                            'condition' => [
                                'layout'    => ['2']
                            ]
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Button Text Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .btn' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout'    => ['2']
                            ]
                        ),
                        array(
                            'name' => 'btn_color_hover',
                            'label' => esc_html__('Button Text Color Hover', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .btn:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout'    => ['2']
                            ]
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Button Background Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .btn' => 'background-image: none; background-color: {{VALUE}}; border-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-fancy-box .btn::after' => 'background-image: none; background-color: {{VALUE}};'
                            ],
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Button Background Color Hover', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-fancy-box .btn:hover' => 'border-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-fancy-box .btn:hover::before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                    ),
                ),
            )
        )
    ),
    basilico_get_class_widget_path()
);