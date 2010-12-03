<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductFrontpage extends JModel
{
	var $_product = null;
	var $_info = null;
	var $_cid = null;
	var $_total = null;
	var $_imagesDefault =null;
	var $_newProducts = null;
	var $_hotProducts =null;
	
	function __construct()
	{
		parent::__construct();

		$this->_cid = JRequest::getInt('catid', 0);
		$this->_size = JRequest::getVar('size', '');
		$this->_id = JRequest::getVar('id', '');
		
	}
	function getListNew($limit, $limitstart = 0)	{
		if (!$this->_newProducts){
			$db =& JFactory::getDBO();				
			$query = "SELECT p.id, p.intro, p.saleprice, p.currency, p.catid, p.name, p.thumbnail, p.hits, p.monitorsize 
					FROM #__w_products as p
					WHERE p.published = 1 ";
			// search for size or manufacturer	
			$query .= " ORDER BY p.id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_newProducts = $db->loadObjectList();
		}

		return $this->_newProducts;
	}	
	
	function getListHot($limit, $limitstart = 0)	{
		if (!$this->_hotProducts){
			$db =& JFactory::getDBO();				
			$query = "SELECT p.id, p.intro, p.saleprice, p.currency, p.catid, p.name, p.thumbnail, p.hits, p.monitorsize 
					FROM #__w_products as p
					WHERE p.published = 1 ";
			// search for size or manufacturer	
			$query .= " ORDER BY p.id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_hotProducts = $db->loadObjectList();
		}

		return $this->_hotProducts;
	}	
	
	
	function getImageDefault($proid){
		$this->_imagesDefault = '';
		if(!$this->_imagesDefault){
			$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$proid . " AND published =1 AND isdefault =1";
	
			$this->_db->setQuery($query);			
			$this->_imagesDefault = $this->_db->loadObject();
		}
		return $this->_imagesDefault;
	}
	
	function getCatName()
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT name 
			FROM #__w_categories			
			WHERE published = 1 ";
			if ($this->_cid > 0){
				$query .= ' and id = '.$this->_cid;
			}
			$db->setQuery( $query);
			return $db->loadResult();		
	}
	
	function getCategory($cid)
	{
		if (!empty($catid))
		{
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__w_categories WHERE id = $cid";
			$db->setQuery( $query );
			$result = $db->loadObject();
			return $result->name;		
		}
	}
	
	
	
}

// end file
