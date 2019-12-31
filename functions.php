<?php
/**
 * Custom Functions file for current theme.
 *
 */
global $troutnetwork, $current;

$current = get_current_blog_id();

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
?>
