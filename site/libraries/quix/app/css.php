<?php

/*
 * Css Helper class to reduce repetitive code from style.php
 */

abstract class Css {
  static function fonts( $font ) {
    $css = '';
    $css .= ( array_key_exists( 'family', $font ) && trim( $font['family'] ) ) ? 'font-family:' . $font['family'] . ';' : '';
    $css .= ( array_key_exists( 'size', $font ) && trim( $font['size'] ) ) ? 'font-size:' . $font['size'] . ';' : '';
    $css .= ( array_key_exists( 'height', $font ) && trim( $font['height'] ) ) ? 'line-height:' . $font['height'] . ';' : '';
    $css .= ( array_key_exists( 'case', $font ) && trim( $font['case'] ) ) ? 'text-transform:' . $font['case'] . ';' : '';
    $css .= ( array_key_exists( 'spacing', $font ) && trim( $font['spacing'] ) ) ? 'letter-spacing:' . $font['spacing'] . ';' : '';
    $css .= ( array_key_exists( 'bold', $font ) && trim( $font['bold'] ) ) ? 'font-weight: bold;' : '';
    $css .= ( array_key_exists( 'italic', $font ) && trim( $font['italic'] ) ) ? 'font-style: italic;' : '';
    $css .= ( array_key_exists( 'underline', $font ) && trim( $font['underline'] ) ) ? 'text-decoration: underline;' : '';
    echo $css;
  }

  static function margin( $margin ) {
    $css = '';
    $css .= ( isset( $margin['top'] ) AND $margin['top'] ) ? 'margin-top:' . $margin['top'] . ';' : '';
    $css .= ( isset( $margin['bottom'] ) AND $margin['bottom'] ) ? 'margin-bottom:' . $margin['bottom'] . ';' : '';
    $css .= ( isset( $margin['left'] ) AND $margin['left'] ) ? 'margin-left:' . $margin['left'] . ';' : '';
    $css .= ( isset( $margin['right'] ) AND $margin['right'] ) ? 'margin-right:' . $margin['right'] . ';' : '';
    echo $css;
  }

  static function padding( $padding ) {
    $css = '';
    $css .= ( isset( $padding['top'] ) AND $padding['top'] ) ? 'padding-top:' . $padding['top'] . ';' : '';
    $css .= ( isset( $padding['bottom'] ) AND $padding['bottom'] ) ? 'padding-bottom:' . $padding['bottom'] . ';' : '';
    $css .= ( isset( $padding['left'] ) AND $padding['left'] ) ? 'padding-left:' . $padding['left'] . ';' : '';
    $css .= ( isset( $padding['right'] ) AND $padding['right'] ) ? 'padding-right:' . $padding['right'] . ';' : '';
    echo $css;
  }

  static function prop( $prop, $value, $boolean = null ) {
    if ( !$value ) {
      return null;
    }

    if ( is_bool( $value ) ) {
      if ( !$boolean ) {
        return null;
      }

      $value = $boolean;
    }

    echo "{$prop} : $value;";
  }

  //FIXME: check http
  static function image( $path ) {
    echo \JUri::root( true ) . '/' . $path;
  }
}
