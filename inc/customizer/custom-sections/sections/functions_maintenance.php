<?php

class MaintenanceCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 ) {
    
    /**
     * Section
     */
    $wp_customize->add_section(
      'yf_maintenance',
      [
        'title'				=> __('Maintenance Mode', 'yankaforge'),
        'description' => __('Option to toggle the maintenance mode for the website. It is a good practice to activate it while doing major updates on the website content, for example.', 'yankaforge'),
        'priority'		=> $priority,
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
        'description' => __('If activated, the maintenance page will be displayed to anyone trying to access your website.'),
        'section'		=> 'yf_maintenance',
        'settings'	=> 'yf_maintenance_toggle',
        'priority'	=> '0'
      ]
    );
  }
} 