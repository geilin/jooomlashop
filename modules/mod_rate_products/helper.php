<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

class modRateProductsHelper
{
	function getRateProducts($params)
	{		
		$db		=& JFactory::getDBO();		
		
		$limit 	= (int) trim($params->get('limit', 8));
		
		$query =  'SELECT p.id, p.name, p.currency,'
				  . ' p.saleprice, i.filename'
				  . ' FROM #__w_products AS p'
				  . ' LEFT JOIN #__w_images AS i ON p.image = i.id'
				  . ' WHERE p.frontpage = 1'	
				  . ' AND p.published = 1'	
				  . ' ORDER BY  p.hits DESC'
				  . ' LIMIT 0,'.$limit;		
				  
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
		for($i = 0; $i < count($rows); $i++) {	
			$row =& $rows[$i];
			$title = JFilterOutput::stringURLSafe($row->name);
			$title = str_replace(' ', '-', strtolower($title));
			$rows[$i]->link = JRoute::_('index.php?option=com_products' .
			'&view=detail&id=' . $row->id. ':'. $title);				
		}
		
		return $rows;
	}	
	
}

