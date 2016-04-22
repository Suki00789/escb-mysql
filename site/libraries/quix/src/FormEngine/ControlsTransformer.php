<?php namespace ThemeXpert\FormEngine;

use ThemeXpert\FormEngine\Transformers\ColorPickerTransformer;
use ThemeXpert\FormEngine\Transformers\DividerTransformer;
use ThemeXpert\FormEngine\Transformers\EditorTransformer;
use ThemeXpert\FormEngine\Transformers\GroupRepeaterTransformer;
use ThemeXpert\FormEngine\Transformers\IconPickerTransformer;
use ThemeXpert\FormEngine\Transformers\ImageTransformer;
use ThemeXpert\FormEngine\Transformers\InputRepeaterTransformer;
use ThemeXpert\FormEngine\Transformers\LinkTransformer;
use ThemeXpert\FormEngine\Transformers\MarginTransformer;
use ThemeXpert\FormEngine\Transformers\NoteTransformer;
use ThemeXpert\FormEngine\Transformers\SelectTransformer;
use ThemeXpert\FormEngine\Transformers\SliderTransformer;
use ThemeXpert\FormEngine\Transformers\SwitchTransformer;
use ThemeXpert\FormEngine\Transformers\TextareaTransformer;
use ThemeXpert\FormEngine\Transformers\TextTransformer;
use ThemeXpert\FormEngine\Transformers\TypographyTransformer;

class ControlsTransformer {
  public function __construct() {
    $this->dividerTransformer = new DividerTransformer();
    $this->noteTransformer = new NoteTransformer();
    $this->editorTransformer = new EditorTransformer();
    $this->textTransformer = new TextTransformer();
    $this->selectTransformer = new SelectTransformer();
    $this->switchTransformer = new SwitchTransformer();
    $this->textareaTransformer = new TextareaTransformer();
    $this->colorPickerTransformer = new ColorPickerTransformer();
    $this->groupRepeaterTransformer = new GroupRepeaterTransformer( $this );
    $this->inputRepeaterTransformer = new InputRepeaterTransformer();
    $this->sliderTransformer = new SliderTransformer();
    $this->marginTransformer = new MarginTransformer();
    $this->typographyTransformer = new TypographyTransformer();
    $this->iconPickerTransformer = new IconPickerTransformer();
    $this->linkTransformer = new LinkTransformer();
    $this->imageTransformer = new ImageTransformer();
  }

  public function transform( $controls ) {
    return array_map( [ $this, 'transformControl' ], $controls );
  }

  public function transformControl( $control ) {
    switch ( array_get( $control, 'type' ) ) {
      case "editor":
        return $this->editorTransformer->transform( $control );
      case "select":
        return $this->selectTransformer->transform( $control );
      case "image":
        return $this->imageTransformer->transform( $control );
      case "textarea":
        return $this->textareaTransformer->transform( $control );
      case "link":
        return $this->linkTransformer->transform( $control );
      case "note":
        return $this->noteTransformer->transform( $control );
      case "divider":
        return $this->dividerTransformer->transform( $control );
      case "switch":
        return $this->switchTransformer->transform( $control );
      case "group-repeater":
        return $this->groupRepeaterTransformer->transform( $control );
      case "input-repeater":
        return $this->inputRepeaterTransformer->transform( $control );
      case "color":
      case "colorpicker":
        return $this->colorPickerTransformer->transform( $control );
      case "icon":
      case "iconpicker":
        return $this->iconPickerTransformer->transform( $control );
      case "slider":
        return $this->sliderTransformer->transform( $control );
      case "typography":
        return $this->typographyTransformer->transform( $control );
      case "margin":
      case "padding":
        return $this->marginTransformer->transform( $control );
      default:
        return $this->textTransformer->transform( $control );
    }
  }
}
