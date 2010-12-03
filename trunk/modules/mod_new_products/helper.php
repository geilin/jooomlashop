<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Module Cat Menu Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    helper.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modNewProductsHelper
{
	function getNewProducts($params)
	{		
		$db			=& JFactory::getDBO();				
		
		$limit = (int) trim($params->get('limit',"8"));
		
		$query =  "SELECT p.id, p.name, p.currency, p.saleprice, p.thumbnail"
				  . " FROM #__w_products as p"
				  . " WHERE p.published = 1 "
					." AND p.frontpage = 1 "	
				  . " ORDER BY  p.date DESC"
				  . " LIMIT 0,".$limit;		
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
		for($i = 0; $i < count($rows); $i++) {	
			$row =& $rows[$i];
			$title = JFilterOutput::stringURLSafe($row->name);
			$title = str_replace(' ', '-', strtolower($title));
			$rows[$i]->link = JRoute::_('index.php?option=com_products' .
			'&view=detail&id=' . $row->id. ':'. $title);
			$rows[$i]->thumbnail = 'phones/'. $rows[$i]->thumbnail;			
		}
		
		return $rows;
	}	

	
	function getImageDefault($proid){
		$db			=& JFactory::getDBO();	
		$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$proid . " AND published =1 AND isdefault =1";
		$db->setQuery($query);			
		$imgDefault = $db->loadObject();
		return $imgDefault->filename;
	}
	
	
}

