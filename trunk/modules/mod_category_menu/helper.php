<?php
/**
* Category Menu Module
* @package Joomla
* @copyright Copyright (C) Kulendra Janaka. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software and parts of it may contain or be derived from the
* GNU General Public License or other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

class modCategoryMenuHelper
{
	
	function generateCategoryList($params)
	{
		
		$category	= $params->get('category', 0);
		$database = & JFactory::getDBO();
		
		$query = 'SELECT c.id, c.name FROM #__w_categories AS c'
				.' WHERE c.published=1 AND c.parentid = ' . $category
				.' ORDER BY c.ordering ASC';		 
		$database->setQuery($query);
		return $database->loadObjectList();		
	}
}