<?php

include("IThemeCustomizer.php");

/**
 * Custom functions to expose the menu in the REST API.
 */

$includes = [
  "maintenance",
  "metadata",
  "about",
  "contact",
  "footer",
];

foreach ($includes as $include) {
  include("functions_" . $include . ".php");
}

class Customizer implements IThemeCustomizer {
  
  public static function Customize( $wp_customize ) {
    MaintenanceCustomizer::Customize( $wp_customize );
    MetadataCustomizer::Customize( $wp_customize );
    AboutCustomizer::Customize( $wp_customize );
    ContactCustomizer::Customize( $wp_customize );
    FooterCustomizer::Customize( $wp_customize );
  }
}