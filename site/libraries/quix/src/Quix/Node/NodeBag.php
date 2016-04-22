<?php namespace ThemeXpert\Quix\Node;

use ThemeXpert\Config\ConfigBag;
use ThemeXpert\Config\Exceptions\DirectoryNotFoundException;

class NodeBag {
  protected $configBag;
  protected $pathBags = [ ];

  public function fill( $path, $url, $groups = [ ] ) {
    $this->pathBags[] = compact( "path", "url", "groups" );
  }

  public function load() {
    foreach ( $this->pathBags as $bag ) {
      call_user_func_array( [ $this, 'add' ], $bag );
    }

    return $this;
  }

  public function __construct( $validator, $transformer ) {
    $this->configBag = new ConfigBag( $validator, $transformer );
  }

  public function add( $path, $url, $group = [ ] ) {
    try {
      $this->configBag->fill( $path, $url, $group );
    } catch ( DirectoryNotFoundException $e ) {
      xception( $e->getMessage() );
    }

    return $this;
  }

  /**
   * @return ConfigBag
   */
  public function getConfigBag() {
    return $this->configBag;
  }
}
