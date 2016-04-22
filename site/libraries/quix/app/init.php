<?php
use Doctrine\Common\Cache\FilesystemCache;
use Pimple\Container;
use ThemeXpert\Quix\Application;
use ThemeXpert\Quix\Cache;

/**
 * @return Application
 */
function quix() {
  static $quix;
  if ( !$quix ) {
    $cache_time = 60 * 60 * 24;
    $should_cache = QUIX_CACHE;
    $container = new Container();
    $fsCache = new FilesystemCache( QUIX_CACHE_PATH );
    $cache = new Cache( $fsCache, $cache_time, $should_cache );
    $quix = new Application( $container, $cache );
  }

  return $quix;
}

/**
 * Load presets only when in editor
 */
if ( QUIX_EDITOR ) {
  quix()->getPresetsBag()->fill( QUIX_PATH . "/app/presets", QUIX_URL . "/app/presets" );

  if ( file_exists( QUIX_TEMPLATE_PATH . "/presets" ) ) {
    quix()->getPresetsBag()->fill( QUIX_TEMPLATE_PATH . "/presets", QUIX_TEMPLATE_URL . "/presets" );
  }
}

quix()->getElementsBag()->fill( QUIX_PATH . "/app/elements", QUIX_URL . "/app/elements" );
quix()->getNodesBag()->fill( QUIX_PATH . "/app/nodes", QUIX_URL . "/app/nodes" );

/** load elements from template if quix/elements*/
if ( file_exists( QUIX_TEMPLATE_PATH . "/elements" ) ) {
  quix()->getElementsBag()->fill( QUIX_TEMPLATE_PATH . "/elements", QUIX_TEMPLATE_URL . "/elements" );
}
