<?php
jimport('joomla.application.component.helper');
jimport('quix.vendor.autoload');
jimport('quix.app.functions');
jimport('quix.app.joomla');
jimport('quix.app.template');
jimport('quix.app.css');

$componentInfo = qxGetComponentInfo();
$isEditor = array_get( $_GET, "layout" ) === "edit";
$isAdmin = JFactory::getApplication()->isAdmin();

$params = JComponentHelper::getParams( 'com_quix' );
$debug = $params->get( 'dev_mode', true );

define( "QUIX_EDITOR", $isEditor );
define( "QUIX_DEBUG", $debug );
define( "QUIX_VERSION", $componentInfo['version'] );
define( "QUIX_CACHE", !$debug && !$isAdmin );

define( "QUIX_SITE_URL", untrailingslashit( JUri::root( false ) ) );

define( "QUIX_URL", QUIX_SITE_URL . "/libraries/quix" );
define( "QUIX_PATH", dirname( __DIR__ ) );

define( "QUIX_TEMPLATE_PATH", JPATH_ROOT . "/templates/" . quix_default_template() . "/quix" );
define( "QUIX_TEMPLATE_URL", QUIX_SITE_URL . "/templates/" . quix_default_template() . "/quix" );

define( "QUIX_DEFAULT_ELEMENT_IMAGE", QUIX_URL . "/assets/images/quix-logo.png" );
define( "QUIX_CACHE_PATH", QUIX_PATH . "/app/cache" );

if ( QUIX_DEBUG ) {
  ini_set( 'display_errors', 1 );
}
