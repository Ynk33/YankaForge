<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/maintenance/', [
    'methods' => 'GET',
    'callback' => 'wp_maintenance_route',
  ]);
});

function wp_maintenance_route() {
  $footer = [
    "maintenance" => get_theme_mod("yanka_maintenance_toggle"),
  ];
  return $footer;
}

?>