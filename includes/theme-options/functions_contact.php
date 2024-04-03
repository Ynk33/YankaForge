<?php

class ContactCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize ) {
    /**
     * Section
     */
    $wp_customize->add_section(
      'yanka_contact',
      [
        'title'				=> __('Contact', 'yankaforge'),
        'priority'		=> 100,
        'capability'	=> 'edit_theme_options',
        'panel'				=> '',
      ]
    );

    // Headline
    $wp_customize->add_setting(
      'yanka_contact_headline',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Let\'s keep in touch', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yanka_contact_headline',
      [
        'type'			=> 'textarea',
        'label'			=> __('Content', 'yankaforge'),
        'section'		=> 'yanka_contact',
        'settings'	=> 'yanka_contact_headline',
        'priority'	=> '10'
      ]
    );

    // Content
    $wp_customize->add_setting(
      'yanka_contact_content',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Let\'s keep in touch. Fill the form for any question.', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yanka_contact_content',
      [
        'type'			=> 'textarea',
        'label'			=> __('Content', 'yankaforge'),
        'section'		=> 'yanka_contact',
        'settings'	=> 'yanka_contact_content',
        'priority'	=> '10'
      ]
    );

    // Picture
    $wp_customize->add_setting(
      'yanka_contact_picture',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yanka_contact_picture',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'Contact picture', 'yankaforge' ),
          'description' => __('Picture displayed in the Contact section.', 'yankaforge'),
          'section'    	=> 'yanka_contact',
          'settings'   	=> 'yanka_contact_picture',
        ],
      ),
    );

    // Social network
    $wp_customize->add_setting(
      'yanka_contact_social_headline',
      [
        'type'              => 'theme_mod',
        'default'           => __('Follow me on social media', 'yankaforge'),
        'sanitize_callback' => 'wp_kses_post'
      ]
    );
    $wp_customize->add_control(
      'yanka_contact_social_headline',
      [
        'type'			=> 'text',
        'label'			=> __('Headline', 'yankaforge'),
        'section'		=> 'yanka_contact',
        'settings'	=> 'yanka_contact_social_headline',
        'priority'	=> '10'
      ]
    );
    
    // Instagram
    $wp_customize->add_setting(
      'yanka_contact_instagram',
      [
        'type'              => 'theme_mod',
        'default'           => '',
        'sanitize_callback' => 'sanitize_url'
      ]
    );
    $wp_customize->add_control(
      'yanka_contact_instagram',
      [
        'type'			=> 'text',
        'label'			=> __('Instagram', 'yankaforge'),
        'section'		=> 'yanka_contact',
        'settings'	=> 'yanka_contact_instagram',
        'priority'	=> '10'
      ]
    );
  }
}
