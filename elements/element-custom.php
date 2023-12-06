<?php

add_action( 'elementor/element/section/section_structure/after_section_end', 'basilico_add_custom_section_controls' );
add_action( 'elementor/element/column/layout/after_section_end', 'basilico_add_custom_columns_controls' );
function basilico_add_custom_section_controls( \Elementor\Element_Base $element) {

	$element->start_controls_section(
		'section_pxl',
		[
			'label' => esc_html__( 'Basilico Settings', 'basilico' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
    if ( get_post_type( get_the_ID()) === 'pxl-template' && get_post_meta( get_the_ID(), 'template_type', true ) === 'header') {

        $element->add_control(
            'pxl_header_type',
            [
                'label' => esc_html__( 'Header Type', 'basilico' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''          => esc_html__( 'Select Type', 'basilico' ),
                    'main-sticky'       => esc_html__( 'Header Main & Sticky', 'basilico' ),
                    'sticky'      => esc_html__( 'Header Sticky', 'basilico' ),
                    'transparent' => esc_html__( 'Header Transparent', 'basilico' ),
                ),
                'default'      => '',
            ]
        );
    }
    if ( get_post_type( get_the_ID()) === 'pxl-template' && get_post_meta( get_the_ID(), 'template_type', true ) === 'header-mobile') {
        $element->add_control(
            'pxl_header_mobile_type',
            [
                'label' => esc_html__( 'Header Type', 'basilico' ),
                'type'  => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''          => esc_html__( 'Select Type', 'basilico' ),
                    'main-sticky'       => esc_html__( 'Main & Sticky', 'basilico' ),
                    'sticky'      => esc_html__( 'Sticky', 'basilico' ),
                    'transparent' => esc_html__( 'Transparent', 'basilico' ),
                ),
                'default'      => '',
            ]
        );
    }

    $element->add_control(
        'pxl_section_offset',
        [
            'label' => esc_html__( 'Section Offset', 'basilico' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'prefix_class' => 'pxl-section-offset-',
            'hide_in_inner' => true,
            'options'      => array(
                'none'    => esc_html__( 'None', 'basilico' ),
                'left'   => esc_html__( 'Left', 'basilico' ),
                'right'     => esc_html__( 'Right', 'basilico' ),
            ),
            'default'      => 'none',
            'condition' => [
                'layout' => 'full_width'
            ]
        ]
    );

    $element->add_control(
        'pxl_container_width',
        [
            'label' => esc_html__( 'Container Width', 'basilico' ),
            'type'         => \Elementor\Controls_Manager::SELECT,
            'prefix_class' => 'pxl-container-width-',
            'hide_in_inner' => true,
            'options'      => array(
                'container-1200'    => esc_html__( '1200px', 'basilico' ),
                'container-1570'    => esc_html__( '1570px', 'basilico' )
            ),
            'default'      => 'container-1200',
            'condition' => [
                'layout' => 'full_width',
                'pxl_section_offset!' => 'none'
            ]
        ]
    );

	$element->end_controls_section();
};
function basilico_add_custom_columns_controls( \Elementor\Element_Base $element) {
	$element->start_controls_section(
		'columns_pxl',
		[
			'label' => esc_html__( 'Basilico Settings', 'basilico' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
	$element->add_control(
		'pxl_col_auto',
		[
            'label'   => esc_html__( 'Element Auto Width', 'basilico' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'default'           => esc_html__( 'Default', 'basilico' ),
                'auto'   => esc_html__( 'Auto', 'basilico' ),
            ),
            'control_type' => 'responsive',
            'label_block'  => true,
            'default'      => 'default',
            'prefix_class' => 'pxl-column-element-'
		]
	);

	$element->end_controls_section();
}

//* Additional Shape Divider
if (!function_exists('basilico_additional_shapes_divider')) {
    add_filter('elementor/shapes/additional_shapes', 'basilico_additional_shapes_divider', 11, 1);
    function basilico_additional_shapes_divider($additional_shapes){
        $additional_shapes['pxl-waves'] = [
            'title' => _x( 'PXL Waves', 'Shapes', 'basilico' ),
            'has_negative' => true,
            'has_flip' => true,
            'height_only' => false,
            'url' => get_template_directory_uri() . '/elements/assets/dividers/wave_animated.svg',
            'path' => get_template_directory() . '/elements/assets/dividers/wave_animated.svg'
        ];
        return $additional_shapes;
    }
}

//* Animation
add_action( 'elementor/element/after_add_attributes', 'basilico_custom_el_attributes', 10, 1 );
function basilico_custom_el_attributes($el){
    $settings = $el->get_settings();
    $_animation = ! empty( $settings['_animation'] );
    $animation = ! empty( $settings['animation'] );
    $has_animation = $_animation && 'none' !== $settings['_animation'] || $animation && 'none' !== $settings['animation'];
    if ( $has_animation ) {
        $is_static_render_mode = \Elementor\Plugin::$instance->frontend->is_static_render_mode();
        if ( ! $is_static_render_mode ) {
            // Hide the element until the animation begins
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-elementor-animate' );
        }
    }
    if( 'section' == $el->get_name() ) {
        if ( isset( $settings['pxl_header_type'] ) && !empty($settings['pxl_header_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-'.$settings['pxl_header_type']);
        }
        if ( isset( $settings['pxl_header_mobile_type'] ) && !empty($settings['pxl_header_mobile_type'] ) ) {
            $el->add_render_attribute( '_wrapper', 'class', 'pxl-header-mobile-'.$settings['pxl_header_mobile_type']);
        }
    }
}

//Image Parallax add control
add_action('elementor/element/common/_section_style/after_section_end', 'basilico_add_custom_common_controls');
function basilico_add_custom_common_controls(\Elementor\Element_Base $element){
    $element->start_controls_section(
        'section_pxl_widget_el',
        [
            'label' => esc_html__( 'Pxl Parallax', 'basilico' ),
            'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_pos_x',
        [
            'label' => esc_html__( 'X Position', 'basilico' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            //'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
        ]
    );
    $element->add_responsive_control(
        'pxl_parallax_pos_y',
        [
            'label' => esc_html__( 'Y Position', 'basilico' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            //'hide_in_inner' => true,
            'size_units' => [ 'px', 'em', '%', 'vw' ],
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => -800,
                    'max' => 800,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                ],
                'vw' => [
                    'min' => -100,
                    'max' => 100,
                ],
            ],
        ]
    );

    $element->end_controls_section();
}

//widget render
add_filter('elementor/widget/before_render_content','basilico_custom_widget_el_before_render', 10, 1 );
function basilico_custom_widget_el_before_render($el){
    $settings = $el->get_settings();
    $effects = [];
    if(!empty($settings['pxl_parallax_pos_x']['size']) || !empty($settings['pxl_parallax_pos_y']['size'])){
        $el->add_render_attribute( '_wrapper', 'class', 'pxl-element-parallax' );
        if(!empty($settings['pxl_parallax_pos_x'])){
            $effects['x'] = $settings['pxl_parallax_pos_x']['size'].$settings['pxl_parallax_pos_x']['unit'];
        }
        if(!empty($settings['pxl_parallax_pos_y'])){
            $effects['y'] = $settings['pxl_parallax_pos_y']['size'].$settings['pxl_parallax_pos_y']['unit'];
        }
        $data_parallax = json_encode($effects);
        $el->add_render_attribute( '_wrapper', 'data-parallax', $data_parallax );
    }
}

// Particles effect
add_action( 'elementor/element/section/section_structure/after_section_end', 'basilico_add_custom_section_particles' );
function basilico_add_custom_section_particles( \Elementor\Element_Base $element) {
    $element->start_controls_section(
        'section_particles',
        [
            'label' => esc_html__( 'Basilico Particles', 'asri' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'row_particles_display',
        [
            'label'   => esc_html__( 'Particles', 'asri' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ]
    );

    $element->add_control(
        'number',
        [
            'label' => esc_html__('Number', 'asri'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 4,
            'condition' => [
                'row_particles_display' => ['yes'],
            ],
        ]
    );

    $element->add_control(
        'size',
        [
            'label' => esc_html__('Size', 'asri'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 3,
            'condition' => [
                'row_particles_display' => ['yes'],
            ],
        ]
    );

    $element->add_control(
        'size_random',
        [
            'label' => esc_html__('Size Random', 'asri'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
            'condition' => [
                'row_particles_display' => ['yes'],
            ],
        ]
    );

    $element->add_control(
        'move_direction',
        [
            'label'   => esc_html__( 'Move Direction', 'asri' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'None', 'asri' ),
                'top'        => esc_html__( 'Top', 'asri' ),
                'top-right'        => esc_html__( 'Top Right', 'asri' ),
                'right'        => esc_html__( 'Right', 'asri' ),
                'bottom-right'        => esc_html__( 'Bottom Right', 'asri' ),
                'bottom'        => esc_html__( 'Bottom', 'asri' ),
                'bottom-left'        => esc_html__( 'Bottom Left', 'asri' ),
                'left'        => esc_html__( 'Left', 'asri' ),
                'top-left'        => esc_html__( 'Top Left', 'asri' ),
            ),
            'default'      => 'none',
            'condition' => [
                'row_particles_display' => ['yes'],
            ],
        ]
    );
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'particle_color',
        [
            'label' => esc_html__('Color', 'basilico' ),
            'type' => \Elementor\Controls_Manager::COLOR,
        ]
    );
    $element->add_control(
        'particle_color_item',
        [
            'label' => esc_html__('Color', 'basilico'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'condition' => [
                'row_particles_display' => ['yes'],
            ],
        ]
    );
    $element->end_controls_section();
};

add_filter( 'pxl-custom-section/before-render', 'basilico_custom_section_before_render', 10, 3 );
function basilico_custom_section_before_render($html ,$settings, $el) {
    if(!empty($settings['row_particles_display']) && $settings['row_particles_display'] == 'yes') {
        wp_enqueue_script('particles-background');
        $s_random = '';
        if($settings['size_random'] == 'yes') {
            $s_random = 'true';
        } else {
            $s_random = 'false';
        }
        $colors = [];
        foreach($settings['particle_color_item'] as $values) {
            $colors[] = $values['particle_color'];
        }
        if(empty($colors)) {
            $colors = ["#b73490","#006b41","#cd3000","#608ecb","#ffb500","#6e4e00","#6b541b","#305686","#00ffb4","#8798ff","#0044c1"];
        }
        $el->add_render_attribute( 'color', 'data-color', json_encode($colors) );
        $html = '<div id="pxl-row-particles-'.uniqid().'" class="pxl-row-particles" data-number="'.$settings['number'].'" data-size="'.$settings['size'].'" data-size-random="'.$s_random.'" data-move-direction="'.$settings['move_direction'].'" '.$el->get_render_attribute_string( 'color' ).'></div>';
        return $html;
    }
}