<?php namespace ThemeXpert\FormEngine\Transformers;

class LinkTransformer extends TextTransformer {
  public function getValue( $config ) {
    $value = (array) $this->get( $config, "value", []);

    if ( count($value) === 0 ) {
      return [
        "text" => "",
        "url" => "",
        "target" => false,
      ];
    } else {
      $value = (array) $value;
    }

    /** We do not need any of them that was not defined */
    $value = array_pick( $value, [ "url", "text", "target" ], true); //exclusive

    return $value;
  }
}
