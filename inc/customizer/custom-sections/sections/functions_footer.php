<?php

class FooterCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 ) {
    /**
     * Section
    */
    $wp_customize->add_section(
      'yf_footer',
      [
        'title'      => __( 'Footer', 'yankaforge' ),
        'description' => __('This is the content of the Footer, at the bottom of your website.', 'yankaforge'),
        'priority'   => $priority,
        'capability' => 'edit_theme_options',
        'panel'      => 'yf_panel_content',
      ]
    );

    // Content
    $wp_customize->add_setting(
      'yf_footer_content',
      [
        'type'              => 'theme_mod',
        'default'           => __( 'YankaForge - Proudly powered by WordPress', 'yankaforge' ),
        'sanitize_callback' => 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_footer_content',
      [
        'type'     => 'textarea',
        'label'    => __( 'Content', 'yankaforge' ),
        'section'  => 'yf_footer',
        'settings' => 'yf_footer_content',
        'priority' => '10',
      ]
    );
  }
}