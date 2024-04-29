<?php

class AboutCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize ) {
    /**
     * Section
     */
    $wp_customize->add_section(
      'yanka_about',
      [
        'title'				=> __('About', 'yankaforge'),
        'priority'		=> 50,
        'capability'	=> 'edit_theme_options',
        'panel'				=> '',
      ]
    );

    // Headline
    $wp_customize->add_setting(
      'yanka_about_headline',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Hello, this is me!', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yanka_about_headline',
      [
        'type'			=> 'textarea',
        'label'			=> __('Content', 'yankaforge'),
        'section'		=> 'yanka_about',
        'settings'	=> 'yanka_about_headline',
        'priority'	=> '10'
      ]
    );

    // Subtitle
    $wp_customize->add_setting(
      'yanka_about_subtitle',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Welcome to my website', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yanka_about_subtitle',
      [
        'type'			=> 'textarea',
        'label'			=> __('Content', 'yankaforge'),
        'section'		=> 'yanka_about',
        'settings'	=> 'yanka_about_subtitle',
        'priority'	=> '10'
      ]
    );

    // Content
    $wp_customize->add_setting(
      'yanka_about_content',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Hello, this is me. Welcome to my website where I do amazing stuff.', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yanka_about_content',
      [
        'type'			=> 'textarea',
        'label'			=> __('Content', 'yankaforge'),
        'section'		=> 'yanka_about',
        'settings'	=> 'yanka_about_content',
        'priority'	=> '10'
      ]
    );

    // Picture
    $wp_customize->add_setting(
      'yanka_about_picture',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yanka_about_picture',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'Profile picture', 'yankaforge' ),
          'description' => __('Picture displayed in the About section.', 'intentionnaly-blank'),
          'section'    	=> 'yanka_about',
          'settings'   	=> 'yanka_about_picture',
        ],
      ),
    );

    // Background
    $wp_customize->add_setting(
      'yanka_about_background',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yanka_about_background',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'Background picture', 'yankaforge' ),
          'description' => __('Picture displayed in the background of the About section.', 'yankaforge'),
          'section'    	=> 'yanka_about',
          'settings'   	=> 'yanka_about_background',
        ],
      ),
    );
  }
}
