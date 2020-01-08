<?php
/**
 * Custom Functions file for current theme.
 *
 */
global $troutnetwork, $current;


add_action('acf/init', 'my_acf_op_init', 88);
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('General Settings'),
            'menu_title'  => __('Trout Creek Global'),
            'redirect'    => false,
        ));

    }
}



$troutnetwork = array(
    201 => array(
        'name' => 'builder',
        'title' => 'Builders',
        'url' => 'https://wordpress.roimediaworks.com/troutcreek/',
        'networked' => true,
    ),
    202 => array(
        'name' => 'architects',
        'title' => 'Architects',
        'url' => 'https://wordpress.roimediaworks.com/troutcreek/',
        'networked' => true,
    ),
    203 => array(
        'name' => 'homeowner',
        'title' => 'Home Owner',
        'url' => 'https://wordpress.roimediaworks.com/troutcreek/',
        'networked' => true,
    )
);
// IMPORT PARENT STYLE
function child_theme_enqueue_styles() {
    $parent_style = 'divi-style'; // This is 'divi-style' for the Divi theme.

    wp_enqueue_style( 'divi-override',
        get_stylesheet_directory_uri() . '/stylesheet/override.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/stylesheet/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

function my_theme_scripts() {
    wp_enqueue_script( 'mainJS', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

?>
