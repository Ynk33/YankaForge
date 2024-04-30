<?php

/**
 * Custom Control Base Class
 * 
 * @author Yannick Tirand <http://github.com/Ynk33>
 */
class YF_Custom_Control extends WP_Customize_Control {

  /**
   * Paths to the theme's custom controls JS and CSS scripts.
   */
  protected $jsPath = "";
  protected $cssPath = "";

  /**
   * Constructor.
   */
  public function __construct( $manager, $id, $args = [], $options = [] ) {
    parent::__construct( $manager, $id, $args );

    /**
     * Sets up the paths.
     */
    $this->jsPath = trailingslashit( get_template_directory_uri() ) . 'functions/custom-controls/js/customize-controls.js';
    $this->cssPath = trailingslashit( get_template_directory_uri() ) . 'functions/custom-controls/css/customize-controls.css';
  }

  /**
   * Enqueue scripts/styles.
   *
   * @access public
   * @return void
   */
  public function enqueue() {
    wp_enqueue_script( 'yf-customize-controls-js', $this->jsPath, [ 'jquery', 'jquery-ui-core' ], null, true );
    wp_enqueue_style( 'yf-customize-controls-css', $this->cssPath, [], null, 'all' );
  }
}