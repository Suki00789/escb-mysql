<?php


namespace ThemeXpert\FormEngine\Transformers;


class InputRepeaterTransformer extends TextTransformer {
  public function getType($config, $type = "text") {
    return "input-repeater";
  }

  public function getSchema( $config) {
    return $this->get( $config, 'schema', [] );
  }

  public function transform( $config ) {
    $c = parent::transform($config);
    $c['value'] = $this->getValue( $config);
    $c['name'] = $this->getName( $config );
    $c['type'] = $this->getType( $config );
    $c['label'] = $this->getLabel( $config );
    $c['class'] = $this->getClass( $config );
    $c['help'] = $this->getHelp( $config );
    $c['schema'] = $this->getSchema( $config);
    $c['placeholder'] = $this->getPlaceholder( $config );

    return $c;
  }
}
