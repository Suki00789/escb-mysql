<?php namespace ThemeXpert\Quix\Node\Config;

use ThemeXpert\Config\Contracts\TransformerInterface;
use ThemeXpert\FormEngine\FormEngine;

class Transformer implements TransformerInterface {
  /**
   * @var FormEngine
   */
  protected $formEngine;
  protected $appendForm = [ ];

  public function __construct( FormEngine $formEngine ) {
    $this->formEngine = $formEngine;
  }

  public function transform( $config ) {
    $config['view_file'] = $this->getView( $config );
    $config['css_file'] = $this->getCss( $config );
    $config['dynamic_style_file'] = $this->getStyle( $config );
    $config['form'] = $this->getForm( $config );
    $config['visibility'] = $this->getVisibility( $config );
    $config['thumb_file'] = $this->getThumbnail( $config );

    return $config;
  }

  public function getForm( $config ) {
    $form = array_get( $config, 'form', [ ] );

    //local copy
    $appendForm = $this->appendForm;

    /*
     * If there is something in the config file then add it to the append file
     */
    foreach ($appendForm as $tab=>$controls) {
      if(array_key_exists($tab, $form)){
        $appendForm[$tab] = array_merge($controls, $form[$tab]);
      }
    }

    //merge all
    $form = array_merge($form, $appendForm);

    return $this->formEngine->transform($form);
  }

  /**
   * @param $config
   *
   * @return string
   */
  protected function getView( $config ) {
    if ( array_get( $config, 'view' ) ) {
      return $config['path'] . "/" . $config['view'];
    } else {
      return $config['path'] . "/view.php";
    }
  }

  /**
   * @param mixed $appendForm
   */
  public function setAppendForm( $appendForm ) {
    $this->appendForm = $appendForm;
  }

  /**
   * @param $config
   *
   * @return string
   */
  protected function getThumbnail( $config ) {
    if ( array_get( $config, 'thumb' ) ) {
      return $config['url'] . "/" . $config['thumb'];
    } else {
      if ( file_exists( $config['path'] . "/node.svg" ) ) {
        return $config['url'] . "/node.svg";
      } else if ( file_exists( $config['path'] . "/node.png" ) ) {
        return $config['url'] . "/node.png";
      } else {
        return QUIX_DEFAULT_ELEMENT_IMAGE;
      }
    }
  }

  /**
   * @param $config
   *
   * @return string
   */
  protected function getStyle( $config ) {
    if ( array_get( $config, 'style' ) ) {
      return $config['path'] . "/" . $config['style'];
    } else {
      return $config['path'] . "/style.php";
    }
  }

  /**
   * @param $config
   *
   * @return string
   */
  protected function getCss( $config ) {
    if ( array_get( $config, 'css' ) ) {
      return $config['url'] . "/" . $config['css'];
    } else {
      return $config['url'] . "/node.css";
    }
  }

  /**
   * @param $config
   *
   * @return array
   */
  protected function getGroups( $config ) {
    return (array) array_get( $config, 'groups', [ ] );
  }

  protected function getVisibility( $config ) {
    return [ 'lg' => true, 'md' => true, 'sm' => true, 'xs' => true ];
  }
}
