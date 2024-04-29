<?php

/**
 * Add menu support.
 */
function register_menu() {
  register_nav_menu('main-menu', __( 'Main Menu' ));
}
add_action( 'init', 'register_menu' );


/**
 * Add REST API entry points to GET menus.
 */

// Menu locations
add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/menu/', [
    'methods' => 'GET',
    'callback' => 'yf_menu_route',
  ]);
});

function yf_menu_route() {
  $menuLocations = get_nav_menu_locations(); // Get nav locations set in theme, usually functions.php
  $mainMenu = wp_get_nav_menu_items($menuLocations["main-menu"]);
  return $mainMenu;
}

/* UNCOMMENT IF ACCESS TO A SPECIFIC MENU IS EVER NEEDED
// Individual menus
add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/menu/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'yf_menu_single',
  ));
});

function yf_menu_single($data) {
  $menuID = $data['id']; // Get the menu from the ID
  $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
  return $primaryNav;
}
*/
