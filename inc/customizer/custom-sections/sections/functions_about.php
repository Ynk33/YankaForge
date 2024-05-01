<?php

class AboutCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 ) {
    /**
     * Section
     */
    $wp_customize->add_section(
      'yf_about',
      [
        'title'				=> __('About', 'yankaforge'),
        'description' => __('This is the content of the About section.', 'yankaforge'),
        'priority'		=> $priority,
        'capability'	=> 'edit_theme_options',
        'panel'				=> 'yf_panel_content',
      ]
    );

    // Headline
    $wp_customize->add_setting(
      'yf_about_headline',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Hello, this is me!', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_about_headline',
      [
        'type'			=> 'textarea',
        'label'			=> __('Headline', 'yankaforge'),
        'section'		=> 'yf_about',
        'settings'	=> 'yf_about_headline',
        'priority'	=> '10'
      ]
    );

    // Subtitle
    $wp_customize->add_setting(
      'yf_about_subtitle',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Welcome to my website', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_about_subtitle',
      [
        'type'			=> 'textarea',
        'label'			=> __('Caption', 'yankaforge'),
        'section'		=> 'yf_about',
        'settings'	=> 'yf_about_subtitle',
        'priority'	=> '10'
      ]
    );

    // Content
    $wp_customize->add_setting(
      'yf_about_content',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Hello, this is me. Welcome to my website where I do amazing stuff.', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_about_content',
      [
        'type'			=> 'textarea',
        'label'			=> __('Content', 'yankaforge'),
        'section'		=> 'yf_about',
        'settings'	=> 'yf_about_content',
        'priority'	=> '10'
      ]
    );

    // Picture
    $wp_customize->add_setting(
      'yf_about_picture',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yf_about_picture',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'Profile picture', 'yankaforge' ),
          'description' => __('Picture displayed in the About section.', 'yankaforge'),
          'section'    	=> 'yf_about',
          'settings'   	=> 'yf_about_picture',
        ],
      ),
    );

    // Background
    $wp_customize->add_setting(
      'yf_about_background',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yf_about_background',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'Background picture', 'yankaforge' ),
          'description' => __('Picture displayed in the background of the About section.', 'yankaforge'),
          'section'    	=> 'yf_about',
          'settings'   	=> 'yf_about_background',
        ],
      ),
    );
  }
}
