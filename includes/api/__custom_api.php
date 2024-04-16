<?php

/**
 * Custom functions to expose the menu in the REST API.
 */

 $includes = [
  "maintenance",
  "metadata",
  "menu",
  "about",
  "contact",
  "footer",
];

foreach ($includes as $include) {
  include("api_" . $include . ".php");
}