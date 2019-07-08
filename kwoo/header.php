<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <div id="top-bar" class="container-fluid bg-dark">
        <div class="col-9">
            <p>
            <i class="icofont-fast-delivery icofont-2x"></i> 
                <span class="d-none d-md-inline-block">
                    <?php _e('Worldwide shipping always','kwoo'); 
                    echo " "; ?>
                </span> <?php _ex('NOK 99,-','Shipping price on top bar','kwoo'); ?>
                <i class="icofont-envelope-open"></i> 
                <span class="d-none d-md-inline-block">
                    <?php _e('For all questions: ','kwoo'); ?>
                </span> hallo@kleskompaniet.no
            </p>
        </div>
        <div class="col-3">

        </div>
    </div>
    <header class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                Om | Kontakt
            </div>
            <div class="col-md-6">
                <a href="<?php echo get_option("siteurl"); ?>">
                    <img class="sitelogo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_retina.png" alt="Kleskompaniet.no Logo"/>
                </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
                <i class="icofont-users-alt-4"></i>
                </a>
                <a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>">
                <i class="icofont-bag"></i>
                </a>
            </div>
        </div>
    </header>  
    