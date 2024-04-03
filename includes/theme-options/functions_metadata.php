<?php

class MetadataCustomizer implements IThemeCustomizer {
  public static function Customize( $wp_customize ) {
    /** 
     * Section
    */
    $wp_customize->add_section(
      'yanka_metadata',
      [
        'title'      => __( 'Metadata', 'yankaforge' ),
        'priority'   => 40,
        'capability' => 'edit_theme_options',
        'panel'      => '',
      ]
    );

    // Title
    $wp_customize->add_setting(
      'yanka_metadata_title',
      [
        'type'              => 'theme_mod',
        'default'           => __( 'My Website', 'yankaforge' ),
        'sanitize_callback' => 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yanka_metadata_title',
      [
        'type'     => 'text',
        'label'    => __( 'Title', 'yankaforge' ),
        'section'  => 'yanka_metadata',
        'settings' => 'yanka_metadata_title',
        'priority' => '0',
      ]
    );

    // Description
    $wp_customize->add_setting(
      'yanka_metadata_description',
      [
        'type'              => 'theme_mod',
        'default'           => __( 'Description of my Website', 'yankaforge' ),
        'sanitize_callback' => 'wp_kses_post',
      ]
    );
    $wp_customize->add_control(
      'yanka_metadata_description',
      [
        'type'     => 'textarea',
        'label'    => __( 'Description', 'yankaforge' ),
        'section'  => 'yanka_metadata',
        'settings' => 'yanka_metadata_description',
        'priority' => '10',
      ]
    );

    // Image
    $wp_customize->add_setting(
      'yanka_metadata_image',
      [
        'type'							=> 'theme_mod',
        'default'						=> '',
        'sanitize_callback'	=> 'absint',
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Media_Control(
        $wp_customize,
        'yanka_metadata_image',
        [
          'mime_type' 	=> 'image',
          'label'      	=> __( 'OpenGraph Image', 'yankaforge' ),
          'description' => __('Image displayed in search engines and shared content on social networks.', 'intentionnaly-blank'),
          'section'    	=> 'yanka_metadata',
          'settings'   	=> 'yanka_metadata_image',
        ],
      ),
    );
  }
}