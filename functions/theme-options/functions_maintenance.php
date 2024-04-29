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
      'yanka_maintenance',
      [
        'title'				=> __('Maintenance', 'yankaforge'),
        'priority'		=> 0,
        'capability'	=> 'edit_theme_options',
        'panel'				=> '',
      ]
    );

    // Toggle
    $wp_customize->add_setting(
      'yanka_maintenance_toggle',
      [
        'type'							=> 'theme_mod',
        'default'						=> false,
        'sanitize_callback'	=> 'sanitize_checkbox',
      ]
    );
    $wp_customize->add_control(
      'yanka_maintenance_toggle',
      [
        'type'			=> 'checkbox',
        'label'			=> __('Maintenance Mode', 'yankaforge'),
        'section'		=> 'yanka_maintenance',
        'settings'	=> 'yanka_maintenance_toggle',
        'priority'	=> '0'
      ]
    );
  }
} 