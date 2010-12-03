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
include( JPATH_ADMINISTRATOR.DS.'components/com_products/helpers/functions.php' );
class modPhuKienMenuHelper
{
	function getPhuKienMenu(&$params)
	{		
		$db			=& JFactory::getDBO();				
		$order_name = $params->get('order_name',"name");
		$sort = $params->get('order_sort',"ASC");
		$query = "SELECT * FROM #__w_cat_accessories					
			WHERE published = 1
			ORDER BY  ".$order_name." ".$sort;		
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		return $rows;
	}	
	function getTreeAss($parentid,&$array_cat, &$html){
		$db =& JFactory::getDBO();
		$query =' SELECT id, parentid, name, ordering, published FROM #__w_cat_accessories ' .
				' WHERE parentid = '.$parentid. ' and published = 1'.
				' ORDER BY ordering';			
			$db->setQuery($query);
			$cats = $db->loadObjectList();
			if($cats==NULL) return NULL;		
			else {
				$i=1;
				if ( $parentid > 0) {
					$html .= '<ul>';						
				}
				$j = 1;
				$p = 1;
				foreach($cats as $cat){
					$titleCatName = JFilterOutput::stringURLSafe($cat->name);
					$titleCatName = str_replace(' ', '-', strtolower(trim($titleCatName)));
					$link = JRoute::_('index.php?option=com_products&amp;controller=accessory&amp;catid=' . $cat->id. ':'.$titleCatName);
					if ($cat->parentid == 0) {
						$p++;
						if ($p > 2) { $p_class = 'p_li'; } else { $p_class = ''; }
						$html .= '<li class="cat_parent '.$p_class.'">'
									.'<a class="a_parent" href="'.$link.'">'
										. $cat->name
									.'</a>' ;
						$j = 1;
						
					} else {
						$p = 1;
						$html .= '<li class="cat_item stt_'.$j.'">'
									.'<a href="'.$link.'">'
										. $cat->name
									.'</a>' ;
						$j++;
					}
					$array_cat[] = $cat;
					modPhuKienMenuHelper::getTreeAss($cat->id,$array_cat, $html);
					$i++;
					$html .= '</li>';
				}
				if ($parentid > 0) {
					$html .= '</ul>';
				}
			}
		return $html;
	} 	
	
}

