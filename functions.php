<?php


/**
 * Includes customizer
 */
include("includes/theme-options/__customizer.php");


/**
 * YankaForge Theme functions
 *
 * @package WordPress
 * @subpackage yankaforge
 */

if ( ! function_exists( 'yanka_setup' ) ) :
	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * this theme supports.
	 */
	function yanka_setup() {
		load_theme_textdomain( 'yankaforge' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}
endif; // end function_exists yanka_setup.
add_action( 'after_setup_theme', 'yanka_setup' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * this theme supports.

 * @param class $wp_customize Customizer object.
 */
function yanka_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_panel( 'nav_menus' );
	$wp_customize->remove_section( 'custom_css' );

	Customizer::Customize( $wp_customize );
}
add_action( 'customize_register', 'yanka_customize_register', 100 );

/**
 * Includes custom api
 */
include("includes/api/__custom_api.php");