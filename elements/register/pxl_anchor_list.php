<?php
$templates_df = [
    0 => esc_html__('None', 'basilico'),
    'cart-dropdown' => esc_html__('Cart Dropdown', 'basilico'),
    'cart-canvas' => esc_html__('Cart Canvas', 'basilico'),
    'cart-page' => esc_html__('Cart Page', 'basilico')
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-anchor-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor' => 'color: {{VALUE}};'
                            ],
                        ), 
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Hover Color', 'basilico' ),
                            'type' => 'color',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-list.layout-1 .pxl-anchor:before' => 'background-color: {{VALUE}};'
                            ],
                        ),
                    ),
                )
            )
        )
    ),
    basilico_get_class_widget_path()
);