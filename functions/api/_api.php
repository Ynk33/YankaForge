<?php

/**
 * The API files to include.
 */
 $includes = [
  "maintenance",
  "sections",
  "metadata",
  "menu",
  "about",
  "contact",
  "footer",
];

/**
 * Include the API files.
 */
foreach ($includes as $include) {
  include("api_" . $include . ".php");
}