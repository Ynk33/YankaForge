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
function yanka_setup() {
	load_theme_textdomain( 'yankaforge' );
}
add_action( 'after_setup_theme', 'yanka_setup' );

/**
 * Allow 'Editor' to modify theme options.
 */
$editor = get_role('editor');
$editor->add_cap('edit_theme_options');

/**
 * Includes the theme customize options.
 */
include("inc/customizer/index.php");

/**
 * Includes custom API.
 */
include("inc/api/index.php");
