<?php

function quix_js_data() {
  $url = QUIX_SITE_URL;
  $quix = quix();

  $id = array_get( $_GET, 'id' );
  $presets = $quix->getPresets();
  $nodes = json_encode( $quix->getNodes() );
  $elements = json_encode( $quix->getElements() );
  $model = $_GET['view'];
  $api = 'index.php?option=com_quix&task=' . $model . '.apply';
  $collections = qxGetCollections( true );
  $_token = JSession::getFormToken();

  $type = array_get( $_GET, 'type' );

  $quixData = json_encode( compact(
    'type',
    '_token',
    'collections',
    'model',
    'id',
    'api',
    'url',
    'presets',
    'nodes',
    'elements'
  ) );

  ?>
  var qx_site_url = '<?php echo $url ?>';
  var qx_elements = <?php echo $elements ?>;
  var qx_nodes = <?php echo $nodes ?>;
  var quix = <?php echo $quixData; ?>;
  <?php
}

function quix_footer() {
  ?>
  <script><?php quix_js_data(); ?></script>
  <script src="<?php echo QUIX_SITE_URL ?>/libraries/quix/assets/builder/bundle.js"></script>
  <?php
}

function quix_footer_credit() {
  return '<footer id="footer">
    <a href="https://www.themexpert.com/quix-pagebuilder" target="_blank">The Quix Builder</a> version <strong>' . QUIX_VERSION . '</strong> brought to you by <a href="https://www.themexpert.com">ThemeXpert</a> team.
  </footer>';
}


function quix_header() {
  $document = \JFactory::getDocument();

  //hide navbar if from an iframe modal
  $document->addScriptDeclaration( "if(parent !== window){
    document.styleSheets[0].insertRule(\".navbar.navbar-inverse.navbar-fixed-top{display:none}\", 0);
  }" );

  $document->addScript( JUri::root( 1 ) . '/media/editors/tinymce/tinymce.min.js' );
  $document->addScript( QUIX_URL . '/assets/js/materialize.js' );

  $document->addStyleSheet( QUIX_URL . '/assets/css/spinner.css' );
  $document->addStyleSheet( QUIX_URL . '/assets/css/materialize.css' );
  $document->addStyleSheet( QUIX_URL . '/assets/css/font-awesome.min.css' );

  $document->addScript( JUri::root( false ) . "/libraries/quix/assets/js/jquery.magnific-popup.js" );
  $document->addStyleSheet( JUri::root( false ) . "/libraries/quix/assets/css/magnific-popup.css" );

  JEventDispatcher::getInstance()->register( 'onBeforeRender', 'removeCoreAssets' );
}

function removeCoreAssets() {
  $document = JFactory::getDocument();
  $bootstrap_css = JUri::root( true ) . '/media/jui/css/bootstrap.css';
  $bootstrap_js = JUri::root( true ) . '/media/jui/js/bootstrap.min.js';
  $template = JUri::root( true ) . '/administrator/templates/isis/css/template.css?' . $document->getMediaVersion();

  unset( $document->_styleSheets[$bootstrap_css] );
  unset( $document->_styleSheets[$template] );
  unset( $document->_scripts[$bootstrap_js] );
}

function quixRenderItem( $data ) {
  JHtml::_( 'jquery.framework' );

  $document = \JFactory::getDocument();

  // jQuery easing
  $document->addScript( QUIX_URL . "/assets/js/jquery.easing.js" );
  // Bootstrap
  $document->addStylesheet( QUIX_URL . "/assets/css/quixtrap.css" );
  // WOW + Animation
  $document->addStylesheet( QUIX_URL . "/assets/css/animate.min.css" );
  $document->addScript( QUIX_URL . "/assets/js/wow.js" );
  // FontAwesome
  $document->addStylesheet( QUIX_URL . "/assets/css/font-awesome.min.css" );
  // Magnific popup
  // TODO : Compress + minify with own enque script
  $document->addStylesheet( QUIX_URL . "/assets/css/magnific-popup.css" );
  $document->addScript( QUIX_URL . "/assets/js/jquery.magnific-popup.js" );
  // Quix
  $document->addStylesheet( QUIX_URL . "/assets/css/quix.css" );
  $document->addScript( QUIX_URL . "/assets/js/quix.js" );

  ob_start();
  ?>
  <div id="quix" class="qx">
    <div class="qx-inner">
      <?php $data = json_decode( $data, true ); ?>
      <?php $quix = quix(); ?>
      <?php $fonts = $quix->getWebFontsRenderer()->getUsedFonts( $data ); ?>
      <?php $style = $quix->getStyleRenderer()->render( $data ); ?>
      <?php $view = $quix->getViewRenderer()->render( $data ); ?>

      <?php $document->addStyleDeclaration( $style ) ?>
      <?php if ( count( $fonts ) ): ?>
        <?php $document->addScript( "https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js" ); ?>
        <?php $document->addScriptDeclaration( "WebFont.load({
            google: {
              families: " . json_encode( $fonts ) . "
            }
          });" ); ?>
      <?php endif; ?>

      <?php echo $view ?>
    </div>
  </div>
  <?php

  return ob_get_clean();
}
