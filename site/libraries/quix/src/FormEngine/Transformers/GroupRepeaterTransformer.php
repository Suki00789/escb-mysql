<?php namespace ThemeXpert\FormEngine\Transformers;

use ThemeXpert\FormEngine\ControlsTransformer;

class GroupRepeaterTransformer extends TextTransformer {
  /**
   * @var
   */
  protected $controlsTransformer;

  /**
   * @param $controlsTransformer
   */
  public function __construct( ControlsTransformer $controlsTransformer ) {
    $this->controlsTransformer = $controlsTransformer;
  }

  public function transform( $config ) {
    $c = parent::transform( $config );

    $c['name'] = $this->getName( $config );
    $c['type'] = $this->getType( $config );
    $c['label'] = $this->getLabel( $config );
    $c['class'] = $this->getClass( $config );
    $c['help'] = $this->getHelp( $config );
    $c['schema'] = $this->getSchema( $config );
    $c['value'] = $this->getValue( $config );
    $c['placeholder'] = $this->getPlaceholder( $config );

    return $c;
  }

  public function getSchema( $config, $schema = [ ] ) {
    $schema = $this->get( $config, 'schema', $schema );
    $schema = array_map( function ( $control ) {
      $control['depends'] = $this->getDepends( $control );

      return $control;
    }, $schema );

    return $this->controlsTransformer->transform( $schema );
  }

  public function getValue( $config ) {
    $schema = $this->getSchema( $config );

    $value = array_map( function ( $group ) use ( $schema ) {
      $controls = array_map( function ( $control ) use ( $group ) {
        $control['value'] = $this->get( $group, $control['name'], $control['value'] );

        return $control;
      }, $schema );

      return $this->controlsTransformer->transform( $controls );
    }, $this->get( $config, 'value', [ ] ) );

    return $value;
  }
}
