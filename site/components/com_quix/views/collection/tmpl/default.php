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

JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
?>

<?php if ($this->item) : ?>
	<?php echo quixRenderItem($this->item->data); ?>
<?php
else:
	echo JText::_('COM_QUIX_ITEM_NOT_LOADED');
endif;
