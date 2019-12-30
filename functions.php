<?php
/**
 * Custom Functions file for current theme.
 *
 */

// IMPORT PARENT STYLE
function child_theme_enqueue_styles() {
    $parent_style = 'divi-style'; // This is 'divi-style' for the Divi theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/stylesheet/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

function typekit_script() {
    wp_enqueue_script( 'typekit', '//use.typekit.net/ymf8kfv.css', array(), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'typekit_script' );

?>
