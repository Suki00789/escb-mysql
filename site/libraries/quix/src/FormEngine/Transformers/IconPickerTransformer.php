<?php namespace ThemeXpert\FormEngine\Transformers;

class IconPickerTransformer extends TextTransformer {
  public function getType($config, $type="") {
    return "icon";
  }
}
