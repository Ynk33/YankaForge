<?php

/**
 * Add REST API entry points to GET the menu.
 */

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/menu/', [
    'methods' => 'GET',
    'callback' => 'yf_menu_route',
  ]);
});

function yf_menu_route() {
  $sections = get_theme_mod( "yf_sections_selection" );

  $response = [];
  foreach ($sections as $section) {
    $response[] = [
      "title"   => Sections::SECTIONS[$section],
      "url"     => "#" . $section
    ];
  }
  return $response;
}
