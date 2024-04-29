<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/sections/', [
    'methods' => 'GET',
    'callback' => 'yf_sections_route',
  ]);
});

function yf_sections_route() {
  
  $sections = get_theme_mod( "yf_sections_selection" );

  return [
    'sections' => $sections
  ];
}