<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/footer/', [
    'methods' => 'GET',
    'callback' => 'yf_footer_route',
  ]);
});

function yf_footer_route() {
  $footer = [
    "content" => get_theme_mod("yf_footer_content"),
  ];
  return $footer;
}

?>