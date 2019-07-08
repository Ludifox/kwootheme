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
        wp_enqueue_script('kwoo_scripts', get_template_directory_uri().'/js/kwooscripts.js', array('jquery'), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'kwoo_assets');
?>