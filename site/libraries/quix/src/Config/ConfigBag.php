<?php namespace ThemeXpert\Config;

use ThemeXpert\Config\Contracts\TransformerInterface;
use ThemeXpert\Config\Contracts\ValidatorInterface;
use ThemeXpert\Config\Exceptions\DirectoryNotFoundException;

class ConfigBag {
  protected $configs = [ ];
  protected $transformer;
  protected $validator;

  /**
   * @param ValidatorInterface $validator
   * @param TransformerInterface $transformer
   */
  public function __construct( ValidatorInterface $validator, TransformerInterface $transformer ) {
    $this->validator = $validator;
    $this->transformer = $transformer;
  }

  /**
   * @param $path
   * @param $url
   * @param $groups
   *
   * @return $this
   * @throws DirectoryNotFoundException
   */
  public function fill( $path, $url, $groups ) {
    if(!is_dir($path)) {
      throw new DirectoryNotFoundException("directory `{$path}` was not found in filesystem");
    }

    $configs = $this->load( $path, $url );
    $this->validate( $configs );

    $configs = $this->transform( $configs );
    $configs = $this->setGroups( $configs, $groups );

    $this->configs = array_merge( $this->configs, $configs );

    return $this;
  }

  /**
   * @return array
   */
  public function getConfigs() {
    return $this->configs;
  }

  /**
   * @param $path
   * @param $url
   *
   * @return array
   */
  protected function load( $path, $url ) {
    $loader = new Loader( $path, $url );

    return $loader->load();
  }

	/**
   * @param $configs
   *
   * @return mixed
   */
  protected function validate( $configs ) {
    $configs = array_reduce( $configs, function ( $carry, $config ) {
      $this->validator->validate( $config, $config['file'] );

      return $carry;
    }, [ ] );

    return $configs;
  }

	/**
   * @param $configs
   *
   * @return array
   */
  protected function transform( $configs ) {
    $configs = array_map( function ( $config ) {
      return $this->transformer->transform( $config );
    }, $configs );

    return $configs;
  }

	/**
   * @param $configs
   * @param $groups
   *
   * @return array
   */
  protected function setGroups( $configs, $groups ) {
    $configs = array_map( function ( $config ) use ( $groups ) {
      $config['groups'] = array_merge( isset($config['groups'])?$config['groups']:[], (array) $groups );
      return $config;
    }, $configs );

    return $configs;
  }

}
