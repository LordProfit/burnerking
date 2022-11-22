<?php
/**
 * bigtech customizer
 *
 * @package bigtech
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function bigtech_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'bigtech_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Bigtech Customizer', 'bigtech' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'bigtech_default_setting', [
        'title'       => esc_html__( 'Bigtech Default Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'header_right_setting', [
        'title'       => esc_html__( 'Header Right Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'mobile_menu_setting', [
        'title'       => esc_html__( 'Mobile Menu Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'bigtech' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'bigtech' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'bigtech' ),
        'description' => '',
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'bigtech' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'bigtech_customizer',
    ] );
}

add_action( 'customize_register', 'bigtech_customizer_panels_sections' );


/*
Theme Default Settings
*/
function _bigtech_default_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_preloader',
        'label'    => esc_html__( 'Preloader ON/OFF', 'bigtech' ),
        'section'  => 'bigtech_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_backtotop',
        'label'    => esc_html__( 'Back To Top ON/OFF', 'bigtech' ),
        'section'  => 'bigtech_default_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_bigtech_default_fields' );


/*
Header Right Settings
*/
function _header_right_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_show_header_right',
        'label'    => esc_html__( 'Show Header Right', 'bigtech' ),
        'section'  => 'header_right_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_show_heder_lang',
        'label'    => esc_html__( 'Show Header Language', 'bigtech' ),
        'section'  => 'header_right_setting',
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_show_heder_btn',
        'label'    => esc_html__( 'Show Header Button', 'bigtech' ),
        'section'  => 'header_right_setting',
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_header_right',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_heder_btn_text',
        'label'    => esc_html__( 'Header Button Text', 'bigtech' ),
        'section'  => 'header_right_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_heder_btn',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__( 'Buy Now', 'bigtech' ),
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_heder_btn_url',
        'label'    => esc_html__( 'Header Button Url', 'bigtech' ),
        'section'  => 'header_right_setting',
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_heder_btn',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'default'  => esc_html__( '#', 'bigtech' ),
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_right_fields' );

/*
Mobile Menu Settings
*/
function _mobile_menu_fields( $fields ) {

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'mobile_logo',
        'label'       => esc_html__( 'Mobile Menu Logo', 'bigtech' ),
        'description' => esc_html__( 'Upload Your Logo.', 'bigtech' ),
        'section'     => 'mobile_menu_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_show_mobile_social',
        'label'    => esc_html__( 'Show Mobile Menu Social', 'bigtech' ),
        'section'  => 'mobile_menu_setting',
        'default'  => 0,
        'priority' => 12,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    // Mobile section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_mobile_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'bigtech' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_mobile_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'bigtech' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_mobile_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'bigtech' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_mobile_linkedin_url',
        'label'    => esc_html__( 'Linkedin URL', 'bigtech' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_mobile_youtube_url',
        'label'    => esc_html__( 'Youtube URL', 'bigtech' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'bigtech_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_mobile_menu_fields' );


/*
Header Settings
 */
function _header_header_fields( $fields ) {
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'bigtech' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'bigtech' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'bigtech' ),
        'description' => esc_html__( 'Upload Your Logo', 'bigtech' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'secondary_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'bigtech' ),
        'description' => esc_html__( 'Upload Your Logo', 'bigtech' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/secondary_logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_logo',
        'label'       => esc_html__( 'Preloader Logo', 'bigtech' ),
        'description' => esc_html__( 'Upload Preloader Logo.', 'bigtech' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/favicon.png',
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {
    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_side_hide',
        'label'    => esc_html__( 'Side Info ON/OFF', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'bigtech_extra_title',
        'label'    => esc_html__( 'Side Title', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => wp_kses_post( 'Getting all of the <span>Nutrients</span> you need simply cannot be done without supplements.', 'bigtech' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'bigtech_extra_about_text',
        'label'    => esc_html__( 'Side Description Text', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'Nam libero tempore, cum soluta nobis eligendi cumque quod placeat facere possimus assumenda omnis dolor repellendu sautem temporibus officiis', 'bigtech' ),
        'priority' => 10,
    ];

    // Contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_contact_number',
        'label'    => esc_html__( 'Phone Number', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '+1 599 162 4545', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_contact_mail',
        'label'    => esc_html__( 'Email Address', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'bigtech@gmail.com', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'bigtech_office_address',
        'label'    => esc_html__( 'Office Address', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => wp_kses_post( '5689 Lotaso Terrace, Culver City, <br> CA, United States', 'bigtech' ),
        'priority' => 10,
    ];

    // Sidebar Social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_sidebar_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_sidebar_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_sidebar_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'bigtech' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_side_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {
    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'bigtech' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'bigtech' ),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/bg/breadcrumb-bg.jpg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bigtech_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'bigtech' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'bigtech' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#030B15',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__( 'Breadcrumb Info switch', 'bigtech' ),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_blog_btn_switch',
        'label'    => esc_html__( 'Blog Button ON/OFF', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta ON/OFF', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_blog_author',
        'label'    => esc_html__( 'Blog Author Meta ON/OFF', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_blog_date',
        'label'    => esc_html__( 'Blog Date Meta ON/OFF', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta ON/OFF', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'bigtech_show_blog_share',
        'label'    => esc_html__( 'Show Blog Share', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'bigtech' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'bigtech' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'bigtech' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'bigtech' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2'   => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
            'footer-style-3'   => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'bigtech' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'bigtech' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'bigtech' ),
            '3' => esc_html__( 'Widget Number 3', 'bigtech' ),
            '2' => esc_html__( 'Widget Number 2', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'bigtech_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'bigtech' ),
        'description' => esc_html__( 'Upload Image.', 'bigtech' ),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bigtech_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'bigtech' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'bigtech' ),
        'section'     => 'footer_setting',
        'default'     => '#030b15',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 ON/OFF', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_3_switch',
        'label'    => esc_html__( 'Footer Style 3 ON/OFF', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'show_footer_social',
        'label'    => esc_html__( 'Show Footer Social', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'active_callback'  => [
            [
                'setting'  => 'footer_style_3_switch',
                'operator' => '===',
                'value'    => true,
            ],
        ],
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'url',
        'settings' => 'bigtech_footer_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'show_footer_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'url',
        'settings' => 'bigtech_footer_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'show_footer_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'url',
        'settings' => 'bigtech_footer_vimeo_url',
        'label'    => esc_html__( 'Vimeo URL', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'show_footer_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'url',
        'settings' => 'bigtech_footer_youtube_url',
        'label'    => esc_html__( 'Youtube URL', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( '#', 'bigtech' ),
        'priority' => 10,
        'active_callback'  => [
            [
                'setting'  => 'show_footer_social',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_copyright',
        'label'    => esc_html__( 'CopyRight', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => wp_kses_post( 'Copyright © 2022 Bigtech All Rights Reserved.', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'show_copyright_menu',
        'label'    => esc_html__( 'Show Copyright Menu', 'bigtech' ),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'bigtech' ),
            'off' => esc_html__( 'Disable', 'bigtech' ),
        ],
    ];

    $fields[] = [
        'type'     => 'repeater',
		'settings' => 'copyright_menu_repeater',
		'label'    => esc_html__( 'Copyright Menu', 'bigtech' ),
		'section'  => 'footer_setting',
		'priority' => 11,
        'active_callback'  => [
            [
                'setting'  => 'show_copyright_menu',
                'operator' => '===',
                'value'    => true,
            ],
        ],
		'default'  => [
			[
				'link_text'   => esc_html__( 'Terms and conditions', 'bigtech' ),
				'link_url'    => '#',
			],
			[
				'link_text'   => esc_html__( 'Privacy policy', 'bigtech' ),
				'link_url'    => '#',
			],
		],
		'fields'   => [
			'link_text'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Item Name', 'bigtech' ),
				'description' => esc_html__( 'Enter your menu item name', 'bigtech' ),
				'default'     => '',
			],
			'link_url'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Link URL', 'bigtech' ),
				'description' => esc_html__( 'Enter your menu item link', 'bigtech' ),
				'default'     => '',
			],
		],
	];

    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function bigtech_color_fields( $fields ) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bigtech_color_option',
        'label'       => __( 'Theme Color', 'bigtech' ),
        'description' => esc_html__( 'This is a Theme color control.', 'bigtech' ),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bigtech_color_option_2',
        'label'       => __( 'Primary Color', 'bigtech' ),
        'description' => esc_html__( 'This is a Primary color control.', 'bigtech' ),
        'section'     => 'color_setting',
        'default'     => '#f2277e',
        'priority'    => 10,
    ];
     // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bigtech_color_option_3',
        'label'       => __( 'Secondary Color', 'bigtech' ),
        'description' => esc_html__( 'This is a Secondary color control.', 'bigtech' ),
        'section'     => 'color_setting',
        'default'     => '#30a820',
        'priority'    => 10,
    ];
     // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bigtech_color_option_3_2',
        'label'       => __( 'Secondary Color 2', 'bigtech' ),
        'description' => esc_html__( 'This is a Secondary color 2 control.', 'bigtech' ),
        'section'     => 'color_setting',
        'default'     => '#ffb352',
        'priority'    => 10,
    ];
     // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'bigtech_color_scrollup',
        'label'       => __( 'ScrollUp Color', 'bigtech' ),
        'description' => esc_html__( 'This is a ScrollUp colo control.', 'bigtech' ),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'bigtech_color_fields' );

// 404
function bigtech_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_error_text',
        'label'    => esc_html__( '404 Text', 'bigtech' ),
        'section'  => '404_page',
        'default'  => esc_html__( '404', 'bigtech' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'bigtech_error_title',
        'label'    => esc_html__( 'Not Found Title', 'bigtech' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Sorry, the page you are looking for could not be found', 'bigtech' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'bigtech' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'bigtech' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'bigtech_404_fields' );


/**
 * Added Fields
 */
function bigtech_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'bigtech' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'bigtech' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'bigtech' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'bigtech' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'bigtech' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'bigtech' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'bigtech' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'bigtech_typo_fields' );


/**
 * Added Fields
 */
function bigtech_slug_setting( $fields ) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_ev_slug',
        'label'    => esc_html__( 'Event Slug', 'bigtech' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourevent', 'bigtech' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'bigtech_port_slug',
        'label'    => esc_html__( 'Portfolio Slug', 'bigtech' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourportfolio', 'bigtech' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'bigtech_slug_setting' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function BIGTECH_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'bigtech' ) ) {
        $value = Kirki::get_option( bigtech_get_theme(), $name );
    }

    return apply_filters( 'BIGTECH_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function bigtech_get_theme() {
    return 'bigtech';
}