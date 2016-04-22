<?php namespace ThemeXpert\FormEngine\Transformers;


class SwitchTransformer extends TextTransformer{
  public function getValue($config) {
    return $this->get($config, 'value', false);
  }
}
