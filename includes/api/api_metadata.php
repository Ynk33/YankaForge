<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/metadata/', [
    'methods' => 'GET',
    'callback' => 'wp_metadata_route',
  ]);
});

function wp_metadata_route() {
  
  $pictureId = get_theme_mod( "yanka_metadata_image" );
  $pictureDetails = getPictureDetails($pictureId);

  $metadata = [
    "title"       => get_theme_mod( "yanka_metadata_title" ),
    "description" => get_theme_mod("yanka_metadata_description"),
    "image"       => $pictureDetails,
  ];

  return $metadata;
}