<?php

class ContactCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 ) {
    /**
     * Section
     */
    $wp_customize->add_section(
      'yf_contact',
      [
        'title'				=> __('Contact', 'yankaforge'),
        'description' => __('This is the content of the Contact section.', 'yankaforge'),
        'priority'		=> $priority,
        'capability'	=> 'edit_theme_options',
        'panel'				=> 'yf_panel_content',
      ]
    );

    // Headline
    $wp_customize->add_setting(
      'yf_contact_headline',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Let\'s keep in touch', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_contact_headline',
      [
        'type'			=> 'textarea',
        'label'			=> __('Headline', 'yankaforge'),
        'section'		=> 'yf_contact',
        'settings'	=> 'yf_contact_headline',
        'priority'	=> '10'
      ]
    );

    // Content
    $wp_customize->add_setting(
      'yf_contact_content',
      [
        'type'							=> 'theme_mod',
        'default'						=> __('Let\'s keep in touch. Fill the form for any question.', 'yankaforge'),
        'sanitize_callback'	=> 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_contact_content',
      [
        'type'			=> 'textarea',
        'label'			=> __('Content', 'yankaforge'),
        'section'		=> 'yf_contact',
        'settings'	=> 'yf_contact_content',
        'priority'	=> '10'
      ]
    );

    // Picture
    $wp_customize->add_setting(
      'yf_contact_picture',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yf_contact_picture',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'Background Picture', 'yankaforge' ),
          'description' => __('Picture displayed in the Contact section.', 'yankaforge'),
          'section'    	=> 'yf_contact',
          'settings'   	=> 'yf_contact_picture',
        ],
      ),
    );

    // Social network
    $wp_customize->add_setting(
      'yf_contact_social_headline',
      [
        'type'              => 'theme_mod',
        'default'           => __('Follow me on social media', 'yankaforge'),
        'sanitize_callback' => 'wp_kses_post'
      ]
    );
    $wp_customize->add_control(
      'yf_contact_social_headline',
      [
        'type'			=> 'text',
        'label'			=> __('Social media caption', 'yankaforge'),
        'section'		=> 'yf_contact',
        'settings'	=> 'yf_contact_social_headline',
        'priority'	=> '10'
      ]
    );
    
    // Instagram
    $wp_customize->add_setting(
      'yf_contact_instagram',
      [
        'type'              => 'theme_mod',
        'default'           => '',
        'sanitize_callback' => 'sanitize_url'
      ]
    );
    $wp_customize->add_control(
      'yf_contact_instagram',
      [
        'type'			=> 'text',
        'label'			=> __('Instagram', 'yankaforge'),
        'section'		=> 'yf_contact',
        'settings'	=> 'yf_contact_instagram',
        'priority'	=> '10'
      ]
    );
  }
}
