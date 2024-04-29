<?php

class MaintenanceCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize ) {
    
    /**
     * Custom checkbox sanitizer
     */
    function sanitize_checkbox( $input ) {
      return ( 1 === absint( $input ) ) ? 1 : 0;
    }
    
    /**
     * Section
     */
    $wp_customize->add_section(
      'yf_maintenance',
      [
        'title'				=> __('Maintenance', 'yankaforge'),
        'priority'		=> 0,
        'capability'	=> 'edit_theme_options',
        'panel'				=> '',
      ]
    );

    // Toggle
    $wp_customize->add_setting(
      'yf_maintenance_toggle',
      [
        'type'							=> 'theme_mod',
        'default'						=> false,
        'sanitize_callback'	=> 'sanitize_checkbox',
      ]
    );
    $wp_customize->add_control(
      'yf_maintenance_toggle',
      [
        'type'			=> 'checkbox',
        'label'			=> __('Maintenance Mode', 'yankaforge'),
        'section'		=> 'yf_maintenance',
        'settings'	=> 'yf_maintenance_toggle',
        'priority'	=> '0'
      ]
    );
  }
} 