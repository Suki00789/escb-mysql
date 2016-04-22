<?php

if ( ! function_exists( 'dd' ) ) {
  /**
   * @param           $var
   * @param bool|true $kill
   */
  function dd( $var, $kill = true ) {
    echo "<pre>";
    var_dump( $var );
    echo !$kill ? "</pre>" : die();
  }
}

if ( ! function_exists( 'pd' ) ) {
  /**
   * @param           $var
   * @param bool|true $kill
   */
  function pd( $var, $kill = true ) {
    echo "<pre>";
    print_r( $var );
    echo !$kill ? "</pre>" : die();
  }

}


if(!function_exists('xception')){
  function xception($message, $kill = true){
    echo $message;
    if($kill) die();
  }
}
