<?php namespace ThemeXpert\Quix\Library;

use ThemeXpert\FileSystem\FileSystem;

class Library {
  protected $templates = [ ];
  protected $ignoredGroups = [ ];
  protected $paths = [ ];

  public function fill( $path, $url, $groups = [ ] ) {
    $this->paths[] = compact( "path", "url", "groups" );
  }

  public function add( $file, $url, $groups = [ ] ) {
    $config = json_decode( file_get_contents( $file ), true );
    if ( ! is_array( $config ) ) {
      return;
    }

    $filename = basename( $file );

    if ( ! array_key_exists( 'screenshot', $config ) ) {
      $imageName = str_replace( '.json', '.jpg', $filename );
      $config['screenshot'] = trailingslashit( $url ) . $imageName;
    }

    if ( ! array_key_exists( 'groups', $config ) ) {
      $config['groups'] = [ ];
    }

    if ( ! array_key_exists( 'id', $config ) ) {
      $config['id'] = $filename;
    }

    if ( ! is_array( $config['groups'] ) ) {
      $config['groups'] = (array) $config['groups'];
    }

    $config['groups'] = array_merge( $config['groups'], (array) $groups );

    $this->templates[] = $config;
  }

  public function loadAll() {
    $this->templates = [ ];

    foreach ( $this->paths as $path ) {
      $files = FileSystem::files( $path['path'], 'json' );

      foreach ( $files as $file ) {
        $config_file = untrailingslashit( $path['path'] ) . DIRECTORY_SEPARATOR . $file;
        $this->add( $config_file, $path['url'], $path['groups'] );
      }
    }
  }

  public function all() {
    $this->loadAll();
    $ignoredGroups = $this->getIgnoredGroups();

    return array_filter( $this->templates, function ( $template ) use ( $ignoredGroups ) {
      return ! count( array_intersect( $template['groups'], $ignoredGroups ) );
    } );
  }

  /**
   * @return array
   */
  public function getIgnoredGroups() {
    return $this->ignoredGroups;
  }

  /**
   * @param array $ignoredGroups
   */
  public function setIgnoredGroups( $ignoredGroups ) {
    $this->ignoredGroups = array_unique( array_merge( (array) $ignoredGroups, $this->ignoredGroups ) );
  }
}
