<?php namespace ThemeXpert\Quix;

use Doctrine\Common\Cache\Cache as DoctrineCache;

class Cache {
  /**
   * @var DoctrineCache
   */
  private $cache;
  private $cacheLifeTime;
  private $shouldCache;

  /**
   * @param DoctrineCache $cache
   * @param $cacheLifeTime
   * @param $shouldCache
   */
  public function __construct( DoctrineCache $cache, $cacheLifeTime, $shouldCache ) {
    $this->cache = $cache;
    $this->cacheLifeTime = $cacheLifeTime;
    $this->shouldCache = $shouldCache;

    if ( array_get( $_GET, 'clear_cache' ) ) {
      $this->clearCache();
    }
  }

  /**
   * @param int $cacheLifeTime
   *
   * @return Application
   */
  public function setCacheLifeTime( $cacheLifeTime ) {
    $this->cacheLifeTime = $cacheLifeTime;

    return $this;
  }

  public function clearCache() {
    $this->cache->deleteAll();
  }

  public function fetch( $id ) {
    $args = func_get_args();

    if ( count( $args ) === 1 ) {
      return $this->cache->fetch( $id );
    } else {
      $func = $args[1];

      if ( !$this->shouldCache ) {
        return $func();
      } else if ( $this->cache->contains( $id ) ) {
        return $this->cache->fetch( $id );
      } else {
        $data = $func();
        $this->cache->save( $id, $data, $this->cacheLifeTime );

        return $data;
      }
    }
  }
}
