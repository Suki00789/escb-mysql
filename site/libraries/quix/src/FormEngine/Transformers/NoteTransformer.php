<?php namespace ThemeXpert\FormEngine\Transformers;

use ThemeXpert\FormEngine\Contracts\ControlTransformer;

class NoteTransformer extends ControlTransformer{
  public function transform($config) {
    $c = parent::transform($config);

    $c['desc'] = $this->get($config, 'desc', 'Note');
    $c['class'] = $this->getClass($config);

    return $config;
  }
}
