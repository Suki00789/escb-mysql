<?php

/**
 * @version    CVS: 1.0.0
 * @package    com_quix
 * @author     ThemeXpert <info@themexpert.com>
 * @copyright  Copyright (C) 2015. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Quix helper.
 *
 * @since  1.6
 */
class QuixHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  string
	 *
	 * @return void
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_QUIX_TITLE_PAGES'),
			'index.php?option=com_quix&view=pages',
			$vName == 'pages'
		);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_QUIX_TITLE_COLLECTIONS'),
			'index.php?option=com_quix&view=collections',
			$vName == 'collections'
		);

	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return    JObject
	 *
	 * @since    1.6
	 */
	public static function getActions()
	{
		$user   = JFactory::getUser();
		$result = new JObject;

		$assetName = 'com_quix';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}	

	/**
	* Get group name using group ID
	* @param integer $group_id Usergroup ID
	* @return mixed group name if the group was found, null otherwise
	*/
	public static function getGroupNameByGroupId($group_id) {
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select('title')
			->from('#__usergroups')
			->where('id = ' . intval($group_id));

		$db->setQuery($query);
		return $db->loadResult();
	}
	/*
	* to get update info
	* use layout to get alert structure
	*/

	public static function getUpdateStatus(){

		$update = self::checkUpdate();
		// print_r($update);die;
		if(isset($update->update_id) && $update->update_id){
			// Instantiate a new JLayoutFile instance and render the layout
			$layout = new JLayoutFile('toolbar.update');
			return $layout->render(array('info' => $update));		
		}

		return;
	}

	/*
	* show warning
	* for free versions only
	*/

	public static function getFreeWarning(){
		jimport( 'joomla.form.form' );
		//##QUIX_CREATIONDATE##
		$form = simplexml_load_file(JPATH_COMPONENT_ADMINISTRATOR.'/quix.xml');
		if($form->tag != 'pro'){
			$layout = new JLayoutFile('toolbar.freenotice');
			return $layout->render(array());		
		}

		return;
	}

	/*
	* to get php warning
	* we require at least php 5.4
	*/

	public static function getPHPWarning(){

		if (version_compare(phpversion(), '5.4', '<')) {
			// Instantiate a new JLayoutFile instance and render the layout
			$layout = new JLayoutFile('toolbar.phpwarning');
			return $layout->render(array());		
		}

		return;
	}

	/*
	* to get update info
	* use layout to get alert structure
	*/

	public static function checkUpdate(){
		// Get a database object.
		$db = JFactory::getDbo();

		// get extensionid
		$query = $db->getQuery(true)
					->select('extension_id')
					->from('#__extensions')
					->where($db->quoteName('type') . ' = ' . $db->quote('package'))
					->where($db->quoteName('element') . ' = ' . $db->quote('pkg_quix'));

		$db->setQuery($query);
		
		$extensionid = $db->loadResult();

		// get update_site_id
		$query = $db->getQuery(true)
					->select('*')
					->from('#__updates')
					->where($db->quoteName('extension_id') . ' = ' . $db->quote($extensionid))
					->where($db->quoteName('element') . ' = ' . $db->quote('pkg_quix'))
					->where($db->quoteName('type') . ' = ' . $db->quote('package'));
		$db->setQuery($query);
		
		return $db->loadObject();
		
	}
}
