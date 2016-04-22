<?php


if ( ! function_exists( 'startsWith' ) ) {
  function startsWith( $haystack, $needle ) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos( $haystack, $needle, - strlen( $haystack ) ) !== false;
  }
}

if ( ! function_exists( 'endsWith' ) ) {
  function endsWith( $haystack, $needle ) {
    // search forward starting from end minus needle length characters
    return $needle === "" || ( ( $temp = strlen( $haystack ) - strlen( $needle ) ) >= 0 && strpos( $haystack, $needle, $temp ) !== false );
  }
}

if ( ! function_exists( 'trailingslashit' ) ) {
  function trailingslashit( $string ) {
    return untrailingslashit( $string ) . '/';
  }
}

if ( ! function_exists( 'untrailingslashit' ) ) {
  function untrailingslashit( $string ) {
    return rtrim( $string, '/\\' );
  }
}


function classNames() {
  $args = func_get_args();

  $classes = array_map( function ( $arg ) {
    if ( is_array( $arg ) ) {
      return implode( " ", array_filter( array_map( function ( $expression, $class ) {
        return $expression ? $class : false;
      }, $arg, array_keys( $arg ) ) ) );
    }

    return $arg;
  }, $args );

  return implode( " ", array_filter( $classes ) );
}


function visibilityClasses( $visibility ) {
  return classNames( [
    'qx-hidden-lg' => ! $visibility['lg'],
    'qx-hidden-md' => ! $visibility['md'],
    'qx-hidden-sm' => ! $visibility['sm'],
    'qx-hidden-xs' => ! $visibility['xs'],
  ] );
}
