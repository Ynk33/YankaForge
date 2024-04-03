<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/footer/', [
    'methods' => 'GET',
    'callback' => 'wp_footer_route',
  ]);
});

function wp_footer_route() {
  $footer = [
    "content" => get_theme_mod("yanka_footer_content"),
  ];
  return $footer;
}

?>