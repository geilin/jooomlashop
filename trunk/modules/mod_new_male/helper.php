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

class modNewFameHelper
{
	function getNewFame($params)
	{		
		$db			=& JFactory::getDBO();				
		
		$limit = (int) trim($params->get('limit',"8"));
		$catid = (int) trim($params->get('catid',"0"));
		
		$query =  "SELECT p.id, p.name, p.currency, p.saleprice, p.thumbnail"
				  . " FROM #__w_products as p"
				  . " WHERE p.published = 1 "
					." AND p.frontpage = 1 "	
					." AND p.catid =  " . 	$catid 
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
	
	
	function getLinkAll($params){
		$catid = (int) trim($params->get('catid',"0"));
		$db			=& JFactory::getDBO();	
		$query = "SELECT * FROM #__w_categories WHERE id=" .(int)$catid . " AND published =1 ";
		$db->setQuery($query);			
		$cat = $db->loadObject();
		$catTitle = JFilterOutput::stringURLSafe($cat->name);
		$catTitle = str_replace(' ', '-', strtolower($catTitle));
		$links = JRoute::_('index.php?option=com_products' .'&amp;view=category&catid=' . $cat->id. ':'.$catTitle);
		return $links;
	}
	
	function getImageDefault($proid){
		$db			=& JFactory::getDBO();	
		$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$proid . " AND published =1 AND isdefault =1";
		$db->setQuery($query);			
		$imgDefault = $db->loadObject();
		return $imgDefault->filename;
	}
	
	
}

