<?php

/**
 * Sanitize a checkbox.
 */
function sanitize_checkbox( $input ) {
  return ( 1 === absint( $input ) ) ? 1 : 0;
}