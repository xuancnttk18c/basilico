<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_mailchimp',
        'title' => esc_html__('PXL Mailchimp', 'basilico'),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'basilico'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Quick Style', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => esc_html__('Default', 'basilico' ),
                                'style-1' => esc_html__('Style 1', 'basilico' ),
                                'style-2' => esc_html__('Style 2', 'basilico' ),
                                'style-3' => esc_html__('Style 3', 'basilico' ),
                                'style-4' => esc_html__('Style 4', 'basilico' ),
                                'style-5' => esc_html__('Style 5', 'basilico' ),
                                'style-6' => esc_html__('Style 6', 'basilico' ),
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'hide_icon',
                            'label' => esc_html__('Hide Icon', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false
                        ),
                        array(
                            'name' => 'input_background',
                            'label' => esc_html__('Input Background', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mailchimp-form input' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_text_color',
                            'label' => esc_html__('Input Text Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mailchimp-form input' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_border_color',
                            'label' => esc_html__('Input Border Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mailchimp-form input' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mailchimp-form button' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_background',
                            'label' => esc_html__('Icon Background', 'basilico' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .mailchimp-form button' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);