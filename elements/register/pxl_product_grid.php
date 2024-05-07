<?php
$pt_supports = ['post','portfolio'];
use Elementor\Controls_Manager;
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_product_grid',
        'title'      => esc_html__('PXL Product Grid', 'basilico' ),
        'icon'       => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts'    => [
            'imagesloaded',
            'isotope',
            'basilico-post-grid',
        ],
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
                                    'image' => get_template_directory_uri() . '/elements/assets/layout-image/pxl_product_grid-1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-product-grid-layout-'
                        )
                    )
                ),
                  
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__( 'Select Query Type', 'basilico' ),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__( 'Recent Products', 'basilico' ),
                                'best_selling'     => esc_html__( 'Best Selling', 'basilico' ),
                                'featured_product' => esc_html__( 'Featured Products', 'basilico' ),
                                'top_rate'         => esc_html__( 'High Rate', 'basilico' ),
                                'on_sale'          => esc_html__( 'On Sale', 'basilico' ),
                                'recent_review'    => esc_html__( 'Recent Review', 'basilico' ),
                                'deals'            => esc_html__( 'Product Deals', 'basilico' ),
                                'separate'         => esc_html__( 'Product separate', 'basilico' ),
                            ]
                        ),
                        array(
                            'name'     => 'taxonomies',
                            'label'    => esc_html__( 'Select Term of Product', 'basilico' ),
                            'type'     => 'select2',
                            'multiple' => true,
                            'options'  => pxl_get_product_grid_term_options()
                        ),
                        array(
                            'name'     => 'product_ids',
                            'label'    => esc_html__( 'Products id (123,124,135...)', 'basilico' ),
                            'type'     => 'text',
                            'default'  => '',
                            'condition' => array( 'query_type' => 'separate' )
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__( 'Post per page', 'basilico' ),
                            'type'     => 'text',
                            'default'  => '10'
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
                                'name'    => 'layout_mode',
                                'label'   => esc_html__( 'Layout Mode', 'basilico' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'fitRows' => esc_html__( 'Basic Grid', 'basilico' ),
                                    'masonry' => esc_html__( 'Masonry Grid', 'basilico' ),
                                ],
                                'default'   => 'fitRows'
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
                                
                            ),
                            array(
                                'name'      => 'filter_default_title',
                                'label'     => esc_html__('Filter Default Title', 'basilico' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('All', 'basilico' ),
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
                                    '{{WRAPPER}} .grid-filter-wrap' => 'justify-content: {{VALUE}};'
                                ]
                            ),
                            array(
                                'name'    => 'pagination_type',
                                'label'   => esc_html__('Pagination Type', 'basilico' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'pagination' => esc_html__('Pagination', 'basilico' ),
                                    'loadmore'   => esc_html__('Loadmore', 'basilico' ),
                                    'false'      => esc_html__('Disable', 'basilico' ),
                                ],
                            ),
                            array(
                                'name'      => 'loadmore_text',
                                'label'     => esc_html__( 'Load More text', 'basilico' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__('Load More','basilico'),
                                'condition' => [
                                    'pagination_type' => 'loadmore'
                                ]
                            ),
                             
                            array(
                                'name'         => 'pagination_alignment',
                                'label'        => esc_html__( 'Pagination Alignment', 'basilico' ),
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
                                    '{{WRAPPER}} .pxl-grid-pagination, {{WRAPPER}} .pxl-load-more' => 'justify-content: {{VALUE}};'
                                ] 
                            ),
                            array(
                                'name' => 'item_padding',
                                'label' => esc_html__('Item Padding', 'basilico' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'default' => [
                                    'top' => '15',
                                    'right' => '15',
                                    'bottom' => '15',
                                    'left' => '15'
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-grid-inner .grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
         
                            array(
                                'name'         => 'gap_extra',
                                'label'        => esc_html__( 'Item Gap Bottom', 'basilico' ),
                                'description'  => esc_html__( 'Add extra space at bottom of each items','basilico'),
                                'type'         => \Elementor\Controls_Manager::NUMBER,
                                'default'      => 0,
                                'control_type' => 'responsive',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-grid-inner .grid-item' => 'margin-bottom: {{VALUE}}px;',
                                ],
                            )
                        ),
                        basilico_elementor_animation_opts([
                            'name'   => 'item',
                            'label' => esc_html__('Item', 'basilico'),
                        ])
                    )
                ),
                array(
                    'name' => 'grid_section',
                    'label' => esc_html__('Grid Settings', 'basilico' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        basilico_grid_column_settings()
                    ),
                ),
            ),
        ),
    ),
    basilico_get_class_widget_path()
);