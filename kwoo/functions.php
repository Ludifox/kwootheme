<?php

// Register Theme Features
    function kwoo_features()  {

        // Add theme support for Featured Images
        add_theme_support( 'post-thumbnails' );

        // Add theme support for HTML5 Semantic Markup
        add_theme_support( 'html5', array(  ) );

        // Add theme support for document Title tag
        add_theme_support( 'title-tag' );

        //Add theme support for WooCommerce
        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => 150,
            'single_image_width'    => 600
            ) 
        );

        // Add theme support for Translation
        load_theme_textdomain( 'kwoo', get_template_directory() . '/languages' );
    }
    add_action( 'after_setup_theme', 'kwoo_features' );

    // Enqueue assets
    function kwoo_assets() {
        wp_enqueue_style('kwoo_style', get_template_directory_uri().'/style.css');
        wp_enqueue_script('kwoo_scripts', get_template_directory_uri().'/js/kwooscripts.js', array('jquery'), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'kwoo_assets');

    //Prepare customization
    function kwoo_custom_options($wp_customize) {
        //Main banner settings
        $wp_customize->add_setting('kwoo_main_banner_img', array(
            'transport'         => 'refresh',
        ));
        $wp_customize->add_setting('kwoo_main_banner_text_setting', array(
            'transport'         => 'refresh',
        ));
        $wp_customize->add_setting('kwoo_main_banner_url_setting', array(
            'transport'         => 'refresh',
        ));
        $wp_customize->add_setting('kwoo_main_banner_button_setting', array(
            'transport'         => 'refresh',
        ));
        //Minor 1 banner settings
        $wp_customize->add_setting('kwoo_minor1_banner_img', array(
            'transport'         => 'refresh',
        ));
        $wp_customize->add_setting('kwoo_minor1_banner_text_setting', array(
            'transport'         => 'refresh',
        ));
        $wp_customize->add_setting('kwoo_minor1_banner_url_setting', array(
            'transport'         => 'refresh',
        ));
        $wp_customize->add_setting('kwoo_minor1_banner_button_setting', array(
            'transport'         => 'refresh',
        ));

        //Setting up section
        $wp_customize->add_section('kwoo_main_banner', array(
            'title'     => __('Frontpage banners','kwoo'),
            'priority'  => 30
        ));

        //Adding controls: Main banner
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kwoo_main_banner_img_control', array(
            'label'             => __('Main banner image', 'kwoo'),
            'section'           => 'kwoo_main_banner',
            'settings'          => 'kwoo_main_banner_img',    
        )));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kwoo_main_banner_text', array(
            'label'     => _x('Text','Main banner','kwoo'),
            'section'   => 'kwoo_main_banner',
            'settings'  => 'kwoo_main_banner_text_setting',
            'type'      => 'text'
        )));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kwoo_main_banner_url', array(
            'label'     => _x('URL','Main banner','kwoo'),
            'section'   => 'kwoo_main_banner',
            'settings'  => 'kwoo_main_banner_url_setting',
            'type'      => 'text'
        )));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kwoo_main_banner_button', array(
            'label'     => _x('Button text','Main banner','kwoo'),
            'section'   => 'kwoo_main_banner',
            'settings'  => 'kwoo_main_banner_button_setting',
            'type'      => 'text'
        )));

        //Adding controls: Minor 1 banner
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kwoo_minor1_banner_img_control', array(
            'label'             => __('Small banner image (left)', 'kwoo'),
            'section'           => 'kwoo_main_banner',
            'settings'          => 'kwoo_main_banner_img',    
        )));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kwoo_minor1_banner_text', array(
            'label'     => _x('Text','Main banner','kwoo'),
            'section'   => 'kwoo_main_banner',
            'settings'  => 'kwoo_main_banner_text_setting',
            'type'      => 'text'
        )));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kwoo_minor1_banner_url', array(
            'label'     => _x('URL','Main banner','kwoo'),
            'section'   => 'kwoo_main_banner',
            'settings'  => 'kwoo_main_banner_url_setting',
            'type'      => 'text'
        )));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kwoo_minor1_banner_button', array(
            'label'     => _x('Button text','Main banner','kwoo'),
            'section'   => 'kwoo_main_banner',
            'settings'  => 'kwoo_main_banner_button_setting',
            'type'      => 'text'
        )));

    }
    add_action('customize_register', 'kwoo_custom_options');
?>