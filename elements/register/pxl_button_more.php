<?php
// Register PXL Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_button_more',
        'title'      => esc_html__( 'PXL Button More', 'basilico' ),
        'icon'       => 'eicon-editor-external-link',
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
                            'label' => esc_html__('Style', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-default',
                            'options' => [
                                'style-default' => esc_html__('Default', 'basilico' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Button Text', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Read More', 'basilico'),
                            'placeholder' => esc_html__('Read More', 'basilico'),
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
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-more .btn-more' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_color_hover',
                            'label' => esc_html__('Color Hover', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button-more .btn-more:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        )
    ),
    basilico_get_class_widget_path()
);