<?php

/**
 * Defines the custom controls to include.
 */
$customControls = [
  "multiple-checkbox-control"
];

/**
 * Defines the custom sanitizers to include.
 */
$customSanitizers = [
  "multiple-checkbox-control-sanitizer"
];

/**
 * Include custom controls.
 */
foreach ($customControls as $control) {
  include($control . ".php");
}

/**
 * Include custom sanitizers.
 */
foreach ($customSanitizers as $sanitizer) {
  include("sanitizers/" . $sanitizer . ".php");
}
