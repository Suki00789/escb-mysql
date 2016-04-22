<?php namespace ThemeXpert\FormEngine\Transformers;

class ColorPickerTransformer extends TextTransformer{
  public function getValue($config) {
    return $this->get($config, 'default', "");
  }
}
