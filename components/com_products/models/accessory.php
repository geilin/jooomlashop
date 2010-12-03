<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model cat accessory.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductAccessory extends JModel
{
	var $_accessory = null;
	var $_info = null;
	var $_cid = null;
	var $_total = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_cid = JRequest::getInt('cid', 0);
		$this->_gid = JRequest::getVar('gid', '');
		$this->_mid = JRequest::getVar('mid', '');
	}
	function getListAccessory($limit = 10, $limitstart = 0)
	{
		if (!$this->_accessory)
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT 
				a.id,
				a.name,
				a.thumbnail,
				a.price 
			FROM #__w_accessories as a
			INNER JOIN #__w_group_accessories as g
			ON a.id = g.accessorid 
			WHERE a.published = 1 ";
			if ($this->_cid > 0){
				$cats  = $this->getChildCat($this->_cid);
				$list = $this->_cid;
				if (!empty($cats)){
					foreach ($cats as $result){
						if (!empty($result->id)){
							$list = $list . ', ' .$result->id;
						}
					}
				}
				$query .= ' and a.catid IN ('.$list. ')';
			}
			// search for groupid or manufacturer
			if (!empty($this->_gid)){
				$query .= ' and g.groupid = '. $this->_gid;				
			}
			if (!empty($this->_mid)){
				$query .= ' and a.manufacturerid = '. $this->_mid;				
			}			

			$query .= " GROUP BY a.id ORDER BY a.id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_accessory = $db->loadObjectList();
		}
		return $this->_accessory;
	}	
	
	function getInfo()
	{
		if (!$this->_info)
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT p.id, p.catid, p.monitorsize, m.name as manufacturer, m.id as manufacturerid 
			FROM #__w_products as p
			INNER JOIN #__w_manufacturers as m
			ON p.manufacturerid = m.id 	
			WHERE p.published = 1 ";
			if ($this->_cid > 0){
				$query .= ' and a.catid = '.$this->_cid;
			}

			$db->setQuery( $query);
			$this->_info = $db->loadObjectList();
		}
		return $this->_info;	
	}
	
	function getCatName()
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT name 
			FROM #__w_cat_accessories			
			WHERE published = 1 ";
			if ($this->_cid > 0){
				$query .= ' and id = '.$this->_cid;
			}
			$db->setQuery( $query);
			return $db->loadResult();		
	}
	
	function getParentNameCat($cid)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT parentid
				FROM #__w_cat_accessories			
				WHERE published = 1 and id = $cid ";
			$db->setQuery( $query);
			$pid = $db->loadResult();
			if ($pid) {
				$query = "SELECT id,name 
					FROM #__w_cat_accessories			
					WHERE published = 1 and id = $pid ";
				$db->setQuery( $query);
				return $db->loadObject();		
			} else {
				return false;		
			}
	}
	function getChildCat($cid)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT id 
			FROM #__w_cat_accessories			
			WHERE published = 1 and parentid = $cid ";
			$db->setQuery( $query);
			return $db->loadObjectList();		
	}
	
	function getManufacturerName($mid)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT name 
			FROM #__w_manufacturers			
			WHERE published = 1 ";
			if ($mid > 0){
				$query .= ' and id = '.$mid;
			}
			$query .= ' ORDER BY ordering ';
			$db->setQuery( $query);
			return $db->loadResult();		
	}

	function getManufacturers()
	{
			$db =& JFactory::getDBO();	
			$where = null;
			if ($this->_cid > 0){
				$cats  = $this->getChildCat($this->_cid);
				$list = $this->_cid;
				if (!empty($cats)){
					foreach ($cats as $result){
						if (!empty($result->id)){
							$list = $list . ', ' .$result->id;
						}
					}
				}
				$where .= ' and a.catid IN ('.$list. ')';
			}
			$query = "SELECT m.id, m.name , count(a.manufacturerid) as amount 
			FROM #__w_accessories as a 
			INNER JOIN #__w_manufacturers as m
			ON a.manufacturerid = m.id			
			WHERE a.published = 1  $where 
			GROUP BY a.manufacturerid ORDER BY m.ordering";
			
			$db->setQuery($query);
			$this->_manufacturers = $db->loadObjectList();
			return $this->_manufacturers;
	}
	
	function getTotal()
	{
		$db =& JFactory::getDBO();
		$query = "SELECT 
				a.id
			FROM #__w_accessories as a
			INNER JOIN #__w_group_accessories as g
			ON a.id = g.accessorid 
			WHERE a.published = 1 ";
			
			if ($this->_cid > 0){
				$cats  = $this->getChildCat($this->_cid);
				$list = $this->_cid;
				if (!empty($cats)){
					foreach ($cats as $result){
						if (!empty($result->id)){
							$list = $list . ', ' .$result->id;
						}
					}
				}
				$query .= ' and a.catid IN ('.$list. ')';
			}
			// search for size or manufacturer
			if (!empty($this->_gid)){
				$query .= ' and g.groupid = '. $this->_gid;				
			}
			if (!empty($this->_mid)){
				$query .= ' and a.manufacturerid = '. $this->_mid;				
			}
			$query .= ' GROUP BY a.id';	
		$db->setQuery( $query );
		return COUNT($db->loadObjectList());
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
	
	function getRating($productid){
		$db =& JFactory::getDBO();			
		$where = ' productid = '. $productid;		
		$query = "SELECT COUNT(rating) as count, SUM(rating) as total 
			FROM #__w_comments	
			WHERE published and $where	
			GROUP BY productid ";
		$db->setQuery($query);
		$row = $db->loadObject();

		if ($row->count){
			return round($row->total/$row->count,1);
		} else {
			return 0;
		}
	}
	function isParent($cid) {
		$db =& JFactory::getDBO();			
		$query = "SELECT parentid 
			FROM #__w_cat_accessories
			WHERE id=$cid"	
			;
		$db->setQuery($query);
		$row = $db->loadResult();
		return $row;
	}
}

// end file
