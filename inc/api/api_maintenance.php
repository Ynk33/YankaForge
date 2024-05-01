<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/maintenance/', [
    'methods' => 'GET',
    'callback' => 'yf_maintenance_route',
  ]);
});

function yf_maintenance_route() {
  $footer = [
    "maintenance" => get_theme_mod("yf_maintenance_toggle"),
  ];
  return $footer;
}

?>