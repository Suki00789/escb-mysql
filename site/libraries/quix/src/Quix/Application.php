<?php namespace ThemeXpert\Quix;


use Mobile_Detect;
use Pimple\Container;
use Symfony\Component\Yaml\Yaml;
use ThemeXpert\FormEngine\ControlsTransformer;
use ThemeXpert\FormEngine\FormEngine;

use ThemeXpert\Quix\Element\Config\Transformer as ElementTransformer;
use ThemeXpert\Quix\Element\Config\Validator as ElementValidator;
use ThemeXpert\Quix\Element\ElementBag;

use ThemeXpert\Quix\Library\Library;
use ThemeXpert\Quix\Node\Config\Transformer as NodeTransformer;
use ThemeXpert\Quix\Node\Config\Validator as NodeValidator;
use ThemeXpert\Quix\Node\NodeBag;
use ThemeXpert\Quix\Renderers\NodeRenderer;
use ThemeXpert\Quix\Renderers\StyleRenderer;
use ThemeXpert\Quix\Renderers\WebFontsRenderer;
use ThemeXpert\View\Engines\PhpEngine;
use ThemeXpert\View\View;

class Application {
  protected $allNodes;
  protected $container;
  protected $cache;
  protected $cacheLifeTime;

  /**
   * Application constructor.
   *
   * @param Container $container
   * @param Cache $cache
   */
  public function __construct( Container $container, Cache $cache ) {
    $this->container = $container;
    $this->cache = $cache;

    $this->initContainer();
  }

  public function initContainer() {
    $this->container['elements'] = function ( $container ) {
      $validator = new ElementValidator();
      $transformer = new ElementTransformer( new FormEngine( new ControlsTransformer() ) );
      $form = Yaml::parse( file_get_contents( QUIX_PATH . "/app/config/append.yml" ) );
      $transformer->setAppendForm( $form );

      return new ElementBag( $validator, $transformer );
    };

    $this->container['nodes'] = function ( $container ) {
      $validator = new NodeValidator();
      $transformer = new NodeTransformer( new FormEngine( new ControlsTransformer() ) );
      $form = Yaml::parse( file_get_contents( QUIX_PATH . "/app/config/append.yml" ) );
      $transformer->setAppendForm( $form );

      return new NodeBag( $validator, $transformer );
    };

    $this->container['presets'] = function ( $container ) {
      return new Library();
    };

    $this->container['allNodes'] = function ( $container ) {
      $elements = $this->getElements();
      $nodes = $this->getNodes();

      return array_merge( $elements, $nodes );
    };

    $this->container['mobile_detect'] = function ( $container ) {
      return new Mobile_Detect();
    };

    $this->container['view'] = function ( $container ) {
      return new View( new PhpEngine() );
    };

    $this->container['viewRenderer'] = function ( $container ) {
      return new NodeRenderer( $container['view'], $container['mobile_detect'], $container['allNodes'] );
    };

    $this->container['styleRenderer'] = function ( $container ) {
      return new StyleRenderer( $container['view'], $container['mobile_detect'], $container['allNodes'] );
    };

    /**
     * @param $container
     *
     * @return WebFontsRenderer
     */
    $this->container['webFontsRenderer'] = function ( $container ) {
      return new WebFontsRenderer( $this->cache, $this->getAllNodes() );
    };
  }

  public function getElementsBag() {
    return $this->container['elements'];
  }

  public function getNodesBag() {
    return $this->container['nodes'];
  }

  public function getPresetsBag() {
    return $this->container['presets'];
  }

  public function getAllNodes() {
    return $this->container['allNodes'];
  }

  public function getViewRenderer() {
    return $this->container['viewRenderer'];
  }

  public function getStyleRenderer() {
    return $this->container['styleRenderer'];
  }

  public function getWebFontsRenderer() {
    return $this->container['webFontsRenderer'];
  }

  public function getNodes() {
    return $this->cache->fetch( 'nodes', function () {
      return $this->getNodesBag()->load()->getConfigBag()->getConfigs();
    } );
  }

  public function getElements() {
    return $this->cache->fetch( 'elements', function () {
      return $this->getElementsBag()->load()->getConfigBag()->getConfigs();
    } );
  }

  public function getPresets() {
    return $this->cache->fetch( 'presets', function () {
      return $this->getPresetsBag()->all();
    } );
  }

  /**
   * @return Cache
   */
  public function getCache() {
    return $this->cache;
  }
}
