<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/about/', [
    'methods' => 'GET',
    'callback' => 'yf_about_route',
  ]);
});

function yf_about_route() {

  $pictureId = get_theme_mod("yf_about_picture");
  $picture = getPicture($pictureId);

  $backgroundId = get_theme_mod( "yf_about_background" );
  $background = getPicture($backgroundId);

  $about = [
    "headline"          => get_theme_mod( "yf_about_headline" ),
    "subtitle"          => get_theme_mod( "yf_about_subtitle" ),
    "content"           => get_theme_mod("yf_about_content"),
    "picture"           => $picture,
    "background"        => $background,
  ];
  return $about;
}