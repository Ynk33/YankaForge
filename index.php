<?php
/**
 * The base (and only) template
 *
 * @package WordPress
 * @subpackage yankaforge
 */

  $home = preg_replace("(^https?://)", "", get_home_url());
  $url = $_SERVER['HTTP_HOST'];

  if ($home != $url) {
    header('Location: ' . get_home_url(), true, 301);
  }
?>
