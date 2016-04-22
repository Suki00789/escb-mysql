<?php namespace ThemeXpert\Quix\Element\Config;

use ThemeXpert\Config\Contracts\ValidatorInterface;

class Validator implements ValidatorInterface {
  public function validate( $config, $file ) {
    $name = array_get( $config, 'name' );
    $slug = array_get( $config, 'slug' );

    if ( ! $name ) {
      xception( "element `name` is not defined in `{$file}`" );
    }

    if ( ! $slug ) {
      xception( "element `slug` is not defined in `{$file}`" );
    }
  }

  /**
   * @param $file
   * @param $elements
   * @param $slug
   */
  public function removeDuplicates( $file, $slug, $elements ) {
    if ( array_get( $elements, $slug ) ) {
      xception( "please change slug '{$slug}'<br /> slug '{$slug}' defined in `{$file}`" .
                " is already used in `{$elements[$slug]['file']}`" );
    }
  }

}
