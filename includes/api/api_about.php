<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/about/', [
    'methods' => 'GET',
    'callback' => 'wp_about_route',
  ]);
});

function wp_about_route() {

  $pictureId = get_theme_mod("yanka_about_picture");
  $pictureDetails = getPictureDetails($pictureId);

  $backgroundId = get_theme_mod( "yanka_about_background" );
  $backgroundDetails = getPictureDetails($backgroundId);

  $about = [
    "headline"          => get_theme_mod( "yanka_about_headline" ),
    "subtitle"          => get_theme_mod( "yanka_about_subtitle" ),
    "content"           => get_theme_mod("yanka_about_content"),
    "picture"           => $pictureDetails,
    "background"        => $backgroundDetails,
  ];
  return $about;
}