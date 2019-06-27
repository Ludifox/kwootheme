<?php
function kwoo_assets() {
    wp_enqueue_script('kwoo_scripts', get_template_directory_uri().'/js/kwooscripts.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'kwoo_assets');
?>