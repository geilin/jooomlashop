<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    element product category
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

/**
 * Renders a newsfeed selection element
 *
 * @package 	Newsfeeds
 * @subpackage	Parameter
 * @since		1.5
 */

class JElementProduct extends JElement
{
	/**
	 * Element name
	 *
	 * @access	protected
	 * @var		string
	 */
	var	$_name = 'Product';
	
function getCategory($parentid = 0,$space = '', $trees = NULL){
		$db =& JFactory::getDBO();
		if(!$trees){
			$trees = array(); 
		}
		
		$selects = "SELECT * FROM #__w_categories WHERE  parentid = ".$parentid . " AND published=1 "; 
		$db->setQuery( $selects);
		$rows = $db->loadAssocList();
		foreach ($rows as $row){
			$alias = JFilterOutput::stringURLSafe($row['name']);
			$alias = str_replace(' ', '-', strtolower($alias));
			$trees[] = array('id'=>$row['id'].':'.$alias,'category_name'=>$space.$row['name']); 
			if(!empty($row)){
				$trees = $this->getCategory($row['id'],$space.'&nbsp;&nbsp;&nbsp;&nbsp;',$trees); 
			}
		}
		return $trees; 
	}
	/**
	 * @access	protected
	 * @var		string
	 * @return tag select
	 */
	function fetchElement($name, $value, &$node, $control_name)	{
		$options = $this->getCategory();
		array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('SELECT CATEGORY').' -', 'id', 'category_name'));
		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"', 'id', 'category_name', $value, $control_name.$name );	
	}
	
	
	
	
	
	
	
	
	/*
	function fetchElement($name, $value, &$node, $control_name)
	{
		$db = &JFactory::getDBO();

		$query = "SELECT id, name FROM #__w_categories";
		$db->setQuery( $query );
		$options = $db->loadObjectList( );
		array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('Select Category').' -', 'id', 'name'));
		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"', 'id', 'name', $value, $control_name.$name );
	}
	*/
}
