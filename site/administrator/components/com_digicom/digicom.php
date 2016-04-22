<?php
/**
 * @package		DigiCom
 * @author 		ThemeXpert http://www.themexpert.com
 * @copyright	Copyright (c) 2010-2015 ThemeXpert. All rights reserved.
 * @license 	GNU General Public License version 3 or later; see LICENSE.txt
 * @since 		1.0.0
 */

defined('_JEXEC') or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_digicom'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

JHtml::_('behavior.tabstate');

JLoader::discover('DigiComHelper', JPATH_COMPONENT_ADMINISTRATOR . '/helpers');
JLoader::discover('DigiComSiteHelper', JPATH_COMPONENT_SITE . '/helpers');

$controller	= JControllerLegacy::getInstance('Digicom');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

DigiComHelperDigiCom::setSidebarRight();
