<?php

/**
 * Defines the custom controls to include.
 */
$customControls = [
  "custom-control", // Base class
  "sortable-list-control"
];

/**
 * Defines the custom sanitizers to include.
 */
$customSanitizers = [
  "array-sanitizer"
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
