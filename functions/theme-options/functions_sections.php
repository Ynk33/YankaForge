<?php

class SectionsCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize ) {
    /**
     * Section
     */
    $wp_customize->add_section(
      "yf_sections",
      [
        'title'				=> __('Sections', 'yankaforge'),
        'priority'		=> 1,
        'capability'	=> 'edit_theme_options',
        'panel'				=> '',
      ]
    );

    // Sections selection
    $wp_customize->add_setting(
      'yf_sections_selection',
      [
        'type'							=> 'theme_mod',
        'default'						=> [ "highlights", "galleries", "about", "contact" ],
        'sanitize_callback'	=> 'sanitize_multiple_checkbox',
        'transport'         => 'postMessage',
      ]
    );
    $wp_customize->add_control(
      new YF_Multiple_Checkbox_Control(
        $wp_customize, 
        'yf_sections_selection',
        [
          'label'      	=> __( 'Sections selection', 'yankaforge' ),
          'description' => __('Sections you want to show in your website.', 'yankaforge'),
          'choices'     => [
            "highlights"  => __("Highlights"),
            "galleries"   => __("Galleries"),
            "about"       => __("About"),
            "contact"     => __("Contact"),
          ],
          'section'		  => 'yf_sections',
          'settings'	  => 'yf_sections_selection',
        ]
      )
    );


  }
}