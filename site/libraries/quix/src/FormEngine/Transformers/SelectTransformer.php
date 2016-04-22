<?php namespace ThemeXpert\FormEngine\Transformers;

class SelectTransformer extends TextTransformer {
  public function getType( $config, $type = "" ) {
    return "select";
  }

  public function getOptions( $config ) {
    return $this->get( $config, 'options', [ ] );
  }

  public function transform( $config ) {
    $options = $this->getOptions( $config );
    $options = array_map( function ( $value, $label ) {
      return compact( "value", "label" );
    }, array_keys( $options ), array_values( $options ) );

    $config = parent::transform( $config );
    $config['options'] = $options;

    return $config;
  }
}
