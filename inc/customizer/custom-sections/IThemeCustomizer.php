<?php

interface IThemeCustomizer {
  public static function Customize( $wp_customize, $priority = -1 );
}