<?php namespace ThemeXpert\Quix\Renderers;

use Mobile_Detect;
use ThemeXpert\Quix\Renderers\Contracts\NodeRendererInterface;
use ThemeXpert\View\View;

class NodeRenderer implements NodeRendererInterface {
  /**
   * @var View
   */
  protected $view;
  protected $form;

  /**
   * @param View $view
   * @param Mobile_Detect $detect
   * @param $nodes
   */
  public function __construct( View $view, Mobile_Detect $detect, $nodes ) {
    $this->view = $view;
    $this->detect = $detect;
    $this->nodes = $nodes;

    $this->isMobile = $this->detect->isMobile();
    $this->isTablet = $this->detect->isTablet();
  }

  public function renderNode( $node ) {
    $schema = array_find_by( $this->nodes, 'slug', $node['slug'] );

    if ( ! $schema ) {
      return "<!----node not found---->";
    }

    if ( $this->isMobile && ! $node['visibility']['xs'] ) {
      return "<!--- {$node['form']['advanced']['label']} hidden from mobile device ---!>";
    } elseif ( $this->isTablet && ! $node['visibility']['sm'] ) {
      return "<!--- {$node['form']['advanced']['label']} hidden from tablet device ---!>";
    }

    /**
     * FIXME: throw exception
     */
    if ( ! file_exists( $schema['view_file'] ) ) {
      return "<!--view file {$schema['view_file']} does not exist-->";
    }

    $data = $this->getData( $node, $schema );

    $override_file = QUIX_TEMPLATE_PATH . "/overrides/" . $node['slug'] . "/view.php";
    if ( file_exists( $override_file ) ) {
      return $this->view->make( $override_file, $data );
    }

    return $this->view->make( $schema['view_file'], $data );
  }

  /**
   * FIXME: CACHE THIS
   *
   * @param $node
   * @param $schema
   *
   * @return array
   */
  public function getData( $node, $schema ) {
    $field = flatten_array( array_get( $node, 'form', [ ] ) );
    $field = $this->merge_data( $field, flatten_array( array_get( $schema, 'form', [ ] ) ) );

    $visibility = array_get( $node, 'visibility', [ ] );

    return [
      'renderer' => $this,
      'title' => array_get( $field, 'title', null ),
      'id' => array_get( $field, 'id', null ),
      'type' => array_get( $node, 'slug', null ),
      'size' => array_get( $node, 'size', [ ] ),
      'visibility' => $visibility,
      'visibilityClasses' => visibilityClasses( $visibility ),
      'field' => $field,
      'node' => $node,
    ];
  }

  protected function merge_data( $data, $form ) {
    $form = array_reduce( $form, function ( $carry, $control ) {
      $carry[$control['name']] = $control['value'];

      return $carry;
    }, [ ] );

    $data = array_merge_recursive_distinct( $form, $data );

    return $data;
  }

  public function render( $nodes ) {
    return implode( "", $this->renderNodes( $nodes ) );
  }

  public function renderNodes( $nodes ) {
    return array_map( [ $this, 'renderNode' ], $nodes );
  }

  protected function setForm( $form ) {
    $this->form = $form;
  }
}
