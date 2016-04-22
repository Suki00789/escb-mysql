<?php namespace ThemeXpert\FormEngine;

class FormEngine {
  protected $controlsTransformer;

  public function __construct( ControlsTransformer $controlsTransformer ) {
    $this->controlsTransformer = $controlsTransformer;
  }

  public function transform( $form ) {
    foreach ( $form as &$controls ) {
      $controls = $this->controlsTransformer->transform( $controls );
    }

    return $form;
  }
}
