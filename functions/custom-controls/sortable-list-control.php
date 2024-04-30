<?php

/**
 * Sortable list Custom Control
 * 
 * @author Yannick Tirand <http://github.com/Ynk33>
 */
class YF_Sortable_List_Control extends YF_Custom_Control {
  
  /**
   * The type of control being rendered.
   *
   * @access public
   * @var    string
   */
  public $type = 'sortable-list';

  /**
   * Button labels.
   *
   * @access public
   * @var    array
   */
  public $button_labels = [];

  /**
   * Constructor.
   */
  public function __construct( $manager, $id, $args = array(), $options = array() ) {
    parent::__construct( $manager, $id, $args );

    // Merge the passed button labels with our default labels
    $this->button_labels = wp_parse_args( $this->button_labels,
      array(
        'add' => __( 'Add', 'yankaforge' ),
      )
    );
  }

  /**
   * Displays the control content.
   *
   * @access public
   * @return void
   */
  public function render_content() {
    ?>
    <div class="sortable_list_control">

      <?php if ( empty($this->choices) ) return; ?>

      <?php if( !empty( $this->label ) ) { ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <?php } ?>

      <?php if( !empty( $this->description ) ) { ?>
        <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
      <?php } ?>

      <input type="hidden" id="customize-control-sortable-list-choices-keys" value="<?php echo implode(",", array_keys($this->choices)); ?>" />
      <input type="hidden" id="customize-control-sortable-list-choices-values" value="<?php echo implode(",", array_values($this->choices)); ?>" />
      <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-sortable-list" <?php $this->link(); ?> />
      
      <div class="sortable_list sortable">
        <div class="list">
          <select class="list-input">
            <?php foreach ($this->choices as $value => $label) : ?>
              <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
            <?php endforeach; ?>
          </select><span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-list-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a>
        </div>
      </div>

      <div class="sortable_list_error"></div>

      <button class="button customize-control-sortable-list-add" type="button"><?php echo $this->button_labels['add']; ?></button>
    </div>

    <?php
  }
}