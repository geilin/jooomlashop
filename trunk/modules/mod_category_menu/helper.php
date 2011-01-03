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
		$baseurl = JURI::base();
		$categories = $params->get('categories');
		
		$list = array();
		
		foreach( $categories as $cat ) {		
			$cat 			= explode('#', $cat);			
			$list[$cat[0]]	= $cat[1];
		
		}		
		return $list;
	}
}