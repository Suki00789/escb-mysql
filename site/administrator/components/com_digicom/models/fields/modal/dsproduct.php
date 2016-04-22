<?php
/**
 * @package		DigiCom
 * @author 		ThemeXpert http://www.themexpert.com
 * @copyright	Copyright (c) 2010-2015 ThemeXpert. All rights reserved.
 * @license 	GNU General Public License version 3 or later; see LICENSE.txt
 * @since 		1.0.0
 */

defined('_JEXEC') or die;

/**
 * Supports a modal product picker.
 *
 * @package     DigiCom
 * @since       1.0.0
 */
// TODO : Refactor class
class JFormFieldModal_DSProduct extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since   1.0.0
	 */
	protected $type = 'Modal_DSProduct';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 * @since   1.0.0
	 */
	protected function getInput()
	{
		$allowEdit		= ((string) $this->element['edit'] == 'true') ? true : false;
		$allowClear		= ((string) $this->element['clear'] != 'false') ? true : false;
		$category_field = isset($this->element['category_field'])?(string) $this->element['category_field']:'';
		$category_field_id = $this->formControl.'_'.$this->group.'_'.$category_field;
//		echo '<pre>'.print_r($this, true).'</pre>';
		// Load language
		JFactory::getLanguage()->load('com_digicom', JPATH_ADMINISTRATOR);

		// Load the modal behavior script.
		JHtml::_('behavior.modal', 'a.modal');

		// Build the script.
		$script = array();

		// Select button script
		$script[] = '	function jSelectDSProduct_' . $this->id . '(id, title, catid, cattitle) {';
		$script[] = '		document.getElementById("' . $this->id . '_id").value = id;';
		$script[] = '		document.getElementById("' . $this->id . '_name").value = title;';
		if($category_field){
			$script[] = '		document.getElementById("' . $category_field_id . '_id").value = catid;';
			$script[] = '		document.getElementById("' . $category_field_id . '_name").value = cattitle;';
		}
		if ($allowEdit)
		{
			$script[] = '		jQuery("#' . $this->id . '_edit").removeClass("hidden");';
		}

		if ($allowClear)
		{
			$script[] = '		jQuery("#' . $this->id . '_clear").removeClass("hidden");';
		}

		$script[] = '		SqueezeBox.close();';
		$script[] = '	}';

		// Clear button script
		static $scriptClear;

		if ($allowClear && !$scriptClear)
		{
			$scriptClear = true;

			$script[] = '	function jClearDSProduct(id) {';
			$script[] = '		document.getElementById(id + "_id").value = "";';
			$script[] = '		document.getElementById(id + "_name").value = "' . htmlspecialchars(JText::_('COM_CONTENT_SELECT_AN_ARTICLE', true), ENT_COMPAT, 'UTF-8') . '";';
			$script[] = '		jQuery("#"+id + "_clear").addClass("hidden");';
			$script[] = '		if (document.getElementById(id + "_edit")) {';
			$script[] = '			jQuery("#"+id + "_edit").addClass("hidden");';
			$script[] = '		}';
			$script[] = '		return false;';
			$script[] = '	}';
		}

		// Add the script to the document head.
		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

		// Setup variables for display.
		$html	= array();
		$link	= 'index.php?option=com_digicom&amp;view=products&amp;layout=modal&amp;tmpl=component&amp;function=jSelectDSProduct_' . $this->id;

		if (isset($this->element['language']))
		{
			$link .= '&amp;forcedLanguage=' . $this->element['language'];
		}

		if ((int) $this->value > 0)
		{
			$db	= JFactory::getDbo();
			$query = $db->getQuery(true)
				->select($db->quoteName('name'))
				->from($db->quoteName('#__digicom_products'))
				->where($db->quoteName('id') . ' = ' . (int) $this->value);
			$db->setQuery($query);

			try
			{
				$title = $db->loadResult();
			}
			catch (RuntimeException $e)
			{
				JError::raiseWarning(500, $e->getMessage());
			}
		}

		if (empty($title))
		{
			$title = JText::_('COM_DIGICOM_SELECT_A_PRODUCT');
		}
		$title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

		// The active product id field.
		if (0 == (int) $this->value)
		{
			$value = '';
		}
		else
		{
			$value = (int) $this->value;
		}

		// The current product display field.
		$html[] = '<span class="input-append">';
		$html[] = '<input type="text" class="input-medium" id="' . $this->id . '_name" value="' . $title . '" disabled="disabled" size="35" />';
		$html[] = '<a class="modal btn hasTooltip" title="' . JHtml::tooltipText('COM_CONTENT_CHANGE_ARTICLE') . '"  href="' . $link . '&amp;' . JSession::getFormToken() . '=1" rel="{handler: \'iframe\', size: {x: 800, y: 450}}"><i class="icon-file"></i> ' . JText::_('JSELECT') . '</a>';

		
		// Clear product button
		if ($allowClear)
		{
			$html[] = '<button id="' . $this->id . '_clear" class="btn' . ($value ? '' : ' hidden') . '" onclick="return jClearArticle(\'' . $this->id . '\')"><span class="icon-remove"></span> ' . JText::_('JCLEAR') . '</button>';
		}

		$html[] = '</span>';

		// class='required' for client side validation
		$class = '';
		if ($this->required)
		{
			$class = ' class="required modal-value"';
		}

		$html[] = '<input type="hidden" id="' . $this->id . '_id"' . $class . ' name="' . $this->name . '" value="' . $value . '" />';

		return implode("\n", $html);
	}
}
