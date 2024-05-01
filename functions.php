<?php

/**
 * YankaForge Theme functions
 *
 * @package WordPress
 * @subpackage yankaforge
 * @author Yannick Tirand
 * @link https://github.com/Ynk33/YankaForge
 */

/**
 * Includes global utils.
 */
include("inc/utils.php");
include("inc/customizer/data/sections.php");

/**
 * Sets up theme defaults and registers the various WordPress features that this theme supports.
 */
// TODO: check on those theme supports, if they are needed.
function yanka_setup() {
	load_theme_textdomain( 'yankaforge' );
}
add_action( 'after_setup_theme', 'yanka_setup' );

/**
 * Includes the theme customize options.
 */
include("inc/customizer/index.php");

/**
 * Includes custom API.
 */
include("inc/api/index.php");
