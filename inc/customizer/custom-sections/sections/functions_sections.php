<?php

class SectionsCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 ) {
    /**
     * Section
     */
    $wp_customize->add_section(
      "yf_sections",
      [
        'title'				=> __('Sections', 'yankaforge'),
        'description' => __('Here you are able to decide which sections will be visible in your website and in which order.', 'yankaforge'),
        'priority'		=> $priority,
        'capability'	=> 'edit_theme_options',
        'panel'				=> 'yf_panel_options',
      ]
    );

    // Section selection
    $wp_customize->add_setting(
      'yf_sections_selection',
      [
        'type'							=> 'theme_mod',
        'default'						=> Sections::DEFAULT,
        'sanitize_callback'	=> 'sanitize_array',
      ]
    );

    $wp_customize->add_control( new YF_Sortable_List_Control(
      $wp_customize,
      'yf_sections_selection',
      [
        'label'         => __( 'Sections selection' ),
        'description'   => esc_html__( 'Select the sections in the order you want in your website.', 'yankaforge' ),
        'choices'       => Sections::SECTIONS,
        'section'       => 'yf_sections',
        'settings'      => 'yf_sections_selection',
        'button_labels' => [
          'add' => __( 'Add Section' ),
        ]
      ]
    ));
  }
}