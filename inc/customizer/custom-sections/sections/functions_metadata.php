<?php

class MetadataCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 ) {
    /** 
     * Section
    */
    $wp_customize->add_section(
      'yf_metadata',
      [
        'title'      => __( 'Metadata', 'yankaforge' ),
        'description'=> __( 'These informations will be shown in search engines and shared content on social media.', 'yankaforge' ),
        'priority'   => $priority,
        'capability' => 'edit_theme_options',
        'panel'      => 'yf_panel_options',
      ]
    );

    // Title
    $wp_customize->add_setting(
      'yf_metadata_title',
      [
        'type'              => 'theme_mod',
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_metadata_title',
      [
        'type'     => 'text',
        'label'    => __( 'Title', 'yankaforge' ),
        'section'  => 'yf_metadata',
        'settings' => 'yf_metadata_title',
        'priority' => '0',
      ]
    );

    // Description
    $wp_customize->add_setting(
      'yf_metadata_description',
      [
        'type'              => 'theme_mod',
        'default'           => get_bloginfo('description'),
        'sanitize_callback' => 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yf_metadata_description',
      [
        'type'     => 'textarea',
        'label'    => __( 'Description', 'yankaforge' ),
        'section'  => 'yf_metadata',
        'settings' => 'yf_metadata_description',
        'priority' => '10',
      ]
    );

    // Image
    $wp_customize->add_setting(
      'yf_metadata_image',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yf_metadata_image',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'OpenGraph Image', 'yankaforge' ),
          'description' => __('Image displayed in search engines and shared content on social networks.', 'yankaforge'),
          'section'    	=> 'yf_metadata',
          'settings'   	=> 'yf_metadata_image',
        ],
      ),
    );
  }
}