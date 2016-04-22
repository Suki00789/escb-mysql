<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_messages
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die; 
$update = $displayData['info'];
$version = $update->version;
$link = JRoute::_('index.php?option=com_installer&view=update&task=update.find&'.JSession::getFormToken() . '=1');;
?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<h4 class="alert-heading">
		<?php echo JText::sprintf('COM_QUIX_NEW_UPDATE_AVAILABLE_TITLE', $version); ?>
		<a href="<?php echo $link; ?>" class="btn btn-primary btn-small">Update</a>
	</h4>
</div>
