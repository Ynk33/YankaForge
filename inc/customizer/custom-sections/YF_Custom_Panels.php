<?php

class YF_Custom_Panels implements IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 ) {
    /**
     * Global settings panel
     */
    $wp_customize->add_panel(
      'yf_panel_options',
      [
        'priority'       => $priority,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Global Settings',
        'description'    => 'Manage the global settings of your website',
      ]
    );

    /**
     * Content panel
     */
    $wp_customize->add_panel(
      'yf_panel_content',
      [
        'priority'       => $priority + 5,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Content',
        'description'    => 'Manage the content of your website',
      ]
    );
  }
}