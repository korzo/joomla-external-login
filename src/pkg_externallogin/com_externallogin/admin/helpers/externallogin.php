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

/**
 * External Login component helper.
 *
 * @package     External Login
 * @subpackage  Component
 *
 * @since  2.0.0
 */
abstract class ExternalloginHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param  string  $submenu  the name of the current submenu
	 *
	 * @return  void
	 *
	 * @since  0.0.1
	 */
	public static function addSubmenu($submenu = 'servers') 
	{
		// Addsubmenu
		JSubMenuHelper::addEntry(JText::_('COM_EXTERNALLOGIN_SUBMENU_SERVERS'), JRoute::_('index.php?option=com_externallogin', false), $submenu == 'servers');
		JSubMenuHelper::addEntry(JText::_('COM_EXTERNALLOGIN_SUBMENU_ABOUT'), JRoute::_('index.php?option=com_externallogin&view=about', false), $submenu == 'about');

		// set some global property
		$document = JFactory::getDocument();
		$document->setTitle(JText::sprintf('COM_EXTERNALLOGIN_PAGETITLE', JFactory::getConfig()->get('sitename'), JText::_('COM_EXTERNALLOGIN_PAGETITLE_' . $submenu)));
	}

	/**
	 * Get a list of enabled plugins
	 *
	 * @return  array  array of plugins
	 *
	 * @since  2.0.0
	 */
	public static function getPlugins()
	{
		$app = JFactory::getApplication();
		return (array) $app->triggerEvent('onGetOption', array('com_externallogin'));
	}

	/**
	 * Get a list of groups from a string
	 *
	 * @param   string  $path  Group path
	 *
	 * @return  array   Array of groups
	 */
	public static function getGroups($path)
	{
		// Get the dbo
		$db = JFactory::getDbo();

		// Split the path
		$path = explode('/', $path);
		$count = count($path);

		// Path is correct
		if ($count && !empty($path[$count - 1]))
		{
			// prepare query
			$query = $db->getQuery(true);
			$query->select('a' . ($count - 1) . '.id as id');
			$query->from('#__usergroups AS a' . ($count - 1));
			$query->where('a' . ($count - 1) . '.title = ' . $db->quote($path[$count - 1]));
			for ($i = $count - 2; $i >= 0; $i--)
			{
				if (empty($path[$i]))
				{
					if ($i == 0)
					{
						// Path is absolute
						$query->where('a1.parent_id = 0');
					}
					else
					{
						// Path is incorrect
						return null;
					}
				}
				else
				{
					$query->leftJoin('#__usergroups AS a' . $i . ' ON a' . $i . '.id = a' . ($i + 1) . '.parent_id');
					$query->where('a' . $i . '.title LIKE ' . $db->quote($path[$i]));
					
				}
			}
			$db->setQuery($query);
			return $db->loadColumn();
		}
		// Path is incorrect
		else
		{
			return null;
		}
	}	 
}
