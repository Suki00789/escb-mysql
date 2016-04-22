<?php namespace ThemeXpert\Quix\Renderers;

use ThemeXpert\Quix\Cache;

class WebFontsRenderer {
  /**
   * @var Cache
   */
  protected $cache;

  public function __construct( Cache $cache, $allNodes ) {
    $this->allNodes = $allNodes;
    $this->cache = $cache;
  }

  function get_node_typography_controls( $node ) {
    $controls = flatten_array( $node['form'] );
    $fontControls = array_filter( $controls, function ( $control ) {
      if ( $control['type'] == "typography" ) {
        return true;
      }

      return false;
    } );

    /**
     * array_values to reindex
     */
    $names = array_values( array_map( function ( $control ) {
      return $control['name'];
    }, $fontControls ) );

    return [ 'names' => $names, 'slug' => $node['slug'] ];
  }

  function get_nodes_fonts_map( $nodes ) {
    $nodes = array_map( [ $this, 'get_node_typography_controls' ], $nodes );

    /*
	 * remove nodes that does not have typography
	 */
    $nodes = array_filter( $nodes, function ( $node ) {
      if ( count( $node['names'] ) ) {
        return true;
      }

      return false;
    } );

    /**
     * make a map out of the list
     */
    $nodes = array_reduce( $nodes, function ( $carry, $node ) {
      $carry[$node['slug']] = $node['names'];

      return $carry;
    }, [ ] );

    return $nodes;
  }

  function get_used_fonts_in_node( $node, $nodes ) {
    /**
     * slug may not exist
     * throw exception
     */
    $slug = $node['slug'];

    /**
     * throw exception
     * what if schema does not exist?
     *
     * return false/[]
     */
    if ( array_key_exists( $slug, $nodes ) ) {
      $fields = $nodes[$slug];
    } else {
      return [ ];
    }
    //fixme: 1 flatten
    $form = flatten_array( $node['form'] );
    $fonts = array_pick( $form, $fields, true );

    $fonts = array_values( array_map( function ( $font ) {
      //family might not exist
      return array_get( $font, 'family', "" );
    }, $fonts ) );

    return $fonts;
  }

  function traverse_node_for_fonts( $node, $nodes ) {
    $fonts = $this->get_used_fonts_in_node( $node, $nodes );

    if ( array_key_exists( 'children', $node ) ) {
      $childFonts = array_map( function ( $node ) use ( $nodes ) {
        return $this->traverse_node_for_fonts( $node, $nodes );
      }, $node['children'] );

      return array_merge( $fonts, $childFonts );
    }

    return $fonts;
  }

  function getUsedFonts( $data ) {
    $nodes_fonts_map = $this->cache->fetch( 'nodes_fonts_map', function () {
      return $this->get_nodes_fonts_map( $this->allNodes );
    } );

    $fonts = array_map( function ( $node ) use ( $nodes_fonts_map ) {
      return $this->traverse_node_for_fonts( $node, $nodes_fonts_map );
    }, $data );

    return array_filter( array_unique( array_flatten( $fonts ) ) );
  }
}
