<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/metadata/', [
    'methods' => 'GET',
    'callback' => 'yf_metadata_route',
  ]);
});

function yf_metadata_route() {
  
  $pictureId = get_theme_mod( "yf_metadata_image" );
  $picture = getPicture($pictureId);

  $metadata = [
    "title"       => get_theme_mod( "yf_metadata_title" ),
    "description" => get_theme_mod("yf_metadata_description"),
    "image"       => $picture,
  ];

  return $metadata;
}