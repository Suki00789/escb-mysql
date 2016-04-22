<?php
/**
 * @version    CVS: 1.0.0
 * @package    com_quix
 * @author     ThemeXpert <info@themexpert.com>
 * @copyright  Copyright (C) 2015. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

// Include dependencies
jimport( 'joomla.application.component.controller' );
jimport( 'quix.app.bootstrap' );
jimport( 'quix.app.init' );

JLoader::register( 'QuixFrontendHelper', JPATH_COMPONENT . '/helpers/quix.php' );

// Execute the task.
$controller = JControllerLegacy::getInstance( 'Quix' );
$controller->execute( JFactory::getApplication()->input->get( 'task' ) );
$controller->redirect();
