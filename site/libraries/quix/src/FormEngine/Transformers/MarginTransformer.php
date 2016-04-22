<?php namespace ThemeXpert\FormEngine\Transformers;

class MarginTransformer extends TextTransformer {
  public function getType( $config, $type = "" ) {
    return "margin";
  }

  public function getValue( $config ) {
    $value = $this->get( $config, "value", null );
    if ( $value === null ) {
      return [
        "top" => "",
        "left" => "",
        "bottom" => "",
        "right" => "",
      ];
    } else {
      $value = (array) $value;
    }

    $value = array_pick( $value, [ "top", "left", "bottom", "right" ], true ); //exclusive

    return $value;
  }
}
