<?php namespace ThemeXpert\FormEngine\Transformers;


class SliderTransformer extends TextTransformer {
  public function transform( $config ) {
    $c = parent::transform($config);
    $c['value'] = $this->getValue( $config );
    $c['name'] = $this->getName( $config );
    $c['type'] = $this->getType( $config );
    $c['label'] = $this->getLabel( $config );
    $c['class'] = $this->getClass( $config );
    $c['help'] = $this->getHelp( $config );

    $c['suffix'] = $this->getSuffix( $config );
    $c['min'] = $this->getMin( $config );
    $c['max'] = $this->getMax( $config );
    $c['step'] = $this->getStep( $config );

    if($this->getDepends($config)){
      $c['depends'] = $this->getDepends($config);
    }

    return $c;
  }

  public function getMax( $config ) {
    return $this->get( $config, 'max', 100 );
  }

  public function getSuffix( $config ) {
    return $this->get( $config, 'suffix', "" );
  }

  public function getMin( $config ) {
    return $this->get( $config, 'min', 0 );
  }

  public function getStep( $config ) {
    return $this->get( $config, 'step', 1 );
  }

  public function getValue( $config ) {
    return $this->get( $config, 'value', 0 );
  }
}
