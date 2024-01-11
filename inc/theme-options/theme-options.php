<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = basilico()->get_option_name();
$version = basilico()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',  
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'basilico'),
    'page_title'           => esc_html__('Theme Options', 'basilico'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', 
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

//* General
Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'basilico'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'          => 'theme_style',
            'type'        => 'select',
            'title'       => esc_html__('Theme Style', 'basilico'),
            'options'  => array(
                'default' => esc_html__('Default', 'basilico'),
                'pxl-luxury' => esc_html__('Luxury', 'basilico'),
                'pxl-pizza' => esc_html__('Pizza', 'basilico'),
            ),
            'default'     => 'default',
        ),
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'basilico'),
            'default' => ''
        ),
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Site Loader', 'basilico'),
            'default'  => false
        ),
        array(
            'id'          => 'site_loader_style',
            'type'        => 'select',
            'title'       => esc_html__('Loading Style', 'basilico'),
            'options'  => array(
                'default' => esc_html__('Default', 'basilico'),
                'gif_image'  => esc_html__('Image or Gif', 'basilico'),
            ),
            'default'     => 'default',
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
            'force_output' => true
        ),
        array(
            'id'       => 'loader_image',
            'type'     => 'media',
            'title'    => esc_html__('Select Image', 'basilico'),
            'default'  => '',
            'required' => array( 0 => 'site_loader_style', 1 => 'equals', 2 => 'gif_image' ),
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'basilico'),
            'default'  => false
        ),
        array(
            'id'        => 'custom_cursor',
            'type'      => 'switch',
            'title'     => esc_html__('Custom Cursor', 'finsa'),
            'subtitle'  => esc_html__('Custom default cursor.', 'finsa'),
            'default'   => false
        ),
    )
));

//* Colors
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'basilico'),
    'icon'   => 'el el-adjust',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'basilico'),
            'transparent' => false,
            'default'     => '#e6c9a2'
        ), 
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'basilico'),
            'transparent' => false,
            'default'     => '#0e1927'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'basilico'),
            'default' => array(
                'regular' => '',
                'hover'   => '#e6c9a2',
                'active'  => '#e6c9a2'
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'gradient_color_01',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color 01', 'basilico'),
            'transparent' => false,
            'gradient-angle' => true,
            'default'  => array(
                'from' => '#121212',
                'to'   => '#3c3c3c',
                'gradient-angle' => 180,
            ),
        ),
        array(
            'id'          => 'gradient_color_02',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color 02', 'basilico'),
            'transparent' => false,
            'gradient-angle' => true,
            'default'  => array(
                'from' => '#443b7f',
                'to'   => '#7b7bcf',
                'gradient-angle' => 180,
            ),
        ),
        array(
            'id'          => 'additional_color_01',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 01', 'basilico'),
            'transparent' => false,
            'default'     => '#fbf5ee'
        ),
        array(
            'id'          => 'additional_color_02',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 02', 'basilico'),
            'transparent' => false,
            'default'     => '#6565b7'
        ),
        array(
            'id'          => 'additional_color_03',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 03', 'basilico'),
            'transparent' => false,
            'default'     => '#383169'
        ),
        array(
            'id'          => 'additional_color_04',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 04', 'basilico'),
            'transparent' => false,
            'default'     => '#5959a6'
        ),
        array(
            'id'          => 'additional_color_05',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 05', 'basilico'),
            'transparent' => false,
            'default'     => '#faa952'
        ),
        array(
            'id'          => 'divider_color',
            'type'        => 'color_rgba',
            'title'       => esc_html__('Divider Color', 'basilico'),
            'transparent' => false,
            'default'     => array(
                'color'     => '#c8c8c8',
                'alpha'     => 0.6
            )
        ),
    )
));

//* Header
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'basilico'),
    'icon'   => 'el-icon-website',
    'fields' => array_merge(
        basilico_header_opts() 
    )
));

//* Page Title
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'basilico'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        basilico_page_title_opts(),
        array(
            array(
                'id'             => 'page_title_margin',
                'type'           => 'spacing',
                'output'         => array('.pxl-pagetitle'),
                'mode'           => 'margin',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Margin', 'basilico'),
                'default'        => array(
                    'padding-top'    => '',
                    'padding-bottom' => '',
                    'padding-left'    => '',
                    'padding-right'    => '',
                    'units'          => 'px',
                ),
            ),
        ),
    )
));

//* WordPress default content
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Content', 'basilico'),
    'icon'   => 'el-icon-pencil',
    'fields' => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'basilico'),
            'subtitle' => esc_html__('Content background color.', 'basilico'),
            'output'   => array('background-color' => '.pxl-main')
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('.pxl-main'),
            'right'          => false,
            'left'           => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'basilico'),
            'desc'           => esc_html__('Default: Top-135x, Bottom-135px', 'basilico'),
            'default'        => array(
                'padding-top'    => '',
                'padding-bottom' => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'       => 'sidebar_sticky',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Sticky', 'basilico'),
            'options'  => array(
                '0' => esc_html__('Default', 'basilico'),
                '1' => esc_html__('Sticky', 'basilico'),
            ),
            'default'  => '1'
        ),
        array(
            'id'      => 'archive_pagination_style',
            'type'    => 'image_select',
            'title'   => esc_html__('Pagination Style', 'basilico'),
            'options'  => array(
                'style-df' => get_template_directory_uri() . '/assets/images/pagination_layout/p1.jpg',
                'style-2'  => get_template_directory_uri() . '/assets/images/pagination_layout/p2.jpg',
                'style-3'  => get_template_directory_uri() . '/assets/images/pagination_layout/p3.jpg',
            ),
            'default' => 'style-df'
        ),
        array(
            'id'      => 'tab_style',
            'type'    => 'image_select',
            'title'   => esc_html__('Tab Style', 'basilico'),
            'options'  => array(
                'style-df' => get_template_directory_uri() . '/assets/images/tabs_layout/t1.jpg',
                'style-2'  => get_template_directory_uri() . '/assets/images/tabs_layout/t2.jpg',
            ),
            'default' => 'style-df'
        )
    )
));

//* Archive Post
Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'basilico'),
    'icon'  => 'el-icon-list',
    'subsection' => true,
    'fields'     => array_merge(
        basilico_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'basilico'),
                'subtitle' => esc_html__('Display the Author for each blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'basilico'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_category',
                'title'    => esc_html__('Category', 'basilico'),
                'subtitle' => esc_html__('Display the Category for each blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_tag',
                'title'    => esc_html__('Tags', 'basilico'),
                'subtitle' => esc_html__('Display the Tags for each blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'archive_readmore',
                'title'    => esc_html__('Readmore Button', 'basilico'),
                'subtitle' => esc_html__('Display the Readmore button for each blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'basilico'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'basilico'),
                'required' => array('archive_readmore', '=', true)
            ),
        )
    )
));

//* Single Post
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'basilico'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'single_post_title_layout',
                'type'     => 'button_set',
                'title'    => esc_html__('Post title layout', 'basilico'),
                'options'  => array(
                    '0' => esc_html__('Default', 'basilico'),
                    '1' => esc_html__('Custom Post Title', 'basilico'),
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'post_custom_title',
                'title'    => esc_html__('Custom Post Title', 'basilico'),
                'subtitle' => esc_html__('Show custom post title instead of post title.', 'basilico'),
                'type'     => 'text',
                'default'  => esc_html__('Blog details', 'basilico'),
                'required'      => [ 'single_post_title_layout', '=', '1']
            ),
        ),
        basilico_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'post_feature_image_on',
                'title'    => esc_html__('Feature Image', 'basilico'),
                'subtitle' => esc_html__('Show feature image on single post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_feature_image_type',
                'type'     => 'button_set',
                'title'    => esc_html__('Feature Image Type', 'basilico'),
                'subtitle' => esc_html__('Feature image Type on single post.', 'basilico'),
                'options' => array(
                    'cropped'  => esc_html__('Cropped Image', 'basilico'),
                    'full'  => esc_html__('Full Image', 'basilico')
                ),
                'default' => 'full',
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'basilico'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_date_on',
                'title'    => esc_html__('Date', 'basilico'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_comments_on',
                'title'    => esc_html__('Post Comments', 'basilico'),
                'subtitle' => esc_html__('Display the Comment form for blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '1',
            ),
            array(
                'id'       => 'post_comments_button',
                'type'     => 'select',
                'title'    => esc_html__('Post Comments Button Style', 'basilico'),
                'subtitle' => esc_html__('Select button style for comment form.', 'basilico'),
                'options' => array(
                    'btn-default' => esc_html__('Default', 'basilico' ),
                    'btn-white' => esc_html__('White', 'basilico' ),
                    'btn-fullwidth' => esc_html__('Full Width', 'basilico' ),
                    'btn-outline' => esc_html__('Out Line', 'basilico' ),
                    'btn-outline-secondary' => esc_html__('Out Line Secondary', 'basilico' ),
                    'btn-additional-1' => esc_html__('Additional Button 01', 'basilico' ),
                    'btn-additional-2' => esc_html__('Additional Button 02', 'basilico' ),
                    'btn-additional-3' => esc_html__('Additional Button 03', 'basilico' ),
                    'btn-additional-4' => esc_html__('Additional Button 04', 'basilico' ),
                    'btn-additional-5' => esc_html__('Additional Button 05', 'basilico' ),
                    'btn-additional-6' => esc_html__('Additional Button 06', 'basilico' ),
                ),
                'default' => 'btn-outline',
                'required' => [
                   'post_comments_on',
                   'equals',
                   '1' 
                ]
            ),
            array(
                'id'       => 'post_categories_on',
                'title'    => esc_html__('Categories', 'basilico'),
                'subtitle' => esc_html__('Display the Category for blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '1'
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'basilico'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '0'
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social Share', 'basilico'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '0',
            ),
            array(
                'id'       => 'post_social_share_icon',
                'type'     => 'button_set',
                'title'    => esc_html__('Select Social Share', 'basilico'),
                'subtitle' => esc_html__('Show social share on single post.', 'basilico'),
                'multi'    => '1',
                'options' => array(
                    'facebook'  => esc_html__('Facebook', 'basilico'),
                    'twitter'   => esc_html__('Twitter', 'basilico'),
                    'linkedin'  => esc_html__('Linkedin', 'basilico'),
                    'pinterest' => esc_html__('Pinterest', 'basilico'),
                ), 
                'default' => array('facebook', 'twitter', 'linkedin', 'pinterest'),
                'required' => [
                   'post_social_share',
                   'equals',
                   '1' 
                ]
            ),
            array(
                'id'       => 'post_navigation',
                'title'    => esc_html__('Navigation', 'basilico'),
                'subtitle' => esc_html__('Display the Navigation for blog post.', 'basilico'),
                'type'     => 'switch',
                'default'  => '1',
            ),
        )
    )
));

//* Post Type
Redux::setSection($opt_name, array(
    'title' => esc_html__('Post Types', 'basilico'),
    'desc' => esc_html__('Theme custom post type', 'basilico'),
    'icon' => 'el el-folder-open',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'pxl_portfolio_slug',
            'type' => 'text',
            'title' => esc_html__('Portfolio Slug', 'basilico'),
            'subtitle' => esc_html__('The slug name cannot be the same as a page name. Make sure to regenertate permalinks, after making changes.', 'basilico'),
            'default' => '',
        ),
        array(
            'id' => 'pxl_portfolio_label',
            'type' => 'text',
            'title' => esc_html__('Portfolio Label', 'basilico'),
            'subtitle' => esc_html__('Name of the post type shown in the menu, breadcrumb...', 'basilico'),
            'default' => '',
        ),
        array(
            'id'      => 'pxl_portfolio_archive_link',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Archive Link', 'basilico'),
            'subtitle' => esc_html__('Custom default archive link when customer click on breadcrumb, default layout same blog post archive.', 'basilico'),
            'default' => '',
        ),
        array(
            'id' => 'pxl_service_slug',
            'type' => 'text',
            'title' => esc_html__('Service Slug', 'basilico'),
            'subtitle' => esc_html__('The slug name cannot be the same as a page name. Make sure to regenertate permalinks, after making changes.', 'basilico'),
            'default' => '',
        ),
        array(
            'id' => 'pxl_service_label',
            'type' => 'text',
            'title' => esc_html__('Service Label', 'basilico'),
            'subtitle' => esc_html__('Name of the post type shown in the menu, breadcrumb...', 'basilico'),
            'default' => '',
        ),
        array(
            'id'      => 'pxl_service_archive_link',
            'type'    => 'text',
            'title'   => esc_html__('Service Archive Link', 'basilico'),
            'subtitle' => esc_html__('Custom default archive link when customer click on breadcrumb, default layout same blog post archive.', 'basilico'),
            'default' => '',
        ),
    )
));

//* Input
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Input Form', 'basilico'),
    'icon'   => 'el el-italic',
    'fields' => array(
        array(
            'id'          => 'input_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Input Background Color', 'basilico'),
            'transparent' => false,
            'default'     => '#fff'
        ),
        array(
            'id'          => 'input_bg_hover',
            'type'        => 'color',
            'title'       => esc_html__('Input Background Color (Hover)', 'basilico'),
            'transparent' => false,
            'default'     => '#fff'
        ), 
        array(
            'id'          => 'input_border',
            'type'        => 'color',
            'title'       => esc_html__('Input Border Color', 'basilico'),
            'transparent' => false,
            'default'     => '#e6c9a2'
        ),
        array(
            'id'          => 'input_border_hover',
            'type'        => 'color',
            'title'       => esc_html__('Input Border Hover', 'basilico'),
            'transparent' => false,
            'default'     => '#e6c9a2'
        ),
        array(
            'id'          => 'input_height',
            'type'        => 'dimensions',
            'title'       => esc_html__('Input Height', 'basilico'),
            'width' => false,
            'unit'     => 'px',
            'default'  => array(
                'height'  => '44',
                'unit' => 'px'
            ),
        ),
        array(
            'id'          => 'input_border_radius',
            'type'        => 'text',
            'title'       => esc_html__('Border Radius', 'basilico'),
            'unit'     => 'px',
            'default'  => '25',
            'validate' => array( 'numeric', 'not_empty' )
        ),
        array(
            'id'          => 'font_input',
            'type'        => 'typography',
            'title'       => esc_html__('Input Typography', 'basilico'),
            'google'      => true,
            'line-height' => true,
            'font-size'   => true,
            'text-align'  => false,
            'letter-spacing' => true,
            'units'       => 'px',
        ),
    ),
));

//* Sidebar
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Sidebar', 'basilico'),
    'icon'   => 'el el-indent-right',
    'fields' => array(
        array(
            'id'          => 'sidebar_style',
            'type'        => 'select',
            'title'       => esc_html__('Sidebar Style', 'basilico'),
            'description' => esc_html__('Style 2 is suitable for dark theme.', 'basilico'),
            'options'  => array(
                'default' => esc_html__('Default', 'basilico'),
                'style-2' => esc_html__('Style 2', 'basilico'),
            ),
            'default'     => 'default',
        ),
    ),
));

//* Footer
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'basilico'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        basilico_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'basilico'),
                'default'  => false,
            )
        )
    )

));

//* 404 Page
Redux::setSection($opt_name, array(
    'title'      => esc_html__('404 Page', 'basilico'),
    'icon'       => 'el el-cog',
    'fields'     => array(
        array(
            'id'      => 'template_404',
            'type'    => 'select',
            'title'   => esc_html__('Select 404 Page Template', 'basilico'),
            'desc'    => sprintf(esc_html__('Please create your template before choosing. %sClick Here%s','basilico'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=page' ) ) . '">','</a>'),
            'options' => basilico_list_post('page'),
            'default' => ''
        )
    )
));

//* Woocommerce
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Woocommerce', 'basilico'),
        'icon'  => 'el el-shopping-cart',
        'fields'     => array_merge(
            basilico_sidebar_pos_opts([ 'prefix' => 'shop_', 'default_value' => 'left']),
            array(
                array(
                    'id'       => 'shop_display_type',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Display Type', 'basilico'),
                    'options'  => array(
                        'grid' => esc_html__('Grid', 'basilico'),
                        'list' => esc_html__('List', 'basilico'),
                    ),
                    'default'  => 'grid'
                ),
                array(
                    'title'         => esc_html__('Grid Column XXL Devices >= 1400px', 'basilico'),
                    'id'            => 'products_col_xxl',
                    'type'          => 'slider',
                    'default'       => 3,
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Grid Column XL Devices (1200px - 1399px)', 'basilico'),
                    'id'            => 'products_col_xl',
                    'type'          => 'slider',
                    'default'       => 3,
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Grid Column LG Devices (992px - 1199px)', 'basilico'),
                    'id'            => 'products_col_lg',
                    'type'          => 'slider',
                    'default'       => 3,
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 4,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Grid Column MD Devices (768px - 991px)', 'basilico'),
                    'id'            => 'products_col_md',
                    'type'          => 'slider',
                    'default'       => 3,
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 4,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Grid Column SM Devices (576px - 767px)', 'basilico'),
                    'id'            => 'products_col_sm',
                    'type'          => 'slider',
                    'default'       => 2,
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 3,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Grid Column XS Devices (480px - 575px)', 'basilico'),
                    'id'            => 'products_col_xs',
                    'type'          => 'slider',
                    'default'       => 2,
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 2,
                    'display_value' => 'text'
                ),
                array(
                    'id'            => 'shop_archive_product_per_page',
                    'title'         => esc_html__( 'Products displayed per page', 'basilico' ),
                    'description'   => esc_html__( 'Number products display on shop archive page', 'basilico' ),
                    'type'          => 'slider',
                    'default'       => 9,
                    'min'           => 1,
                    'max'           => 100,
                    'step'          => 1,
                    'display_value' => 'text',
                ),
            )
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Product', 'basilico'),
        'icon'       => 'el el-file-edit',
        'subsection' => true,
        'fields'     => array_merge(
            basilico_sidebar_pos_opts([ 'prefix' => 'product_', 'default_value' => '0'] ),
            array(
                array(
                    'id'       => 'product_social_share_on',
                    'title'    => esc_html__('Social Share', 'basilico'),
                    'subtitle' => esc_html__('Show social share on single product.', 'basilico'),
                    'type'     => 'switch',
                    'default'  => '0',
                ),
                array(
                    'id'       => 'product_social_share_icon',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Select Social Share', 'basilico'),
                    'subtitle' => esc_html__('Show social share on single product.', 'basilico'),
                    'multi'    => true,
                    'options' => array(
                        'facebook'  => esc_html__('Facebook', 'basilico'),
                        'twitter'   => esc_html__('Twitter', 'basilico'),
                        'linkedin'  => esc_html__('Linkedin', 'basilico'),
                        'pinterest' => esc_html__('Pinterest', 'basilico'),
                    ),
                    'default' => array('facebook', 'twitter', 'linkedin', 'pinterest'),
                    'required' => [
                        'product_social_share_on',
                        'equals',
                        '1'
                    ]
                ),
            ),
            basilico_product_single_opts_wishlist(),
            array(
                array(
                    'id'       => 'product_related',
                    'title'    => esc_html__('Product Related', 'basilico'),
                    'subtitle' => esc_html__('Show/Hide related product', 'basilico'),
                    'type'     => 'switch',
                    'default'  => '1',
                ),
                array(
                    'id'      => 'related_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Related Title', 'basilico'),
                    'default' => '',
                    'required' => [
                        'product_related',
                        'equals',
                        '1'
                    ]
                ),
                array(
                    'id'      => 'related_sub_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Relate Subtitle', 'basilico'),
                    'default' => '',
                    'required' => [
                        'product_related',
                        'equals',
                        '1'
                    ]
                )
            )
        )
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Cart Page', 'basilico'),
        'icon'       => 'el el-shopping-cart-sign',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'id'       => 'cart_cross_sell',
                    'title'    => esc_html__('Cross Sells', 'basilico'),
                    'subtitle' => esc_html__('Show/Hide Cross Sells product', 'basilico'),
                    'type'     => 'switch',
                    'default'  => '1',
                ),
                array(
                    'id'            => 'cart_cross_sell_total',
                    'title'         => esc_html__('Cross Sells Total', 'basilico'),
                    'subtitle'      => esc_html__('Total cross sell product display', 'basilico'),
                    'type'          => 'slider',
                    'default'       => '4',
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 12,
                    'display_value' => 'label',
                    'required' => [
                        ['cart_cross_sell', '!=', '0'],
                    ]
                ),
                array(
                    'id'            => 'cart_cross_sell_column',
                    'title'         => esc_html__('Cross Sells Columns', 'basilico'),
                    'subtitle'      => esc_html__('Choose your Columns', 'basilico'),
                    'type'          => 'slider',
                    'default'       => '4',
                    'min'           => 1,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'label',
                    'required' => [
                        ['cart_cross_sell', '!=', '0'],
                    ]
                )
            )
        )
    ));
}


//* Typography
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'basilico'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body', 'basilico'),
            'google'      => true,
            'line-height' => true,
            'font-size'   => true,
            'text-align'  => false,
            'letter-spacing' => true,
            'units'       => 'px',
        ),
        array(
            'id'             => 'font_heading',
            'type'           => 'typography',
            'title'          => esc_html__('Heading', 'basilico'),
            'google'         => true,
            'line-height'    => true,
            'font-size'      => false,
            'text-align'     => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'units'          => 'em',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'text',
            'title'       => esc_html__('H1 Font Size', 'basilico'),
            'default'     => '',
            'placeholder' => '60px'
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'text',
            'title'       => esc_html__('H2 Font Size', 'basilico'),
            'default'     => '',
            'placeholder' => '45px'
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'text',
            'title'       => esc_html__('H3 Font Size', 'basilico'),
            'default'     => '',
            'placeholder' => '36px'
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'text',
            'title'       => esc_html__('H4 Font Size', 'basilico'),
            'default'     => '',
            'placeholder' => '24px'
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'text',
            'title'       => esc_html__('H5 Font Size', 'basilico'),
            'default'     => '',
            'placeholder' => '18px'
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'text',
            'title'       => esc_html__('H6 Font Size', 'basilico'),
            'default'     => '',
            'placeholder' => '16px'
        ),
    )
));