<?php

include("IThemeCustomizer.php");
include("YF_Custom_Panels.php");

/**
 * The custom sections to include.
 */
$includes = [
  "maintenance",
  "sections",
  "metadata",
  "about",
  "contact",
  "footer",
];

/**
 * Includes the custom sections files.
 */
foreach ($includes as $include) {
  include("sections/functions_" . $include . ".php");
}

/**
 * Main ThemeCustomizer class, loading all the other customizers.
 */
class YF_Customizer implements IThemeCustomizer {

  public static function Customize( $wp_customize, $priority = -1 ) {

    /**
     * PANELS
     */
    YF_Custom_Panels::Customize( $wp_customize, 30);

    /**
     * SECTIONS
     */
    MaintenanceCustomizer::Customize( $wp_customize, 0 );
    // 20 is for the default "Site Identity" section
    SectionsCustomizer::Customize( $wp_customize, 30 );
    MetadataCustomizer::Customize( $wp_customize, 40 );
    AboutCustomizer::Customize( $wp_customize, 50 );
    ContactCustomizer::Customize( $wp_customize, 60 );
    FooterCustomizer::Customize( $wp_customize, 70 );
  }
}