<?php

/**
 * @package     External Login
 * @subpackage  Component
 * @copyright   Copyright (C) 2008-2012 Christophe Demko, Ioannis Barounis, Alexandre Gandois. All rights reserved.
 * @author      Christophe Demko
 * @author      Ioannis Barounis
 * @author      Alexandre Gandois
 * @link        http://www.chdemko.com
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 */

// No direct access to this file
defined('_JEXEC') or die;

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<script>
Joomla.submitbutton = function(pressbutton)
{
	if (pressbutton == 'server.upload')
	{
		var c = 0;
		for (var i = 0, n = document.adminForm.elements.length; i < n; i++)
		{
			var e = document.adminForm.elements[i];
			if (e.name == 'cid[]' & e.checked == true)
			{
				c = e.value;
				break;
			}
		}
		SqueezeBox.open("<?php echo JRoute::_('index.php?option=com_externallogin&view=upload&tmpl=component', false);?>" + '&id=' + c, {handler: 'iframe', size: {x: 600, y: 300}});
	}
	else
	{
		Joomla.submitform(pressbutton);
	}
}
</script>
<form action="<?php echo JRoute::_('index.php?option=com_externallogin'); ?>" method="post" name="adminForm" id="adminForm">
	<?php echo $this->loadTemplate('filter');?>
	<table class="adminlist">
		<thead><?php echo $this->loadTemplate('head');?></thead>
		<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
		<tbody><?php echo $this->loadTemplate('body');?></tbody>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $this->escape($this->state->get('list.ordering'));?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->escape($this->state->get('list.direction'));?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>

