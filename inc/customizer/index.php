<?php

/**
 * Sets up the theme customizer options.
 */
function yanka_customize_register( $wp_customize ) {

  include("custom-controls/_custom_controls.php");
	include("custom-sections/YF_Customizer.php");

	// Remove unwanted sections and panels.
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_panel( 'nav_menus' );
	$wp_customize->remove_section( 'custom_css' );

	// Add the theme's customizer.
	YF_Customizer::Customize( $wp_customize );
}
add_action( 'customize_register', 'yanka_customize_register', 100 );