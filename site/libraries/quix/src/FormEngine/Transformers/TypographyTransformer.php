<?php namespace ThemeXpert\FormEngine\Transformers;

class TypographyTransformer extends TextTransformer {
  public function getType( $config, $type="") {
    return "typography";
  }

  public function getValue( $config ) {
    $value = $this->get( $config, "value", null );

    if ( $value === null ) {
      return [
        "size"=>"", "bold"=>"", "underline"=>"", "italic"=>"",
        "family"=>"", "case"=>"", "spacing"=>"", "height"=>"",
      ];
    } else {
      $value = (array) $value;
    }

    $value = array_pick( $value, [
      "size", "bold", "underline", "italic",
      "family", "case", "spacing", "height"
    ], true); //exclusive

    return $value;
  }
}
