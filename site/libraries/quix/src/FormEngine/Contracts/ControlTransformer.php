<?php namespace ThemeXpert\FormEngine\Contracts;


abstract class ControlTransformer implements ControlTransformerInterface {
  public function transform( $config ) {
    $output = [ ];
    $output['advanced'] = $this->get( $config, 'advanced', false );
    $output['depends'] = $this->getDepends( $config );
    $output['default'] = $this->getValue( $config );
    $output['reset'] = $this->get( $config, 'reset', false );

    return $output;
  }

  public function getValue( $config ) {
    return $this->get( $config, 'value', "" );
  }

  public function getLabel( $config, $label = null ) {
    if ( ! $label ) {
      $label = ucfirst( str_replace( "_", " ", $config['name'] ) );
    }

    return $this->get( $config, 'label', $label );
  }

  public function getPlaceholder( $config ) {
    return $this->get( $config, 'placeholder' );
  }

  public function getHelp( $config ) {
    return $this->get( $config, 'help' );
  }

  public function getClass( $config, $klass = null ) {
    if ( ! $klass ) {
      $klass = "fe-control-" . $this->getType( $config ) . " fe-control-name-" . $this->getName( $config );
    }

    return $klass . " " . $this->get( $config, 'class', '' );
  }

  public function getSchema( $config ) {
    return $this->get( $config, 'schema', [ ] );
  }

  public function getType( $config, $type = "text" ) {
    return $this->get( $config, 'type', $type );
  }

  public function getName( $config ) {
    return $this->get( $config, 'name' );
  }

  public function getDepends( $config ) {
    $depends = $this->get( $config, 'depends', [ ] );

    if ( ! is_array( $depends ) ) {
      return [
        $depends => "*",
      ];
    }

    return $depends;
  }

  public function get( $config, $key, $default = null ) {
    return array_get( $config, $key, $default );
  }
}
