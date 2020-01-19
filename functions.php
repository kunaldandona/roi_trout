<?php
/**
 * Custom Functions file for current theme.
 *
 */
global $troutnetwork, $current;


add_action('acf/init', 'my_acf_op_init');
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

register_nav_menus( array(
    'footer_menu' => 'Footer Links',
) );



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

function sp_breadcrumbs_before() {
    echo '<div class="trout-crumb"><div class="container-bread">';
    echo '<div class="page-title">';
    wp_title('', true, 'right');
    echo '</div>';
}
function sp_breadcrumbs_after() {
    echo '</div></div>';
}
add_action('seopress_breadcrumbs_before_html', 'sp_breadcrumbs_before');
add_action('seopress_breadcrumbs_after_html', 'sp_breadcrumbs_after');


function et_add_mobile_navigation(){
    printf(
        '<div id="et_mobile_nav_menu">
			<a href="#" class="mobile_nav closed">
				<span class="select_page">%1$s</span>
				<span class="mobile_menu_bar"></span>
			</a>
		</div>',
        esc_html__( 'Select Page', 'Divi' )
    );
}
add_action( 'et_header_top', 'et_add_mobile_navigation' );
