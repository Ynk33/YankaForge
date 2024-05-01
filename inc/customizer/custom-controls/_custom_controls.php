<?php

/**
 * SANITIZERS
 */

/**
 * Defines the custom sanitizers to include.
 */
$customSanitizers = [
  "array-sanitizer",
  "checkbox-sanitizer"
];

/**
 * Include custom sanitizers.
 */
foreach ($customSanitizers as $sanitizer) {
  include("sanitizers/" . $sanitizer . ".php");
}

/**
 * CUSTOM CONTROLS
 */

/**
 * Defines the custom controls to include.
 */
$customControls = [
  "YF_Custom_Control", // Base class
  "YF_Sortable_List_Control"
];

/**
 * Include custom controls.
 */
foreach ($customControls as $control) {
  include($control . ".php");
}
