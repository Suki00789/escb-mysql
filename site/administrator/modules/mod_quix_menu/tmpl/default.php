<?php
/**
 * @package		Quix
 * @author 		ThemeXpert http://www.themexpert.com
 * @copyright	Copyright (c) 2010-2015 ThemeXpert. All rights reserved.
 * @license 	GNU General Public License version 3 or later; see LICENSE.txt
 * @since 		1.0.0
 */

// No direct access.
defined('_JEXEC') or die;
?>

<ul class="nav nav-quix<?php echo ($hideMainmenu ? ' disabled' : ''); ?>">
	<li class="dropdown<?php echo ($hideMainmenu ? ' disabled' : ''); ?>">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<?php echo JText::_('COM_QUIX');?>
			<span class="caret"></span>
		</a>
		<?php if (!$hideMainmenu) : ?>
		<ul class="dropdown-menu">
			<li class="dropdown-submenu">
				<a href="index.php?option=com_quix" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo JText::_('MOD_QUIX_MENU_PAGES'); ?>
				</a>
				<ul id="submenu-com-quix" class="dropdown-menu mod-menu-digicom">
					<li><a href="<?php echo JRoute::_('index.php?option=com_quix&task=page.add'); ?>"><?php echo JText::_('MOD_QUIX_MENU_ADD_NEW'); ?></a></li>
				</ul>
			</li>
			<li class="dropdown-submenu">
				<a href="<?php echo JRoute::_('index.php?option=com_quix&view=collections'); ?>" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo JText::_('MOD_QUIX_MENU_COLLECTIONS'); ?>
				</a>
				<ul id="submenu-com-quix" class="dropdown-menu mod-menu-digicom">
					<li><a href="<?php echo JRoute::_('index.php?option=com_quix&task=collection.add'); ?>"><?php echo JText::_('MOD_QUIX_MENU_ADD_NEW_COLL'); ?></a></li>
				</ul>
			</li>
<!-- 			<li>
				<a href="https://gitter.im/themexpert/quicx" target="_blank">
					<span><?php echo JText::_('MOD_QUIX_MENU_CHAT') ?></span>
				</a>
			</li> -->
			<li>
				<a href="https://themexpert.typeform.com/to/S9eVPd" target="_blank">
					<span><?php echo JText::_('MOD_QUIX_MENU_FEED_BACK') ?></span>
				</a>
			</li>
		</ul>
		<?php endif; ?>
	</li>
</ul>