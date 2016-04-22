<?php
/** FIXME */
//require_once JPATH_ADMINISTRATOR . '/components/com_quix/helpers/quix.php';
JLoader::register( 'QuixFrontendHelper', JPATH_COMPONENT . '/helpers/quix.php' );

// Load module by id
if ( !function_exists( 'qxModuleById' ) ) {
  function qxModuleById( $id, $style = 'raw' ) {

    $db = JFactory::getDBo();
    $query = $db->getQuery( true );
    $query->select( array( 'title', 'module' ) )
          ->from( '#__modules' )
          ->where( 'id = ' . $id );
    $db->setQuery( $query );
    $module = $db->loadObject();

    $params = array( 'style' => $style );
    $moduleinfo = JModuleHelper::getModule( $module->module, $module->title );
    return JModuleHelper::renderModule( $moduleinfo, $params );
  }
}

if ( !function_exists( 'qxGetCollections' ) ) {
  function qxGetCollections( $details = false ) {
    JModelLegacy::addIncludePath( JPATH_SITE . '/components/com_quix/models', 'QuixModel' );

    // Get an instance of the generic articles model
    $model = JModelLegacy::getInstance( 'Collections', 'QuixModel', array( 'ignore_request' => true ) );

    // Set the filters based on the module params
    $model->setState( 'list.start', 0 );
    $model->setState( 'list.limit', 999 );

    if ( !$details ) {
      $model->setState( 'list.select', 'a.id, a.uid, a.title, a.type' );
    }

    $model->setState( 'filter.state', 1 );

    // Access filter
    $access = !JComponentHelper::getParams( 'com_quix' )->get( 'show_noauth' );
    $authorised = JAccess::getAuthorisedViewLevels( JFactory::getUser()->get( 'id' ) );
    $model->setState( 'filter.access', $access );

    // Retrieve Content
    return $model->getItems();
  }
}

function quix_default_template() {
  $db = JFactory::getDBO();
  $query = "SELECT template FROM #__template_styles WHERE client_id = 0 AND home = 1";
  $db->setQuery( $query );
  return $db->loadResult();
}

function qxGetCollectionById( $id ) {
  $app = JFactory::getApplication();
  if ( !$app->isAdmin() ) {
    JModelLegacy::addIncludePath( JPATH_SITE . '/components/com_quix/models', 'QuixModel' );
    require_once JPATH_SITE . '/components/com_quix/helpers/quix.php';

    $model = JModelLegacy::getInstance( 'Collection', 'QuixModel', array( 'ignore_request' => true ) );
    // Retrieve Content
    $item = $model->getData( $id );
  } else {
    $model = JModelLegacy::getInstance( 'Collection', 'QuixModel', array( 'ignore_request' => true ) );
    // Retrieve Content
    $item = $model->getItem( $id );

  }

  return $item;
}

/**
 * @return mixed
 */
function qxGetComponentInfo() {
  $extension = JTable::getInstance( 'extension' );
  $id = $extension->find( array( 'element' => 'com_quix' ) );
  $extension->load( $id );
  $componentInfo = json_decode( $extension->manifest_cache, true );

  return $componentInfo;
}
