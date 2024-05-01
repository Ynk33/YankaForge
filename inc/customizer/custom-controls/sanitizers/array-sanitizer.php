<?php

/**
 * Sanitize an array of strings.
 *
 * @param string $values Values.
 * @return array Checked values.
 */
function sanitize_array( $values ) {

	$multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
