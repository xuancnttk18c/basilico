<?php
$templates_df = [
    0 => esc_html__('None', 'basilico'),
    'cart-dropdown' => esc_html__('Cart Dropdown', 'basilico')
];
$templates = $templates_df + basilico_get_templates_option('hidden-panel');

pxl_add_custom_widget(
    array(
        'name'       => 'pxl_anchor_list',
        'title'      => esc_html__( 'PXL Anchor List', 'basilico' ),
        'icon'       => 'eicon-anchor',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'basilico' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'basilico' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_banner_carousel-1.jpg'
                                ],
                            ],
                        ),
                        
                    ),
                ),
                array(
                    'name'     => 'icon_section',
                    'label'    => esc_html__( 'Settings', 'basilico' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name' => 'anchors',
                            'label' => esc_html__('', 'basilico'),
                            'type' => 'repeater',
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'template',
                                    'label' => esc_html__('Select Templates', 'basilico'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df' 
                                ),
                                array(
                                    'name'             => 'selected_icon',
                                    'label'            => esc_html__( 'Icon', 'basilico' ),
                                    'type'             => 'icons',
                                    'default'          => [
                                        'library' => 'pxli',
                                        'value'   => 'pxli-search-400'
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name'  => 'icon_size',
                            'label' => esc_html__( 'Icon Size(px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['icon_type' => 'lib'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-anchor-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'icon_size_custom',
                            'label' => esc_html__( 'Icon Size(px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['icon_type' => 'custom-2'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon.custom-2' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'  => 'dot_size_custom',
                            'label' => esc_html__( 'Dot Size(px)', 'basilico' ),
                            'type'  => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['icon_type' => 'custom-2'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon.custom-2 span' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_margin',
                            'label' => esc_html__('Icon Margin(px)', 'basilico' ),
                            'type' => 'dimensions',
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => ['icon_type!' => 'none'],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom-2 span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-icon svg' => 'fill: {{VALUE}};',
                            ],
                        ), 
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Hover Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom.pxl-bars:hover span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-wrap .pxl-anchor-icon.custom-2.pxl-bars:hover span' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor:hover pxl-anchor-icon svg' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'align',
                            'label'        => esc_html__( 'Alignment', 'basilico' ),
                            'type'         => 'choose',
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-wrap' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
                )
            )
        )
    ),
    basilico_get_class_widget_path()
);